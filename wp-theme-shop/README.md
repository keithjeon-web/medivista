# MEDIVISTA Shop Theme

Use this theme only on:

```text
shop.medivista.co.kr
```

This theme is prepared for the Brand Shop / WooCommerce site in the MEDIVISTA WordPress Multisite network.

## Required Plugin

- WooCommerce

Activate WooCommerce on the shop site only. Do not activate WooCommerce for the main catalog site at `www.medivista.co.kr`.

## Required WooCommerce Pages

Let WooCommerce create:

- Shop
- Cart
- Checkout
- My Account

The theme also includes page templates for these slugs:

- `page-shop.php`
- `page-cart.php`
- `page-checkout.php`
- `page-my-account.php`

## Setup Order

1. Upload and activate `MEDIVISTA Shop` on `shop.medivista.co.kr`.
2. Activate WooCommerce on the shop site only.
3. Run the WooCommerce setup wizard.
4. Create/import CELLEXOR or own-brand products.
5. Configure payment gateway, tax, shipping, privacy, terms, refund, and exchange policy.
6. Enable test payment mode and complete a test order.
7. Confirm Korea IP blocking applies only to `shop.medivista.co.kr`, with admin users exempt.

Use `docs/brand-shop-product-import-template.csv` as a draft product import template. Keep imported products unpublished until price, image, stock, shipping, refund, and product copy are confirmed.

For the CELLEXOR Re:Tone launch packages, use:

```text
docs/brand-shop-cellexor-retone-woocommerce-import.csv
```

Configured launch package policy:

- 1 Set small box / inner box: regular USD 120, sale USD 99.90.
- 5 Set large box / outer box: regular USD 500, sale USD 489.80.
- First transaction coupon: 10% discount.
- International shipping: free over USD 300; USD 50 below USD 300.
- B2B / bulk orders: WhatsApp inquiry.

The first draft product image is bundled at:

```text
wp-theme-shop/assets/images/products/cellexor-re-tone.webp
```

After the theme is active on `shop.medivista.co.kr`, the CSV image URL points to:

```text
https://shop.medivista.co.kr/wp-content/themes/wp-theme-shop/assets/images/products/cellexor-re-tone.webp
```

## Main Site Separation

The main MEDIVISTA site remains catalog-only. Price, cart, checkout, and payment flow must stay inside this shop theme/site only.

## Shop Access Control

The theme includes `inc/access-control.php`, which blocks visitors with country code `KR` when a CDN, WAF, host, or security plugin provides a country header such as `CF-IPCountry`. WordPress core alone cannot identify a visitor country without one of those GeoIP sources.

Administrators with `manage_options`, `/wp-admin/`, `/wp-login.php`, AJAX, and cron are exempt so the admin account can still manage the shop.
