# MEDIVISTA WordPress Insertion Checklist

Updated: 2026-05-13

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

## Upload Steps

1. In WordPress admin, go to Appearance > Themes > Add New > Upload Theme.
2. Upload `dist/medivista-wp-theme-starter-20260511-wp.zip`.
3. Activate `MEDIVISTA Starter`.
4. Create the required pages manually, or import `dist/medivista-wp-pages-20260511.xml` through Tools > Import > WordPress.
5. Go to Settings > Reading and set the static front page to Home.
6. Go to Settings > Permalinks and save the permalink settings once.
7. Open each page and verify header, footer, hero, product cards, contact form, and world map.

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

## Staging QA

- Upload and activate `dist/medivista-wp-theme-starter-20260511-wp.zip` on a staging WordPress site.
- Import `dist/medivista-wp-pages-20260511.xml`, or manually create the 7 required pages with the listed slugs.
- Assign Home as the static front page in Settings > Reading.
- Save Settings > Permalinks once after page setup.
- Verify the header logo at 100% browser zoom on desktop and mobile.
- Verify Products desktop grid, Products mobile 1-column card rhythm, and product image whitespace.
- Verify Home Global Network world map and the mobile zone labels.
- Verify Contact form fields and WhatsApp inquiry handoff.
- Confirm Brand Shop opens `https://shop.medivista.co.kr`.

## Known Remaining Work

- Native `php -l` still requires PHP CLI in the staging/local environment. The project fallback structural PHP lint currently passes.
- Confirm final cosmetic product image if the `Cosmetic Line Coming Soon` placeholder should be replaced.
