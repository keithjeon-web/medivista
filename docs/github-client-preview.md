# MEDIVISTA GitHub Client Preview Linkage

> The GitHub Pages build remains a static corporate/catalog preview. Live WooCommerce Shop functionality is integrated into `wp-theme-starter` on WordPress and is not represented by the static preview.

Updated: 2026-05-07
Codex thread: 019df785-5622-7b60-b0ca-a6fcd4a9b739
GitHub repository: https://github.com/keithjeon-web/medivista
Default branch: medivista

## Current Local Preview

Local server URL:

```text
http://127.0.0.1:4173/index.html
```

The local static preview is the current working build for the MEDIVISTA B2B catalog website.

## Public Client Preview Target

Recommended public preview URL after GitHub Pages is enabled:

```text
https://keithjeon-web.github.io/medivista/
```

GitHub Pages source should be set to:

```text
Branch: gh-pages
Folder: /
```

## Deployment Notes

- Main website remains catalog-only.
- No prices, cart, checkout, or payment flow should be added to the main website.
- Brand Shop should continue to route to https://shop.medivista.co.kr.
- English-first page copy should be preserved.
- Product images are prepared for later insertion under assets/images/products/.

## Current Blocker

This local folder is not currently a Git checkout and the desktop shell does not expose `git` or `gh`, so the full local site cannot be pushed through the normal branch/commit/PR workflow from this folder yet.

Next practical options:

1. Install or expose Git/GitHub CLI locally, then push this folder to `keithjeon-web/medivista`.
2. Re-clone `https://github.com/keithjeon-web/medivista.git` into a Git-enabled folder and copy the current static files into that checkout.
3. Use GitHub Pages with a `gh-pages` branch once the current static files are committed.
