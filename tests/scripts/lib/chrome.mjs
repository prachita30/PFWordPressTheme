/**
 * Tiny Chrome DevTools Protocol helper (no dependencies; Node 22+ for the global WebSocket).
 * Launches headless Chrome/Edge with a fresh, throwaway profile.
 */
import { spawn } from 'node:child_process';
import { existsSync, mkdtempSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join } from 'node:path';

export const sleep = ( ms ) => new Promise( ( r ) => setTimeout( r, ms ) );

export function findChrome() {
	return [
		process.env.CHROME,
		'C:/Program Files/Google/Chrome/Application/chrome.exe',
		'C:/Program Files (x86)/Microsoft/Edge/Application/msedge.exe',
		'/Applications/Google Chrome.app/Contents/MacOS/Google Chrome',
		'/usr/bin/google-chrome',
		'/usr/bin/chromium',
	].filter( Boolean ).find( ( p ) => existsSync( p ) );
}

export async function launch() {
	const chrome = findChrome();
	if ( ! chrome ) {
		throw new Error( 'No Chrome/Edge found. Set CHROME=/path/to/browser.' );
	}
	const port = 9333 + Math.floor( Math.random() * 500 );
	const profile = mkdtempSync( join( tmpdir(), 'pf-chrome-' ) );
	const proc = spawn( chrome, [ '--headless=new', '--disable-gpu', '--hide-scrollbars', `--remote-debugging-port=${ port }`, `--user-data-dir=${ profile }`, 'about:blank' ], { stdio: 'ignore' } );

	let target;
	for ( let i = 0; i < 50 && ! target; i++ ) {
		await sleep( 200 );
		try {
			target = ( await ( await fetch( `http://127.0.0.1:${ port }/json/list` ) ).json() ).find( ( t ) => t.type === 'page' );
		} catch {}
	}
	if ( ! target ) {
		proc.kill();
		throw new Error( 'Could not connect to Chrome DevTools.' );
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
	const goto = async ( url ) => {
		const loaded = once( 'Page.loadEventFired' );
		await send( 'Page.navigate', { url } );
		await loaded;
	};
	const evaluate = async ( expression ) => {
		const { result } = await send( 'Runtime.evaluate', { expression, returnByValue: true, awaitPromise: true } );
		if ( result.exceptionDetails ) {
			throw new Error( result.exceptionDetails.exception?.description || result.exceptionDetails.text );
		}
		return result.result.value;
	};
	const close = () => {
		ws.close();
		proc.kill();
	};

	await send( 'Page.enable' );
	return { send, once, goto, evaluate, close };
}
