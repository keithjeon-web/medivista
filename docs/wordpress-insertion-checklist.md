# MEDIVISTA WordPress Production Insertion Checklist

Updated: 2026-05-14

## Current Decision

Paid WordPress staging is not part of the MEDIVISTA workflow.

MEDIVISTA uses this direct path:

```text
GitHub Pages final QA -> live WordPress backup -> direct live WordPress application -> live QA
```

Continue design, content, SEO, product, and mobile QA on the free GitHub Pages public preview first:

```text
https://keithjeon-web.github.io/medivista/
```

Move directly to the live WordPress site after the public preview is final and the current live site is backed up.

## Theme Package

Prepared theme folder:

```text
wp-theme-starter/
```

Upload package target:

```text
dist/medivista-wp-theme-starter-20260511-wp.zip
```

Optional page import file:

```text
dist/medivista-wp-pages-20260511.xml
```

Current readiness snapshot:

- Theme ZIP exists and contains the required WordPress theme files.
- Page import XML parses successfully and contains 7 starter pages.
- Product assets are inserted: 114 final WebP product images are included in both the static site and WordPress starter.
- Product image standard is `1200 x 900 px`, WebP, white-background catalog photography.
- Current asset cache version for the static and WordPress starter build is `20260514c`.

## Required WordPress Pages

Create these WordPress pages before or after activating the theme:

- Home: assign as the static front page.
- About: slug `about`.
- Products: slug `products`.
- Brands: slug `brands`.
- Blogs: slug `blogs`.
- Cellexor: slug `cellexor`.
- Contact: slug `contact`.

Alternative: import `dist/medivista-wp-pages-20260511.xml` from Tools > Import > WordPress to create these starter pages automatically.

The theme includes matching templates:

- `front-page.php`
- `page-about.php`
- `page-products.php`
- `page-brands.php`
- `page-blogs.php`
- `page-cellexor.php`
- `page-contact.php`

## Direct Live WordPress Application Steps

Use these steps when the static public preview is final. There is no staging step.

1. Back up the current live WordPress site and database.
2. Keep the GitHub Pages preview open as the visual reference.
3. In live WordPress admin, go to Appearance > Themes > Add New > Upload Theme.
4. Upload `dist/medivista-wp-theme-starter-20260511-wp.zip`.
5. Activate `MEDIVISTA Starter`.
6. Create the required pages manually, or import `dist/medivista-wp-pages-20260511.xml` through Tools > Import > WordPress.
7. Go to Settings > Reading and set the static front page to Home.
8. Go to Settings > Permalinks and save the permalink settings once.
9. Open each live page and verify header, footer, hero, product cards, contact form, world map, social links, and WhatsApp.

## Menu Setup

Create a primary menu with this order:

1. ABOUT -> `/about/`
2. PRODUCTS -> `/products/`
3. BRANDS -> `/brands/`
4. BLOGS -> `/blogs/`
5. CONTACT US -> `/contact/`
6. BRAND SHOP -> `https://shop.medivista.co.kr`

## Safety Checks

- Main website remains catalog-only.
- No prices are displayed.
- No cart, checkout, payment, or Add to Cart flow is present.
- Brand Shop links route to `https://shop.medivista.co.kr`.
- WhatsApp links use `+82 10 5906 6768`.
- Product images are inserted for 114 ready catalog items.
- `Cosmetic Line Coming Soon` remains the only expected pending placeholder.
- Instagram and Facebook icons link to the official MEDIVISTA social channels.

## Free Public Preview QA

- Use GitHub Pages as the client-review preview before direct live WordPress application.
- Verify Home, Products, About, Brands, Blogs, Cellexor, and Contact from `https://keithjeon-web.github.io/medivista/`.
- Verify the header logo at 100% browser zoom on desktop and mobile.
- Verify Products desktop grid, Products mobile 1-column card rhythm, and product image whitespace.
- Verify Home Global Network world map and the mobile zone labels.
- Verify Contact form fields and WhatsApp inquiry handoff.
- Confirm Brand Shop opens `https://shop.medivista.co.kr`.
- Confirm SEO/AEO blocks on Home and Products remain visible and English-first.

## Known Remaining Work

- Native `php -l` still requires PHP CLI in the local or live WordPress application environment. The project fallback structural PHP lint currently passes.
- Confirm final cosmetic product image if the `Cosmetic Line Coming Soon` placeholder should be replaced.
