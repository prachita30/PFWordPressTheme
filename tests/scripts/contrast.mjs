#!/usr/bin/env node
/**
 * WCAG 2.x contrast check for every colour pairing the theme actually uses, in the default
 * palette and every style variation. Exit code 1 if any pairing fails.
 *
 * Usage: node tests/scripts/contrast.mjs
 */
import { readFileSync, readdirSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const theme = join( dirname( fileURLToPath( import.meta.url ) ), '../../theme/petal-and-form' );

const luminance = ( hex ) => {
	const [ r, g, b ] = [ 1, 3, 5 ]
		.map( ( i ) => parseInt( hex.slice( i, i + 2 ), 16 ) / 255 )
		.map( ( v ) => ( v <= 0.03928 ? v / 12.92 : ( ( v + 0.055 ) / 1.055 ) ** 2.4 ) );
	return 0.2126 * r + 0.7152 * g + 0.0722 * b;
};
const ratio = ( a, b ) => {
	const [ x, y ] = [ luminance( a ), luminance( b ) ];
	return ( Math.max( x, y ) + 0.05 ) / ( Math.min( x, y ) + 0.05 );
};

// [foreground, background, minimum, where it is used]
const TINTS = [ 'tint-1', 'tint-2', 'tint-3', 'tint-4' ];
const pairs = [
	...[ 'base', 'base-2', ...TINTS ].map( ( bg ) => [ 'contrast', bg, 4.5, 'body text' ] ),
	...[ 'base', 'base-2', ...TINTS ].map( ( bg ) => [ 'contrast-2', bg, 4.5, 'secondary text, captions, eyebrows' ] ),
	[ 'primary', 'base', 4.5, 'link hover, out-of-stock text, sale price' ],
	[ 'primary', 'base-2', 4.5, 'link hover on cream sections' ],
	...TINTS.map( ( bg ) => [ 'primary', bg, 3, 'italic heading accent (large text) on tinted sections' ] ),
	[ 'base', 'contrast', 4.5, 'primary button' ],
	[ 'base', 'primary', 4.5, 'button hover / Lavender Studio button' ],
	[ 'contrast', 'tint-1', 4.5, 'sale badge, error notice' ],
	[ 'contrast-2', 'base', 3, 'form field borders (non-text, 1.4.11)' ],
	[ 'contrast', 'base', 3, 'focus ring (non-text, 1.4.11)' ],
];

const base = JSON.parse( readFileSync( join( theme, 'theme.json' ), 'utf8' ) );
const toMap = ( palette ) => Object.fromEntries( palette.map( ( c ) => [ c.slug, c.color ] ) );
const basePalette = toMap( base.settings.color.palette );

const variations = [ [ 'Default (Blush Atelier)', basePalette ] ];
for ( const file of readdirSync( join( theme, 'styles' ) ).filter( ( f ) => f.endsWith( '.json' ) ) ) {
	const json = JSON.parse( readFileSync( join( theme, 'styles', file ), 'utf8' ) );
	const palette = json.settings?.color?.palette;
	variations.push( [ json.title || file, palette ? { ...basePalette, ...toMap( palette ) } : basePalette ] );
}

let failures = 0;
for ( const [ name, palette ] of variations ) {
	console.log( `\n${ name }` );
	for ( const [ fg, bg, min, use ] of pairs ) {
		const value = ratio( palette[ fg ], palette[ bg ] );
		const ok = value >= min;
		if ( ! ok ) {
			failures++;
		}
		console.log( `  ${ ok ? 'PASS' : 'FAIL' }  ${ fg.padEnd( 10 ) } on ${ bg.padEnd( 7 ) } ${ value.toFixed( 2 ).padStart( 5 ) }:1 (min ${ min })  ${ use }` );
	}
}

console.log( `\n${ failures ? failures + ' pairing(s) failed' : 'All pairings pass' } across ${ variations.length } palettes.` );
process.exit( failures ? 1 : 0 );
