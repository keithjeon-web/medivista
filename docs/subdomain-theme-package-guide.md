# MEDIVISTA Subdomain Theme Package Guide

## Purpose

This guide explains how to apply the main MEDIVISTA theme and the shop subdomain theme from one prepared package.

WordPress can run different themes on different subdomain sites when the install is a Multisite network. The themes share the same filesystem, but each site activates its own theme.

## Prepared Package

Combined package:

```text
dist/medivista-wp-network-themes-20260525.zip
```

ZIP structure:

```text
wp-theme-starter/
wp-theme-shop/
```

This package is for hosting file manager, SFTP, or server-side unzip into:

```text
wp-content/themes/
```

Do not upload this combined ZIP through `Appearance > Themes > Add New`, because that screen expects one theme per ZIP.

## Theme Assignment

```text
www.medivista.co.kr  -> MEDIVISTA Starter / wp-theme-starter
shop.medivista.co.kr -> MEDIVISTA Shop / wp-theme-shop
```

## Network Admin Steps

1. Upload or extract `dist/medivista-wp-network-themes-20260525.zip` into `wp-content/themes/`.
2. Open `Network Admin > Themes`.
3. Network-enable `MEDIVISTA Starter`.
4. Network-enable `MEDIVISTA Shop`.
5. Open the dashboard for `www.medivista.co.kr`.
6. Activate `MEDIVISTA Starter`.
7. Open the dashboard for `shop.medivista.co.kr`.
8. Activate `MEDIVISTA Shop`.
9. Activate WooCommerce only on `shop.medivista.co.kr`.

## Guardrails

- Main site remains catalog-only.
- Main site does not show price, cart, checkout, or payment flow.
- Shop site is the only site with WooCommerce sales flow.
- Brand Shop links from the main site go to `https://shop.medivista.co.kr`.
- Korea IP blocking applies only to the shop site for non-admin visitors, not the main site.
