# Roadmap

Lightweight board for one maintainer. Columns: **Backlog → Ready → In progress → Testing → Done.**
Mirror it as a GitHub Project (free) with the labels below.

## Labels

`good first issue` · `bug` · `accessibility` · `performance` · `documentation` ·
`WooCommerce compatibility` · `design improvement` · `enhancement`

## Milestone 0.1 — MVP foundation (Done, see test-results)

P0 theme, templates, patterns, variations, demo seed, tests, docs.

## Milestone 0.2 — Release candidate (Ready)

- [ ] Manual keyboard + screen reader pass (T-NAV-*, T-A11Y-*) — `accessibility`
- [ ] Full WooCommerce flow by hand: add to cart → checkout validation → order (test payment method "Cash on delivery") — `WooCommerce compatibility`
- [ ] Install the zip on a real host / LocalWP; run Theme Check plugin and fix findings
- [ ] Lighthouse on a real host for home, shop, product; record in test-results — `performance`
- [ ] Test the three variations in the Site Editor and on the shop/product templates — `design improvement`
- [ ] Research competitor support forums and record recurring complaints with links (market analysis follow-up) — `documentation`

## Milestone 0.3 — Polish (Backlog)

- [ ] Section styles (`styles/sections/*.json`) for tinted groups, selectable from the editor
- [ ] Colour-only palette presets (`styles/colors/`)
- [ ] RTL test pass and fixes
- [ ] Mini-cart drawer styling
- [ ] Empty cart pattern with category links
- [ ] Optional sticky header documented as a block setting

## P2 — Future (only after 0.2 is stable)

- Niche demo sets (jewelry, candles, art prints)
- More style variations
- Optional companion plugin *only if* a feature needs stored data (e.g. gift-note field on orders)
- WordPress.org submission

## Good first issues

1. Add a "Journal highlights" pattern (three latest posts) — `enhancement`
2. Write alt-text guidance with examples into the store owner guide — `documentation`
3. Add a pattern preview screenshot for each style variation to `docs/` — `documentation`
4. Add `Keywords:` headers to patterns that lack helpful search terms — `enhancement`
5. Improve the 404 illustration's alt behaviour (decorative image test) — `accessibility`
6. Add a test to `validate.mjs` that every pattern has a `Description:` header — `enhancement`
