# CELLEXOR Re:Tone Page Audit

Audit date: 2026-06-20

## Sources

- Production target: https://medivista.co.kr/
- Official reference: https://cellexor.com/cellexor-retone/
- Official CELLEXOR contact: https://cellexor.com/contact/
- MEDIVISTA inquiry: https://medivista.co.kr/contact/

The official reference was inspected in a real browser through the Codex in-app browser. DOM structure, visible text, link destinations, image formats, metadata, and computed styles were sampled. This document records design and information architecture observations, not permission to reproduce source code or claims.

## Reference Page Structure

1. Dark global header and CELLEXOR navigation.
2. Product-led RE:TONE introduction.
3. Seven-part technology carousel:
   - KEY 01 purity
   - KEY 02 concentration
   - KEY 03 particle uniformity
   - KEY 04 delivery
   - KEY 05 renewal
   - KEY 06 recovery
   - KEY 07 antioxidant and anti-aging theme
4. Exosome × NAD+ concept section.
5. V1 + V2 two-step system.
6. Four improvement tabs covering pores, skin tone, lifting, and recovery.
7. Technology, patent, certification, and test-data presentation.
8. Concern types, application areas, use guidance, and storage guidance.
9. Final purchase and partnership CTA.
10. MEDIVISTA company footer.

## Browser Findings

- Body background: `rgb(0, 0, 0)`.
- Body text: `rgb(255, 255, 255)`.
- Primary font stack: `Suit, Arial, sans-serif`.
- Active gold navigation color: `rgb(228, 204, 147)`.
- Benefit tabs use a `12px` radius and `18px` padding.
- Active benefit tab uses white background with black text.
- Main logo asset: SVG.
- Product/story assets are predominantly WebP and lazy-loaded.
- Official page metadata includes an Open Graph image and one JSON-LD script.
- Official product and partnership CTA links route to `/contact/`.
- The official source contains strong medical, regulatory, numerical, and efficacy statements. These were not copied into MEDIVISTA without supporting evidence.

## MEDIVISTA Adaptation

The MEDIVISTA page keeps:

- black, ivory, and champagne-gold visual direction;
- oversized RE:TONE typography;
- product-first hero;
- seven technology themes;
- Exosome × NAD+ and V1 + V2 story structure;
- four benefit areas;
- verification and professional application sections;
- final official-product and partnership actions.

The MEDIVISTA page changes:

- Korean source copy to English-first B2B copy;
- guaranteed or immediate outcomes to moderated beauty-care language;
- certification, patent, test, and numerical claims to evidence-required placeholders;
- treatment instructions to a request-for-approved-protocol notice;
- source-page tabs/carousel to responsive cards for simpler mobile access.

## 404 Root Cause and Fix

The theme already contained `page-brands.php`, `page-cellexor.php`, and `page-contact.php`, but WordPress templates do not create database page records. If the WXR import was skipped, `/brands/`, `/cellexor/`, and `/contact/` returned 404.

The theme now provisions these three published pages and assigns their templates on theme activation or the next administrator request. Rewrite rules are refreshed only when a missing page is created.

## Link Contract

- MEDIVISTA Brands: `/brands/`
- MEDIVISTA Cellexor Re:Tone: `/cellexor/`
- MEDIVISTA Contact: `/contact/`
- Official product details: `https://cellexor.com/cellexor-retone/`
- Official product and partnership inquiry: `https://cellexor.com/contact/`

External links open in a new tab with `rel="noopener noreferrer"`.

## Compliance Notes

- Do not publish FDA, KFDA, patent, certification, purity, particle-size, growth-factor, clinical, immediate-effect, or guaranteed-efficacy statements until the supporting dossier is reviewed.
- Individual results may vary.
- The page is a B2B product introduction, not medical advice.
- Approved instructions for use and storage take precedence over website copy.
