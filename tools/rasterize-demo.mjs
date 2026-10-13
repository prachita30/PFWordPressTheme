#!/usr/bin/env node
/**
 * Rasterises the theme's SVG illustrations into JPGs for the demo store's product images
 * (WordPress does not accept SVG uploads by default).
 *
 * Requires `sharp`, which is NOT a project dependency. Install it temporarily:
 *   npm install --no-save sharp
 *   node tools/rasterize-demo.mjs
 * or point SHARP_DIR at a folder where sharp is installed.
 *
 * Output: demo/images/*.jpg (1000 × 1250, quality 82). The demo images are not part of the theme zip.
 */
import { createRequire } from 'node:module';
import { mkdirSync, readdirSync, readFileSync, writeFileSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = join( dirname( fileURLToPath( import.meta.url ) ), '..' );
const require = createRequire( process.env.SHARP_DIR ? join( process.env.SHARP_DIR, 'noop.js' ) : import.meta.url );
const sharp = require( 'sharp' );

const src = join( root, 'theme/petal-and-form/assets/images' );
const out = join( root, 'demo/images' );
mkdirSync( out, { recursive: true } );

for ( const file of readdirSync( src ).filter( ( f ) => f.endsWith( '.svg' ) ) ) {
	const target = join( out, file.replace( /\.svg$/, '.jpg' ) );
	// Buffers rather than paths: works around virtualised paths on some Windows setups.
	const jpg = await sharp( readFileSync( join( src, file ) ), { density: 144 } )
		.resize( 1000, 1250, { fit: 'cover', position: 'centre' } )
		.jpeg( { quality: 82, mozjpeg: true } )
		.toBuffer();
	writeFileSync( target, jpg );
	console.log( 'wrote', target.replace( root, '.' ) );
}
