# MEDIVISTA Brand Shop Live Application Steps

Target site:

```text
shop.medivista.co.kr
```

Use this checklist after the GitHub Pages/deploy checkout is synced and the local package exists.

## Prepared Files

Theme ZIP:

```text
dist/medivista-wp-theme-shop-20260522-wp.zip
```

Combined Multisite theme package:

```text
dist/medivista-wp-network-themes-20260525.zip
```

Use the combined package only when extracting through hosting file manager, SFTP, or server-side unzip into `wp-content/themes/`. For WordPress admin theme upload, upload the single theme ZIPs separately.

Draft product CSV:

```text
docs/brand-shop-product-import-template.csv
```

Bundled product images:

```text
wp-theme-shop/assets/images/products/
```

The shop theme currently includes the full `완성이미지\WebP` product image set: 114 WebP files.

## Multisite Setup

1. Log in to WordPress Network Admin.
2. Confirm `shop.medivista.co.kr` exists as a separate site.
3. Confirm `www.medivista.co.kr` remains the main catalog site.
4. Confirm DNS/subdomain mapping is complete for `shop.medivista.co.kr`.
5. If using the combined package, extract `dist/medivista-wp-network-themes-20260525.zip` into `wp-content/themes/`.
6. Network-enable both `MEDIVISTA Starter` and `MEDIVISTA Shop`.
7. Activate `MEDIVISTA Starter` inside the main `www.medivista.co.kr` site dashboard.
8. Activate `MEDIVISTA Shop` only inside the shop site dashboard.

## WooCommerce Setup

1. Install WooCommerce from Network Admin or the shop site plugin screen.
2. Activate WooCommerce only on `shop.medivista.co.kr`.
3. Let WooCommerce create:
   - Shop
   - Cart
   - Checkout
   - My Account
4. Set currency, store country, tax policy, shipping policy, and payment method.
5. Keep payment gateway in test mode first.

## Product Setup

1. Import `docs/brand-shop-product-import-template.csv`.
2. Keep imported products unpublished first because `Published` is `0`.
3. Confirm product images load from the shop theme asset URLs.
4. Fill confirmed price, stock, shipping, refund, privacy, terms, and compliant copy.
5. Publish only after product pages and checkout flow are reviewed.

## Test Order QA

1. Add the CELLEXOR draft product to cart.
2. Open Cart and verify product image, quantity, and totals.
3. Open Checkout and verify billing/shipping fields.
4. Complete a test-mode payment.
5. Confirm order appears in WooCommerce > Orders.
6. Confirm customer email/order email behavior.
7. Disable test mode only after payment, refund, shipping, tax, and policy pages are final.

## Access Policy

- Do not block Korea IP traffic on `www.medivista.co.kr`.
- Block Korea IP traffic only on `shop.medivista.co.kr` for non-admin visitors.
- Keep admin users exempt so the shop can still be managed from Korea.
- DNS alone does not block countries. Use the available hosting, CDN, WAF, security plugin, or WordPress.com/host-level controls.

## Guardrails

- Main site keeps no price, cart, checkout, payment, or Add to Cart UI.
- Brand Shop button on the main site remains `https://shop.medivista.co.kr`.
- WooCommerce stays active only on the shop site.
