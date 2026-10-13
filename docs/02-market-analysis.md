# 02 · Market and competitor analysis

Research date: 2026-10-12. Sources are the public WordPress.org theme directory listings and the
official WooCommerce developer documentation. Figures are quoted as shown on those pages on that
date; they change frequently. **No sales, market-share or customer-complaint statistics are
claimed here** — this was not researched in enough depth to support such claims.

## Sources

- Astra — <https://wordpress.org/themes/astra/>
- Blocksy — <https://wordpress.org/themes/blocksy/>
- Kadence — <https://wordpress.org/themes/kadence/>
- WooCommerce block-theme docs — <https://developer.woocommerce.com/docs/theming-for-woo-blocks/>

## Comparison matrix (verified facts only)

| | Astra | Blocksy | Kadence | Petal & Form (this project) |
|---|---|---|---|---|
| Directory label | "Commercial theme" — free with paid upgrades | "Commercial theme" — free with paid upgrades | "Commercial theme" — free with paid upgrades | Free, GPL; no paid tier planned for MVP |
| Active installs (listing) | 1+ million | 300,000+ | 500,000+ | n/a (unreleased) |
| Rating (listing) | 4.9 / 5 | 5 / 5 | 4.9 / 5 | n/a |
| Version / last updated | 4.14.0 · 2026-09-24 | 2.1.59 · 2026-10-08 | 1.5.2 · 2026-07-24 | 0.1.0 (pre-release) |
| WooCommerce | Stated as fully compatible | "Advanced WooCommerce support" | E-commerce tag; integration with third-party plugins | WooCommerce block templates, styled; no overrides of PHP templates |
| Starter content | Listing mentions templates | Not mentioned on listing | "Library of starter templates" | One curated boutique demo + 3 style variations |
| Positioning | Multipurpose, page-builder friendly | Multipurpose, fast, block editor compatible | Multipurpose | Single niche: handmade / boutique stores |

What we did **not** verify (and therefore do not claim): which of these themes are full-site-editing
block themes vs. classic/hybrid themes, their performance or accessibility scores, and recurring
customer complaints. A follow-up task (see [roadmap](roadmap.md)) is to read each theme's public
support forum and record recurring themes with links.

## Observed conventions worth adopting

- Starter/demo content is a standard expectation for store themes.
- WooCommerce now ships block templates (`single-product.html`, `archive-product.html`,
  `product-search-results.html`, cart, checkout, order confirmation); a theme overrides one by
  shipping a file with the same name in `templates/`, and taxonomy archives fall back to
  `archive-product.html`. This lets a theme style the store without PHP template overrides.

## Differentiation opportunity (hypothesis, not a measured gap)

The large themes above are **multipurpose** and monetised through upgrades. A narrow, opinionated,
fully free block theme for small handmade brands can compete on *focus*:

1. An art-directed pastel editorial look out of the box, but built from editable core blocks.
2. Storytelling patterns that small makers actually need (maker story, materials, care, custom orders, gift guides).
3. Three complete style variations rather than hundreds of options.
4. No upsells, no page builder, no theme JavaScript.
5. Plain-language onboarding for non-technical owners.

## Positioning statement

> For independent makers and boutique shops who want their store to feel as considered as their
> products, Petal & Form is a free WordPress block theme that delivers a soft, editorial storefront
> with ready-made storytelling sections and native WooCommerce support — without page builders,
> upsells or code.
