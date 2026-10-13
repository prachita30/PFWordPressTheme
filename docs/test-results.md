# Test results

Only tests that were actually run are listed as run. Everything else is marked **Not run**.

## Run 1 — 2026-10-12, version 0.1.0

### Environment

| | |
|---|---|
| Machine | Windows 11, Node 24.21.0, Chrome (headless, for scripts) + a Chromium-based browser for manual checks |
| WordPress | 7.1.3 via WordPress Playground CLI 3.1.58 (PHP 8.3, SQLite) |
| WooCommerce | 11.2.1 (latest stable on the test date) |
| Sites | `:9400` store + demo seed · `:9401` no WooCommerce · `:9402` fresh install from `dist/petal-and-form-0.1.0.zip` |
| Debug | `WP_DEBUG` and `WP_DEBUG_DISPLAY` on (PHP notices would appear in HTML and fail the smoke test) |

### Automated

| ID | Test | Result |
|---|---|---|
| T-STA-01 | `npm run validate` — 10 static checks (49 markup files, 33 patterns, 34 PHP files, 23 asset refs) | **Pass** |
| T-STA-02 | `npm run contrast` — 21 colour pairings × 4 palettes | **Pass** (lowest: `primary` on `tint-*` for large italic accents ≥ 3:1; all text pairs ≥ 4.5:1) |
| T-INS-01 | `smoke:core` — 7 routes, no WooCommerce | **Pass** 7/7 |
| T-INS-02 | `smoke` — 16 routes incl. shop, category, product search, simple/variable/out-of-stock products, cart, checkout, account | **Pass** 16/16 |
| T-INS-03 | No fatal errors / no empty product sections without WooCommerce | **Pass** (7/7 on `:9401`; product patterns render nothing) |
| T-INS-04 | Packaged zip installs + activates on fresh WordPress (`installTheme` from the zip, same path as Upload Theme) and serves 7 routes | **Pass** 7/7 |
| T-EDT-01 | `editor-validate.mjs` — every pattern/template parsed by the block editor | **Pass**: without WooCommerce 914/914 blocks current; with WooCommerce 1039 current, 0 invalid, 1 warning (see below) |
| T-RES-01..05 | `responsive.mjs` — 13 routes × 320/375/414/768/1280 px | **Pass** 65/65, no horizontal overflow |

### Bugs found by testing and fixed in this run

1. Header CSS forced the mobile menu button visible on desktop.
2. New patterns invisible until `WP_DEVELOPMENT_MODE=theme` (WordPress caches theme pattern files) — dev blueprints set it; normal sites are unaffected because patterns are cached per theme version.
3. Missing `parts/comments.html` (caught by `validate`).
4. Demo seed fatal: `wp_create_category()` needs an admin include.
5. Product-card buttons centred/unstyled: WooCommerce 11 selectors more specific than the theme's.
6. Single-product gallery limited to 48 % of its column (WooCommerce classic gallery width).
7. Variation `<select>` text clipped vertically.
8. Homepage overflowed by 19 px at 768 px (decorative blob pseudo-element).
9. **Duplicate account icon**: WooCommerce auto-inserts its account block via block hooks; theme now opts out because the header places it.
10. Two blocks the editor would flag as invalid (unsupported margin style on WooCommerce product-collection) and two outdated markup forms (button font size, resized image).
11. Invalid checkout fields lost WooCommerce's error border (theme `!important`); restored.
12. Header `<nav>` had no accessible label.

### Manual (browser pane + headless screenshots)

| ID | Check | Result |
|---|---|---|
| T-VIS-01 | Homepage at 1440 px: all sections render, images load, one `h1` | Pass |
| T-VIS-03..06 | Journal, page, archive, search, 404 render with theme templates | Pass (smoke + screenshots; not reviewed in depth for every route) |
| T-VAR-01..03 | Sage & Oat and Lavender Studio applied through the Global Styles REST API; homepage, product page and gift finder reviewed | Pass — colours, radius, button shape, eyebrow style and site title change coherently |
| T-WC-01 | Shop grid, category pills, sorting control, sale badge, out-of-stock label | Pass (visual) |
| T-WC-04/05 | Variable product: chose Rose & Oat / Large → price $36.00 → Add to cart → success notice (`role="alert"`, icon + text), header badge 1 | Pass |
| T-WC-09 | Checkout submitted empty: 5 text errors, `aria-invalid` on 5 fields, focus moved to first invalid field; error text 5.97:1 | Pass |
| T-NAV-01 | Skip link present and targets main; 25 consecutive Tab stops on gift finder all show a visible focus indicator | Pass |
| T-A11Y (partial) | One `h1`, logical h1→h2→h3 order, all `main` images have `alt`, footer navs labelled | Pass (header nav label added after the check) |

### Not run yet (required before a release candidate)

- T-NAV-02 mobile menu keyboard trap / Esc, T-NAV-03 header search, T-NAV-04 mini-cart drawer keyboard
- T-WC-06 gallery zoom/lightbox, T-WC-07 reviews tab, T-WC-08 cart quantity changes, T-WC-10 account forms
- A completed order (no payment method configured in the demo; a test method such as "Cash on delivery" must be enabled first)
- T-A11Y-01 reduced motion, T-A11Y-02 200 % zoom, T-A11Y-03 screen reader (NVDA/VoiceOver)
- T-PERF-01 Lighthouse — Playground is not representative; needs a real host
- WordPress **Theme Check** plugin and PHP_CodeSniffer/WPCS (no PHP installed on the dev machine)
- Site Editor UI walkthrough by hand (styles panel, template editing) — variations were applied via the same REST API the editor uses, not through the UI
- RTL, Safari/Firefox, real phones
- Minimum versions (WordPress 6.6, PHP 7.4) — only tested on WordPress 7.1.3 / PHP 8.3

### Known warnings / environment notes

- `editor-validate` reports `woocommerce/product-details` as *outdated* markup in `single-product.html`. This is the exact markup WooCommerce 11.2.1 ships in its own template; the editor migrates it silently and the front end renders the tabs. Kept identical to upstream on purpose.
- WordPress Playground intermittently returned "Cannot escape data without an active database connection" during WordPress bootstrap under concurrent requests (SQLite layer, before any theme code runs). Retried requests succeeded. Not observed on non-concurrent runs.
- WooCommerce sets `sbjs_*` order-attribution cookies by default. These come from WooCommerce, not the theme; store owners can disable order attribution in WooCommerce settings.
