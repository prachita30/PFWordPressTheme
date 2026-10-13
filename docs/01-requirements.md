# 01 · Requirements specification

Status: living document · Version 0.1 · Last reviewed 2026-10-12

## 1. Product vision

**Petal & Form** (working name) is a soft, editorial WordPress block theme for independent
brands that want their online shop to feel as thoughtful as their products.

It combines Pinterest-style visual storytelling with a calm editorial layout system, native
Site Editor customization and WooCommerce presentation — with no paid dependencies,
no build step and no proprietary services.

## 2. Target audience

Small creative businesses selling handmade or curated goods: ceramics, candles, stationery,
jewelry, gifts, home decor, art prints. Many are moving from Instagram/WhatsApp selling to an
independent store and have little technical experience.

### Personas

| Persona | Context | Goals | Frustrations |
|---|---|---|---|
| **Meera — the maker** (primary) | Sells hand-thrown ceramics via Instagram DMs. Non-technical. | A store that looks as good as her feed; set up in a weekend. | Multipurpose themes with 200 options; demo imports that overwrite things; upsells. |
| **Jonah — the boutique owner** | Runs a small gift shop, 80 SKUs, some variations. | Clear catalog, gift guides for holidays, reliable checkout. | Pretty themes that break WooCommerce pages or mobile cart. |
| **Ana — the freelance developer** | Builds sites for small clients on low budgets. | A clean, GPL, documented starting point she can extend. | Themes locked to page builders, heavy JS, undocumented overrides. |
| **Shopper** (end user) | Browses on a phone, often from Pinterest/Instagram links. | Find a product, understand it, buy it quickly. | Tiny tap targets, carousels, slow images, unreadable pale text. |

## 3. User stories

| ID | Story |
|---|---|
| US-01 | As a store owner, I can activate the theme and get a polished homepage without configuring anything. |
| US-02 | As a store owner, I can switch between three curated looks (Blush Atelier, Sage & Oat, Lavender Studio) in one click. |
| US-03 | As a store owner, I can change colors, fonts, spacing and button styles in the Site Editor without code. |
| US-04 | As a store owner, I can insert ready-made sections (maker story, gift guide, inspiration board, FAQ…) and edit their text and images. |
| US-05 | As a store owner, I can edit my header and footer navigation without touching files. |
| US-06 | As a shopper, I can browse products in a predictable grid with prices, sale and stock states. |
| US-07 | As a shopper, I can view a product's gallery, choose a variation, set quantity and add it to my cart. |
| US-08 | As a shopper, I can review my cart and check out on a phone with clear labels and errors. |
| US-09 | As a keyboard or screen-reader user, I can navigate menus, product grids and forms. |
| US-10 | As a store owner, I can reproduce the demo store on a fresh local site without overwriting a real store. |
| US-11 | As a developer, I can install, test and contribute to the theme by following the docs. |

## 4. Functional requirements

| ID | Requirement | Priority |
|---|---|---|
| FR-01 | Valid block theme: `style.css`, `theme.json`, `templates/index.html` and standard hierarchy templates. | P0 |
| FR-02 | Global colors, typography, spacing, radius and shadows defined in `theme.json` and editable in the Site Editor. | P0 |
| FR-03 | Header part: logo/site title, navigation block, search, cart & account (when WooCommerce is active), responsive overlay menu. | P0 |
| FR-04 | Footer part: brand blurb, navigation columns, contact and policy links, newsletter placeholder. | P0 |
| FR-05 | Homepage composed of reusable patterns (hero, collections, bestsellers, categories, maker story, inspiration, testimonials placeholder, newsletter, custom-order banner). | P0 |
| FR-06 | Templates: blog index, single post, page, archive, search, 404. | P0 |
| FR-07 | WooCommerce product catalog, category/tag archives and product search templates using WooCommerce blocks. | P0 |
| FR-08 | Single-product template: gallery, title, price, stock, variations, quantity, add to cart, meta, tabs/reviews, related products, configurable shipping/returns note. | P0 |
| FR-09 | Cart, checkout, account and order-confirmation pages styled (WooCommerce's own blocks/templates; no custom checkout). | P0 |
| FR-10 | Theme degrades gracefully when WooCommerce is inactive (no fatal errors, no broken header). | P0 |
| FR-11 | Three style variations that change palette, typography details, radius and button shape coherently. | P1 |
| FR-12 | Storytelling patterns: maker story, materials, behind the scenes, gift guide, care instructions, collections, custom orders, brand values. | P1 |
| FR-13 | Pinterest-inspired inspiration-board pattern (CSS columns, no JS, not used for the shop grid). | P1 |
| FR-14 | Gift-finder landing page pattern (by recipient, occasion, budget, personalised, bestsellers, gift wrap, custom order). | P1 |
| FR-15 | Informational page patterns: about, contact, FAQ, shipping, returns, legal placeholders. | P1 |
| FR-16 | Demo content: reproducible seed (products, categories, pages, posts) for a **fresh** site, plus original CC0 images. | P1 |
| FR-17 | Store-owner onboarding guide ("brand moodboard"). | P1 |

## 5. Non-functional requirements

| ID | Category | Requirement |
|---|---|---|
| NFR-01 | Accessibility | Target WCAG 2.2 AA: text contrast ≥ 4.5:1 (≥ 3:1 large text / UI), visible focus, keyboard operable, skip link, logical headings, `prefers-reduced-motion` respected. |
| NFR-02 | Performance | No front-end JavaScript shipped by the theme; ≤ 2 font families, self-hosted WOFF2, preloaded subset only; no external requests; CSS < 25 KB unminified. Lighthouse ≥ 90 is an aspirational target on a controlled demo. |
| NFR-03 | Security | No user input handled by the theme; all PHP output escaped; no secrets; no tracking; no custom DB tables. |
| NFR-04 | i18n | All user-facing strings in PHP patterns translatable with text domain `petal-and-form`; no hardcoded currency; logical CSS properties for RTL where practical. |
| NFR-05 | Maintainability | No build step; plain CSS; small PHP surface (`functions.php` + patterns); every customization decision logged. |
| NFR-06 | Compatibility | WordPress ≥ 6.6 (section styles, `theme.json` v3), PHP ≥ 7.4, WooCommerce current stable. |
| NFR-07 | Licensing | GPL-2.0-or-later code; OFL fonts; original CC0 illustrations; notices in `readme.txt`. |
| NFR-08 | Responsiveness | Usable from 320 px to wide desktop with no horizontal scroll. |

## 6. MVP scope

P0 + P1 items above. P2 (future): more niche demos, more variations, color-only palette
presets, companion plugin (only if persistent functionality is needed), WordPress.org submission.

## 7. Explicit exclusions

- Custom checkout, payment, shipping, tax or authentication logic.
- Custom product filters (WooCommerce's filter blocks can be added by the user; the theme does not fake them).
- Mega menus, sliders/carousels, parallax, page-builder integrations.
- A settings dashboard, license keys or activation mechanism.
- A recommendation engine for the gift finder (it is an editorial page layout).
- Real customer reviews or business claims in demo content.

## 8. Technical constraints

Zero budget, solo maintainer, no build pipeline, block theme only (not headless), WooCommerce free
core for commerce. Node.js is used **only** for optional development scripts (validation, local
WordPress Playground), never at runtime.

## 9. Security requirements

See NFR-03 and [SECURITY.md](../SECURITY.md). The theme registers patterns, styles and fonts only.

## 10. Open-source goals

Public repository, GPL licensing, contributor docs, issue templates, labelled beginner issues,
reproducible local environment (WordPress Playground blueprint), honest test records.

## 11. Acceptance criteria (release candidate)

1. Activates on a fresh WordPress without PHP notices.
2. Every template and pattern parses as valid block markup (no "invalid content" recovery prompts).
3. Global styles are editable in Site Editor → Styles; all three variations apply.
4. Shop, product (simple + variable), cart and checkout render with WooCommerce active.
5. Header navigation, search and cart are keyboard operable; focus is visible.
6. No horizontal overflow at 320 px, 375 px, 414 px, 768 px, 1280 px, 1600 px.
7. All palette text/background pairs used by the theme pass 4.5:1 (automated script).
8. Theme zip builds reproducibly and installs via Appearance → Themes → Upload.
9. README, setup guide, licensing and test results are present and accurate.

## 12. Traceability matrix

| Req | Implementation | Verification |
|---|---|---|
| FR-01 | `theme/petal-and-form/style.css`, `theme.json`, `templates/*` | `tests/scripts/validate.mjs` (required files), Playground activation (T-INS-01) |
| FR-02 | `theme.json` settings/styles | T-VIS-08 Site Editor check; `validate.mjs` JSON parse |
| FR-03 | `parts/header.html`, `assets/css/theme.css` §Header | T-NAV-01..04 |
| FR-04 | `parts/footer.html` | T-VIS-02 |
| FR-05 | `templates/front-page.html`, `patterns/home-*.php` | T-VIS-01 |
| FR-06 | `templates/{home,single,page,archive,search,404}.html` | T-VIS-03..06 |
| FR-07 | `templates/{archive-product,product-search-results}.html` | T-WC-01..03 |
| FR-08 | `templates/single-product.html` | T-WC-04..07 |
| FR-09 | WooCommerce default templates + `theme.css` §WooCommerce | T-WC-08..10 |
| FR-10 | `functions.php` (no hard WooCommerce calls), header cart block only renders with WC | T-INS-03 |
| FR-11 | `styles/*.json`, `styles/sections/*.json` | T-VAR-01..03, `contrast.mjs` |
| FR-12 | `patterns/story-*.php` | T-PAT-01 |
| FR-13 | `patterns/inspiration-board.php`, `theme.css` §Board | T-PAT-02, T-RES-* |
| FR-14 | `patterns/page-gift-finder.php` | T-PAT-03 |
| FR-15 | `patterns/page-*.php` | T-PAT-04 |
| FR-16 | `demo/seed.php`, `demo/images/`, `tests/blueprint.json` | T-DEMO-01 |
| FR-17 | `docs/06-store-owner-guide.md` | Doc review |
| NFR-01 | `theme.css` §Focus/§Motion, palette tokens | `contrast.mjs`, T-A11Y-* manual checklist |
| NFR-02 | `functions.php` (CSS only), `theme.json` fontFace | T-PERF-01 |
| NFR-03 | `functions.php`, patterns use `esc_*` | `validate.mjs` (no raw `echo $`), code review |
| NFR-04 | patterns use `esc_html_e()` etc. | `validate.mjs` text-domain check |

Test IDs are defined in [05-test-plan.md](05-test-plan.md).
