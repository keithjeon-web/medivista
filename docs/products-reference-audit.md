# Products Reference and Asset Cross-Check

Audit date: 2026-06-21

## Sources

- MEDIVISTA target: `https://medivista.co.kr/products/`
- Layout reference: `https://hjcorporations.kr/241`
- Supplied product sheet: `工作表1 (1).html`
- Supplied finished images: `완성이미지/WebP/`

## Reference Layout

Chrome DevTools MCP identified these reusable layout characteristics:

- white page canvas;
- approximately 1280px content width;
- restrained centered category title;
- three equal square product columns on desktop;
- approximately 22px horizontal gutter;
- product images presented as the primary visual content;
- minimal borders, shadows, and card decoration;
- Montserrat/SUITE-style neutral typography;
- wide vertical separation between category groups.

The reference page code and proprietary platform components were not copied. MEDIVISTA uses an independently implemented layout with the same broad catalog rhythm.

## MEDIVISTA Adaptation

- The main `/products/` route is now a category directory rather than one long all-products page.
- Each category opens a dedicated child route such as `/products/botulinum-toxins/`.
- Search input, reset button, and live result count are preserved inside each category page.
- Desktop product grid changed to three square columns.
- Tablet uses two columns and mobile uses one column.
- Product names remain available below images and continue to support search.
- Prices, cart, checkout, and purchase controls remain excluded.
- Existing English-first category structure remains:
  Botulinum Toxins, Dermal Fillers, Body Fillers, Skin Boosters, Lipolysis, Exosomes, Biostimulators, Hair Treatment, Vitamin Injections, and Cosmetic.

## Category Routes

- `/products/botulinum-toxins/`
- `/products/dermal-fillers/`
- `/products/body-fillers/`
- `/products/skin-boosters/`
- `/products/lipolysis/`
- `/products/exosomes/`
- `/products/biostimulators/`
- `/products/hair-treatment/`
- `/products/vitamin-injections/`
- `/products/cosmetic/`

## Asset and Sheet Review

- The supplied HTML sheet was reviewed for product names, types, specifications, and category grouping.
- `완성이미지/WebP/` contains 114 finished WebP files.
- The active static and WordPress catalogs use 114 prepared WebP assets.
- Existing normalized filenames are retained in the website asset folders to keep generated product URLs stable.
- Product metadata remains in hidden searchable markup even when the layout emphasizes images.

## WordPress Route Recovery

The live `https://medivista.co.kr/products/` URL returned a WordPress 404 during the audit. The theme provisioning list now includes:

- slug: `products`
- template: `page-products.php`

Activating or updating the theme and opening WordPress administration will create or repair the Products page/template assignment and refresh rewrite rules when required.

## Compliance Boundary

- The page remains an inquiry-focused corporate catalog.
- No price, Add to Cart, payment, or checkout control is introduced.
- The supplied sheet's “export only” notes are not automatically published as legal availability statements.
- Product specifications remain catalog reference information subject to market and document confirmation.
