# MEDIVISTA Unified WordPress Insertion Checklist

## Backup

- Back up WordPress files and database.
- Preserve DNS and Google Workspace records.

## Theme

- Upload the latest `wp-theme-starter.zip`.
- Activate `MEDIVISTA Starter`.
- Confirm Home, About, Products, Brands, Blogs, Cellexor, and Contact templates.
- Confirm the header contains `SHOP` and no `BRAND SHOP` CTA.

## WooCommerce

- Install and activate WooCommerce on the same site.
- Create Shop, Cart, Checkout, and My Account pages.
- Confirm the matching theme templates load.
- Import products as drafts.
- Configure USD, payment, coupons, shipping, tax, privacy, terms, refunds, and exchanges.
- Complete a test-mode order before live payment.

## Geo-IP

- Verify a trusted country header reaches WordPress.
- Verify Korean visitors are blocked from Shop, product, Cart, Checkout, and My Account routes.
- Verify Korean visitors can access corporate and catalog pages.
- Verify Administrator and Shop Manager accounts bypass the restriction.
- Verify South Korea is unavailable as a selling and shipping country.

## Final QA

- English-first frontend copy.
- No unverified medical, regulatory, clinical, or guaranteed-efficacy claims.
- No price or Add to Cart controls on corporate/catalog pages.
- Shop functionality works only in WooCommerce routes.
