# MEDIVISTA

MEDIVISTA global medical aesthetic B2B website project.

## Automation Status

This repository uses a Codex-assisted development workflow.

### PT1: Codex Automation Bootstrap

PT1 is the project operating baseline for Codex-assisted work. It keeps the existing GitHub merge history intact while defining the current automation setup as the first project standard.

Completed setup:

- `AGENTS.md`
- `.github/ISSUE_TEMPLATE/codex-task.md`
- `.github/pull_request_template.md`
- `.github/workflows/codex-automation-check.yml`

Related merged work:

- PR #6: `AGENTS.md` full MEDIVISTA Codex instructions
- PR #7: Codex automation routine files

### Automation Flow

```text
codex-ready Issue
-> GitHub Actions check every 2 hours
-> Codex execution prompt is added as an Issue comment
-> codex-running label is applied
-> Codex Web / SDK / Slack execution
-> Implementation PR
-> Review
-> Merge or follow-up Issue
```

The current workflow is a semi-automated routine. It prepares the Codex execution prompt and status labels, but it does not directly run Codex unless Codex SDK or Slack integration is configured later.

## Main Rules

- Main website is catalog-only.
- No prices.
- No cart.
- No checkout.
- No payment.
- Frontend copy must be English-first.
- Brand Shop must link to [https://shop.medivista.co.kr](https://shop.medivista.co.kr).
- Avoid unverified medical or efficacy claims.
- Do not modify DNS or Google Workspace records unless explicitly requested.

## WordPress Multisite Operating Model

MEDIVISTA uses a separated site-role model:

- `www.medivista.co.kr`: main B2B catalog site.
- `shop.medivista.co.kr`: Brand Shop / WooCommerce site.

WooCommerce, cart, checkout, payment, and order handling belong only on the shop site. The main site keeps the Brand Shop button as a route to `https://shop.medivista.co.kr`.

## Current Development Phases

```text
PT1: Codex Automation Bootstrap
PT2: MEDIVISTA PC Website Expansion
PT3: Mobile Responsive Enhancement
PT4: WordPress Theme Starter Separation
PT5: WooCommerce Catalog / Shop Domain Preparation
PT6: SEO / Legal / QA
```

## Current Next Step

Issue #3 is the PT2 execution target:

```text
PT2: MEDIVISTA PC Website Expansion
```

Recommended PT2 branch:

```text
feature/phase-2-medivista-premium-b2b-site
```

PT2 should start from the latest `medivista` branch after PT1 documentation is merged.
