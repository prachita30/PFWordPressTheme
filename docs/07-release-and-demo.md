# 07 · Release, public demo and getting clients

## 1. Release checklist

1. All work merged to `main`; `CHANGELOG.md` "Unreleased" moved under the new version.
2. Bump the version in **three** places (the validator checks they match):
   `theme/petal-and-form/style.css` (Version), `theme/petal-and-form/readme.txt` (Stable tag), `package.json`.
3. Run and record results in `docs/test-results.md`:
   `npm test`, `npm run smoke`, `npm run smoke:core`, `node tests/scripts/responsive.mjs`, editor validation (T-EDT-01), manual keyboard pass.
4. Install the **Theme Check** plugin on a real WordPress install, upload the zip, fix anything it reports.
5. `npm run zip` → `dist/petal-and-form-<version>.zip` (only `theme/petal-and-form/`).
6. `git tag v<version> && git push --tags`; create a GitHub Release and attach the zip.

## 2. WordPress.org theme directory (separate milestone)

Free, but reviewed by volunteers against the
[theme requirements](https://make.wordpress.org/themes/handbook/review/required/). Before submitting:
pass Theme Check, re-verify licences of every bundled asset, make sure `screenshot.png` is 1200×900,
remove the "Designed with Petal & Form" credit if reviewers ask, and expect a queue of several weeks.
The name "Petal & Form" must also be unique in the directory. Do not describe the theme as approved
until it is.

## 3. Public demo (optional; may cost money)

| Option | Cost | Notes |
|---|---|---|
| **WordPress Playground link** | Free | Host `tests/blueprint.json` publicly (e.g. GitHub raw URL) and share `https://playground.wordpress.net/?blueprint-url=<url>`. The blueprint must install the theme from a public zip (GitHub release) instead of the local mount — see below. Runs in the visitor's browser; nothing to host. |
| Free WordPress hosting tiers | Free, limited | Often ads, no custom plugins, or sleeping sites — check WooCommerce support first. |
| Shared hosting + domain | Typically a few dollars/month + domain | Real performance numbers, real Lighthouse tests, best for client trust. |

Playground demo blueprint changes: replace the `activateTheme` step with
`{ "step": "installTheme", "themeData": { "resource": "url", "url": "<release zip url>" } }` and fetch
the seed + images from URLs (or bundle them in a zip using a `writeFiles` step).

## 4. Attracting international clients (no budget)

1. **Portfolio case study** — a page in your portfolio telling the story: problem, constraints (zero budget, solo), design system, accessibility work, test approach, results. Link the repo and the Playground demo.
2. **Show, don't claim** — screenshots of all three variations, a short screen recording of switching styles, contrast-test output. Avoid unverifiable claims ("fastest", "most accessible").
3. **Offer a productised service** — "Launch your handmade shop in two weeks": install, brand the variation, set up WooCommerce products, payments (via the store owner's own provider accounts) and policies. Fixed scope, fixed price.
4. **Be clear about payments by country** — WooCommerce gateways differ by country (Stripe, PayPal, Razorpay, etc.). Confirm availability for each client's country; never assume.
5. **Where makers are** — Etsy seller forums, Instagram maker communities, local craft markets, Indie Hackers, r/smallbusiness (read each community's self-promotion rules).
6. **Contribute upstream** — small, focused contributions (docs fixes, Playground blueprint examples, WooCommerce block-theme styling notes) build public credibility. Never submit this whole theme as a core contribution.
7. **Time zones and language** — publish your working hours in UTC, quote in the client's currency, keep templates translation-ready (they are).
