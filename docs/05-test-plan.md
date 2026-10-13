# 05 · Test plan

Results of actual runs are recorded in [test-results.md](test-results.md). A test is only marked
passed there after it was run and its output inspected.

## Environments

| Env | How | Purpose |
|---|---|---|
| **Static** | `npm test` (Node ≥ 18, no dependencies) | Files, JSON, block markup balance, references, i18n, escaping, contrast |
| **Playground (store)** | `npm run playground` → http://127.0.0.1:9400 | WordPress latest + WooCommerce latest + demo seed, `WP_DEBUG` on |
| **Playground (core)** | `npm run playground:core` → http://127.0.0.1:9401 | Theme **without** WooCommerce (graceful degradation) |
| **Real install** | LocalWP / any host, upload the zip | Final install test, Theme Check plugin |

WordPress Playground runs PHP compiled to WebAssembly inside Node — no PHP, MySQL or Docker
needed. It is a faithful WordPress runtime but slower than a real server, so it is **not** used for
performance measurements.

## Automated checks

| ID | Check | Command |
|---|---|---|
| T-STA-01 | Required files, headers, versions, JSON, block delimiters, references, text domain, escaping, external URLs, asset paths | `npm run validate` |
| T-STA-02 | Contrast of every colour pairing used, in all palettes | `npm run contrast` |
| T-INS-01 | Theme activates; 7 core routes return expected status with no PHP notices; header/footer/CSS present | `npm run smoke:core` |
| T-INS-02 | Same plus 9 WooCommerce routes (shop, product search, category, simple/variable/out-of-stock product, cart, checkout, account) | `npm run smoke` |
| T-INS-03 | No fatal errors when WooCommerce is inactive (product patterns render nothing; header icons omitted) | `npm run smoke:core` |
| T-EDT-01 | Every pattern and template parses as **valid** (and current) blocks in the editor | `node tests/scripts/editor-validate.mjs [url]` |
| T-INS-04 | Packaged zip installs and activates on a fresh site | `npm run zip`, then Playground with `tests/blueprint-zip.json` + `npm run smoke` against it |
| T-RES-01..05 | No horizontal overflow at 320–1280px on 13 routes | `node tests/scripts/responsive.mjs [url] [--shots=dir]` |
| T-VAR-01..03 | Screenshots of each style variation | `node tests/scripts/variation-shots.mjs [url]` (slow in Playground; can be done by hand in Editor → Styles) |
| T-VIS-* | Full-page screenshots at 1440/1024/768 | `node tests/scripts/screenshots.mjs` |

### T-EDT-01 — manual alternative

The script above is preferred. To check by hand, open `/wp-admin/site-editor.php` (logged in), wait for it to load, then run in the console:

```js
const pats = await wp.apiFetch( { path: '/wp/v2/block-patterns/patterns' } );
const bad = [];
for ( const p of pats.filter( ( p ) => p.name.startsWith( 'petal-and-form/' ) ) ) {
	const walk = ( blocks ) => blocks.forEach( ( b ) => { if ( ! b.isValid ) bad.push( `${ p.name } → ${ b.name }` ); walk( b.innerBlocks ); } );
	walk( wp.blocks.parse( p.content ) );
}
console.log( bad.length ? bad : 'all valid' );
```

## Manual checks

| ID | Area | Steps | Expected |
|---|---|---|---|
| T-NAV-01 | Keyboard | Tab from page load | Skip link appears first; focus ring visible on every link/button |
| T-NAV-02 | Mobile menu | 375px: open menu with Enter, Tab through, Esc closes | Focus trapped in overlay, returns to toggle |
| T-NAV-03 | Search | Activate header search button | Field expands, focus moves to field, Enter searches |
| T-NAV-04 | Mini cart | Add product, open cart from header | Drawer opens, closes with Esc |
| T-VIS-01 | Homepage | View all sections | No empty sections; images load; headings in order (one h1) |
| T-VIS-02 | Footer | Inspect | Three nav landmarks with distinct labels |
| T-VIS-03..06 | Blog, single, archive, search, 404 | Visit each | Correct template, readable measure |
| T-VIS-08 | Site Editor | Styles → change colours/fonts | Changes apply site-wide |
| T-VAR-01..03 | Style variations | Apply each variation | Colours, radius, buttons, headings change coherently; text remains readable |
| T-WC-01 | Shop | Visit shop | 4-col grid (desktop), 2-col (phone); prices; sale badge; out-of-stock label |
| T-WC-02 | Category | Click a category pill | Filtered grid, term title |
| T-WC-03 | Sorting | Change sort | Order changes |
| T-WC-04 | Simple product | Add to cart | Success notice; mini-cart count updates |
| T-WC-05 | Variable product | Choose scent + size | Price updates; unavailable combo (Fresh Linen/Large) disabled/out of stock |
| T-WC-06 | Gallery | Click image | WooCommerce zoom/lightbox works |
| T-WC-07 | Reviews | Reviews tab | Demo reviews visible and labelled "[Demo review]" |
| T-WC-08 | Cart | Change quantity, remove item | Totals update; empty-cart state shown |
| T-WC-09 | Checkout | Submit empty form | Inline validation errors with text, focus moves to first error |
| T-WC-10 | Account | Visit logged out | Login form styled and labelled |
| T-RES-01..05 | Responsive | 320, 375, 414, 768, 1280px | No horizontal scroll; nothing overlaps; tap targets ≥ 24px |
| T-A11Y-01 | Reduced motion | Enable OS reduced motion | No transitions |
| T-A11Y-02 | Zoom | 200% browser zoom | Content reflows, no loss |
| T-A11Y-03 | Screen reader | NVDA/VoiceOver skim homepage | Landmarks, headings, image alts make sense |
| T-PAT-01..04 | Patterns | Insert each from the inserter | Inserts without "invalid content" warnings |
| T-DEMO-01 | Demo seed | Run on fresh store; re-run | Creates content once; second run refuses (products exist) |
| T-PERF-01 | Performance | Lighthouse on a real host (not Playground) | Record score, environment, page state |

## Accessibility checklist (WCAG 2.2 AA, manual)

- [ ] 1.1.1 Informative images have alt text; decorative images use empty alt
- [ ] 1.3.1 Landmarks: header, main, footer, nav with labels
- [ ] 1.4.3 Text contrast ≥ 4.5:1 (automated: T-STA-02)
- [ ] 1.4.10 Reflow at 320px (T-RES-01)
- [ ] 1.4.11 Non-text contrast ≥ 3:1 for inputs and focus ring (automated: T-STA-02)
- [ ] 1.4.12 Text spacing override does not clip text
- [ ] 2.1.1 All functionality by keyboard
- [ ] 2.4.1 Skip link
- [ ] 2.4.6 Headings describe content; one h1 per page
- [ ] 2.4.7 / 2.4.11 Focus visible and not obscured
- [ ] 2.5.8 Target size ≥ 24×24px
- [ ] 3.3.1 Errors identified in text (WooCommerce checkout)
- [ ] 2.3.3 Motion respects `prefers-reduced-motion`

Automated tools cannot prove compliance; this list must be walked manually before a release.
