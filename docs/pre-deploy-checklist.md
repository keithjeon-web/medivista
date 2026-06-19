# MEDIVISTA Pre-Deploy Checklist

## Corporate and Catalog

- English-first copy.
- Required product categories remain complete.
- No prices or Add to Cart controls outside Shop/WooCommerce routes.
- No risky medical, clinical, regulatory, or guaranteed-efficacy claims.
- `BRAND SHOP` CTA and shop-subdomain links are removed.

## Integrated Shop

- Internal `/shop/` navigation is present.
- Shop, product, Cart, Checkout, and My Account pages load.
- WooCommerce payment remains in test mode until operational approval.
- Product price, stock, shipping, tax, privacy, terms, refund, and exchange policies are confirmed.
- South Korea is excluded from selling and shipping countries.

## Korean IP

- Trusted GeoIP country header is available.
- Korean visitors are blocked only from Shop/WooCommerce routes.
- Corporate and catalog pages remain accessible.
- Administrator and Shop Manager users are exempt.

## Package and Backup

- Latest `wp-theme-starter.zip` contains integrated Shop files.
- Site files and database are backed up.
- Google Workspace DNS records are unchanged.
