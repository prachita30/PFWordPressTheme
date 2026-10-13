# Contributing to Petal & Form

Thank you for helping! This project is maintained by one person, so small, focused changes with
clear testing notes are the fastest to review.

## Set up (about 5 minutes, free)

1. Install [Node.js 22+](https://nodejs.org/) and [Git](https://git-scm.com/). Chrome or Edge is needed only for the responsive script.
2. Fork and clone the repository.
3. `npm run playground` — starts WordPress + WooCommerce + demo content at http://127.0.0.1:9400 (first start downloads WordPress and WooCommerce, ~1–2 minutes).
4. Edit files in `theme/petal-and-form/`; refresh the browser to see changes.

No `npm install` is needed — the scripts have no dependencies.

## Where things live

| Change | File(s) |
|---|---|
| Colours, fonts, spacing, element/block defaults | `theme/petal-and-form/theme.json` |
| A style variation | `theme/petal-and-form/styles/*.json` |
| Page structure | `templates/*.html`, `parts/*.html` |
| Reusable sections | `patterns/*.php` |
| Anything theme.json can't express | `assets/css/theme.css` (sectioned, token-only) |
| Pattern categories, block styles | `functions.php` |

Read [docs/03-architecture.md](docs/03-architecture.md) and [docs/04-design-system.md](docs/04-design-system.md) first.

## Coding conventions

- **WordPress Coding Standards** for PHP (tabs, Yoda conditions, spaces inside parentheses).
- Prefix every PHP function and global with `petal_and_form_`; the text domain is `petal-and-form`.
- Every user-facing string in a pattern is translatable and escaped: `esc_html_e()`, `esc_attr__()`, `esc_url()`, `wp_kses()` for strings with `<em>`.
- Block markup must be exactly what the editor would save. The easiest way: build the section in the editor, copy it with **Code editor**, then replace strings with translation functions.
- CSS: only design tokens (`var(--wp--preset--*)`, `var(--wp--custom--*)`), no hard-coded colours. Add rules to the matching numbered section of `theme.css`.
- No front-end JavaScript, no external requests, no new runtime dependencies, no business logic (that belongs in a plugin — see decision D-007).
- Never use colour alone to convey state; keep text contrast ≥ 4.5:1 (run `npm run contrast`).

## Before opening a pull request

```bash
npm test                 # must pass
npm run smoke            # with `npm run playground` running; must pass
```

Then check your change in the browser at phone width (≈375px) and desktop, with the keyboard only.
If you touched patterns, run the T-EDT-01 snippet from [docs/05-test-plan.md](docs/05-test-plan.md) in the Site Editor.

## Pull request checklist

A good PR includes:

- **What and why** in one or two sentences, linked to an issue if there is one.
- **Screenshots** (before/after) for visual changes, at phone and desktop widths.
- **Tests run** and their actual result (copy the summary lines).
- **Accessibility notes**: keyboard, focus, contrast, reduced motion if relevant.
- **Docs/CHANGELOG** updated under "Unreleased" if behaviour changed.
- Commit messages in the form `feat: …`, `fix: …`, `docs: …`, `test: …`, `refactor: …`.

## Reporting bugs

Use the bug template. Include WordPress, WooCommerce, PHP and browser versions, the style variation,
exact steps, what you expected and what happened. A screenshot or a Playground link helps a lot.

## Good first issues

Look for the `good first issue` label, or see the list in [docs/roadmap.md](docs/roadmap.md#good-first-issues).

## Licensing of contributions

By contributing you agree that your code is licensed GPL-2.0-or-later and any artwork CC0 1.0
(or another GPL-compatible licence stated in the PR). Do not submit code, images or fonts you
don't have the right to license this way.
