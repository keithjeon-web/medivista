# MEDIVISTA WordPress Multisite Operations

Updated: 2026-05-14

## Operating Model

MEDIVISTA uses one WordPress Multisite network with separated site roles:

```text
www.medivista.co.kr   -> Main B2B catalog site
shop.medivista.co.kr  -> Brand Shop / WooCommerce site
```

The main site stays catalog-only. The shop site handles CELLEXOR and own-brand WooCommerce sales.

## Site Roles

### Main Site

Domain:

```text
www.medivista.co.kr
```

Role:

- Company profile
- English-first B2B catalog
- Product inquiry
- Global Network
- Contact and WhatsApp inquiry
- Brand Shop button routing to the shop site

Do not add prices, cart, checkout, payment, or Add to Cart on the main site.

### Shop Site

Domain:

```text
shop.medivista.co.kr
```

Role:

- CELLEXOR and own-brand product sales
- WooCommerce Shop, Cart, Checkout, and My Account pages
- Payment gateway setup
- Order/customer management
- Shipping, refund, privacy, and terms policies

## Multisite Plugin Policy

- Install WooCommerce from the Network Admin plugin screen if using Multisite plugin management.
- Activate WooCommerce only on `shop.medivista.co.kr`.
- Do not activate WooCommerce features on `www.medivista.co.kr`.
- Keep MEDIVISTA main-site theme files separate from shop-specific checkout styling.

## Navigation Policy

Main site Brand Shop button:

```text
https://shop.medivista.co.kr
```

Recommended target remains the shop landing page, not the checkout page.

Shop checkout target after WooCommerce setup:

```text
https://shop.medivista.co.kr/checkout/
```

## Backup Policy

WordPress backup plugins are deferred for now.

Active project backup method:

- Local MEDIVISTA project folder
- GitHub deployment history
- Generated WordPress ZIP/XML files in `dist/`

This preserves MEDIVISTA production files. WordPress database backup plugins can be added later if the operating policy changes.

## Setup Checklist

1. Confirm WordPress Multisite is available for the MEDIVISTA WordPress install.
2. Create or map the main site to `www.medivista.co.kr`.
3. Create or map the shop site to `shop.medivista.co.kr`.
4. Apply the MEDIVISTA Starter theme to the main site.
5. Keep the main site catalog-only.
6. Install WooCommerce through Network Admin or the shop site plugin screen.
7. Activate WooCommerce on the shop site only.
8. Let WooCommerce create Shop, Cart, Checkout, and My Account pages on the shop site.
9. Configure payment, shipping, tax, refund, privacy, and terms settings on the shop site.
10. Test the shop checkout flow before enabling live payments.
11. Verify the main site Brand Shop button opens `https://shop.medivista.co.kr`.

## Safety Checks

- Main site has no price/cart/checkout/payment UI.
- WooCommerce checkout exists only on the shop site.
- Brand Shop button points to the shop subdomain.
- Local/GitHub project backup is current before direct WordPress changes.
