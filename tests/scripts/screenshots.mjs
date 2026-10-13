#!/usr/bin/env node
/**
 * Full-page screenshots of key routes at several widths, using a locally installed Chrome or Edge
 * in headless mode (no Puppeteer/Playwright dependency).
 *
 * Usage: node tests/scripts/screenshots.mjs [baseUrl] [outDir]
 *   CHROME=/path/to/chrome to override browser detection.
 *
 * Output: <outDir>/<route>-<width>.png  (default outDir: ./screenshots, git-ignored)
 *
 * Note: headless Chrome clamps windows narrower than ~500px, so phone widths are cropped, not reflowed.
 * Check phone layouts with browser device emulation instead (see docs/05-test-plan.md, T-RES-*).
 */
import { execFileSync } from 'node:child_process';
import { existsSync, mkdirSync } from 'node:fs';
import { join, resolve } from 'node:path';

const base = ( process.argv[ 2 ] || 'http://127.0.0.1:9400' ).replace( /\/$/, '' );
const out = resolve( process.argv[ 3 ] || 'screenshots' );
mkdirSync( out, { recursive: true } );

const candidates = [
	process.env.CHROME,
	'C:/Program Files/Google/Chrome/Application/chrome.exe',
	'C:/Program Files (x86)/Microsoft/Edge/Application/msedge.exe',
	'/Applications/Google Chrome.app/Contents/MacOS/Google Chrome',
	'/usr/bin/google-chrome',
	'/usr/bin/chromium',
	'/usr/bin/chromium-browser',
].filter( Boolean );
const chrome = candidates.find( ( p ) => existsSync( p ) );
if ( ! chrome ) {
	console.error( 'No Chrome/Edge found. Set CHROME=/path/to/browser.' );
	process.exit( 1 );
}

const routes = {
	home: [ '/', 5600 ],
	shop: [ '/?post_type=product', 2600 ],
	product: [ '/?product=hand-poured-candle', 2600 ],
	'gift-finder': [ '/gift-finder/', 5200 ],
	about: [ '/about/', 4600 ],
	journal: [ '/journal/', 2200 ],
	cart: [ '/?pagename=cart', 1400 ],
	404: [ '/no-such-page-404/', 1400 ],
};
const widths = ( process.env.WIDTHS || '1440,1024,768' ).split( ',' ).map( Number );
const only = process.env.ROUTES ? process.env.ROUTES.split( ',' ) : Object.keys( routes );

for ( const name of only ) {
	const [ path, height ] = routes[ name ];
	for ( const width of widths ) {
		const file = join( out, `${ name }-${ width }.png` );
		const h = width < 600 ? Math.round( height * 2.2 ) : height;
		execFileSync( chrome, [ '--headless=new', '--disable-gpu', '--hide-scrollbars', `--window-size=${ width },${ h }`, '--virtual-time-budget=20000', `--screenshot=${ file }`, base + path ], { stdio: 'ignore' } );
		console.log( 'saved', file );
	}
}
