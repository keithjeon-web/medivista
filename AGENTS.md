# MEDIVISTA Codex Instructions

## Project Overview

This repository is for the MEDIVISTA global medical aesthetic B2B website.

The website has two separated roles:

- Main domain: www.medivista.co.kr
- Shop subdomain: shop.medivista.co.kr

The main domain is a B2B company website and product catalog.
The shop subdomain is for CELLEXOR and own-brand WooCommerce sales.

## Core Rules

- Main website must be catalog-only.
- Do not add prices on the main website.
- Do not add Add to Cart on the main website.
- Do not add Cart page on the main website.
- Do not add Checkout on the main website.
- Do not add payment flow on the main website.
- Use inquiry-focused CTAs only.
- Frontend copy must be English-first.
- Do not use unverified medical, clinical, FDA, KFDA, or guaranteed efficacy claims.

## Design Direction

Use the following visual direction:

- Premium global B2B
- Medical aesthetic
- Clean corporate layout
- White + Sky Blue #2A9BD4 + Gold #C9A84C
- Segoe UI / system-ui
- Spacious layout
- Professional and trustworthy tone

Use logo as an image tag:

```html
<img src="medivista_logo_gold.png" alt="MEDIVISTA">
```

## Main Navigation

Use this header structure:

```text
ABOUT
PRODUCTS
BRANDS
BLOGS
CONTACT US
BRAND SHOP
Language
Instagram
Facebook
```

ABOUT dropdown:

```text
Introduction
CEO Message
Vision & Mission
Global Network
```

PRODUCTS dropdown:

```text
Botulinum Toxins
Dermal Fillers
Body Fillers
Skin Boosters
Lipolysis
Exosomes
Biostimulators
Hair Treatment
Others
```

BRANDS dropdown:

```text
Cellexor Re:Tone
```

## Page Requirements

### Home

Build in this order:

```text
Hero Banner
Popular Products
Global Network
Partners
Core Values
Inquiry CTA
Footer
```

Core values:

```text
TECHNOLOGY
TRUST
QUALITY
BEAUTY
```

### About

Use:

```text
Full-width banner
Horizontal subtab menu
CEO Message
Introduction
Vision & Mission
Global Network
Contact Us
```

### Products

Use:

```text
Full-width category banner
Horizontal category tabs
Product card grid
Product image
Product name
WhatsApp inquiry button
No payment function
```

### Brands

Use:

```text
CELLEXOR
Cellular Reverse Aging Pioneer
Glow Beyond Expectations
Brand Philosophy
Brand Story
Core Technology
Synergy Science
Product Philosophy
Brand Promise
Product CTA
```

### Blogs

Use:

```text
Full-width banner
4-column blog card grid
Thumbnail image
Title
```

### Contact

Use:

```text
Full-width banner
Two-column layout
Inquiry form
Privacy agreement
Submit button
```

Contact form fields:

```text
First Name *
Email *
Contact Number *
Select Country *
Business Type
Product Type
Privacy Agreement Checkbox
Submit Button
```

## Initial Product Names

### Botulinum Toxins

```text
Botulax
Liztox
Innotox
Hutox
Nabota
Coretox
```

### Dermal Fillers

```text
The Chaeum
Revolax Sub-Q
Revolax Deep
Revolax Fine
Dermalax Implant
Dermalax Deep
Dermalax Plus
Elravie Ultra Volume
Elravie Deep Line
Elravie Light
```

### Skin Boosters

```text
Rejuran Healer
Rejuran S
Rejuran i
Rejuran HB
```

### Vitamin Injections

```text
Guthione 1200mg
Vitamin C 500mg
Jeil High-B
Hishiphagenc
```

### Own Brand

```text
Cellexor Re:Tone
```

## Common Features

- Product pages may include WhatsApp inquiry buttons.
- Main website must not include payment or purchase functions.
- Show Korean pharmaceutical law notice for Korean IP users if implemented.
- Keep Instagram and Facebook icons link-ready.
- Keep language switch structure EN-first and KO-ready.
- Brand Shop must link to [https://shop.medivista.co.kr](https://shop.medivista.co.kr).

## Compliance Rules

Avoid these expressions unless verified evidence is provided:

```text
FDA certified
KFDA certified
Clinically proven
Immediate effect
Treatment
Cure
Guaranteed
100% effective
DNA repair
Reverse aging as a medical claim
Cell regeneration as a guaranteed effect
```

Use safer language:

```text
Supports
Helps improve
Designed for
Formulated with
Professional aesthetic solution
Advanced beauty science
Clean & Safe approach
Premium aesthetic care
Science-based beauty solution
```

## WordPress Theme Direction

Prepare static pages so they can later be separated into:

```text
wp-theme-starter/
|- style.css
|- functions.php
|- header.php
|- footer.php
|- front-page.php
|- page-products.php
|- page-brands.php
|- page-contact.php
|- assets/
|  |- css/
|  |  `- main.css
|  `- js/
|     `- main.js
`- template-parts/
   |- hero.php
   |- product-card.php
   |- global-network.php
   `- inquiry-cta.php
```

## Development Rules

For every task:

1. Read the related GitHub Issue first.
2. Create a feature branch from `medivista`.
3. Keep the requested scope only.
4. Do not remove existing pages unless requested.
5. Do not add prices, cart, checkout, or payment to the main website.
6. Run basic checks before finishing.
7. Summarize changed files.
8. Open a pull request.
9. Reference the issue number in the PR description.

## Basic Checks

Before opening a PR, check:

```text
No price text on main pages
No Add to Cart text
No Checkout text
No Payment text
Brand Shop link is correct
Frontend copy is English-first
PRODUCTS categories are complete
No risky medical claims are added
```
