# MEDIVISTA Brand Shop WooCommerce Setup

Updated: 2026-06-11

## Scope

Brand Shop sales and payment must run on the shop site inside the MEDIVISTA WordPress Multisite network:

```text
https://shop.medivista.co.kr
```

The main MEDIVISTA website stays catalog-only. Do not add prices, cart, checkout, payment, or Add to Cart on `www.medivista.co.kr`.

Follow [wordpress-multisite-operations.md](wordpress-multisite-operations.md) for the domain-role split between the main site and shop site.

For the short live-application checklist, use [brand-shop-live-application-steps.md](brand-shop-live-application-steps.md).

## Direct Setup Flow

Use this flow when the shop WordPress admin is available.

1. Confirm the main site Brand Shop button opens `https://shop.medivista.co.kr`.
2. Log in to the WordPress Multisite admin.
3. Confirm the shop site is mapped to `shop.medivista.co.kr`.
4. Upload `dist/medivista-wp-theme-shop-20260522-wp.zip` to the shop site.
5. Activate the `MEDIVISTA Shop` theme on `shop.medivista.co.kr` only.
6. Install WooCommerce from Network Admin or from the shop site plugin screen.
7. Activate WooCommerce on the shop site only.
8. Run the WooCommerce setup wizard on the shop site.
9. Let WooCommerce create these pages on the shop site:
   - Shop
   - Cart
   - Checkout
   - My Account
10. Set currency, store country, tax/shipping policy, and payment method.
11. Add CELLEXOR or own-brand products only after product names, images, price policy, and shipping/payment policy are confirmed.
12. Test the checkout page with a safe test payment mode before accepting live payments.
13. Keep the main site Brand Shop URL as `https://shop.medivista.co.kr`.
14. Confirm the shop site blocks Korea IP traffic for non-admin visitors through the available hosting/CDN/security layer.
15. Follow [brand-shop-wordpress-admin-manual-ko.md](brand-shop-wordpress-admin-manual-ko.md) for the Korean WordPress-admin-only operating manual.

## Prepared Shop Theme Package

Theme source:

```text
wp-theme-shop/
```

Upload package:

```text
dist/medivista-wp-theme-shop-20260522-wp.zip
```

Included commerce templates:

```text
front-page.php
woocommerce.php
page-shop.php
page-cart.php
page-checkout.php
page-my-account.php
```

The theme supports WooCommerce gallery features, product grids, cart, checkout, and account pages. If WooCommerce is not active, the theme shows a safe setup notice instead of failing.

## Draft Product Import Template

Draft import template:

```text
docs/brand-shop-product-import-template.csv
```

The template keeps `Published` as `0` and leaves price blank. It now includes all 114 product rows generated from `완성이미지\WebP`, with image URLs pointing to:

```text
https://shop.medivista.co.kr/wp-content/themes/wp-theme-shop/assets/images/products/{product-slug}.webp
```

Fill confirmed price, stock, shipping class, refund policy, and compliant product copy before publishing any product.

CELLEXOR Re:Tone launch package import:

```text
docs/brand-shop-cellexor-retone-woocommerce-import.csv
```

Launch package pricing:

- 1 Set small box / inner box: regular USD 120, sale USD 99.90.
- 5 Set large box / outer box: regular USD 500, sale USD 489.80.

Recommended WooCommerce setup:

- Currency: USD.
- First transaction coupon: `FIRST10`, percentage discount `10`, usage limit per user `1`.
- Shipping: free shipping for orders over USD 300; flat rate USD 50 below USD 300.
- B2B / bulk orders: route to WhatsApp inquiry.

## Payment Page Target

WooCommerce normally creates the checkout page here:

```text
https://shop.medivista.co.kr/checkout/
```

Do not link the main navigation directly to `/checkout/` unless the user explicitly decides to bypass the shop landing page. The recommended Brand Shop button destination remains:

```text
https://shop.medivista.co.kr
```

## Required Decisions Before Live Payment

- Payment gateway: domestic card, bank transfer, PayPal, Stripe, or another provider.
- Business and tax display policy.
- Shipping region and shipping fee policy.
- Refund/exchange policy.
- Privacy policy and terms page.
- Product price and stock policy.
- Korean/English language handling for the shop.

## Safety Checks

- Main site has no price/cart/checkout/payment UI.
- Brand Shop button points only to the shop subdomain.
- WooCommerce checkout exists only on `shop.medivista.co.kr`.
- WooCommerce is not activated for the main catalog site.
- Korea IP is blocked on the shop site only, with admin users exempt.
- Test order flow is checked before live payment is enabled.
- Local/GitHub MEDIVISTA production files remain preserved before direct WordPress changes.
