# 04 · Design system

All tokens live in [`theme.json`](../theme/petal-and-form/theme.json). Style variations in
[`styles/`](../theme/petal-and-form/styles) override **values only** — slugs never change, so every
pattern, template and CSS rule follows the active variation automatically.

## 1. Colour tokens

| Slug | Role | Blush Atelier (default) | Sage & Oat | Lavender Studio |
|---|---|---|---|---|
| `base` | Page background | `#FBF8F3` Ivory | `#F8F6F0` | `#FCFAF6` |
| `base-2` | Alternate section / panels | `#F4EEE5` Cream | `#EEE9DD` | `#F4F0F8` |
| `tint-1` | Pastel surface (sale badge, newsletter, error notice) | `#F1DDE1` Powder pink | `#E9E2D0` | `#E8E1F1` |
| `tint-2` | Pastel surface (maker story, success notice) | `#DCE5D8` Sage mist | `#DCE5D8` | `#F5EAC8` |
| `tint-3` | Pastel surface (custom-order banner) | `#E8E1F1` Lavender haze | `#E3E9DF` | `#F1DDE1` |
| `tint-4` | Pastel surface (notes, labels) | `#F5EAC8` Butter | `#F2ECD9` | `#DCEBE2` |
| `accent` | **Decorative only** (rules, quote bars) — never text | `#C88F98` | `#7D9482` | `#A893C7` |
| `primary` | Text-safe accent: link hover, italic heading accent, sale price, button hover | `#8A4E5A` | `#4F6855` | `#664F84` |
| `contrast` | Text, primary buttons, focus ring | `#35312F` | `#2F332F` | `#322F38` |
| `contrast-2` | Secondary text, captions, input borders | `#625C58` | `#5C605A` | `#5D5866` |
| `border` | Hairlines (decorative) | `#E6DCD2` | `#DDD7C9` | `#E2DAEC` |

Rules:

- Pastels are **surfaces**, never text colours.
- Text on any surface is `contrast` or `contrast-2` (≥ 4.5:1, verified by `npm run contrast`).
- `accent` is purely decorative because it does not reach 4.5:1 on light backgrounds.
- State is never colour-only: sale = strikethrough + "Sale" badge; stock = text label; errors = WooCommerce message text + icon.

## 2. Typography

| Token | Family | Use |
|---|---|---|
| `heading` | Cormorant Garamond 500/600 + 500 italic (OFL, self-hosted WOFF2, Latin + Latin Extended) | Headings, site title, quotes, decorative numerals |
| `body` | DM Sans variable (OFL, self-hosted WOFF2) | Body, navigation, buttons, forms |
| `system`, `system-serif` | OS fonts | Zero-download options in the Site Editor |

Fluid sizes (min → max): `x-small` 0.8125rem · `small` 0.875→0.9375 · `medium` 1→1.0625 ·
`large` 1.25→1.5 · `x-large` 1.75→2.25 · `xx-large` 2.25→3.25 · `xxx-large` 2.75→5rem.

Body line-height 1.65; headings 1.02–1.3; reading column `contentSize` 44rem (~70 characters).
Italic accent: wrap a word in `<em>` inside a heading (or use the **Italic accent** heading style).

## 3. Spacing, layout, radius, shadow

- Spacing presets `10`–`80`: 0.5rem → clamp(4rem, 10vw, 8rem). Sections use `70` vertical padding.
- `contentSize` 44rem, `wideSize` 80rem, root padding `50`.
- Radius tokens (`--wp--custom--radius--*`): Blush 8/16/28/pill · Sage 3/6/10/3 · Lavender 12/24/40/pill.
- Shadows: `soft` (cards) and `lifted`. No default WordPress shadow presets.

## 4. Components

| Component | Implementation |
|---|---|
| Buttons | `theme.json` `elements.button`; secondary = core **Outline** style. States: hover (primary), focus-visible ring, active nudge, disabled 55 % opacity. |
| Eyebrow label | Paragraph block style **Eyebrow** |
| Card | Group block style **Card** |
| Arch image | Image block style **Arch** (signature motif) |
| Checklist | List block style **Checklist** |
| Product card | Image (4:5, rounded, gentle zoom on hover) → serif title → price → stock exception → outline button |
| Category tile | Group with image + heading link stretched over the tile (one link, no nested links) |
| Inspiration board | `.pf-board` CSS columns: 1 → 2 (600px) → 3 (1000px) |
| Notices | WooCommerce notice blocks recoloured with tints, text stays `contrast` |

## 5. Breakpoints

The theme relies on fluid type/spacing and intrinsic grids. Explicit breakpoints:
600px (core navigation overlay, board 2 cols, compact header), 782px (core columns stack),
1000px (board 3 cols), 420px (account icon hidden).

## 6. Motion

Durations come from `--wp--custom--motion--duration` (220 ms). Only colour, transform and
opacity transition. `prefers-reduced-motion: reduce` disables all transitions/animations.
No scroll-triggered animation, parallax, carousels or autoplay.

## 7. Product card anatomy

```
┌──────────────────┐
│ [SALE]           │  ← tint-1 pill, contrast text
│      image 4:5   │  ← radius medium, hover zoom 1.035 (hover-capable devices only)
└──────────────────┘
Product title          ← heading font, large
~~$22.00~~ $18.00      ← del contrast-2, ins primary
Out of stock           ← only shown when not in stock
( Add to cart )        ← outline pill, fills on hover
```
