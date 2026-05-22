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
7. Confirm China IP blocking applies only to `shop.medivista.co.kr`.

Use `docs/brand-shop-product-import-template.csv` as a draft product import template. Keep imported products unpublished until price, image, stock, shipping, refund, and product copy are confirmed.

## Main Site Separation

The main MEDIVISTA site remains catalog-only. Price, cart, checkout, and payment flow must stay inside this shop theme/site only.
