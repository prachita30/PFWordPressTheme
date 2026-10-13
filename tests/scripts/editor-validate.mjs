#!/usr/bin/env node
/**
 * T-EDT-01: parses every petal-and-form pattern and template with the real block editor and reports
 * blocks the editor would flag as "invalid content" (markup that doesn't match the block's save output).
 *
 * Requires a local WordPress Playground started from one of this repo's blueprints: they define
 * PLAYGROUND_FORCE_AUTO_LOGIN_ENABLED, a Playground development feature that lets
 * ?playground_force_auto_login_as_user=admin log a browser in. Local test sites only — never production.
 *
 * Usage: node tests/scripts/editor-validate.mjs [baseUrl]
 */
import { launch, sleep } from './lib/chrome.mjs';

const base = ( process.argv[ 2 ] || 'http://127.0.0.1:9400' ).replace( /\/$/, '' );
const browser = await launch();

try {
	await browser.goto( base + '/wp-admin/post-new.php?post_type=page&playground_force_auto_login_as_user=admin' );

	let ready = false;
	for ( let i = 0; i < 90 && ! ready; i++ ) {
		await sleep( 1000 );
		ready = await browser.evaluate( '!!(window.wp && wp.blocks && wp.apiFetch && wp.blocks.getBlockTypes().length > 80)' ).catch( () => false );
	}
	if ( ! ready ) {
		const where = await browser.evaluate( 'location.pathname' ).catch( () => '?' );
		throw new Error( `Block editor did not load (at ${ where }). Was it started from a tests/blueprint*.json file?` );
	}

	const report = await browser.evaluate( `(async () => {
		const out = { patterns: 0, templates: 0, blocks: 0, invalid: [], outdated: [], unregistered: new Set() };
		// Self-test: a deliberately broken block must be reported, otherwise this check proves nothing.
		const canary = wp.blocks.parse( '<!-- wp:heading --><h3 class="wp-block-heading">x</h3><!-- /wp:heading -->' )[ 0 ];
		if ( canary.isValid ) throw new Error( 'Self-test failed: invalid markup was not detected.' );
		const check = ( source, content ) => {
			const walk = ( blocks ) => blocks.forEach( ( b ) => {
				out.blocks++;
				if ( b.name === 'core/missing' ) out.unregistered.add( b.attributes.originalName );
				else if ( ! b.isValid ) out.invalid.push( source + ' → ' + b.name + ': ' + ( b.validationIssues || [] ).map( ( i ) => i.args && i.args.slice( 1 ).join( ' | ' ) ).join( '; ' ).slice( 0, 400 ) );
				else if ( ! wp.blocks.validateBlock( b )[ 0 ] ) out.outdated.push( source + ' → ' + b.name );
				walk( b.innerBlocks );
			} );
			walk( wp.blocks.parse( content ) );
		};
		const patterns = await wp.apiFetch( { path: '/wp/v2/block-patterns/patterns' } );
		for ( const p of patterns.filter( ( p ) => p.name.startsWith( 'petal-and-form/' ) ) ) {
			out.patterns++;
			check( 'pattern ' + p.name, p.content );
		}
		for ( const type of [ 'wp_template', 'wp_template_part' ] ) {
			const items = await wp.apiFetch( { path: '/wp/v2/' + ( type === 'wp_template' ? 'templates' : 'template-parts' ) + '?context=edit&per_page=100' } );
			for ( const t of items.filter( ( t ) => t.theme === 'petal-and-form' ) ) {
				out.templates++;
				check( type.replace( 'wp_', '' ) + ' ' + t.slug, t.content.raw );
			}
		}
		out.unregistered = [ ...out.unregistered ];
		return out;
	})()` );

	console.log( `Checked ${ report.patterns } patterns and ${ report.templates } templates/parts (${ report.blocks } blocks).` );
	if ( report.unregistered.length ) {
		console.log( `Note: blocks not registered on this site (e.g. WooCommerce inactive): ${ report.unregistered.join( ', ' ) }` );
	}
	report.invalid.forEach( ( line ) => console.log( 'INVALID   ' + line ) );
	report.outdated.forEach( ( line ) => console.log( 'OUTDATED  ' + line + ' (accepted via a block deprecation; re-save to update markup)' ) );
	console.log( `
${ report.invalid.length } invalid, ${ report.outdated.length } outdated, ${ report.blocks - report.invalid.length - report.outdated.length } current.` );
	browser.close();
	process.exit( report.invalid.length || report.outdated.length ? 1 : 0 );
} catch ( error ) {
	console.error( error.message );
	browser.close();
	process.exit( 1 );
}
