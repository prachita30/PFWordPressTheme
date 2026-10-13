#!/usr/bin/env node
/**
 * Static checks for the theme. No dependencies, no WordPress needed.
 *
 *  1. Required block-theme files exist.
 *  2. style.css header has the required fields; versions agree with readme.txt and package.json.
 *  3. theme.json and styles/*.json parse; variation palettes use the same slugs as theme.json.
 *  4. Block comment delimiters are balanced in every template, part and pattern.
 *  5. Every referenced pattern slug and template part exists.
 *  6. Pattern headers have Title and a unique petal-and-form/ Slug.
 *  7. Translation calls use the petal-and-form text domain.
 *  8. PHP `echo` statements are escaped (heuristic).
 *  9. No unexpected external URLs (the theme must not load remote assets).
 * 10. Every file referenced via file:./ or get_theme_file_uri() exists.
 *
 * Usage: node tests/scripts/validate.mjs
 */
import { existsSync, readFileSync, readdirSync } from 'node:fs';
import { dirname, join, relative } from 'node:path';
import { fileURLToPath } from 'node:url';

const repo = join( dirname( fileURLToPath( import.meta.url ) ), '../..' );
const theme = join( repo, 'theme/petal-and-form' );
const errors = [];
const passes = [];
const fail = ( msg ) => errors.push( msg );
const pass = ( msg ) => passes.push( msg );
const read = ( p ) => readFileSync( p, 'utf8' );
const list = ( dir, ext ) => ( existsSync( join( theme, dir ) ) ? readdirSync( join( theme, dir ) ).filter( ( f ) => f.endsWith( ext ) ).map( ( f ) => join( theme, dir, f ) ) : [] );
const rel = ( p ) => relative( repo, p ).replace( /\\/g, '/' );

// 1. Required files.
const required = [ 'style.css', 'theme.json', 'functions.php', 'readme.txt', 'screenshot.png', 'templates/index.html', 'parts/header.html', 'parts/footer.html' ];
const missing = required.filter( ( f ) => ! existsSync( join( theme, f ) ) );
missing.forEach( ( f ) => fail( `missing required file: ${ f }` ) );
if ( ! missing.length ) pass( `required files present (${ required.length })` );

// 2. style.css header + versions.
const style = read( join( theme, 'style.css' ) );
const header = ( key ) => ( style.match( new RegExp( `^${ key }:\\s*(.+)$`, 'm' ) ) || [] )[ 1 ]?.trim();
for ( const key of [ 'Theme Name', 'Author', 'Description', 'Version', 'Requires at least', 'Tested up to', 'Requires PHP', 'License', 'License URI', 'Text Domain' ] ) {
	if ( ! header( key ) ) fail( `style.css header missing "${ key }"` );
}
if ( header( 'Text Domain' ) !== 'petal-and-form' ) fail( 'style.css Text Domain must be petal-and-form' );
const version = header( 'Version' );
if ( existsSync( join( theme, 'readme.txt' ) ) ) {
	const stable = ( read( join( theme, 'readme.txt' ) ).match( /^Stable tag:\s*(.+)$/m ) || [] )[ 1 ]?.trim();
	if ( stable !== version ) fail( `readme.txt Stable tag (${ stable }) != style.css Version (${ version })` );
}
const pkg = JSON.parse( read( join( repo, 'package.json' ) ) );
if ( pkg.version !== version ) fail( `package.json version (${ pkg.version }) != style.css Version (${ version })` );
pass( `style.css header checked (version ${ version })` );

// 3. JSON files.
let baseSlugs = [];
try {
	const base = JSON.parse( read( join( theme, 'theme.json' ) ) );
	baseSlugs = base.settings.color.palette.map( ( c ) => c.slug ).sort();
	if ( base.version !== 3 ) fail( 'theme.json should use version 3' );
	pass( 'theme.json parses' );
} catch ( e ) {
	fail( `theme.json: ${ e.message }` );
}
for ( const file of list( 'styles', '.json' ) ) {
	try {
		const json = JSON.parse( read( file ) );
		if ( ! json.title ) fail( `${ rel( file ) }: missing title` );
		const slugs = json.settings?.color?.palette?.map( ( c ) => c.slug ).sort();
		if ( slugs && slugs.join() !== baseSlugs.join() ) fail( `${ rel( file ) }: palette slugs differ from theme.json` );
	} catch ( e ) {
		fail( `${ rel( file ) }: ${ e.message }` );
	}
}
pass( `style variations parse (${ list( 'styles', '.json' ).length })` );

// Collect markup files.
const templates = list( 'templates', '.html' );
const parts = list( 'parts', '.html' );
const patterns = list( 'patterns', '.php' );
const markupFiles = [ ...templates, ...parts, ...patterns ];
const stripPhp = ( s ) => s.replace( /<\?php[\s\S]*?\?>/g, 'X' );

// 4. Balanced block delimiters.
const DELIM = /<!--\s+(\/)?wp:([a-z][a-z0-9_-]*\/)?([a-z][a-z0-9_-]*)(\s+(\{[\s\S]*?\})\s+)?\s*(\/)?-->/g;
for ( const file of markupFiles ) {
	const src = stripPhp( read( file ) );
	const stack = [];
	let m;
	DELIM.lastIndex = 0;
	while ( ( m = DELIM.exec( src ) ) ) {
		const name = ( m[ 2 ] || 'core/' ) + m[ 3 ];
		if ( m[ 6 ] ) continue; // self-closing
		if ( m[ 1 ] ) {
			const open = stack.pop();
			if ( open !== name ) fail( `${ rel( file ) }: closing ${ name } but last opened was ${ open || 'nothing' }` );
		} else {
			stack.push( name );
		}
	}
	if ( stack.length ) fail( `${ rel( file ) }: unclosed block(s): ${ stack.join( ', ' ) }` );
}
pass( `block delimiters checked in ${ markupFiles.length } files` );

// 6. Pattern headers.
const slugs = new Map();
for ( const file of patterns ) {
	const src = read( file );
	const title = ( src.match( /^\s*\*\s*Title:\s*(.+)$/m ) || [] )[ 1 ];
	const slug = ( src.match( /^\s*\*\s*Slug:\s*(.+)$/m ) || [] )[ 1 ]?.trim();
	if ( ! title ) fail( `${ rel( file ) }: missing Title header` );
	if ( ! slug || ! slug.startsWith( 'petal-and-form/' ) ) fail( `${ rel( file ) }: Slug must start with petal-and-form/` );
	if ( slugs.has( slug ) ) fail( `${ rel( file ) }: duplicate slug ${ slug }` );
	slugs.set( slug, file );
	if ( ! /if \( ! defined\( 'ABSPATH' \) \)|@package/.test( src ) ) fail( `${ rel( file ) }: missing @package docblock` );
}
pass( `pattern headers checked (${ patterns.length } patterns)` );

// 5. References resolve.
for ( const file of markupFiles ) {
	const src = read( file );
	for ( const [ , ref ] of src.matchAll( /wp:pattern \{"slug":"([^"]+)"\}/g ) ) {
		if ( ref.startsWith( 'petal-and-form/' ) && ! slugs.has( ref ) ) fail( `${ rel( file ) }: unknown pattern ${ ref }` );
	}
	for ( const [ , part ] of src.matchAll( /wp:template-part \{"slug":"([^"]+)"/g ) ) {
		if ( ! existsSync( join( theme, 'parts', `${ part }.html` ) ) ) fail( `${ rel( file ) }: unknown template part ${ part }` );
	}
}
pass( 'pattern and template-part references resolve' );

// 7–8. PHP checks.
const phpFiles = [ join( theme, 'functions.php' ), ...patterns ];
for ( const file of phpFiles ) {
	const src = read( file );
	for ( const [ call ] of src.matchAll( /\b(?:__|_e|_x|_n|esc_html__|esc_html_e|esc_attr__|esc_attr_e|esc_html_x|esc_attr_x)\(\s*'(?:[^'\\]|\\.)*'(?:\s*,\s*'(?:[^'\\]|\\.)*')*\s*\)/g ) ) {
		if ( ! /'petal-and-form'\s*\)$/.test( call ) ) fail( `${ rel( file ) }: translation call without petal-and-form domain: ${ call.slice( 0, 80 ) }` );
	}
	src.split( '\n' ).forEach( ( line, i ) => {
		if ( /\becho\b/.test( line ) && ! /esc_(html|attr|url)|wp_kses|phpcs:ignore|absint|wp_json_encode/.test( line ) ) {
			fail( `${ rel( file ) }:${ i + 1 }: unescaped echo` );
		}
	} );
	if ( /\$_(GET|POST|REQUEST|COOKIE|SERVER)\b/.test( src ) ) fail( `${ rel( file ) }: reads superglobals — the theme should not handle input` );
}
pass( `PHP i18n/escaping heuristics checked in ${ phpFiles.length } files` );

// 9. External URLs.
const allowedHosts = /^(https?:\/\/)(wordpress\.org|www\.gnu\.org|schemas\.wp\.org|developer\.wordpress\.org|github\.com|example\.com|scripts\.sil\.org)/;
const scan = [ ...markupFiles, join( theme, 'functions.php' ), join( theme, 'theme.json' ), join( theme, 'assets/css/theme.css' ), ...list( 'styles', '.json' ) ];
for ( const file of scan ) {
	for ( const [ url ] of read( file ).matchAll( /https?:\/\/[^\s"'<>)]+/g ) ) {
		if ( ! allowedHosts.test( url ) ) fail( `${ rel( file ) }: external URL ${ url }` );
	}
}
pass( 'no unexpected external URLs' );

// 10. Asset references.
const assetRefs = new Set();
for ( const [ , p ] of read( join( theme, 'theme.json' ) ).matchAll( /"file:\.\/([^"]+)"/g ) ) assetRefs.add( p );
for ( const file of [ ...patterns, join( theme, 'functions.php' ) ] ) {
	for ( const [ , p ] of read( file ).matchAll( /get_theme_file_uri\(\s*'([^']+)'\s*\)/g ) ) assetRefs.add( p );
	for ( const [ , p ] of read( file ).matchAll( /'(assets\/images\/[^']+\.svg)'/g ) ) assetRefs.add( p );
	for ( const [ , p ] of read( file ).matchAll( /'([a-z-]+\.svg)'/g ) ) assetRefs.add( `assets/images/${ p }` );
}
for ( const p of assetRefs ) {
	if ( p.endsWith( '/' ) ) continue;
	if ( ! existsSync( join( theme, p ) ) ) fail( `referenced asset missing: ${ p }` );
}
pass( `asset references resolve (${ assetRefs.size })` );

passes.forEach( ( p ) => console.log( `PASS  ${ p }` ) );
errors.forEach( ( e ) => console.log( `FAIL  ${ e }` ) );
console.log( `\n${ errors.length ? errors.length + ' problem(s) found' : 'All static checks passed' }.` );
process.exit( errors.length ? 1 : 0 );
