# MEDIVISTA WordPress Starter Theme

This folder is a WordPress starter theme for the MEDIVISTA global B2B catalog website.

Recommended upload package:

```text
dist/medivista-wp-theme-starter-20260511-wp.zip
```

## Upload Readiness

- Main site remains catalog-only.
- No price, cart, checkout, payment, or Add to Cart flow is included.
- Brand Shop links route to `https://shop.medivista.co.kr`.
- WhatsApp inquiry is connected in `assets/js/main.js`.
- Header uses `assets/images/medivista_logo_header.png`.
- Product images are inserted for 114 ready catalog items as 1200 x 900 px WebP assets.
- `Cosmetic Line Coming Soon` remains the only expected pending placeholder.

## Expected WordPress Pages

Create pages with these slugs so WordPress can load the matching templates:

- Home: set a static front page, uses `front-page.php`
- About: `/about/`, uses `page-about.php`
- Products: `/products/`, uses `page-products.php`
- Brands: `/brands/`, uses `page-brands.php`
- Blogs: `/blogs/`, uses `page-blogs.php`
- Cellexor: `/cellexor/`, uses `page-cellexor.php`
- Contact: `/contact/`, uses `page-contact.php`

## Before Production

- Confirm Instagram and Facebook URLs before turning icons into links.
- Run native PHP syntax checks in the hosting or local WordPress environment when PHP CLI is available.
- Verify PC/mobile header, product filters, world map, and contact form.
