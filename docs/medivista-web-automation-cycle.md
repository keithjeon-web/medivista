# MEDIVISTA Web Production Automation Cycle

Updated: 2026-05-12
Project: MEDIVISTA global B2B website
Local workspace: current project root in Codex Desktop
GitHub repository: `keithjeon-web/medivista`
Public preview: `https://keithjeon-web.github.io/medivista/`

WordPress application note: paid WordPress staging is removed from the MEDIVISTA workflow. Use GitHub Pages for free public preview and client review, then apply directly to the live WordPress Multisite network after the static public preview is final and the production files are preserved locally and on GitHub.

Multisite role split:

- `www.medivista.co.kr`: main catalog site, no commerce UI.
- `shop.medivista.co.kr`: Brand Shop site, WooCommerce only here.

Access policy:

- Do not block China IP traffic on `www.medivista.co.kr`.
- Block China IP traffic on `shop.medivista.co.kr` only.
- DNS is managed through WordPress.com nameservers; country/IP blocking must be handled by the available hosting, CDN, WAF, security plugin, or WordPress.com/host-level controls.

WordPress backup plugins are deferred for now. Do not require a backup plugin during the automation cycle unless the user changes this decision.

## Purpose

This automation defines one repeatable production cycle for MEDIVISTA website development.

Each cycle should:

1. Read the latest local logs and GitHub state.
2. Continue the next website production task.
3. Run basic safety and preview checks.
4. Sync what can be synced between local and GitHub.
5. Log errors without stopping the whole cycle.
6. Carry unresolved errors into the next cycle.
7. Detect, infer, fix, and re-check visual preview defects such as clipped logos, hidden text, broken maps, overlapped UI, or stale public-cache output.

## Hard Rules

- Main website remains catalog-only.
- Do not add prices.
- Do not add cart, checkout, payment, or Add to Cart.
- Keep frontend copy English-first.
- Keep Brand Shop routed to `https://shop.medivista.co.kr`.
- Avoid unverified medical, clinical, FDA, KFDA, or guaranteed efficacy claims.
- Do not modify DNS or Google Workspace unless explicitly requested.
- Do not delete user work or reset history.

## Reference Expression Mapping

Keep the MEDIVISTA site structure and borrow only the expression style from external references.

| Reference | MEDIVISTA role | Borrow | Exclude |
|---|---|---|---|
| JD BIO | Overall tone and B2B presentation | white space, premium medical aesthetic B2B tone, large product visuals, product/global/partner metrics | shop, discount, first-order, cart, account, or storefront purchase cues |
| HJ Corporations | Products and Global Network structure | product category hierarchy, corporate product grid rhythm, global map and market-zone framing | replacing MEDIVISTA navigation or page order |
| Cellexor | CELLEXOR brand expression | black/white/gold mood, large typography, scroll/action feeling, image-led premium brand sections | unverified regeneration, clinical data, certification, guaranteed efficacy, or medical claim language |

Apply this as:

1. Home keeps the required section order, but product/category blocks may use stronger product visuals, metrics, and B2B cards.
2. Products and Global Network may use HJ-style category and map organization while preserving MEDIVISTA categories.
3. CELLEXOR may use a darker, more cinematic brand layer, but copy must stay in the safe-language set: `Advanced beauty science`, `Designed for professional aesthetic care`, `Science-based beauty solution`, and similar wording.
4. 3D/action effects are allowed only when they improve the first-screen or section experience without adding commerce flow or unverifiable claims.

## Local And GitHub Exchange Model

The desired flow is bidirectional:

```text
Local workspace root
-> implementation, checks, preview, dev log
-> Git-enabled deployment checkout or GitHub connector
-> GitHub branch / issue / public preview
-> public verification result
-> local docs/dev-log.md
-> next cycle backlog
```

When GitHub CLI authentication is available:

```text
local files -> .deploy-medivista-github -> gh-pages commit -> git push -> public preview verification
```

When GitHub CLI authentication is not available:

```text
local files -> GitHub connector for small/high-priority updates -> GitHub Issue comment -> dev-log blocker note
```

## One-Cycle Phase Order

### Phase 1 - Intake

- Read `docs/dev-log.md`.
- Read `docs/github-client-preview.md`.
- Check current local workspace files.
- Check GitHub Issue #11 if GitHub access is available.
- Identify the next highest-impact task from the backlog.

### Phase 2 - Build

Work in this order unless the user gives a newer instruction:

1. Home/public preview parity
2. CI logo and header consistency
3. Global Network and world map
4. Products page UX and product-card data
5. Contact form and WhatsApp inquiry flow
6. Brands/CELLEXOR page copy and claim safety
7. Mobile responsive QA
8. SEO/meta/OG cleanup
9. WordPress starter sync
10. GitHub/public preview sync

WordPress starter sync means keeping the export package ready for the main site in the WordPress Multisite network, not uploading to a paid preview environment.

### Phase 3 - Checks

Run the lightest checks that apply:

```text
node --check assets/js/main.js
rg for garbled text and risky claims
rg for Add to Cart / Checkout / Payment
Brand Shop URL check
local preview HTTP check if server is running
public preview HTTP check if network/GitHub access is available
visual anomaly check from user screenshots or browser preview
asset bounding-box check for logo/image clipping when a visual defect is reported
cache-busted public URL check after public preview fixes
tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip
```

### Visual Defect Loop

When a screenshot, local preview, or public preview shows a visual problem:

```text
Discover -> record the exact visible symptom and URL.
Infer -> compare local file, deployed file, cache version, CSS sizing, and asset bounds.
Fix -> prefer stable structural fixes over repeated cosmetic tweaks.
Verify -> check local/public output with cache-busted URLs and file-level evidence.
Prevent -> add the failure pattern to docs/dev-log.md and automation notes.
```

Required examples to catch:

- CI/logo clipped, cropped, too small, or hidden by header height.
- World map missing because external JS/data did not load.
- Text overlapping, wrapping into buttons, or disappearing on mobile.
- Public preview showing older output than local preview.
- Image assets with excessive transparent padding, wrong aspect ratio, or stale cache query.

For logo defects, inspect both CSS and asset geometry. If a logo has excessive transparent padding or continues to appear clipped after CSS changes, create/use a header-specific trimmed asset and update cache-busted references.

### Phase 4 - Sync

Try in this order:

1. Update local files.
2. Update `docs/dev-log.md`.
3. If authenticated, push full static build to GitHub.
4. If not authenticated, use GitHub connector for small public-preview updates.
5. Add a GitHub Issue #11 comment with what changed and what remains.

### Phase 5 - Error Handling

Do not stop the entire cycle for phase-level errors.

Use this rule:

```text
Non-blocking error -> log it -> continue next phase.
Auth or permission error -> log it -> continue local work.
Preview server error -> log it -> continue file-level checks.
GitHub push error -> log it -> try connector fallback.
Visual defect -> log discovery/inference/fix/verification -> continue the cycle after a visible-safe correction or record it as next-cycle priority.
Public cache mismatch -> bump CSS/asset query version -> verify with a cache-busted public URL.
Compliance risk -> fix immediately if possible; otherwise log and avoid publishing risky copy.
Destructive action risk -> do not proceed without explicit user request.
```

### Phase 6 - Close Cycle

At the end of each cycle:

- Run `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip`.
- If the deployment checkout has intended `gh-pages` commits and publishing is part of the cycle, run it again with `-PushDeploy` or include `-PushDeploy` in the closeout run.
- Summarize changed files briefly.
- Record checks passed or skipped.
- Record unresolved errors.
- Write the next-cycle priority.
- Leave a follow-up comment.

Do not set any paid WordPress preview environment as the next-cycle priority. If WordPress work is next, phrase it as "prepare direct live WordPress application" or "keep WordPress starter package in sync."

### Error Resolution Automation

The six recurring error classes are automated in `tools/medivista-error-recovery.ps1` and documented in `docs/error-resolution-automation.md`.

Each cycle must check:

1. PHP lint availability and WordPress theme PHP files.
2. Local preview server availability.
3. GitHub Pages deploy checkout and push readiness.
4. Public preview parity risk.
5. WordPress ZIP and page-import XML readiness.
6. Product image insertion status.

The script writes `docs/error-report-latest.md`. If an item cannot be fixed in the current environment, log it as a blocker with the next exact command or environment required.

## Cycle Completion Definition

A cycle is complete when:

- One meaningful website improvement or sync improvement is completed.
- Basic checks have been attempted.
- Errors are logged.
- The next-cycle priority is recorded.

The cycle can complete even when one phase fails, as long as the failure is logged and the next safe phase was attempted.
