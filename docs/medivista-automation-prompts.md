# MEDIVISTA Automation Prompts

Updated: 2026-05-12

## Primary Recurring Prompt

```text
Run one MEDIVISTA website production cycle.

Project:
MEDIVISTA global B2B website

Local workspace:
Current project root in Codex Desktop

GitHub repository:
keithjeon-web/medivista

Public preview:
https://keithjeon-web.github.io/medivista/

WordPress policy:
Do not plan or require paid WordPress staging. Use GitHub Pages as the free public preview. Keep WordPress starter files ready, and move to live WordPress transfer only after final approval and backup.

Read first:
- AGENTS.md
- docs/dev-log.md
- docs/github-client-preview.md
- docs/medivista-web-automation-cycle.md

Hard rules:
- Main website is catalog-only.
- Do not add prices, cart, checkout, payment, or Add to Cart.
- Keep frontend copy English-first.
- Brand Shop must link to https://shop.medivista.co.kr.
- Avoid unverified medical, clinical, FDA, KFDA, or guaranteed efficacy claims.
- Do not modify DNS or Google Workspace records.
- Do not delete user work or reset history.

Cycle order:
1. Intake latest logs, local state, GitHub state, and public preview state.
2. Select the next highest-impact website task from the documented phase order.
3. Implement one focused improvement.
4. Run basic checks: JS syntax, risky claim scan, prohibited commerce flow scan, Brand Shop URL scan, local/public preview check when possible.
   Include visual defect checks from screenshots or browser preview: clipped CI/logo, hidden text, map not rendering, overlapping UI, stale public cache, and image aspect/padding issues.
5. Sync local and GitHub:
   - If GitHub CLI is authenticated, push the full static build or deployment branch.
   - If GitHub CLI is not authenticated, use the GitHub connector only for small public-preview or issue-log updates.
6. Log every error in docs/dev-log.md and continue to the next phase when safe.
7. Before closeout, run tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip. Add -PushDeploy when gh-pages has intended commits and publishing is part of the cycle.
8. At cycle end, record changed files, checks, unresolved errors, and the next-cycle priority.
   Do not set WordPress staging upload/import as the next priority.

Error handling:
- Ignore phase-level errors only after logging them.
- Continue to the next safe phase.
- Revisit logged errors in the next cycle.
- For visual defects, use a discovery -> inference -> fix -> verification loop. Record the visible symptom, likely cause, exact correction, and cache-busted verification URL.
- If CI/logo clipping continues after CSS changes, inspect the image bounding box and use a header-specific trimmed asset instead of repeating max-height tweaks.
- If public preview differs from local, bump CSS/asset query versions and verify the public URL directly.
- For recurring errors 1-6, use docs/error-resolution-automation.md and tools/medivista-error-recovery.ps1. Keep docs/error-report-latest.md current.
- Do not ignore compliance risks, destructive action risks, credential exposure, or user-data loss risks.

Output expectation:
Provide a concise completion summary and a follow-up work comment.
```

## GitHub Issue Prompt

```text
Work on the next MEDIVISTA website production cycle for Issue #11.

Repository:
keithjeon-web/medivista

Base branch:
medivista

Public preview branch:
gh-pages

Follow:
- AGENTS.md
- docs/medivista-web-automation-cycle.md
- docs/medivista-automation-prompts.md

Goal:
Keep local workspace, GitHub repository, and public preview moving toward parity.

Do:
- Continue one focused website task per cycle.
- Run basic checks.
- Run visual anomaly checks for header/logo, navigation, world map, mobile wrapping, and public/local mismatch.
- Run tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip before closeout. Use -PushDeploy when publishing is intended and safe.
- Update docs/dev-log.md.
- Comment progress on Issue #11.
- Prefer full push when GitHub CLI auth is available.
- Use connector fallback for small public preview fixes when full push is blocked.
- Do not require paid WordPress staging; use GitHub Pages for preview QA and keep WordPress starter ready for approved production transfer.

Do not:
- Add price/cart/checkout/payment.
- Use risky medical claims.
- Delete unrelated files.
- Rewrite history.
- Stop the whole cycle for a non-blocking phase error.

End with:
- changed files
- checks
- errors logged
- next-cycle priority
```

## Manual Local Resume Prompt

```text
Continue MEDIVISTA website development from the latest docs/dev-log.md entry.

Use the one-cycle automation process:
1. Read latest logs.
2. Pick next priority.
3. Implement one focused improvement.
4. Run checks.
5. Sync what can be synced to GitHub/public preview.
6. Log errors and next priority.

If local preview or GitHub push fails, log the error and continue file-level work.
If a screenshot shows a visual defect, document discovery/inference/fix/verification in docs/dev-log.md before ending the cycle.
Run tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip before final summary. Use -PushDeploy when publishing is intended and safe.
Do not add WordPress staging as a required next step; use GitHub Pages preview QA until live WordPress transfer is approved.
```
