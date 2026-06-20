# CELLEXOR Design Tokens

Audit date: 2026-06-20

These tokens combine browser-observed reference values with MEDIVISTA theme-compatible implementation values.

## Reference Observations

| Token | Browser-observed value |
|---|---|
| Body background | `rgb(0, 0, 0)` |
| Body text | `rgb(255, 255, 255)` |
| Active champagne gold | `rgb(228, 204, 147)` / `#E4CC93` |
| Font stack | `Suit, Arial, sans-serif` |
| Benefit tab radius | `12px` |
| Benefit tab padding | `18px` |
| Active tab background | `rgb(255, 255, 255)` |
| Active tab text | `rgb(0, 0, 0)` |

## MEDIVISTA Implementation

```css
--cellexor-black: #0a0907;
--cellexor-black-soft: #12110e;
--cellexor-ivory: #f5efe5;
--cellexor-ivory-panel: #f1eadb;
--cellexor-gold: #e4cc93;
--cellexor-gold-strong: #c9a84c;
--cellexor-gold-deep: #9a7c31;
--cellexor-text-muted: rgba(255, 255, 255, 0.62);
--cellexor-line: rgba(228, 204, 147, 0.20);
--cellexor-radius-card: 12px;
--cellexor-space-section: 96px;
--cellexor-focus: #ffffff;
```

## Typography

- Base theme: Segoe UI / system UI to preserve MEDIVISTA consistency.
- Display title: `clamp(82px, 14vw, 180px)`, weight `300`, line-height `0.82`.
- Mobile display title: `clamp(66px, 23vw, 104px)`.
- Section title: `clamp(42px, 5vw, 78px)`.
- Gold kicker: `12px`, weight `800–900`, letter-spacing `0.16–0.20em`.
- Body lead: `18px`.

## Layout

- Desktop technology cards: four columns.
- 1024px and below: two columns.
- 520px and below: one column.
- Benefit cards follow the same 4 → 2 → 1 pattern.
- Application cards: three columns, then one column below 820px.
- Hero and synergy layouts collapse to one column below 820px.
- Card radius: `12px`.
- Product image keeps its source 4:3 ratio and uses explicit width/height to reduce layout shift.

## Motion

- Retain restrained theme transitions only.
- Avoid autoplaying content motion on the MEDIVISTA detail page.
- Respect the existing reduced-motion behavior in shared CSS/JS.

## Accessibility

- Buttons receive a 3px white focus outline with a 4px offset.
- Gold-on-black and ivory-on-black combinations are used for readable contrast.
- External links include new-tab safety attributes.
- Hero image has descriptive alternative text.
- Content remains available without carousel interaction.
