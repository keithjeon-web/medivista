# MEDIVISTA Integrated Shop Live Application Steps

Target:

```text
https://www.medivista.co.kr/shop/
```

## Prepared Files

- Unified theme: `wp-theme-starter.zip`
- Draft products: `docs/brand-shop-product-import-template.csv`
- CELLEXOR launch product: `docs/brand-shop-cellexor-retone-woocommerce-import.csv`

The separate `wp-theme-shop` package is legacy and must not be activated for new work.

## WordPress Setup

1. Back up the live site and database.
2. Upload and activate the unified `wp-theme-starter` package.
3. Install and activate WooCommerce.
4. Create or verify Shop, Cart, Checkout, and My Account pages.
5. Confirm the main navigation shows `SHOP`, not `BRAND SHOP`.
6. Import products as drafts.
7. Configure payment, shipping, tax, coupon, privacy, terms, refund, and exchange settings.
8. Complete a test-mode order.

## Geo-IP QA

1. Confirm a trusted country header reaches WordPress.
2. Test a Korean visitor against `/shop/`, a WooCommerce product, `/cart/`, `/checkout/`, and `/my-account/`; each must be blocked.
3. Confirm the same Korean visitor can access Home, About, Products, Brands, Blogs, and Contact.
4. Confirm Administrator and Shop Manager accounts bypass the restriction.
5. Confirm South Korea is unavailable as a selling or shipping country.

## Release Guardrails

- Do not add commerce controls to corporate or catalog templates.
- Do not enable live payment until legal and operational policies are final.
- Keep English-first public copy.
- Avoid unverified medical, clinical, regulatory, or guaranteed-efficacy claims.
