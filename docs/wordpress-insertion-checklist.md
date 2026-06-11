# MEDIVISTA WordPress Production Insertion Checklist

Updated: 2026-05-14

## Current Decision

Paid WordPress staging is not part of the MEDIVISTA workflow.

MEDIVISTA uses this direct path:

```text
GitHub Pages final QA -> local/GitHub project backup -> WordPress Multisite direct application -> live QA
```

Continue design, content, SEO, product, and mobile QA on the free GitHub Pages public preview first:

```text
https://keithjeon-web.github.io/medivista/
```

Move directly to the live WordPress Multisite network after the public preview is final and the current project files are preserved locally and on GitHub.

WordPress backup plugins are deferred for now. Local files and GitHub history are the active backup method for MEDIVISTA production files.

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

## Multisite Direct Application Steps

Use these steps when the static public preview is final. There is no staging step.

1. Confirm the current project files exist locally in the MEDIVISTA project root.
2. Confirm the latest deploy checkout has been committed and pushed to GitHub.
3. Confirm `dist/medivista-wp-theme-starter-20260511-wp.zip` and `dist/medivista-wp-pages-20260511.xml` exist locally.
4. Keep the GitHub Pages preview open as the visual reference.
5. Confirm the WordPress network has separate sites for `www.medivista.co.kr` and `shop.medivista.co.kr`.
6. Confirm WordPress.com DNS records are ready for `www.medivista.co.kr` and `shop.medivista.co.kr`.
7. Apply `dist/medivista-wp-theme-starter-20260511-wp.zip` to the main site.
8. Activate `MEDIVISTA Starter` on the main site.
9. Create the required pages manually, or import `dist/medivista-wp-pages-20260511.xml` through Tools > Import > WordPress on the main site.
10. Go to Settings > Reading and set the static front page to Home on the main site.
11. Go to Settings > Permalinks and save the permalink settings once.
12. Configure WooCommerce only on the shop site by following [wordpress-multisite-operations.md](wordpress-multisite-operations.md) and [brand-shop-woocommerce-setup.md](brand-shop-woocommerce-setup.md).
13. Open each live main-site page and verify header, footer, hero, product cards, contact form, world map, social links, and WhatsApp.
14. Open the shop site and verify Shop, Cart, Checkout, My Account, payment test mode, and Brand Shop routing.
15. Confirm Korea IP remains open on the main site and blocked only for non-admin visitors on the shop site.

## Menu Setup

Create a primary menu with this order:

1. ABOUT -> `/about/`
2. PRODUCTS -> `/products/`
3. BRANDS -> `/brands/`
4. BLOGS -> `/blogs/`
5. CONTACT US -> `/contact/`
6. BRAND SHOP -> `https://shop.medivista.co.kr`

## Brand Shop WooCommerce

- MEDIVISTA uses a WordPress Multisite model with `www.medivista.co.kr` for the catalog site and `shop.medivista.co.kr` for WooCommerce.
- WooCommerce payment and checkout belong only on `shop.medivista.co.kr`.
- Keep the main site Brand Shop button linked to `https://shop.medivista.co.kr`.
- Upload `dist/medivista-wp-theme-shop-20260522-wp.zip` to the shop site only.
- Activate `MEDIVISTA Shop` on `shop.medivista.co.kr` only.
- Use [wordpress-multisite-operations.md](wordpress-multisite-operations.md) for the multisite operating model.
- Use [brand-shop-woocommerce-setup.md](brand-shop-woocommerce-setup.md) when configuring WooCommerce pages and payment on the shop WordPress admin.
- Copy the MEDIVISTA theme direction to the shop site, but keep shop behavior product/payment-only instead of inquiry-first catalog behavior.

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
- Confirm Korea IP is not blocked on the main site.
- Confirm Korea IP blocking is configured only for non-admin visitors on the shop site.
- Confirm admin users remain exempt.

## Known Remaining Work

- Native `php -l` still requires PHP CLI in the local or live WordPress application environment. The project fallback structural PHP lint currently passes.
- Confirm final cosmetic product image if the `Cosmetic Line Coming Soon` placeholder should be replaced.
- WordPress backup plugins are intentionally deferred; this workflow preserves production files through the local project folder and GitHub.
