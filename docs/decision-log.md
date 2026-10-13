# Decision log

Short records of choices that shape the project. Newest last. Revisit when the context changes.

| ID | Date | Decision | Why | Revisit if |
|---|---|---|---|---|
| D-001 | 2026-10-12 | Pure block theme, `theme.json` v3, WordPress ≥ 6.6 | Native Site Editor customization; v3 + section/grid features need 6.6 | Supporting older sites becomes important |
| D-002 | 2026-10-12 | No build step; plain CSS, PHP patterns | Solo maintainer, zero budget, approachable for learners | CSS grows past ~40 KB or needs real modularity |
| D-003 | 2026-10-12 | Node only for optional dev scripts, with **zero npm dependencies** | Tests run anywhere with Node; nothing to audit or update | A test genuinely needs a library |
| D-004 | 2026-10-12 | WordPress Playground CLI (pinned 3.1.58) as the local runtime | No PHP/MySQL/Docker on the dev machine; free; reproducible blueprints | Playground limitations block a test (use LocalWP) |
| D-005 | 2026-10-12 | Fonts: Cormorant Garamond (headings) + DM Sans variable (body), self-hosted from Fontsource 5.3.0, Latin + Latin Ext subsets | OFL licence, editorial character, no external requests, ~276 KB total but only used subsets download | Non-Latin markets need support → add subsets |
| D-006 | 2026-10-12 | Patterns are PHP files; parts/templates reference patterns | Translatable strings and portable asset URLs (same approach as Twenty Twenty-Five) | — |
| D-007 | 2026-10-12 | No commerce logic, forms, data collection or settings pages in the theme | Theme/plugin separation; review requirements; privacy | A feature needs persisted data → companion plugin |
| D-008 | 2026-10-12 | Override only `archive-product`, `product-search-results`, `single-product` WooCommerce block templates (based on WooCommerce 11.2.1's blockified templates); cart/checkout/account stay WooCommerce's | Smallest surface to re-test on WooCommerce updates | WooCommerce changes template structure |
| D-009 | 2026-10-12 | Uniform product grid (4:5 / 1:1), masonry only for the editorial inspiration board | Predictable comparison when shopping | — |
| D-010 | 2026-10-12 | Original generated SVG illustrations (CC0) instead of stock photos | Licence certainty, tiny size, coherent art direction; stock-photo licences (e.g. Unsplash) are not clearly GPL-compatible for redistribution | Real CC0 product photography becomes available |
| D-011 | 2026-10-12 | Homepage is `front-page.html` built from patterns | Polished first activation; fully editable in Site Editor | Users find it confusing that a "Home" page's content is ignored → document more / switch approach |
| D-012 | 2026-10-12 | Testimonials pattern contains placeholders only and is not on the default homepage; demo reviews are labelled "[Demo review]" | Never fabricate customer claims | — |
| D-013 | 2026-10-12 | `accent` colour is decorative-only; `primary` is the text-safe accent | Pastel accents fail 4.5:1 on light backgrounds | — |
| D-014 | 2026-10-12 | Product sections return nothing without WooCommerce (`petal_and_form_has_woocommerce()`) | Graceful degradation without fatal errors or empty headings | — |
| D-015 | 2026-10-12 | Hide the header account icon below 420px | Four icons + title don't fit one row at 375px; account reachable via checkout | Add an account link to the mobile menu instead |
| D-016 | 2026-10-12 | Licence: GPL-2.0-or-later (code), OFL (fonts), CC0 (art) | WordPress ecosystem standard; all GPL-compatible | — |
