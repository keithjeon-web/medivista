# MEDIVISTA Pre-Deploy Checklist

## Catalog Rules

- Main site remains catalog-only.
- No prices, cart, checkout, or payment flow on the main site.
- Brand Shop links point to `https://shop.medivista.co.kr`.
- Product CTAs use inquiry or WhatsApp only.

## Product Images

- Product files live in `assets/images/products/`.
- Required image spec is `1200x900px / WebP / white background`.
- File names must match `assets/data/product-image-manifest.csv`.
- After inserting product images, run:

```powershell
.\tools\sync-product-image-status.ps1 -Apply
```

## SEO And Sharing

- Each static page has title, description, canonical, OG title, OG description, OG URL, and OG image.
- Shared OG image path is `assets/images/og-medivista.png`.
- Confirm Instagram and Facebook icons open the official MEDIVISTA social channels.

## Device QA

- Desktop home, products, brands, CELLEXOR, contact pages.
- Mobile header menu, product search/filter, contact form, footer, and floating WhatsApp button.
- Product card text wrapping and 4:3 image frames.
- Global Network map fallback and dark section layout.

## Final Upload

- Upload static files or move the WordPress starter into the active theme workflow.
- Confirm HTTPS, `www.medivista.co.kr`, and Brand Shop subdomain routing.
- Recheck WhatsApp number: `+82 10 5906 6768`.
- If using WordPress Multisite, confirm the main site and shop site are separated before applying WooCommerce.

## Brand Shop WooCommerce

- WooCommerce is configured on the Multisite shop site `shop.medivista.co.kr`, not the main catalog site.
- Brand Shop button remains `https://shop.medivista.co.kr`.
- WooCommerce-created Shop, Cart, Checkout, and My Account pages remain on the shop subdomain.
- WooCommerce is not activated for the main `www.medivista.co.kr` catalog site.
- Follow `docs/wordpress-multisite-operations.md` for the site-role split.
- Follow `docs/brand-shop-woocommerce-setup.md` before enabling live payment.

## Whois DNS / Multisite Domain Check

- Whois nameserver is the DNS management baseline.
- Confirm explicit DNS records exist for `www.medivista.co.kr` and `shop.medivista.co.kr`.
- Use wildcard `*.medivista.co.kr` only if many arbitrary subdomain sites will be created.
- Confirm SSL covers both `www.medivista.co.kr` and `shop.medivista.co.kr`.
- Do not change DNS, MX, TXT, or Google Workspace records without explicit confirmation.
