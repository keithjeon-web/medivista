# MEDIVISTA WordPress Insertion Checklist

Updated: 2026-05-11

## Theme Package

Prepared theme folder:

```text
wp-theme-starter/
```

Upload package target:

```text
dist/medivista-wp-theme-starter-20260511-wp.zip
```

## Required WordPress Pages

Create these WordPress pages before or after activating the theme:

- Home: assign as the static front page.
- About: slug `about`.
- Products: slug `products`.
- Brands: slug `brands`.
- Blogs: slug `blogs`.
- Cellexor: slug `cellexor`.
- Contact: slug `contact`.

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
4. Go to Settings > Reading and set the static front page to Home.
5. Create or confirm the page slugs listed above.
6. Open each page and verify header, footer, hero, product cards, contact form, and world map.

## Safety Checks

- Main website remains catalog-only.
- No prices are displayed.
- No cart, checkout, payment, or Add to Cart flow is present.
- Brand Shop links route to `https://shop.medivista.co.kr`.
- WhatsApp links use `+82 10 5906 6768`.
- Product images remain placeholders until final 1200 x 900 px WebP files are inserted.
- Instagram and Facebook icons stay disabled until official URLs are confirmed.

## Known Remaining Work

- Run PHP syntax checks in a local/hosting environment with PHP installed.
- Insert final product images in `wp-theme-starter/assets/images/products/`.
- Test responsive header, product filter, world map, and contact form in the actual WordPress environment.
