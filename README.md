# Petal & Form

**A soft, editorial and beautifully customizable storefront theme for independent brands that want
their online shop to feel as thoughtful as their products.**

Petal & Form is a free, GPL licensed WordPress **block theme** for handmade and boutique stores
ceramics, candles, stationery, jewelry, gifts and home goods. It pairs a pastel editorial design
system with native Site Editor customization and WooCommerce block templates.

> Status: **0.1.0 — development release.** Runtime tested in WordPress Playground (WordPress 7.1.3,
> WooCommerce 11.2.1). Not yet tested on a production host or submitted to WordPress.org.
> See [docs/test-results.md](docs/test-results.md) for exactly what has and hasn't been tested.

## Features

- **Three style variations**  Blush Atelier (default), Sage & Oat, Lavender Studio. Each changes
  palette, corner radius, button shape and heading details, not just colours.
- **33 block patterns**, all built from core/WooCommerce blocks and fully editable:
  - Storefront: editorial hero, shop by category, featured collection, bestsellers, newsletter invitation, custom-order banner
  - Storytelling: meet the maker, materials, behind the scenes, care guide, brand values, custom-order process, testimonials (placeholder only)
  - **Inspiration board** — Pinterest style masonry in pure CSS, for editorial content (never the product grid)
  - **Gift finder** landing page by recipient, occasion, budget; personalised gifts; gift wrapping
  - Full pages: about, contact, FAQ, shipping, returns, legal placeholder
- **WooCommerce templates**: shop/category/tag archive, product search, single product (gallery,
  variations, stock, collapsible shipping/returns/care notes, reviews, related products). Cart,
  checkout and account use WooCommerce's own templates, restyled.
- **No theme JavaScript**, no external requests, two self hosted OFL fonts (WOFF2, unicode-range subset).
- **Accessibility built into the tokens**: every text/background pairing checked ≥ 4.5:1 in all palettes,
  a single consistent focus ring, reduced-motion support, 44px header tap targets.
- **Works without WooCommerce** — product sections simply disappear.
- **Reproducible demo store** — one command spins up WordPress + WooCommerce + demo products locally.

## Requirements

| | Version |
|---|---|
| WordPress | 6.6 or later (tested on 7.1.3) |
| PHP | 7.4 or later (tested on 8.3) |
| WooCommerce | Optional; tested on 11.2.1 |
| Node.js | Optional, ≥ 22, only for the development scripts |

## Install the theme

1. Download `petal-and-form-<version>.zip` from Releases (or build it: `npm run zip`).
2. WordPress admin → **Appearance → Themes → Add New → Upload Theme** → choose the zip → **Activate**.
3. Optional: install **WooCommerce** (free) from Plugins → Add New.
4. **Appearance → Editor → Styles** to pick a style variation.

Store owners: start with the [store owner guide](docs/06-store-owner-guide.md).

## Local development (zero cost, no PHP or Docker needed)

```bash
git clone https://github.com/your-username/petal-and-form.git
cd petal-and-form
npm run playground
```

This uses [WordPress Playground](https://wordpress.github.io/wordpress-playground/) (WordPress running
on WebAssembly in Node) to start a store at http://127.0.0.1:9400 with WooCommerce and the demo
content, logged in as admin. The theme folder is mounted live — edit files and refresh.

`npm run playground:core` starts a site **without** WooCommerce on port 9401.

Prefer a classic stack? Use [LocalWP](https://localwp.com/) and symlink or copy
`theme/petal-and-form` into `wp-content/themes/`. To load demo content there, see
[docs/06-store-owner-guide.md#demo-content](docs/06-store-owner-guide.md#demo-content).

## Testing

```bash
npm test                 # static checks + colour contrast (no WordPress needed)
npm run smoke            # 16 routes against the running store (start `npm run playground` first)
npm run smoke:core       # 7 routes against the site without WooCommerce
node tests/scripts/responsive.mjs   # overflow check at 320–1280px via headless Chrome
node tests/scripts/editor-validate.mjs  # every pattern/template parsed by the real block editor
npm run zip              # validate, then build dist/petal-and-form-<version>.zip
```

The full plan, including manual keyboard and screen-reader checks, is in
[docs/05-test-plan.md](docs/05-test-plan.md); results are in [docs/test-results.md](docs/test-results.md).

## Repository layout

```
theme/petal-and-form/   the installable theme (the only thing that ships)
demo/                   demo seed script + CC0 demo images (not shipped)
tests/                  Playground blueprints and Node test scripts
tools/                  illustration generator and rasteriser
docs/                   requirements, architecture, design system, guides, decisions
```

## Customization at a glance

| What | Where | Scope |
|---|---|---|
| Colours, fonts, sizes, spacing, buttons | Editor → Styles | Global |
| Style variation | Editor → Styles → Browse styles | Global |
| Logo, site title, navigation | Editor → Patterns → Header | Global (template part) |
| Footer links and text | Editor → Patterns → Footer | Global (template part) |
| Homepage sections | Editor → Templates → Front Page | Template |
| Product page layout, shipping notes | Editor → Templates → Single Product | Template (WooCommerce) |
| Shop grid columns, products per page | Editor → Templates → Product Catalog | Template (WooCommerce) |
| Any page content | Pages → edit; insert "Petal & Form" patterns | Per page |

## Known limitations

- Newsletter and contact patterns are layouts only; add a newsletter/form plugin's block. The theme collects no data.
- Product filters are not included; WooCommerce's own filter blocks can be added to the catalog template.
- The homepage is a template (`front-page.html`) — content of a page set as "Homepage" is not displayed. Edit it in the Site Editor.
- Fonts include Latin and Latin Extended subsets only; other scripts fall back to system fonts.
- RTL: logical CSS properties are used where practical, but RTL layouts have not been tested.
- Only tested in WordPress Playground; Lighthouse/performance have not been measured on a real host yet.
- Demo illustrations are stylised artwork, not product photography.

More detail: [docs/test-results.md](docs/test-results.md) and [docs/roadmap.md](docs/roadmap.md).

## Contributing

Contributions are welcome — see [CONTRIBUTING.md](CONTRIBUTING.md) and the
[Code of Conduct](CODE_OF_CONDUCT.md). Report security issues privately per [SECURITY.md](SECURITY.md).

## License

Theme code: [GPL-2.0-or-later](LICENSE). Fonts: SIL Open Font License 1.1.
Illustrations and demo images: original work, CC0 1.0. Details in
[theme/petal-and-form/readme.txt](theme/petal-and-form/readme.txt).
