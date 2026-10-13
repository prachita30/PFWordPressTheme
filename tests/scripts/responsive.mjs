#!/usr/bin/env node
/**
 * Responsive check: loads key routes in headless Chrome at real device widths (DevTools Protocol
 * device emulation, so narrow phones are reflowed, not cropped) and reports horizontal overflow.
 * Optionally saves full-page screenshots.
 *
 * No dependencies: uses Node 22+'s built-in WebSocket and a locally installed Chrome/Edge.
 *
 * Usage: node tests/scripts/responsive.mjs [baseUrl] [--shots=dir]
 *   WIDTHS=320,375,414,768,1280  ROUTES=/,/shop/  CHROME=/path/to/chrome
 */
import { spawn } from 'node:child_process';
import { existsSync, mkdirSync, mkdtempSync, writeFileSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join, resolve } from 'node:path';

const args = process.argv.slice( 2 );
const base = ( args.find( ( a ) => a.startsWith( 'http' ) ) || 'http://127.0.0.1:9400' ).replace( /\/$/, '' );
const shotsArg = args.find( ( a ) => a.startsWith( '--shots=' ) );
const shots = shotsArg ? resolve( shotsArg.slice( 8 ) ) : null;
if ( shots ) mkdirSync( shots, { recursive: true } );

const widths = ( process.env.WIDTHS || '320,375,414,768,1280' ).split( ',' ).map( Number );
const routes = process.env.ROUTES
	? process.env.ROUTES.split( ',' )
	: [ '/', '/?post_type=product', '/?product=hand-poured-candle', '/?product=linen-bound-sketchbook', '/gift-finder/', '/about/', '/journal/', '/contact/', '/faq/', '/?pagename=cart', '/?pagename=checkout', '/?s=candle', '/no-such-page-404/' ];

const chrome = [
	process.env.CHROME,
	'C:/Program Files/Google/Chrome/Application/chrome.exe',
	'C:/Program Files (x86)/Microsoft/Edge/Application/msedge.exe',
	'/Applications/Google Chrome.app/Contents/MacOS/Google Chrome',
	'/usr/bin/google-chrome',
	'/usr/bin/chromium',
].filter( Boolean ).find( ( p ) => existsSync( p ) );
if ( ! chrome ) {
	console.error( 'No Chrome/Edge found. Set CHROME=/path/to/browser.' );
	process.exit( 1 );
}

const port = 9333 + Math.floor( Math.random() * 500 );
const profile = mkdtempSync( join( tmpdir(), 'pf-chrome-' ) );
const proc = spawn( chrome, [ '--headless=new', '--disable-gpu', '--hide-scrollbars', `--remote-debugging-port=${ port }`, `--user-data-dir=${ profile }`, 'about:blank' ], { stdio: 'ignore' } );

const sleep = ( ms ) => new Promise( ( r ) => setTimeout( r, ms ) );
let target;
for ( let i = 0; i < 50 && ! target; i++ ) {
	await sleep( 200 );
	try {
		target = ( await ( await fetch( `http://127.0.0.1:${ port }/json/list` ) ).json() ).find( ( t ) => t.type === 'page' );
	} catch {}
}
if ( ! target ) {
	console.error( 'Could not connect to Chrome DevTools.' );
	proc.kill();
	process.exit( 1 );
}

const ws = new WebSocket( target.webSocketDebuggerUrl );
await new Promise( ( r ) => ( ws.onopen = r ) );
let id = 0;
const pending = new Map();
const listeners = [];
ws.onmessage = ( e ) => {
	const msg = JSON.parse( e.data );
	if ( msg.id && pending.has( msg.id ) ) {
		pending.get( msg.id )( msg );
		pending.delete( msg.id );
	} else if ( msg.method ) {
		listeners.forEach( ( l ) => l( msg ) );
	}
};
const send = ( method, params = {} ) => new Promise( ( r ) => {
	const n = ++id;
	pending.set( n, r );
	ws.send( JSON.stringify( { id: n, method, params } ) );
} );
const once = ( method, timeout = 60000 ) => new Promise( ( r ) => {
	const t = setTimeout( r, timeout );
	const l = ( m ) => {
		if ( m.method === method ) {
			clearTimeout( t );
			listeners.splice( listeners.indexOf( l ), 1 );
			r( m );
		}
	};
	listeners.push( l );
} );

await send( 'Page.enable' );
const MEASURE = `(() => {
	const vw = document.documentElement.clientWidth;
	const sw = document.documentElement.scrollWidth;
	if ( sw <= vw ) return { vw, sw, offender: '' };
	const skip = '.wc-block-components-drawer, .wc-block-mini-cart__drawer, .wp-block-navigation__responsive-container:not(.is-menu-open)';
	const el = [ ...document.querySelectorAll( 'body *' ) ].find( ( e ) => e.getBoundingClientRect().right > vw + 1 && ! e.closest( skip ) );
	return { vw, sw, offender: el ? el.tagName.toLowerCase() + '.' + String( el.className ).trim().split( /\\s+/ ).slice( 0, 3 ).join( '.' ) : '(hidden element)' };
})()`;

let failures = 0;
for ( const width of widths ) {
	await send( 'Emulation.setDeviceMetricsOverride', { width, height: 900, deviceScaleFactor: 1, mobile: width < 768 } );
	for ( const route of routes ) {
		const loaded = once( 'Page.loadEventFired' );
		await send( 'Page.navigate', { url: base + route } );
		await loaded;
		await sleep( 400 );
		const { result } = await send( 'Runtime.evaluate', { expression: MEASURE, returnByValue: true } );
		const { vw, sw, offender } = result.result.value;
		const ok = sw <= vw;
		if ( ! ok ) failures++;
		console.log( `${ ok ? 'PASS' : 'FAIL' }  ${ String( width ).padStart( 4 ) }px  ${ route.padEnd( 34 ) }${ ok ? '' : ` scrollWidth ${ sw } > ${ vw } — ${ offender }` }` );
		if ( shots ) {
			const shot = await send( 'Page.captureScreenshot', { format: 'png', captureBeyondViewport: true } );
			const name = ( route.replace( /[^a-z0-9]+/gi, '-' ).replace( /^-|-$/g, '' ) || 'home' ) + `-${ width }.png`;
			writeFileSync( join( shots, name ), Buffer.from( shot.result.data, 'base64' ) );
		}
	}
}

ws.close();
proc.kill();
console.log( `\n${ failures ? failures + ' overflow(s) found' : 'No horizontal overflow' } — ${ widths.length * routes.length } page/width combinations against ${ base }` );
process.exit( failures ? 1 : 0 );
