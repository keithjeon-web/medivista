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

## Brand Shop WooCommerce

- WooCommerce is configured on `shop.medivista.co.kr`, not the main catalog site.
- Brand Shop button remains `https://shop.medivista.co.kr`.
- WooCommerce-created Shop, Cart, Checkout, and My Account pages remain on the shop subdomain.
- Follow `docs/brand-shop-woocommerce-setup.md` before enabling live payment.
