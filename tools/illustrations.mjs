#!/usr/bin/env node
/**
 * Generates the original still-life illustrations used by the theme's patterns and the demo store.
 *
 * Output: theme/petal-and-form/assets/images/*.svg (shipped with the theme).
 * All artwork is original to this project and released under CC0 1.0 (see assets/images/README.md).
 * Deterministic: the same script always produces the same files (seeded random).
 *
 * Usage: node tools/illustrations.mjs
 */
import { mkdirSync, writeFileSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = join( dirname( fileURLToPath( import.meta.url ) ), '..' );
const out = join( root, 'theme/petal-and-form/assets/images' );
mkdirSync( out, { recursive: true } );

// Palette (mirrors theme.json tokens).
const C = {
	ivory: '#FBF8F3', cream: '#F4EEE5', pink: '#F1DDE1', sage: '#DCE5D8', lavender: '#E8E1F1',
	butter: '#F5EAC8', rose: '#C88F98', rosewood: '#8A4E5A', eucalyptus: '#7D9482', charcoal: '#35312F',
	stone: '#77716D', oat: '#E9E2D0', clay: '#D9B8A3', terracotta: '#C9937A', moss: '#5F7563', plum: '#8D7AA8',
};

let seed = 7;
const rand = () => ( ( seed = ( seed * 16807 ) % 2147483647 ) / 2147483647 );
const r = ( n ) => Math.round( n * 10 ) / 10;

const W = 800;
const H = 1000;

function svg( { title, body, defs = '', w = W, h = H } ) {
	return `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${ w } ${ h }" width="${ w }" height="${ h }" role="img" aria-labelledby="t">
<title id="t">${ title }</title>
<defs>
<filter id="blur" x="-50%" y="-50%" width="200%" height="200%"><feGaussianBlur stdDeviation="10"/></filter>
<filter id="soft" x="-50%" y="-50%" width="200%" height="200%"><feGaussianBlur stdDeviation="3"/></filter>
${ defs }
</defs>
${ body }
</svg>
`;
}

const lin = ( id, a, b, vertical = false ) =>
	`<linearGradient id="${ id }" x1="0" y1="0" x2="${ vertical ? 0 : 1 }" y2="${ vertical ? 1 : 0 }"><stop offset="0" stop-color="${ a }"/><stop offset="1" stop-color="${ b }"/></linearGradient>`;

const backdrop = ( wall, table, tableY = 760, w = W, h = H ) =>
	`<rect width="${ w }" height="${ h }" fill="${ wall }"/>
<rect y="${ tableY }" width="${ w }" height="${ h - tableY }" fill="${ table }"/>
<rect y="${ tableY }" width="${ w }" height="2" fill="#000" opacity=".04"/>`;

const shadow = ( cx, cy, rx, ry = 14, o = 0.16 ) =>
	`<ellipse cx="${ cx }" cy="${ cy }" rx="${ rx }" ry="${ ry }" fill="${ C.charcoal }" opacity="${ o }" filter="url(#blur)"/>`;

const arch = ( x, y, w, h, fill ) =>
	`<path d="M${ x } ${ y + h }V${ y + w / 2 }a${ w / 2 } ${ w / 2 } 0 0 1 ${ w } 0V${ y + h }Z" fill="${ fill }"/>`;

function speckles( cx, cy, rx, ry, n, color, o = 0.35 ) {
	let s = '';
	for ( let i = 0; i < n; i++ ) {
		const a = rand() * Math.PI * 2;
		const d = Math.sqrt( rand() );
		s += `<circle cx="${ r( cx + Math.cos( a ) * rx * d ) }" cy="${ r( cy + Math.sin( a ) * ry * d ) }" r="${ r( 0.8 + rand() * 1.8 ) }" fill="${ color }" opacity="${ o }"/>`;
	}
	return s;
}

function vase( cx, base, scale, fillId, { speck = true, mouth = 45 } = {} ) {
	const s = scale;
	const top = base - 400 * s;
	const m = mouth * s;
	return `<path d="M${ cx - 70 * s } ${ base }C${ cx - 135 * s } ${ base - 60 * s } ${ cx - 145 * s } ${ base - 200 * s } ${ cx - 85 * s } ${ base - 280 * s }C${ cx - 52 * s } ${ base - 322 * s } ${ cx - m } ${ base - 350 * s } ${ cx - m } ${ top }H${ cx + m }C${ cx + m } ${ base - 350 * s } ${ cx + 52 * s } ${ base - 322 * s } ${ cx + 85 * s } ${ base - 280 * s }C${ cx + 145 * s } ${ base - 200 * s } ${ cx + 135 * s } ${ base - 60 * s } ${ cx + 70 * s } ${ base }Z" fill="url(#${ fillId })"/>
<ellipse cx="${ cx }" cy="${ top }" rx="${ m }" ry="${ 9 * s }" fill="${ C.charcoal }" opacity=".28"/>
${ speck ? speckles( cx, base - 170 * s, 95 * s, 140 * s, 70, C.charcoal, 0.3 ) : '' }`;
}

function branch( x, y, len, angle, color ) {
	const rad = ( angle * Math.PI ) / 180;
	const ex = x + Math.sin( rad ) * len;
	const ey = y - Math.cos( rad ) * len;
	const mx = ( x + ex ) / 2 + 30 * Math.cos( rad );
	const my = ( y + ey ) / 2;
	let leaves = '';
	for ( let t = 0.25; t <= 1; t += 0.12 ) {
		const px = ( 1 - t ) * ( 1 - t ) * x + 2 * ( 1 - t ) * t * mx + t * t * ex;
		const py = ( 1 - t ) * ( 1 - t ) * y + 2 * ( 1 - t ) * t * my + t * t * ey;
		const side = Math.round( t * 100 ) % 2 ? 1 : -1;
		leaves += `<ellipse cx="${ r( px + side * 16 ) }" cy="${ r( py ) }" rx="18" ry="7" transform="rotate(${ r( angle + side * 35 ) } ${ r( px + side * 16 ) } ${ r( py ) })" fill="${ color }"/>`;
	}
	return `<path d="M${ x } ${ y }Q${ r( mx ) } ${ r( my ) } ${ r( ex ) } ${ r( ey ) }" stroke="${ C.moss }" stroke-width="3" fill="none" stroke-linecap="round"/>${ leaves }`;
}

function candle( cx, base, s, jar, wax, label ) {
	const w = 150 * s;
	const h = 190 * s;
	return `${ shadow( cx, base, w * 0.6 ) }
<rect x="${ cx - w / 2 }" y="${ base - h }" width="${ w }" height="${ h }" rx="${ 22 * s }" fill="url(#${ jar })"/>
<rect x="${ cx - w / 2 + 8 * s }" y="${ base - h + 26 * s }" width="${ w - 16 * s }" height="${ 18 * s }" rx="${ 8 * s }" fill="${ wax }"/>
<rect x="${ cx - w / 2 + 22 * s }" y="${ base - h * 0.62 }" width="${ w - 44 * s }" height="${ h * 0.36 }" rx="${ 6 * s }" fill="${ label }"/>
<rect x="${ cx - 30 * s }" y="${ base - h * 0.5 }" width="${ 60 * s }" height="${ 4 * s }" rx="2" fill="${ C.charcoal }" opacity=".5"/>
<rect x="${ cx - 20 * s }" y="${ base - h * 0.42 }" width="${ 40 * s }" height="${ 3 * s }" rx="2" fill="${ C.charcoal }" opacity=".3"/>
<rect x="${ cx - 1.5 * s }" y="${ base - h + 6 * s }" width="${ 3 * s }" height="${ 22 * s }" fill="${ C.charcoal }"/>
<path d="M${ cx } ${ base - h - 48 * s }C${ cx + 16 * s } ${ base - h - 20 * s } ${ cx + 14 * s } ${ base - h + 8 * s } ${ cx } ${ base - h + 8 * s }C${ cx - 14 * s } ${ base - h + 8 * s } ${ cx - 16 * s } ${ base - h - 20 * s } ${ cx } ${ base - h - 48 * s }Z" fill="url(#flame)"/>
<circle cx="${ cx }" cy="${ base - h - 14 * s }" r="${ 40 * s }" fill="${ C.butter }" opacity=".35" filter="url(#blur)"/>`;
}

const flameDef = `<radialGradient id="flame" cx=".5" cy=".75" r=".7"><stop offset="0" stop-color="#FFF6D6"/><stop offset=".55" stop-color="#F5C97A"/><stop offset="1" stop-color="#E39A5B"/></radialGradient>`;

function mug( cx, base, s, fill, inside ) {
	const w = 190 * s;
	const h = 200 * s;
	return `${ shadow( cx, base, w * 0.65 ) }
<path d="M${ cx + w / 2 - 6 * s } ${ base - h * 0.75 }c${ 70 * s } ${ -10 * s } ${ 80 * s } ${ 95 * s } ${ 4 * s } ${ 105 * s }" stroke="url(#${ fill })" stroke-width="${ 24 * s }" fill="none" stroke-linecap="round"/>
<path d="M${ cx - w / 2 } ${ base - h }h${ w }v${ h - 24 * s }q0 ${ 24 * s } ${ -24 * s } ${ 24 * s }h${ -( w - 48 * s ) }q${ -24 * s } 0 ${ -24 * s } ${ -24 * s }Z" fill="url(#${ fill })"/>
<ellipse cx="${ cx }" cy="${ base - h }" rx="${ w / 2 }" ry="${ 16 * s }" fill="${ inside }"/>
${ speckles( cx, base - h / 2, w / 2.3, h / 2.4, 55, C.charcoal, 0.28 ) }`;
}

function bowl( cx, base, s, fill, rim ) {
	const w = 260 * s;
	return `${ shadow( cx, base, w * 0.45 ) }
<path d="M${ cx - w / 2 } ${ base - 70 * s }Q${ cx - w / 2 } ${ base } ${ cx } ${ base }Q${ cx + w / 2 } ${ base } ${ cx + w / 2 } ${ base - 70 * s }Z" fill="url(#${ fill })"/>
<ellipse cx="${ cx }" cy="${ base - 70 * s }" rx="${ w / 2 }" ry="${ 16 * s }" fill="${ rim }"/>`;
}

function giftBox( cx, base, s, box, ribbon ) {
	const w = 260 * s;
	const h = 200 * s;
	return `${ shadow( cx, base, w * 0.6 ) }
<rect x="${ cx - w / 2 }" y="${ base - h }" width="${ w }" height="${ h }" rx="${ 6 * s }" fill="url(#${ box })"/>
<rect x="${ cx - w / 2 - 12 * s }" y="${ base - h - 40 * s }" width="${ w + 24 * s }" height="${ 52 * s }" rx="${ 6 * s }" fill="url(#${ box })"/>
<rect x="${ cx - w / 2 - 12 * s }" y="${ base - h + 6 * s }" width="${ w + 24 * s }" height="${ 6 * s }" fill="${ C.charcoal }" opacity=".08"/>
<rect x="${ cx - 14 * s }" y="${ base - h - 40 * s }" width="${ 28 * s }" height="${ h + 40 * s }" fill="${ ribbon }"/>
<path d="M${ cx } ${ base - h - 44 * s }c${ -60 * s } ${ -70 * s } ${ -120 * s } ${ -20 * s } ${ -70 * s } ${ 6 * s }zM${ cx } ${ base - h - 44 * s }c${ 60 * s } ${ -70 * s } ${ 120 * s } ${ -20 * s } ${ 70 * s } ${ 6 * s }z" fill="none" stroke="${ ribbon }" stroke-width="${ 16 * s }" stroke-linejoin="round"/>
<circle cx="${ cx }" cy="${ base - h - 42 * s }" r="${ 14 * s }" fill="${ ribbon }"/>`;
}

function notebook( cx, cy, s, cover, band, angle = -8 ) {
	const w = 330 * s;
	const h = 440 * s;
	return `<g transform="rotate(${ angle } ${ cx } ${ cy })">
${ shadow( cx + 10, cy + 20, w * 0.55, h * 0.48, 0.14 ) }
<rect x="${ cx - w / 2 + 6 * s }" y="${ cy - h / 2 + 6 * s }" width="${ w }" height="${ h }" rx="${ 10 * s }" fill="${ C.ivory }"/>
<rect x="${ cx - w / 2 }" y="${ cy - h / 2 }" width="${ w }" height="${ h }" rx="${ 10 * s }" fill="url(#${ cover })"/>
<rect x="${ cx + w / 2 - 50 * s }" y="${ cy - h / 2 }" width="${ 12 * s }" height="${ h }" fill="${ band }"/>
<rect x="${ cx - w / 2 + 50 * s }" y="${ cy - h / 2 + 90 * s }" width="${ 150 * s }" height="${ 70 * s }" rx="${ 4 * s }" fill="${ C.ivory }" opacity=".85"/>
<rect x="${ cx - w / 2 + 70 * s }" y="${ cy - h / 2 + 115 * s }" width="${ 100 * s }" height="${ 5 * s }" rx="2" fill="${ C.charcoal }" opacity=".45"/>
<rect x="${ cx - w / 2 + 70 * s }" y="${ cy - h / 2 + 132 * s }" width="${ 70 * s }" height="${ 4 * s }" rx="2" fill="${ C.charcoal }" opacity=".25"/>
</g>`;
}

function pencil( x, y, len, angle, color ) {
	return `<g transform="rotate(${ angle } ${ x } ${ y })">
<rect x="${ x }" y="${ y - 9 }" width="${ len }" height="18" rx="3" fill="${ color }"/>
<rect x="${ x + len - 8 }" y="${ y - 9 }" width="22" height="18" fill="${ C.stone }" opacity=".6"/>
<path d="M${ x } ${ y - 9 }L${ x - 34 } ${ y }L${ x } ${ y + 9 }Z" fill="${ C.clay }"/>
<path d="M${ x - 22 } ${ y - 3 }L${ x - 34 } ${ y }L${ x - 22 } ${ y + 3 }Z" fill="${ C.charcoal }"/>
</g>`;
}

function earring( x, y, s, metal, stone ) {
	return `<path d="M${ x } ${ y }c${ 22 * s } ${ -10 * s } ${ 28 * s } ${ 30 * s } ${ 4 * s } ${ 46 * s }" stroke="${ metal }" stroke-width="${ 4 * s }" fill="none" stroke-linecap="round"/>
<circle cx="${ x + 4 * s }" cy="${ y + 78 * s }" r="${ 30 * s }" fill="none" stroke="${ metal }" stroke-width="${ 6 * s }"/>
<circle cx="${ x + 4 * s }" cy="${ y + 116 * s }" r="${ 15 * s }" fill="${ stone }"/>
<circle cx="${ x - 1 * s }" cy="${ y + 111 * s }" r="${ 4 * s }" fill="#fff" opacity=".7"/>`;
}

function frame( x, y, w, h, mat, art ) {
	return `${ shadow( x + w / 2, y + h + 6, w * 0.45, 10, 0.12 ) }
<rect x="${ x }" y="${ y }" width="${ w }" height="${ h }" fill="${ C.charcoal }" opacity=".85"/>
<rect x="${ x + 8 }" y="${ y + 8 }" width="${ w - 16 }" height="${ h - 16 }" fill="${ mat }"/>
${ art }`;
}

const files = {};

// 1. Hero still life — arch, plinth, vase with branch, bowl, candle.
files[ 'hero-still-life.svg' ] = svg( {
	title: 'Still life: a speckled vase with a leafy branch, a small bowl and a lit candle in front of a soft pink arch',
	w: 1200,
	h: 1400,
	defs: lin( 'v1', C.cream, C.clay ) + lin( 'b1', C.sage, C.eucalyptus ) + lin( 'j1', '#F8EFE6', '#E8D6C8' ) + lin( 'plinth', C.ivory, C.oat, true ) + flameDef,
	body: `${ backdrop( C.cream, C.oat, 1080, 1200, 1400 ) }
${ arch( 230, 160, 740, 920, C.pink ) }
<rect x="290" y="1000" width="620" height="90" rx="6" fill="url(#plinth)"/>
${ shadow( 600, 1004, 260, 12, 0.12 ) }
${ branch( 590, 560, 430, -18, C.eucalyptus ) }
${ branch( 610, 560, 380, 22, '#9DB2A1' ) }
${ shadow( 600, 1000, 150 ) }
${ vase( 600, 1000, 1.1, 'v1' ) }
${ bowl( 820, 1000, 0.7, 'b1', '#C9D6C4' ) }
${ candle( 380, 1000, 0.85, 'j1', C.ivory, C.pink ) }`,
} );

// 2. Ceramics — vase on sage.
files[ 'ceramic-vase.svg' ] = svg( {
	title: 'A cream speckled stoneware vase on a sage background',
	defs: lin( 'v', C.ivory, C.clay ),
	body: `${ backdrop( C.sage, '#CBD8C6' ) }${ arch( 170, 120, 460, 640, '#E6EDE2' ) }${ shadow( 400, 760, 150 ) }${ branch( 395, 380, 320, -12, C.moss ) }${ vase( 400, 760, 1, 'v' ) }`,
} );

// 3. Candle — blush.
files[ 'candle.svg' ] = svg( {
	title: 'A hand-poured candle in a frosted jar on a powder pink background',
	defs: lin( 'j', '#FBF3EE', '#EAD3CC' ) + flameDef,
	body: `${ backdrop( C.pink, '#E8CCD2' ) }<circle cx="400" cy="420" r="230" fill="#F6E7EA"/>${ candle( 400, 760, 1.7, 'j', C.ivory, C.rose ) }`,
} );

// 4. Stationery — butter.
files[ 'stationery.svg' ] = svg( {
	title: 'A linen-bound sketchbook with an elastic band and a pencil on butter yellow',
	defs: lin( 'nb', C.rose, '#B57C86' ),
	body: `<rect width="800" height="1000" fill="${ C.butter }"/>${ notebook( 390, 480, 1.1, 'nb', C.rosewood ) }${ pencil( 520, 820, 240, -24, C.eucalyptus ) }`,
} );

// 5. Jewelry — lavender.
files[ 'jewelry.svg' ] = svg( {
	title: 'A pair of gold hoop earrings with pearl drops resting in a small ceramic dish on lavender',
	defs: lin( 'd', C.ivory, C.cream ),
	body: `${ backdrop( C.lavender, '#DDD3EA' ) }${ bowl( 400, 820, 1.8, 'd', '#EFE8E0' ) }${ earring( 300, 380, 1.6, '#C9A45C', C.ivory ) }${ earring( 470, 340, 1.6, '#C9A45C', C.ivory ) }`,
} );

// 6. Mug — cream.
files[ 'mug.svg' ] = svg( {
	title: 'A speckled stoneware mug in soft sage on a cream background',
	defs: lin( 'm', '#E7EEE3', '#B9C9B6' ),
	body: `${ backdrop( C.cream, C.oat ) }${ mug( 380, 760, 1.6, 'm', '#8FA393' ) }`,
} );

// 7. Gift — lavender & butter.
files[ 'gift-box.svg' ] = svg( {
	title: 'A wrapped gift box with a butter yellow ribbon on lavender',
	defs: lin( 'g', '#F3EFF8', '#D9CFE8' ),
	body: `${ backdrop( C.lavender, '#DCD2EA' ) }<circle cx="400" cy="400" r="210" fill="#F2EDF8"/>${ giftBox( 400, 760, 1.3, 'g', '#E9CF7E' ) }`,
} );

// 8. Bowl / ring dish — pink.
files[ 'ring-dish.svg' ] = svg( {
	title: 'A shallow blush ring dish holding a thin gold ring',
	defs: lin( 'rd', '#F7E8EB', C.rose ),
	body: `${ backdrop( C.pink, '#EBD3D8' ) }${ bowl( 400, 700, 1.9, 'rd', '#F3DFE3' ) }<ellipse cx="410" cy="568" rx="40" ry="12" fill="none" stroke="#C9A45C" stroke-width="7"/>`,
} );

// 9. Bud vase with dried flowers — cream.
files[ 'bud-vase.svg' ] = svg( {
	title: 'A small terracotta bud vase holding dried flower stems on cream',
	defs: lin( 'bv', C.clay, C.terracotta ),
	body: `${ backdrop( C.cream, '#EDE4D6' ) }${ branch( 400, 560, 360, -8, '#C8B48E' ) }${ branch( 404, 560, 300, 16, '#D6A9A0' ) }${ shadow( 400, 760, 90 ) }${ vase( 400, 760, 0.55, 'bv', { speck: false, mouth: 30 } ) }`,
} );

// 10. Studio shelves — maker story.
files[ 'studio-shelves.svg' ] = svg( {
	title: 'Studio shelves lined with handmade pots, bowls and a candle',
	defs: lin( 's1', C.ivory, C.clay ) + lin( 's2', C.sage, C.eucalyptus ) + lin( 's3', '#F7E8EB', C.rose ) + lin( 's4', '#FBF3EE', '#EAD3CC' ) + flameDef,
	body: `<rect width="800" height="1000" fill="${ C.oat }"/>
<rect x="60" y="430" width="680" height="16" rx="3" fill="#CDBFA8"/><rect x="60" y="800" width="680" height="16" rx="3" fill="#CDBFA8"/>
${ vase( 190, 430, 0.5, 's1' ) }${ mug( 420, 430, 0.75, 's2', '#8FA393' ) }${ vase( 620, 430, 0.62, 's3', { speck: false } ) }
${ bowl( 200, 800, 0.9, 's2', '#C9D6C4' ) }${ candle( 430, 800, 1, 's4', C.ivory, C.lavender ) }${ bowl( 620, 800, 0.7, 's3', '#F3DFE3' ) }`,
} );

// 11. Prints on a wall — inspiration.
files[ 'art-prints.svg' ] = svg( {
	title: 'Three framed abstract prints with arches and circles hung on a pale wall',
	body: `<rect width="800" height="1000" fill="${ C.ivory }"/>
${ frame( 110, 150, 260, 340, C.cream, arch( 170, 210, 140, 220, C.rose ) ) }
${ frame( 430, 220, 260, 260, C.sage, `<circle cx="560" cy="350" r="72" fill="${ C.butter }"/>` ) }
${ frame( 250, 560, 300, 360, C.lavender, `<circle cx="400" cy="690" r="64" fill="${ C.plum }" opacity=".55"/><rect x="300" y="790" width="200" height="60" fill="${ C.pink }"/>` ) }`,
} );

// 12. Wrapping — gift wrap service.
files[ 'gift-wrap.svg' ] = svg( {
	title: 'Brown paper gift parcels tied with ribbon and a sprig of greenery',
	defs: lin( 'k', '#E3CDB3', '#C9A985' ) + lin( 'k2', C.pink, C.rose ),
	body: `${ backdrop( C.sage, '#CBD8C6' ) }${ giftBox( 300, 780, 1.05, 'k', C.ivory ) }${ giftBox( 560, 780, 0.75, 'k2', C.ivory ) }${ branch( 420, 520, 180, 60, C.moss ) }`,
} );

for ( const [ name, content ] of Object.entries( files ) ) {
	writeFileSync( join( out, name ), content );
	console.log( `wrote ${ name } (${ ( content.length / 1024 ).toFixed( 1 ) } KB)` );
}
