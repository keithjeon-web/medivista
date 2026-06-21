# CELLEXOR Re:Tone Page Audit

Audit date: 2026-06-21  
Method: Chrome DevTools MCP, live DOM/computed-style inspection, network and console review

## Audited URLs

- MEDIVISTA: https://medivista.co.kr/cellexor/
- Official reference: https://cellexor.com/cellexor-retone/
- Official inquiry: https://cellexor.com/contact/
- MEDIVISTA inquiry: https://medivista.co.kr/contact/

This audit records information architecture, computed styles, link behavior, responsive behavior, and publicly loaded image URLs. It does not grant permission to republish the reference site's source code, images, certifications, test results, or claims.

## Executive Summary

- Both audited documents returned HTTP `200`.
- No console errors, warnings, or browser issues were detected on either page.
- No failed network request or image `404` was detected during the captured loads.
- Both pages remained free of horizontal overflow at 1440, 1024, 768, and the DevTools mobile minimum of 500 CSS pixels. A requested 390px window was reported by this Chrome instance as an effective 500px viewport.
- MEDIVISTA uses nine semantic sections and a card-based responsive adaptation of the official story.
- MEDIVISTA's external product and inquiry CTAs correctly use `target="_blank"` and `rel="noopener noreferrer"`.
- The official page loads a much richer image sequence: 32 unique image URLs were inventoried, predominantly WebP with SVG logos. MEDIVISTA loads one product WebP plus its header logo.
- Reference images were inventoried only. They were not copied into the MEDIVISTA theme because reuse rights have not been confirmed.

## Information Architecture

### Official reference

1. Dark CELLEXOR global header.
2. Product-led RE:TONE introduction.
3. Seven-part key-technology presentation.
4. Exosome × NAD+ concept.
5. RE:TONE V1 and V2 two-step system.
6. Four benefit tabs.
7. Technology, patent, certification, and test-data presentation.
8. Application areas, use, and storage guidance.
9. Product-purchase and partnership CTA.
10. Company footer.

### MEDIVISTA adaptation

1. Hero: CELLEXOR RE:TONE, Exosome × NAD+, product image, two CTAs.
2. Brand concept.
3. Seven technology-theme cards.
4. Exosome × NAD+ concept.
5. V1/V2 system cards.
6. Four benefit-area cards.
7. Evidence-before-claims section.
8. Recommended applications and approved-document guidance.
9. Final partnership CTA.

The MEDIVISTA page preserves the source narrative while replacing tab/carousel interactions with directly readable cards. This is simpler on touch devices and avoids hiding technical content.

## Computed Design Comparison

| Area | Official reference | MEDIVISTA |
|---|---|---|
| Body font | `Suit, Arial, sans-serif` | `"Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif` |
| Base size | 16px desktop; 12px at effective 500px | 16px |
| Body canvas | `#000000` | Global body `#FFFFFF`; CELLEXOR sections alternate dark and ivory |
| Main text | `#FFFFFF` | Global `#1F2933`; section-specific white/dark text |
| Accent gold | `#E4CC93` | `#C9A84C` plus `#E4CC93` verification panel |
| Dark section | Black | `#0A0907` |
| Ivory section | Not sampled as body color | `#F5F0E7` and `#F1EADB` |
| Final CTA | Black/gold text treatment | MEDIVISTA blue `#073772` |
| Benefit tabs/cards | 16px radius, 24px padding in current computed state | 4px CTA radius; responsive content cards |
| Section rhythm | Long cinematic image-led sequence | Mostly 86px vertical padding; brand concept 110px; final CTA 70px |

MEDIVISTA desktop heading samples include:

- Hero `RE:TONE`: 180px, weight 300, `rgb(197, 164, 90)`.
- Major dark-section headings: 46px, weight 700, white.
- Ivory concept heading: 66px, weight 350.
- Exosome × NAD+ heading: 78px, weight 700.
- Verification heading: 68px, weight 700.

## CTA and Link Audit

MEDIVISTA primary links:

- Official product details → `https://cellexor.com/cellexor-retone/`
- Product and partnership inquiry → `https://cellexor.com/contact/`
- Product purchase inquiry → `https://cellexor.com/contact/`
- MEDIVISTA contact → `https://medivista.co.kr/contact/`
- Internal Shop navigation → `https://medivista.co.kr/shop/`

External CELLEXOR and WhatsApp links use a new tab with `noopener noreferrer`. Internal MEDIVISTA links remain same-tab. The official reference routes both its purchase and partnership actions to `/contact/`.

## Image Crawl and Inventory

### Official reference

- 34 `<img>` elements observed.
- 32 unique public image URLs inventoried.
- Primary formats: WebP and SVG.
- Main examples:
  - `logo_white.svg`
  - `retone2.svg`
  - `retone-1.webp` through multiple numbered RE:TONE sequence assets
  - `pd1-1.webp`, `pd1-2.webp`, `pd4.webp`
  - `pdsub1-1.webp` through `pdsub1-4.webp`
  - `certificate1.webp`, `certificate2.webp`
  - `pd3-1.webp`
- Most source images declare lazy loading.
- Several below-the-fold images had zero natural dimensions during the mobile capture because they had not yet entered the lazy-load threshold. Their URLs and rendered placeholders were still recorded.

### MEDIVISTA

- Three image requests observed, including the WordPress analytics pixel.
- Visible brand assets:
  - MEDIVISTA header PNG.
  - `products/cellexor-re-tone.webp`.
- The product image rendered at approximately 375 × 900 CSS pixels in the effective 500px mobile viewport.

Raw inventories:

- `docs/cellexor-reference-image-inventory.json`
- `docs/medivista-cellexor-image-inventory.json`

Copyright note: these files are a technical URL inventory, not a production asset license. Obtain written permission or original brand files before downloading and republishing reference imagery.

## Responsive Audit

| Viewport | Official reference | MEDIVISTA |
|---|---|---|
| 1440px | No horizontal overflow; full navigation; cinematic long-form layout | No horizontal overflow; nine sections; full navigation |
| 1024px | No horizontal overflow; content scales within viewport | No horizontal overflow; CTA and content widths remain contained |
| 768px | No horizontal overflow; navigation transitions toward compact behavior | No horizontal overflow; card layout remains contained |
| Requested 390px | Chrome reported 500px effective width; no overflow; nav hidden | Chrome reported 500px effective width; no overflow; nav hidden; all nine sections span 485px document width |

At the effective mobile viewport, MEDIVISTA's hero CTAs remain visible and retain the correct link attributes. The official page uses many lazy-loaded story images; blank-height states can appear before scroll-triggered loading, so production testing should include a real 390px device or Playwright device emulation in addition to this MCP window test.

Screenshots:

- `docs/qa-screenshots/cellexor-reference-1440.png`
- `docs/qa-screenshots/cellexor-reference-390.png`
- `docs/qa-screenshots/medivista-cellexor-1440.png`
- `docs/qa-screenshots/medivista-cellexor-390.png`

## Console, Network, and Metadata

### Official reference

- Document: HTTP `200`.
- Console errors/warnings/issues: none.
- Loaded 313 requests in the captured session; inspected CSS, fonts, scripts, WebP/SVG assets, and animation JSON resources returned `200`.
- Body: black with white text.
- Open Graph image present.
- One JSON-LD script detected.

### MEDIVISTA

- Document: HTTP `200`.
- Console errors/warnings/issues: none.
- All 13 captured requests returned `200`.
- Canonical: `https://medivista.co.kr/cellexor/`.
- Meta description and Open Graph title, description, and image are present.
- No JSON-LD script was detected on this page.

Recommended follow-up: add an appropriate `Product` or `WebPage` schema only after approved product facts and responsible organization data are confirmed.

## Compliance Findings

The official source presents medical, regulatory, numerical, patent, certification, and efficacy-oriented material. Those statements must remain source observations until MEDIVISTA receives supporting documentation and approval.

The MEDIVISTA adaptation correctly uses moderated language such as “supports,” “care goals,” and “evidence before claims.” Do not publish FDA, KFDA, clinical, immediate-effect, guaranteed-efficacy, purity, particle-size, patent, or certification statements without a reviewed dossier.

Individual results may vary. Approved instructions for use and storage take precedence over website copy.

## Generated Evidence

- `docs/audit-cellexor-reference.json`
- `docs/audit-medivista-cellexor.json`
- `docs/audit-reference-responsive-1440.json`
- `docs/audit-reference-responsive-1024.json`
- `docs/audit-reference-responsive-768.json`
- `docs/audit-reference-responsive-390.json`
- `docs/audit-medivista-responsive-1440.json`
- `docs/audit-medivista-responsive-1024.json`
- `docs/audit-medivista-responsive-768.json`
- `docs/audit-medivista-responsive-390.json`
