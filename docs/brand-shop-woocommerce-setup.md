# MEDIVISTA Integrated Shop WooCommerce Setup

Updated: 2026-06-19

## Scope

MEDIVISTA now uses one WordPress site and one active theme:

```text
https://www.medivista.co.kr
wp-theme-starter/
```

The former separate shop-site plan is discontinued. WooCommerce runs inside the existing theme through `/shop/` and its related product, Cart, Checkout, and My Account routes.

Corporate, PRODUCTS, BRANDS, BLOGS, and CONTACT pages remain inquiry-focused. Commerce UI belongs only to the Shop/WooCommerce area.

## Setup

1. Back up the current WordPress site and database.
2. Upload and activate the latest `wp-theme-starter.zip`.
3. Install and activate WooCommerce on the MEDIVISTA site.
4. Let WooCommerce create Shop, Cart, Checkout, and My Account pages.
5. Confirm their slugs are `/shop/`, `/cart/`, `/checkout/`, and `/my-account/`.
6. Configure USD currency, payment gateway, tax, shipping, privacy, terms, refund, and exchange policies.
7. Keep payment gateways in test mode until a complete test order succeeds.
8. Import products from `docs/brand-shop-product-import-template.csv` or the CELLEXOR launch CSV.
9. Confirm the site or CDN provides a trusted country header such as `CF-IPCountry`.
10. Test the Korean IP restriction and administrator/Shop Manager exemptions.

## Korean IP Policy

- Korean IP visitors may access corporate and catalog pages.
- Korean IP visitors receive HTTP 403 on Shop/WooCommerce routes.
- Administrators and Shop Managers are exempt.
- South Korea is excluded from WooCommerce selling and shipping countries.
- WordPress core cannot detect countries by itself; a CDN, WAF, host, or GeoIP plugin must provide the country code.

## Required Checks

- `BRAND SHOP` CTA is removed.
- Main navigation contains the internal `SHOP` category.
- Shop, product, Cart, Checkout, and My Account pages load outside Korea.
- Corporate and catalog pages show no price or Add to Cart controls.
- Korean IP users cannot enter the commerce area.
- Admin and Shop Manager users can manage and test the Shop from Korea.
- Live payment remains disabled until payment, shipping, tax, privacy, terms, and refund policies are approved.
