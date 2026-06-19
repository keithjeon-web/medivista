# MEDIVISTA WordPress Starter Theme

This folder is the unified WordPress theme for the MEDIVISTA corporate website, product catalog, and WooCommerce Shop.

Recommended upload package:

```text
wp-theme-starter.zip
```

Optional starter page import:

```text
dist/medivista-wp-pages-20260511.xml
```

## Upload Readiness

- Corporate and catalog pages remain inquiry-focused.
- Price, Add to Cart, Cart, Checkout, account, and payment flows are limited to the integrated Shop/WooCommerce routes.
- A separate `shop.medivista.co.kr` site or theme is not required.
- Instagram and Facebook icons link to the official MEDIVISTA social channels.
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
- Shop: `/shop/`, uses `page-shop.php`
- Cart: `/cart/`, uses `page-cart.php`
- Checkout: `/checkout/`, uses `page-checkout.php`
- My Account: `/my-account/`, uses `page-my-account.php`

You may create these pages manually or import the starter WXR file listed above.

## Shop Access Policy

- Install and activate WooCommerce on the main MEDIVISTA WordPress site.
- Korean IP visitors are blocked from Shop/WooCommerce routes when the host, CDN, WAF, or GeoIP plugin provides a trusted country header.
- Administrators and Shop Managers are exempt.
- Corporate and catalog pages remain available to Korean IP visitors.
- South Korea is removed from WooCommerce selling and shipping countries.

## Before Production

- Run native PHP syntax checks in the hosting or local WordPress environment when PHP CLI is available.
- Verify PC/mobile header, product filters, world map, and contact form.
