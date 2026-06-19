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

- Corporate and catalog pages remain inquiry-focused.
- Prices, cart, checkout, account, and payment are limited to the integrated WooCommerce Shop area.
- Frontend copy must be English-first.
- The main navigation uses an internal `SHOP` category at `/shop/`.
- Avoid unverified medical or efficacy claims.
- Do not modify DNS or Google Workspace records unless explicitly requested.

## Unified WordPress Operating Model

MEDIVISTA uses one WordPress site and the `wp-theme-starter` theme:

- `www.medivista.co.kr`: company, catalog, brand, blog, inquiry, and WooCommerce Shop.
- `/shop/`, WooCommerce product, Cart, Checkout, and My Account routes: commerce area.
- `shop.medivista.co.kr`: no longer used for the current implementation.

Korean IP visitors may use corporate and catalog pages but are blocked from Shop/WooCommerce routes. Administrators and Shop Managers are exempt.

DNS is managed through WordPress.com nameservers; Whois remains the domain/hosting account baseline.

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
