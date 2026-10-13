#!/usr/bin/env node
/**
 * Builds dist/petal-and-form-<version>.zip containing only theme/petal-and-form/, with the theme
 * folder at the zip root (the layout WordPress's "Upload Theme" expects).
 *
 * Runs `validate` first and refuses to package if it fails. No dependencies: a minimal ZIP writer
 * using Node's zlib (deflate) and a CRC-32 table.
 *
 * Usage: node tests/scripts/package.mjs
 */
import { execFileSync } from 'node:child_process';
import { mkdirSync, readdirSync, readFileSync, statSync, writeFileSync } from 'node:fs';
import { dirname, join, relative } from 'node:path';
import { fileURLToPath } from 'node:url';
import { deflateRawSync } from 'node:zlib';

const repo = join( dirname( fileURLToPath( import.meta.url ) ), '../..' );
const themeDir = join( repo, 'theme/petal-and-form' );

try {
	execFileSync( process.execPath, [ join( repo, 'tests/scripts/validate.mjs' ) ], { stdio: 'inherit' } );
} catch {
	console.error( '\nValidation failed — not packaging.' );
	process.exit( 1 );
}

const version = readFileSync( join( themeDir, 'style.css' ), 'utf8' ).match( /^Version:\s*(.+)$/m )[ 1 ].trim();
const EXCLUDE = /(^|\/)(\.DS_Store|Thumbs\.db|\.git.*|node_modules)(\/|$)/;

const files = [];
const walk = ( dir ) => {
	for ( const name of readdirSync( dir ).sort() ) {
		const full = join( dir, name );
		const rel = 'petal-and-form/' + relative( themeDir, full ).replace( /\\/g, '/' );
		if ( EXCLUDE.test( rel ) ) continue;
		if ( statSync( full ).isDirectory() ) walk( full );
		else files.push( [ rel, readFileSync( full ) ] );
	}
};
walk( themeDir );

const CRC = new Int32Array( 256 ).map( ( _, n ) => {
	let c = n;
	for ( let k = 0; k < 8; k++ ) c = c & 1 ? 0xedb88320 ^ ( c >>> 1 ) : c >>> 1;
	return c;
} );
const crc32 = ( buf ) => {
	let c = -1;
	for ( const b of buf ) c = CRC[ ( c ^ b ) & 0xff ] ^ ( c >>> 8 );
	return ( c ^ -1 ) >>> 0;
};

// Fixed timestamp (2026-01-01) for reproducible archives.
const DOS_TIME = 0;
const DOS_DATE = ( ( 2026 - 1980 ) << 9 ) | ( 1 << 5 ) | 1;

const locals = [];
const centrals = [];
let offset = 0;
for ( const [ name, data ] of files ) {
	const nameBuf = Buffer.from( name, 'utf8' );
	const deflated = deflateRawSync( data, { level: 9 } );
	const useDeflate = deflated.length < data.length;
	const body = useDeflate ? deflated : data;
	const crc = crc32( data );

	const local = Buffer.alloc( 30 );
	local.writeUInt32LE( 0x04034b50, 0 );
	local.writeUInt16LE( 20, 4 );
	local.writeUInt16LE( 0x0800, 6 ); // UTF-8 names
	local.writeUInt16LE( useDeflate ? 8 : 0, 8 );
	local.writeUInt16LE( DOS_TIME, 10 );
	local.writeUInt16LE( DOS_DATE, 12 );
	local.writeUInt32LE( crc, 14 );
	local.writeUInt32LE( body.length, 18 );
	local.writeUInt32LE( data.length, 22 );
	local.writeUInt16LE( nameBuf.length, 26 );
	local.writeUInt16LE( 0, 28 );
	locals.push( local, nameBuf, body );

	const central = Buffer.alloc( 46 );
	central.writeUInt32LE( 0x02014b50, 0 );
	central.writeUInt16LE( 20, 4 );
	central.writeUInt16LE( 20, 6 );
	central.writeUInt16LE( 0x0800, 8 );
	central.writeUInt16LE( useDeflate ? 8 : 0, 10 );
	central.writeUInt16LE( DOS_TIME, 12 );
	central.writeUInt16LE( DOS_DATE, 14 );
	central.writeUInt32LE( crc, 16 );
	central.writeUInt32LE( body.length, 20 );
	central.writeUInt32LE( data.length, 24 );
	central.writeUInt16LE( nameBuf.length, 28 );
	central.writeUInt32LE( offset, 42 );
	centrals.push( central, nameBuf );

	offset += 30 + nameBuf.length + body.length;
}

const centralSize = centrals.reduce( ( n, b ) => n + b.length, 0 );
const end = Buffer.alloc( 22 );
end.writeUInt32LE( 0x06054b50, 0 );
end.writeUInt16LE( files.length, 8 );
end.writeUInt16LE( files.length, 10 );
end.writeUInt32LE( centralSize, 12 );
end.writeUInt32LE( offset, 16 );

mkdirSync( join( repo, 'dist' ), { recursive: true } );
const out = join( repo, 'dist', `petal-and-form-${ version }.zip` );
const zip = Buffer.concat( [ ...locals, ...centrals, end ] );
writeFileSync( out, zip );
console.log( `\nBuilt ${ relative( repo, out ) } — ${ files.length } files, ${ ( zip.length / 1024 ).toFixed( 0 ) } KB` );
