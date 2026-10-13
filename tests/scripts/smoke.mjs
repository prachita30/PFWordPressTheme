#!/usr/bin/env node
/**
 * Runtime smoke test against a running WordPress (e.g. WordPress Playground).
 *
 * Usage: node tests/scripts/smoke.mjs [baseUrl] [--woo]
 *   baseUrl defaults to http://127.0.0.1:9400
 *   --woo   also checks WooCommerce routes (shop, product, cart, checkout, account)
 *
 * For each URL it checks: HTTP status, PHP error/notice output (WP_DEBUG_DISPLAY must be on),
 * that the theme stylesheet is loaded, and that header + footer markup is present.
 * No dependencies: uses Node's built-in fetch (Node 18+).
 */

const args = process.argv.slice( 2 );
const base = ( args.find( ( a ) => a.startsWith( 'http' ) ) || 'http://127.0.0.1:9400' ).replace( /\/$/, '' );
const withWoo = args.includes( '--woo' );

const routes = [
	{ path: '/', name: 'front page' },
	{ path: '/?p=1', name: 'single post (Hello world)' },
	{ path: '/?page_id=2', name: 'page (Sample page)' },
	{ path: '/?s=hello', name: 'search results' },
	{ path: '/?s=zzzz-no-results', name: 'search, no results' },
	{ path: '/?cat=1', name: 'category archive' },
	{ path: '/this-page-does-not-exist-404/', name: '404', expectStatus: 404 },
];

if ( withWoo ) {
	routes.push(
		{ path: '/?post_type=product', name: 'shop archive', marker: 'wc-block-product-template|wp-block-woocommerce-product-template|wp-block-woocommerce-product-collection' },
		{ path: '/?post_type=product&s=mug', name: 'product search' },
		{ path: '/?product_cat=ceramics', name: 'product category' },
		{ path: '/?product=speckled-stoneware-mug', name: 'simple product', marker: 'pf-product' },
		{ path: '/?product=hand-poured-candle', name: 'variable product', marker: 'variations' },
		{ path: '/?product=linen-bound-sketchbook', name: 'out-of-stock product', marker: 'out-of-stock' },
		{ path: '/?pagename=cart', name: 'cart' },
		{ path: '/?pagename=checkout', name: 'checkout (empty cart)' },
		{ path: '/?pagename=my-account', name: 'my account (logged out)' }
	);
}

const PHP_ERROR = /<b>(Warning|Notice|Deprecated|Fatal error|Parse error)<\/b>:|(Warning|Notice|Deprecated|Fatal error): .* in \/wordpress\//;

let failures = 0;

for ( const route of routes ) {
	const url = base + route.path;
	const problems = [];
	let status = 0;
	let html = '';
	try {
		const res = await fetch( url, { redirect: 'follow', headers: { 'User-Agent': 'petal-and-form-smoke' } } );
		status = res.status;
		html = await res.text();
	} catch ( error ) {
		problems.push( `request failed: ${ error.message }` );
	}

	const expected = route.expectStatus || 200;
	if ( status && status !== expected ) {
		problems.push( `status ${ status }, expected ${ expected }` );
	}
	const php = html.match( PHP_ERROR );
	if ( php ) {
		const at = html.indexOf( php[ 0 ] );
		problems.push( 'PHP output: ' + html.slice( at, at + 240 ).replace( /<[^>]+>/g, '' ).replace( /\s+/g, ' ' ) );
	}
	if ( html && ! html.includes( 'themes/petal-and-form/assets/css/theme.css' ) ) {
		problems.push( 'theme.css not enqueued (is the theme active?)' );
	}
	if ( html && ! html.includes( 'pf-header' ) ) {
		problems.push( 'header markup missing' );
	}
	if ( html && ! html.includes( 'pf-footer' ) ) {
		problems.push( 'footer markup missing' );
	}
	if ( html && route.marker && ! new RegExp( route.marker ).test( html ) ) {
		problems.push( `expected marker /${ route.marker }/ not found` );
	}

	if ( problems.length ) {
		failures++;
		console.log( `FAIL  ${ route.name.padEnd( 28 ) } ${ route.path }` );
		problems.forEach( ( p ) => console.log( `      - ${ p }` ) );
	} else {
		console.log( `PASS  ${ route.name.padEnd( 28 ) } ${ route.path }` );
	}
}

console.log( `\n${ routes.length - failures }/${ routes.length } routes passed against ${ base }` );
process.exit( failures ? 1 : 0 );
