# MEDIVISTA WordPress Operations

Updated: 2026-06-19

The previous Multisite/subdomain split is discontinued. Operate one WordPress site at `www.medivista.co.kr` with the unified `wp-theme-starter` theme.

## Site Roles

- Corporate and catalog: Home, About, Products, Brands, Blogs, Contact.
- Commerce: Shop, WooCommerce products, Cart, Checkout, My Account.
- Legacy `shop.medivista.co.kr`: do not configure or activate for new work.

## Theme and Plugin

1. Activate `MEDIVISTA Starter`.
2. Install and activate WooCommerce on the same site.
3. Do not activate the legacy `MEDIVISTA Shop` theme.
4. Create Shop, Cart, Checkout, and My Account pages.
5. Keep commerce controls out of corporate and catalog templates.

## Regional Access

- Korean IP visitors may access corporate and catalog pages.
- Korean IP visitors are blocked from Shop/WooCommerce routes.
- Administrators and Shop Managers are exempt.
- A trusted CDN, WAF, host, or GeoIP plugin must provide a country header.
- South Korea is excluded from WooCommerce selling and shipping countries.

## DNS

No shop-subdomain DNS record is required for this implementation. Preserve all Google Workspace MX, TXT, SPF, and verification records.
