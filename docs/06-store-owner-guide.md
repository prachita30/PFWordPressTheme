# 06 · Store owner guide — build your brand moodboard

This guide is for shop owners, not developers. Everything happens in **Appearance → Editor**
(the Site Editor). No code, no extra plugins except WooCommerce.

Set aside an hour. Work through the six choices below in order — like building a moodboard.

---

## 1. Choose your palette

**Editor → Styles → Browse styles.** Click each and look at the preview.

| Style | Feels like | Good for |
|---|---|---|
| **Blush Atelier** | Romantic, soft, editorial. Pill buttons, gentle rounding. | Gifts, stationery, handmade decor, florals |
| **Sage & Oat** | Natural, calm, earthy. Squarer corners, small uppercase buttons, square product photos. | Ceramics, home goods, sustainable products, skincare |
| **Lavender Studio** | Playful, creative, modern. Very round corners, violet buttons, italic site title. | Jewelry, art prints, accessories, creative goods |

Want your own brand colour? **Styles → Colors → Palette** and edit a swatch. Keep these rules:

- Change **Primary** to your brand's deep colour (used for links and highlights). It must be dark
  enough to read on white — a quick check: if it looks like a pastel, it's too light.
- Change the **tint** swatches freely; they are only used as backgrounds.
- Don't change **Contrast** to a light colour — it's your text colour.

## 2. Choose your typography

**Styles → Typography.** The defaults are *Cormorant Garamond* (headings) and *DM Sans* (text).

- For a more modern feel: set **Headings** to *DM Sans* and weight 600.
- For the fastest possible pages: choose *System sans* / *System serif* (no font download).
- Keep body text at the default size; small text is harder to read on phones.

## 3. Choose your button style

**Styles → Blocks → Button** (or pick a variation — each has its own button shape).
Use one main button style site-wide and the **Outline** style for secondary actions.

## 4. Choose your product image style

Consistency matters more than perfection:

- Shoot every product on the same background, in the same light, at the same angle.
- Use **portrait (4:5)** photos for Blush Atelier and Lavender Studio, **square** for Sage & Oat.
  The shop grid crops to that ratio automatically, so keep the product centred.
- Export around **1600px** on the long side as JPG or WebP; WordPress makes smaller copies itself.
- Write **alt text** for each product photo describing what's shown ("Sage stoneware mug with speckled glaze").

## 5. Choose your header

**Editor → Patterns → Template parts → Header.**

- Upload your **logo** in the Site Logo block (or delete it and keep the text title).
- Edit the **Navigation** block: add your pages and shop categories. Keep it to five or six links.
- Want an announcement line ("Order by 18 December for holiday delivery")? Click the header, choose
  **Replace** and pick **Header with announcement bar**.

## 6. Choose your homepage structure

**Editor → Templates → Front Page.** Each section is a pattern you can move (↑↓ arrows), delete or
replace. Recommended orders:

| Business | Section order |
|---|---|
| Few products, strong story | Hero → Meet the maker → Featured collection → Inspiration board → Newsletter |
| Many products | Hero → Shop by category → Bestsellers → Featured collection → Brand values |
| Gift-focused | Hero → Featured collection → Custom-order banner → Bestsellers → Newsletter |

Add more sections with the **+** inserter → **Patterns** → categories starting with *Petal & Form*.

Mark products as **Featured** (the ☆ in Products list) so they appear in "Pieces we are loving".
The "Most loved" section uses WooCommerce's sales count automatically.

---

## What is global vs per page

| Setting | Where | Affects |
|---|---|---|
| Colours, fonts, spacing, button style | Editor → Styles | Whole site |
| Header, footer | Editor → Patterns → Template parts | Whole site |
| Homepage layout | Editor → Templates → Front Page | Homepage only |
| Shop grid, product page layout, shipping notes | Editor → Templates → Product Catalog / Single Product | All products (needs WooCommerce) |
| Page content (About, FAQ…) | Pages → edit page | That page |
| Prices, stock, shipping rates, taxes, payments | WooCommerce → Settings / Products | Store (not the theme) |

## Ready-made pages

Create a page, then in the "Choose a pattern" window pick one of: **About page, Gift finder page,
Contact page, FAQ page, Shipping & delivery page, Returns & refunds page, Legal page**. For About and
Gift finder, set **Template → Landing page (no title, full width)** in the page settings.

Policy pages contain guidance, not legal text. WordPress has a privacy policy helper under
**Settings → Privacy**. Laws differ by country — have your final policies checked.

## Things the theme deliberately doesn't do

- **Newsletter signup / contact forms**: add a free plugin (e.g. MailPoet, Contact Form 7, Jetpack) and put its block into the newsletter or contact pattern.
- **Product filters**: add WooCommerce's filter blocks to the Product Catalog template if you have many products.
- **Reviews**: are handled by WooCommerce. Never publish reviews that customers didn't write.

---

## Demo content

The demo recreates the showcase store: 5 categories, 10 products (including a variable product, two
sale items and an out-of-stock item), demo reviews marked "[Demo review]", 9 pages, 4 journal posts
and a menu.

### Option A — throwaway demo in your browser/computer (recommended)

```bash
npm run playground
```

Nothing touches a real site. Close the terminal and it's gone.

### Option B — a fresh local or staging WordPress (e.g. LocalWP)

1. Install and activate WooCommerce and Petal & Form.
2. Copy the repository's `demo/` folder somewhere the site can read (not the public web root of a live site).
3. From the WordPress folder run: `wp eval-file /path/to/demo/seed.php`

### Never on a live store

The seed **refuses to run if any products already exist** and never deletes anything — but it does
change a few settings (site title and tagline, homepage/posts page, WooCommerce "coming soon" mode,
reviews enabled). That's why it's only for fresh sites. To use the look on an existing store, don't
import the demo: activate the theme and insert the patterns you like.

To remove demo content later: every demo item has the hidden field `_petal_and_form_demo`; delete
the demo products, pages, posts and media (they're all named as in the list above).
