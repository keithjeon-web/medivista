# MEDIVISTA Product Image Guide

Use this folder for product catalog images.

- Required size: 1200 x 900 px
- Ratio: 4:3
- Format: WebP
- Background: white
- Product placement: centered with 8-12% margin
- File names: lowercase English, hyphen-separated, matching `assets/data/product-image-manifest.csv`

Current product cards already include `data-image` paths and `data-image-status="pending"`.

```html
<div class="product-image" data-image="../assets/images/products/innotox-50units.webp" data-image-status="pending"></div>
```

When the final WebP file is inserted, change that card to:

```html
<div class="product-image" data-image="../assets/images/products/innotox-50units.webp" data-image-status="ready"></div>
```

Or run this helper after inserting product WebP files:

```powershell
.\tools\sync-product-image-status.ps1 -Apply
```

If PowerShell blocks local script execution, use:

```powershell
powershell -ExecutionPolicy Bypass -File .\tools\sync-product-image-status.ps1 -Apply
```

The page keeps a fixed 4:3 frame and uses `object-fit: contain`, so tall vials, boxes, ampoules, and syringes will not be cropped.
