# MEDIVISTA Brand Shop WooCommerce Setup

Updated: 2026-05-14

## Scope

Brand Shop sales and payment must run on the shop site inside the MEDIVISTA WordPress Multisite network:

```text
https://shop.medivista.co.kr
```

The main MEDIVISTA website stays catalog-only. Do not add prices, cart, checkout, payment, or Add to Cart on `www.medivista.co.kr`.

Follow [wordpress-multisite-operations.md](wordpress-multisite-operations.md) for the domain-role split between the main site and shop site.

## Direct Setup Flow

Use this flow when the shop WordPress admin is available.

1. Confirm the main site Brand Shop button opens `https://shop.medivista.co.kr`.
2. Log in to the WordPress Multisite admin.
3. Confirm the shop site is mapped to `shop.medivista.co.kr`.
4. Install WooCommerce from Network Admin or from the shop site plugin screen.
5. Activate WooCommerce on the shop site only.
6. Run the WooCommerce setup wizard on the shop site.
7. Let WooCommerce create these pages on the shop site:
   - Shop
   - Cart
   - Checkout
   - My Account
8. Set currency, store country, tax/shipping policy, and payment method.
9. Add CELLEXOR or own-brand products only after product names, images, price policy, and shipping/payment policy are confirmed.
10. Test the checkout page with a safe test payment mode before accepting live payments.
11. Keep the main site Brand Shop URL as `https://shop.medivista.co.kr`.

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
- Test order flow is checked before live payment is enabled.
- Local/GitHub MEDIVISTA production files remain preserved before direct WordPress changes.
