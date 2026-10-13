#!/usr/bin/env node
/**
 * T-VAR-01..03: applies each style variation through the Global Styles REST API (exactly what
 * Editor → Styles → Browse styles does), screenshots key pages, then restores the original styles.
 *
 * Local Playground only (uses the blueprints' forced auto-login). Requires Chrome/Edge.
 *
 * Usage: node tests/scripts/variation-shots.mjs [baseUrl] [outDir]
 */
import { mkdirSync, writeFileSync } from 'node:fs';
import { join, resolve } from 'node:path';
import { launch, sleep } from './lib/chrome.mjs';

const base = ( process.argv[ 2 ] || 'http://127.0.0.1:9400' ).replace( /\/$/, '' );
const out = resolve( process.argv[ 3 ] || 'screenshots/variations' );
mkdirSync( out, { recursive: true } );
const pages = { home: '/', product: '/?product=hand-poured-candle', 'gift-finder': '/gift-finder/' };

const browser = await launch();
await browser.send( 'Emulation.setDeviceMetricsOverride', { width: 1280, height: 900, deviceScaleFactor: 1, mobile: false } );

// Playground occasionally fails a request during bootstrap (SQLite connection), so REST calls are retried.
const api = ( js ) => browser.evaluate( `(async () => {
	const call = async ( options, tries = 5 ) => {
		try { return await call( options ); } catch ( e ) {
			if ( tries > 1 ) { await new Promise( ( r ) => setTimeout( r, 1500 ) ); return call( options, tries - 1 ); }
			throw new Error( JSON.stringify( e ) );
		}
	};
	${ js }
})()` );
await browser.goto( base + '/wp-admin/?playground_force_auto_login_as_user=admin' );
for ( let i = 0; i < 60; i++ ) {
	if ( await browser.evaluate( '!!(window.wp && wp.apiFetch)' ).catch( () => false ) ) break;
	await sleep( 1000 );
}

const { id, original, variations } = await api( `
	const theme = await call( { path: '/wp/v2/themes?status=active' } );
	const gsUrl = theme[ 0 ]._links[ 'wp:user-global-styles' ][ 0 ].href;
	const id = gsUrl.split( '/' ).pop();
	const original = await call( { path: '/wp/v2/global-styles/' + id + '?context=edit' } );
	const variations = await call( { path: '/wp/v2/global-styles/themes/' + theme[ 0 ].stylesheet + '/variations' } );
	return { id, original: { settings: original.settings, styles: original.styles }, variations };
` );

try {
	for ( const variation of variations ) {
		const slug = variation.title.toLowerCase().replace( /[^a-z0-9]+/g, '-' );
		await api( `await call( { path: '/wp/v2/global-styles/${ id }', method: 'POST', data: ${ JSON.stringify( { settings: variation.settings || {}, styles: variation.styles || {} } ) } } ); return true;` );
		for ( const [ name, path ] of Object.entries( pages ) ) {
			await browser.goto( base + path );
			await sleep( 500 );
			const shot = await browser.send( 'Page.captureScreenshot', { format: 'png', captureBeyondViewport: true } );
			const file = join( out, `${ slug }-${ name }.png` );
			writeFileSync( file, Buffer.from( shot.result.data, 'base64' ) );
			console.log( 'saved', file );
		}
		await browser.goto( base + '/wp-admin/' );
	}
} finally {
	await browser.goto( base + '/wp-admin/' );
	await api( `await call( { path: '/wp/v2/global-styles/${ id }', method: 'POST', data: ${ JSON.stringify( original ) } } ); return true;` ).catch( () => {} );
	browser.close();
}
