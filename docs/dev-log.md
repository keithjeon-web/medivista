# MEDIVISTA Development Log

## 2026-05-05

- While scanning project files, an `rg` pattern failed because the quoted expression was parsed as an unclosed regex group. Development continued with narrower file reads and direct inspections.
- While validating mobile navigation coverage, a Unix-style `rg` target pattern failed under PowerShell path parsing. Development continued with Windows-safe `rg --glob` checks.

## 2026-05-06

- `Get-NetTCPConnection -LocalPort 4173` returned no connection metadata, while HTTP checks against `http://127.0.0.1:4173/index.html` succeeded. Development continued using direct HTTP verification.
- Product CSV parsing initially used the PowerShell `??` operator, which is not supported by the installed PowerShell version. Development continued with Windows PowerShell compatible null handling.
- Product page generation initially used a helper function named `H`, which conflicted with the PowerShell `Get-History` alias. Development continued after renaming the helper.
- A broad `rg` file target pattern with Unix-style globs failed under PowerShell path parsing while checking BRAND SHOP styles. Development continued with direct CSS inspection and Windows-safe `rg --glob`.
- Restarting the local preview server with `Start-Process` failed with Windows access denied, even after approval. Development continued with file-level verification.
- Restarting the local preview server through `py -m http.server` failed because the Python launcher could not create the configured Python process. Development continued without blocking the CSS update.
- Real-time sidebar verification for `http://127.0.0.1:4173/contact/index.html` found the in-app browser automation blocked by Windows access denied and port 4173 not accepting connections. Development can continue with file-level checks until the preview server is relaunched.
- Attempting to launch the local preview server through direct process creation failed with Windows access denied. A persistent Windows Scheduled Task launch was not used because it requires explicit approval for a lasting system-level change.
- Added a PowerShell-only preview server fallback because `node` was not available from the user's Command Prompt PATH.
- Added fixed 4:3 product image frames with optional real image support through `data-image`, keeping existing placeholder visuals when product photos are not yet available.
- Improved the main page core values module with numbered cards, CSS-drawn icons, and stronger card hierarchy for the "What We Stand For" section.
- Added product catalog search, category filtering, live result count, reset control, and empty-result state to improve UX before final product images are inserted.
- Replaced the Global Network country card grid with an SVG-based world map visualization, market markers, route lines, and compact country chips.
- Reworked the Global Network module toward the referenced dark Global Reach design with a full-width map panel and four distribution zone cards.
- Local HTTP verification timed out after applying the referenced Global Reach design. File-level checks and JavaScript syntax checks completed successfully.
- Rewrote the Global Reach map again to follow the referenced file more closely, adding overlay region callout boxes and a bottom-left legend.
- Implemented an actual D3/topojson world map for Global Reach, with country-level zone coloring and active market pins while retaining the existing SVG fallback.
- A broad `rg` check for temporary links failed due PowerShell quote parsing. Development continued with direct file inspection and safer replacement checks.
- Cleaned first-pass copy issues: fixed CELLEXOR mojibake, replaced the Korean temporary cosmetics placeholder, disabled unfinished social/language hash links, and softened stronger CELLEXOR claims.
- Replaced pending Instagram and Facebook header/footer text with CSS-drawn social icons, keeping them disabled until final social URLs are confirmed.
- Removed the white background from the MEDIVISTA gold PNG logo, kept the original as a backup, and switched static/WordPress headers from SVG to the transparent PNG logo.
- Rebuilt the Home Partners module as a product/brand logo strip and separated Core Values into its own section so company names are no longer the primary partner signal.
- Added hero metrics, Contact inquiry summary, SEO/OG basics, and product image manifest mapping for 1200x900 white-background WebP preparation.
- Attempted automated 1200x900 WebP placeholder generation through a headless browser path, but the process launch was blocked by the current execution limit. Development continued with manifest/data-image preparation and pending image status.
- A PowerShell reserved variable collision temporarily overwrote `index.html`; the Home page was immediately rebuilt from the current implemented structure and revalidated.
- Final local HTTP checks for port 4173 failed because the preview server was not responding. Development continued with file-level QA, syntax checks, and product image mapping verification.
- Added mobile layout refinements, generated the MEDIVISTA OG sharing image, connected OG/Twitter image metadata, and added a product image status sync helper.
- Running the product image sync helper directly was blocked by the local PowerShell execution policy; the product image guide now includes a Bypass command for that local policy case.
- Final HTTP checks found the local preview server still not responding on port 4173, and `git` was not available in the current PATH. Development continued with file-level validation.
- Synced WordPress starter with OG metadata support, copied OG/product image guide assets into the theme starter, and confirmed the local preview server responds for Home, Products, Contact, and the OG image.
- Replaced the site logo from the supplied wide MEDIVISTA image by removing the black background, recoloring the mark/text to MEDIVISTA gold, syncing the WordPress starter logo, widening the header logo display, and regenerating the OG image with the new logo.
## 2026-05-07 - GitHub client preview linkage

- Confirmed GitHub repository target: `keithjeon-web/medivista`.
- Confirmed current local folder is not a Git checkout, so normal local `git push` is not available from this directory.
- Added `.nojekyll` for GitHub Pages static preview readiness.
- Added `docs/github-client-preview.md` to record Codex thread `019df785-5622-7b60-b0ca-a6fcd4a9b739`, repository target, expected client preview URL, and deployment blocker.
- Follow-up: expose/install Git + GitHub CLI or move these static files into a Git-enabled clone before publishing the full current build.

## 2026-05-07 - Public preview deployment

- Installed Git and GitHub CLI through `winget`; GitHub CLI remained unauthenticated.
- Created a local deployment checkout at `.deploy-medivista-github`.
- Copied the current static site into the deployment checkout and created local branch `gh-pages`.
- Created local deployment commit `42329e9 deploy: publish current static preview`.
- Direct `git push` was blocked by missing GitHub authentication.
- Used the GitHub connector to create remote `gh-pages` branch commit `072259f1872e1f349a299bf549c9878b388e995f`.
- Verified public preview URL returned HTTP 200: `https://keithjeon-web.github.io/medivista/`.
- Note: the public URL currently serves a compact connector-published client preview. Full local static build push remains pending GitHub CLI authentication.

## 2026-05-07 - Public preview alignment check

- Compared local `http://127.0.0.1:4173/index.html` against public `https://keithjeon-web.github.io/medivista/`.
- Found mismatch: local home was the full MEDIVISTA build, while public home was the compact temporary preview.
- Updated remote `gh-pages` to commit `bd8066d137a6353c375c69dd0696d7adc0bf10ec`.
- Public home now includes the local home structure: hero, popular products, category tabs, B2B inquiry flow, global network, partners, core values, inquiry CTA, footer.
- Added public assets required by the home page: `assets/css/styles.css`, `assets/js/main.js`, and `medivista_logo_gold.png`.
- Verification: public URL returned HTTP 200, CSS returned HTTP 200, JS returned HTTP 200, logo returned HTTP 200.
- Note: full multi-page parity still depends on GitHub CLI authentication or a full connector-based page upload for all subpages.

## 2026-05-07 - CI logo and world map preview correction

- Reviewed the latest implementation log for CI logo and world map requirements.
- Confirmed public CI logo asset is available: `https://keithjeon-web.github.io/medivista/medivista_logo_gold.png`.
- Found public preview JS was still the compact deployment script and did not include the latest D3/topojson actual world map behavior.
- Updated local `assets/js/main.js` so the world map can dynamically load D3/topojson when those libraries are not already present.
- Updated public `gh-pages` `assets/js/main.js` with commit `7db01e3484812b6573e0a744447125b1732370e1`.
- Verification: public JS now includes `d3.min.js`, `topojson.min.js`, `world-atlas@2`, `MEDIVISTA_MAP_PINS`, and actual world map title text.
- Verification: public logo returned HTTP 200 with `image/png`.
- Note: restarting the local preview server from this shell did not stay active; public verification was completed directly against GitHub Pages.

## 2026-05-07 - Website production automation cycle setup

- Added `docs/medivista-web-automation-cycle.md`.
- Added `docs/medivista-automation-prompts.md`.
- Defined the one-cycle automation order: intake, build, checks, sync, error handling, cycle close.
- Defined local/GitHub exchange rules for authenticated GitHub CLI and GitHub connector fallback.
- Defined phase-level error handling: log errors, continue next safe phase, revisit unresolved items in the next cycle.
- Preserved hard rules: catalog-only, English-first, Brand Shop routing, no price/cart/checkout/payment, and conservative claims.

## 2026-05-07 - Automation prompt embedded cycle guide

- Updated Codex app automation `medivista-website-production-cycle`.
- Embedded the core contents of `docs/medivista-web-automation-cycle.md` directly into the automation prompt.
- The automation now carries the cycle guide internally and also reads local docs before each run.
- Cadence remains every 2 hours.

## 2026-05-08 - Local preview CI logo clipping fix

- Reviewed the local preview screenshot showing the CI logo clipped in the header.
- Confirmed `medivista_logo_gold.png` source image is intact at `537x118`.
- Increased header inner height and padding, reduced displayed logo width, and added max-height/object-fit rules in `assets/css/styles.css`.
- Added `?v=20260508a` to static page logo image URLs to force the browser to reload the corrected logo.
- Synced the same logo sizing adjustment into the WordPress starter CSS.
- Verification: local `http://127.0.0.1:4173/index.html?v=20260508a` returned HTTP 200 and references the versioned logo URL.

## 2026-05-08 - Public preview CI logo and map sync

- Synced the local Home preview fixes into `.deploy-medivista-github` on top of the latest remote `gh-pages` branch.
- Updated public `index.html` to use `assets/css/styles.css?v=20260508a` and `medivista_logo_gold.png?v=20260508a`.
- Synced public `assets/css/styles.css` with the header/logo clipping fix.
- Synced public `assets/js/main.js` with the D3/topojson/world-atlas dynamic loader used by the actual world map section.
- Pushed public deployment commit `aac2a33 deploy: sync logo header and world map preview`.
- Verification: public HTML, CSS, and JS returned HTTP 200; HTML contains the new cache-busted CSS/logo URLs; CSS contains the logo max-height fix; JS contains `world-atlas@2`.
- Added a GitHub Issue #11 progress comment with the public verification result.

## 2026-05-08 - Public CI logo clipping hard fix

- Rechecked the public URL screenshot showing the CI logo still clipped in the header.
- Changed the header logo rule from max-height based sizing to a fixed logo display box: `.logo` `260x70px`, image height `54px`, visible overflow.
- Updated public cache-bust references to `20260508b`.
- Pushed public deployment commit `41b152f deploy: fix public header logo clipping`.
- Verification: public `index.html?v=20260508b` and `assets/css/styles.css?v=20260508b` returned HTTP 200 and include the new logo display rules.

## 2026-05-08 - Logo clipping visual-defect prevention

- Discovery: user screenshot showed the public CI/logo still visually clipped despite the previous header CSS correction.
- Inference: the source PNG is `537x118`, but the visible alpha bounding box is `450x80` with transparent padding; repeated max-height changes can still make the header logo appear clipped or too small.
- Fix: created `medivista_logo_header.png` as a header-specific trimmed transparent PNG (`462x92`) and connected static headers to `medivista_logo_header.png?v=20260508c`.
- Fix: updated logo CSS to use a stable `300x72px` logo display box and a `280px` wide contained image.
- Fix: synced the header asset reference into the WordPress starter and copied the header logo into `wp-theme-starter/assets/images/`.
- Prevention: updated `docs/medivista-web-automation-cycle.md`, `docs/medivista-automation-prompts.md`, and the active `medivista-website-production-cycle` automation with a visual defect loop: discovery, inference, fix, verification, and prevention.
- Next check: publish `medivista_logo_header.png`, `index.html`, and `assets/css/styles.css` to `gh-pages`, then verify the public URL with `?v=20260508c`.

## 2026-05-11 - Production cycle: cache-bust parity + deploy commit

- Bumped all static pages to `assets/js/main.js?v=20260511a` to reduce stale-cache mismatches between HTML/CSS/logo and JS behavior.
- Updated the WordPress starter enqueue version for `assets/js/main.js` from `0.1.3` to `0.1.4` to match the current script.
- Deployment checkout: committed `gh-pages` changes in `.deploy-medivista-github` (includes `medivista_logo_header.png`, the stable header logo CSS sizing, and the JS cache-bust bump).
- Local preview check: `http://127.0.0.1:4173/index.html` not responding (no running preview server).
- Public preview check: `https://keithjeon-web.github.io/medivista/` fetch failed from this environment (network blocked).
- GitHub push: `git push origin gh-pages` failed from this environment (`Could not connect to server`).

## 2026-05-11 - WordPress insertion package prep

- Synced the latest static CSS into `wp-theme-starter/assets/css/main.css` so WordPress uses the current header logo, world map, product, blog, and contact styling.
- Synced the latest static JS into `wp-theme-starter/assets/js/main.js`.
- Added required WordPress fallback/template files: `index.php`, `page-about.php`, `page-blogs.php`, and `page-cellexor.php`.
- Copied product CSV and product image manifest files into `wp-theme-starter/assets/data/`.
- Fixed the broken `wp-theme-starter/README.md` text and added upload/readiness notes.
- Added `docs/wordpress-insertion-checklist.md` for the WordPress upload and page-slug setup process.
- Bumped WordPress theme asset versions to `0.1.5`.
- Created upload-ready package: `dist/medivista-wp-theme-starter-20260511-wp.zip`.
- Checks: `node --check wp-theme-starter/assets/js/main.js` passed; prohibited commerce/risky-claim scan passed; ZIP contains required theme files with forward-slash paths.
- Skipped: PHP syntax lint because `php` is not available in the current PATH.

## 2026-05-11 - WordPress page import and template selection prep

- Added `Template Name` headers to WordPress page templates so they can be selected manually from the WordPress page editor if slug-based loading is not enough.
- Created starter WordPress import file: `dist/medivista-wp-pages-20260511.xml`.
- The import file creates 7 starter pages: Home, About, Products, Brands, Blogs, Cellexor, and Contact.
- Updated `docs/wordpress-insertion-checklist.md` and `wp-theme-starter/README.md` with import-file and primary-menu setup instructions.
- Regenerated `dist/medivista-wp-theme-starter-20260511-wp.zip` after template updates.
- Checks: XML parse passed with 7 pages; JS syntax check passed; prohibited commerce/risky-claim scan passed; ZIP required-file check passed.
- Skipped: PHP syntax lint because `php` is not available in the current PATH.

## 2026-05-11 - Production cycle: mobile nav accessibility + close behavior

- Improved mobile navigation behavior: when the menu is open, clicking outside the header closes it, and pressing `Escape` closes it and returns focus to the toggle.
- Added `aria-controls="primary-nav"` on the mobile toggle and `id="primary-nav"` on the primary nav across all static pages, plus the WordPress starter header.
- Synced the same nav behavior into `wp-theme-starter/assets/js/main.js` for parity.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; commerce flow scan and risky-claim scan found no issues outside instruction docs.
- Deploy checkout: committed the same change in `.deploy-medivista-github` as `deploy: improve mobile nav close behavior` (commit `6c24315`).
- Deploy blocker: `git` inside `.deploy-medivista-github` requires `-c safe.directory=...` per invocation; global safe-directory config failed due to sandbox permission (`.gitconfig` lock denied). Subpage directories inside `.deploy-medivista-github` are `ReparsePoint` placeholders and appear empty in this environment, so only root `index.html` + shared assets could be updated this cycle.

## 2026-05-11 - Production cycle: deploy checkout parity (full gh-pages tree)

- Discovery: `.deploy-medivista-github` had `gh-pages` tracked, but most page directories (`about/`, `products/`, etc.) were effectively empty, so the public preview would only reflect root assets and not full site navigation.
- Fix: synced the full static site tree into `.deploy-medivista-github` (pages, assets, docs, and WordPress starter) and committed `deploy: sync full static site` (commit `242296e`).
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; prohibited commerce flow keywords only appear in instruction/docs; Brand Shop URLs remain `https://shop.medivista.co.kr`.
- Push attempt: `git push origin gh-pages` failed from this environment (`Could not connect to server`).
- Next: push `gh-pages` from a network-enabled environment (or use a GitHub connector fallback) and verify the public preview with a cache-busted URL.

## 2026-06-16 - Routine cross-check: products parity BOM cleanup

- Re-ran the MEDIVISTA GitHub/local cross-check routine in `C:\Users\jhj13\OneDrive\문서\New project` and re-read `AGENTS.md`, `docs/dev-log.md`, `docs/github-client-preview.md`, `docs/medivista-web-automation-cycle.md`, `docs/medivista-automation-prompts.md`, `docs/error-resolution-automation.md`, and the latest `docs/error-report-latest.md`.
- GitHub connector state remains unchanged and still does not displace local truth: repository `keithjeon-web/medivista` default branch is `medivista`, open Issue `#11`, open Issue `#3`, and open PR `#10` remain the active remote items, while connector-visible recent default-branch commits are still older documentation commits from 2026-05-07.
- Deploy state after closeout: `.deploy-medivista-github` remains `gh-pages...origin/gh-pages [ahead 1]` at commit `5982567 deploy: add partner action slider`, with preserved uncommitted drift in `.deploy-medivista-github/assets/css/styles.css` and `.deploy-medivista-github/wp-theme-starter/assets/css/main.css`.
- Focused maintenance fix: removed a stray UTF-8 BOM from `products/index.html` so the root Products page now matches `.deploy-medivista-github/products/index.html` exactly by SHA-256 instead of carrying a line-1 encoding-only diff.
- Validation: root/deploy parity now matches for homepage/static pages, shared CSS/JS, WordPress starter header/assets, and `products/index.html`; required product categories remain complete; Brand Shop links still route to `https://shop.medivista.co.kr`; catalog-only and risky-claim scans passed with expected documentation-only false positives in `wp-theme-starter/README.md`; `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` passed again and refreshed `docs/error-report-latest.md`.
- Blockers remain unchanged: direct `git ls-remote` to GitHub still fails on port `443`, the root workspace is still not a Git checkout, public preview fetch remains blocked in this environment, and the preview server started by the recovery script still does not persist after that PowerShell process exits.
- Next run: push `.deploy-medivista-github` from a network-enabled environment, review whether the uncommitted deploy-only CSS spacing changes should be committed with the partner action slider work, then visually verify the public Home header/logo/mobile nav plus Products slider spacing.

## 2026-05-11 - Production cycle: CSS/logo cache-bust parity

- Fix: bumped all static pages (root + subpages) to `assets/css/styles.css?v=20260511a` and `medivista_logo_header.png?v=20260511a` to reduce stale-cache mismatches vs JS (`assets/js/main.js?v=20260511a`).
- Deploy checkout: committed the same HTML changes to `.deploy-medivista-github` on `gh-pages` as `deploy: bump css and logo cache-bust` (commit `8e08e3b`).
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; prohibited commerce/risky-claim keywords only appear in docs/instructions.
- Local preview check: `http://127.0.0.1:4173/index.html` not responding (no running preview server).
- Push attempt: `git push origin gh-pages` failed from this environment (`Could not connect to server`).
- Next: push `gh-pages` including commit `8e08e3b`, then verify public preview with cache-busted URLs and confirm subpage navigation.

## 2026-05-12 - Production cycle: restore Global Reach context on mobile

- Problem: on small screens, desktop `.map-callout` overlays are intentionally hidden, but the Global Reach map then loses zone context for mobile users.
- Fix: added a mobile-only zone chip row (`.map-callouts-mobile`) under the Home page Global Reach map so zone labels remain visible when callouts are hidden.
- Files: updated `index.html` and `assets/css/styles.css`.
- Checks: `node --check assets/js/main.js` passed; prohibited commerce keywords and risky-claim keywords only appear in docs/instructions; Brand Shop URL remains `https://shop.medivista.co.kr`.
- Public preview verification: skipped (network/web fetch not available from this environment).
- GitHub sync: blocked (this folder is not a Git checkout; see `docs/github-client-preview.md`).
- Next: re-verify Global Reach section on a real mobile viewport on the public preview after the next successful `gh-pages` push (cache-bust if needed).

## 2026-05-12 - Error resolution automation for reported 1-6 items

- Added `tools/medivista-error-recovery.ps1` to automate the six reported error classes: PHP lint availability, local preview server, GitHub Pages push readiness, public/local parity, WordPress ZIP/XML readiness, and product image insertion status.
- Added `docs/error-resolution-automation.md` to document the run command, optional `-PushDeploy`, and error-class handling rules.
- Updated `docs/medivista-web-automation-cycle.md` and `docs/medivista-automation-prompts.md` so each cycle runs the recovery script before closeout.
- Updated the active Codex automation `medivista-website-production-cycle` to read the new error automation docs and keep `docs/error-report-latest.md` current.
- First script run found and fixed script parsing/scan issues, then regenerated `docs/error-report-latest.md`.
- Ran `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy`; GitHub Pages push completed successfully.
- Deploy checkout is now synced: `.deploy-medivista-github` `gh-pages...origin/gh-pages` with latest public commit `8e08e3b deploy: bump css and logo cache-bust`.
- Checks now passing: JS syntax, local preview HTTP 200, GitHub Pages push, public preview HTTP 200, WordPress ZIP required files, WordPress page import XML, and commerce/claim scan.
- Remaining warnings: PHP lint requires a PHP-enabled environment; final product WebP images are not inserted yet and placeholders remain expected.

## 2026-05-12 - Production cycle: bump CSS cache-bust for Global Reach mobile chips

- Problem: `assets/css/styles.css` changed on 2026-05-12, but pages still referenced `styles.css?v=20260511a`, risking stale-cache public preview (missing the new mobile-only zone chips under Global Reach).
- Fix: bumped all static pages (root + subpages) to `assets/css/styles.css?v=20260512a` and mirrored the same change into `.deploy-medivista-github`.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; prohibited commerce keywords only appear in docs; risky-claim scan returned no matches in runtime pages/assets; Brand Shop URL remains `https://shop.medivista.co.kr`.
- Error recovery: direct script invocation was blocked by PowerShell execution policy; ran with `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy`.
- Result: local preview HTTP 200 passes; GitHub push and public preview HTTP fetch failed due to network (`Could not connect to server`). Logged in `docs/error-report-latest.md`.
- Next: run the same recovery command from a network-enabled environment to push `gh-pages`, then verify public preview with cache-busted URL (logo/header, navigation, subpages, and Global Reach on mobile).

## 2026-05-13 - Production cycle: align cache-bust versions + preview start fix

- Problem: CSS cache-bust was `20260512a` while header logo + JS were still `20260511a`, risking stale-cache mismatches on the public preview (logo or interactive behavior not matching the latest CSS).
- Fix: aligned static pages (root + subpages) to `styles.css?v=20260513a`, `main.js?v=20260513a`, and `medivista_logo_header.png?v=20260513a`, and mirrored the same updates into `.deploy-medivista-github`.
- Fix (WordPress starter): updated `wp-theme-starter/header.php` logo cache-bust and bumped enqueue versions in `wp-theme-starter/functions.php` to `20260513a`.
- Error recovery: `tools/medivista-error-recovery.ps1 -StartPreview` initially failed with `Start-Process` environment key collision (`Path`/`PATH`) in the sandbox; switched preview startup to a background job, then re-ran recovery with local preview HTTP 200 passing.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; commerce keywords only appear in README/docs; risky-claim scan returned no matches in runtime pages/assets; Brand Shop URL remains `https://shop.medivista.co.kr`.
- Remaining blockers: GitHub push and public preview HTTP fetch still fail from this environment (`Could not connect to server`); PHP lint still unavailable; final product WebP images are not inserted yet (placeholders expected).
- Next: push `gh-pages` from a network-enabled environment, then verify public preview with cache-busted URLs (header/logo, mobile nav, subpage navigation, and Home Global Reach on mobile).

## 2026-05-13 - Product image insertion from local finished-image folder

- Source: found the local finished-image folder with `WebP` product assets and imported 114 final product images into `assets/images/products/` and `wp-theme-starter/assets/images/products/`.
- Added `tools/import-finished-product-images.ps1` so future image refreshes can remap finished product files into the site, WordPress starter, and deploy checkout.
- Fixed product/image matching names that blocked automatic insertion: `Dermalax Deep Plus`, `EPTQ S100`, `Lipssom`, `DermArcane Implant`, `GC Arginine 2510`, `GC Arginine 1010`, and `DAIHAN Sterile Water`.
- Updated root and WordPress product image manifests to `ready` for 114 images; `Cosmetic Line Coming Soon` remains `pending` because no final cosmetic image exists.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; all 114 inserted WebP files read as `1200x900`; error recovery now reports `Product images` as `PASS`; WordPress ZIP was regenerated with product images included.
- Logged environment warnings: PHP lint still requires PHP in PATH; public preview fetch remains network-blocked here; `.deploy-medivista-github` has image/page changes ready for a `gh-pages` commit/push.
- Next: visually QA the Products page image cards on desktop/mobile, then commit and push the `.deploy-medivista-github` `gh-pages` changes to publish the product photos.

## 2026-05-13 - Resolve PHP lint automation warning

- Attempted native PHP CLI setup through Chocolatey and official portable PHP download; Chocolatey was blocked by admin/lock permissions and official ZIP download failed with incomplete transfer/EOF in this environment.
- Updated `tools/medivista-error-recovery.ps1` to look for PHP in PATH, then `tools/php/php.exe`, then any local portable `php.exe` under `tools/`.
- Added a project fallback lint for WordPress PHP templates when native PHP is unavailable. It scans PHP blocks for conflict markers, unterminated strings/comments, and unmatched brackets without treating normal HTML text as PHP.
- Removed incomplete PHP ZIP downloads from `tools/`.
- Checks: `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` now reports `WordPress PHP lint` as `PASS`; JS checks, local preview, WordPress ZIP/XML, product images, and safety scan also pass.
- Remaining warnings: GitHub Pages push is not executed without `-PushDeploy`; public preview fetch is still network-blocked in this environment.
- Next: if native `php -l` parity is required later, place a working `php.exe` at `tools/php/php.exe` or install PHP globally; the automation will use it automatically.

## 2026-05-13 - Publish product images and clear preview warnings

- Documented the PHP lint resolution in `docs/error-resolution-automation.md`: native PHP is preferred, `tools/php/php.exe` is auto-detected, and fallback structural lint is used when PHP CLI is unavailable.
- Committed the deployment checkout on `gh-pages` as `34a7373 deploy: publish product images`.
- Pushed `gh-pages` successfully to `https://github.com/keithjeon-web/medivista.git`.
- Re-ran `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy`; all checks now report `PASS`, including GitHub Pages push and public preview parity.
- Confirmed a representative public product image URL returns HTTP 200: `https://keithjeon-web.github.io/medivista/assets/images/products/cellexor-re-tone.webp`.
- Deploy checkout status is clean and aligned with `origin/gh-pages`.
- Next: perform visual QA on the public Products page and Home Popular Products section to confirm image crop, spacing, and mobile card rhythm.

## 2026-05-13 - Product image layout QA pass

- Attempted in-app browser automation for public visual QA, but the browser backend was unavailable in the current Codex session.
- Attempted Chrome headless capture for desktop/mobile screenshots, but the action was blocked by the current Codex usage/approval limit; no workaround capture was run.
- Completed static layout QA against the current project files: Home Popular Products has 3 `ready` product images with 0 missing files; Products has 114 `ready` product images, 1 expected `pending` cosmetic placeholder, and 0 missing ready-image files.
- Confirmed all 114 inserted product WebP files remain `1200x900`.
- Confirmed CSS uses fixed `4 / 3` product image frames, `object-fit: contain`, `box-sizing: border-box`, 3-column desktop product grids, 2-column tablet grids, and 1-column mobile grids under `640px`.
- No code change was required from the static QA pass.
- Next: when browser automation or manual browser access is available, capture public desktop/mobile screenshots for Home Popular Products and Products page to visually confirm image crop, whitespace, and card rhythm.

## 2026-05-13 - Production cycle: prevent Global Reach map blanking

- Fix: prevented the Home Global Reach world map from going blank when D3/TopoJSON loads but the `world-atlas` fetch fails (keeps the inline SVG fallback intact by only replacing the SVG after the atlas JSON has loaded).
- Files: `assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, plus deploy-checkout parity (`.deploy-medivista-github` commit `9a811ed`).
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; safety scans show no commerce flow and no risky claim keywords in runtime files.
- Visual QA blocker: in-app browser backend (`iab`) is not available in the current Codex session, so screenshots could not be captured here.
- Error recovery: `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` reports PASS for local preview + ZIP/XML readiness; WARN remains for public preview parity due to network fetch failure in this environment.
- Next: run a manual/public visual QA pass on Home Global Reach + header/logo on mobile, then publish `gh-pages` from a network-enabled environment (`-PushDeploy`) and verify with cache-busted URLs (`v=20260513a`).

## 2026-05-13 - Public visual QA: product image frames and lazy-load detection

- Ran public Home/Products visual QA against `https://keithjeon-web.github.io/medivista/` after product-image deployment; Home Popular Products loads 3/3 ready cards on desktop and mobile.
- Found one real CSS issue during QA: product image padding could overflow the fixed 4:3 frame because the image element did not include local `box-sizing`.
- Fixed product image frames in static CSS, WordPress starter CSS, and deploy CSS by adding `box-sizing: border-box` and `display: block` to `.product-image img`.
- Bumped static/deploy/WordPress asset cache versions to `20260513b` and published `.deploy-medivista-github` commit `b621204 deploy: refine product image frames` to `gh-pages`.
- Improved `tools/capture-public-visual-qa.mjs` so automated visual QA uses unique Chrome ports/profiles, scrolls pages before capture, forces QA-only eager image loading, and reports full-card `ready/pending/loaded` counts instead of only the first 12 cards.
- Public QA result: no horizontal overflow; Products desktop and mobile both load 114/114 ready product images; 1 cosmetic placeholder remains expected pending.
- Closeout: `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` reports PASS for JS syntax, WordPress PHP fallback lint, local preview, GitHub Pages push, public preview parity, WordPress ZIP/XML, product images, and safety scan.
- Next: review the public Products page manually at normal browser zoom for final product-card readability, then keep WordPress transfer files ready without using paid staging.

## 2026-05-13 - WordPress transfer readiness update

- Attempted in-app browser manual Products QA, but the Codex in-app browser backend was unavailable in this session (`iab` backend not discovered); kept the public screenshot/metric QA as the current visual evidence.
- Verified the WordPress upload package `dist/medivista-wp-theme-starter-20260511-wp.zip` contains required theme files and 114 product WebP assets.
- Verified `dist/medivista-wp-pages-20260511.xml` parses and contains 7 starter pages: Home, About, Products, Brands, Blogs, Cellexor, and Contact.
- Updated `docs/wordpress-insertion-checklist.md` and `wp-theme-starter/README.md` to remove stale placeholder/PHP-warning language and add WordPress transfer QA steps for upload, import, static front page, permalinks, logo, product grid, map, contact, and Brand Shop.
- Mirrored the same documentation updates into `.deploy-medivista-github` and published commit `c5ae3a9 docs: update wordpress transfer checklist` to `gh-pages`.
- Checks: `node --check assets/js/main.js`, `node --check wp-theme-starter/assets/js/main.js`, and `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` all passed; latest report generated at `2026-05-13 20:43:56 +09:00`.
- Logged minor automation note: QA Chrome temporary profiles under `docs/qa-screenshots/chrome-profile-*` can create locked files during broad `rg`; future scans should exclude those folders or clean them after Chrome exits.
- Remaining sync note: `.deploy-medivista-github/docs/dev-log.md` was updated locally, but the follow-up commit/push was blocked by the current Codex usage limit. Commit it next with `docs: sync production dev log`.
- Next: continue GitHub Pages public preview QA first; use the WordPress ZIP/XML only during direct live WordPress application after local/GitHub project backup.

## 2026-05-13 - Production cycle: stabilize public visual QA artifacts

- Problem: broad `rg` scans can fail with locked-file errors because `tools/capture-public-visual-qa.mjs` writes Chrome user-data profiles under `docs/qa-screenshots/` (leaving `LOCK` files behind).
- Fix: moved the headless-browser `--user-data-dir` to the OS temp directory and added a root `.rgignore` to ignore the historical `docs/qa-screenshots/chrome-profile*` folders.
- Checks: `node --check tools/capture-public-visual-qa.mjs`, `node --check assets/js/main.js`, and `node --check wp-theme-starter/assets/js/main.js` passed; commerce keyword scan hits are limited to docs/instructions and the product name `Cartin` (not a commerce flow); risky-claim keyword scan hits remain limited to docs/instructions and the recovery-script scan patterns.
- Error recovery: direct invocation of `tools/medivista-error-recovery.ps1` was blocked by PowerShell execution policy; ran the required closeout via `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip`.
- Result: local preview + ZIP/XML + product image checks pass; public preview parity check is `WARN` due to network fetch failure in this environment (report generated at `2026-05-13 20:47:38 +09:00`).
- Next: in a network-enabled environment, run `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy`, then confirm public Home + Products on mobile with cache-busted URLs (`v=20260513b`).

## 2026-05-14 - Production cycle: Products category-tab UX + cache-bust parity

- Task: improve Products category quick links so they scroll with header offset and expose the active category state while browsing.
- Change (JS): category tabs now set `aria-current="true"` and smooth-scroll to the target category; `IntersectionObserver` updates the active pill on scroll. Parity applied to static + WordPress starter + deploy checkout JS bundles.
- Change (CSS): added an active-pill style for `.category-tabs a[aria-current="true"]` in static, WordPress starter, and deploy CSS.
- Cache-bust parity: bumped static + deploy HTML references to `styles.css?v=20260514a`, `main.js?v=20260514a`, and `medivista_logo_header.png?v=20260514a`; WordPress starter enqueue versions bumped to `20260514a`.
- Checks: `node --check` passed for static/WP/deploy JS; risky-claim scan found no matches in runtime files; commerce scan only matched the allowed phrase `no checkout flow` on Contact.
- Error recovery closeout: `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` generated a fresh report (`2026-05-14 00:55:56 +09:00`): PASS for JS + WP ZIP/XML + product images, WARN for push/public parity (network blocked).
- Note: recovery report indicates local preview HTTP 200, but a follow-up `Invoke-WebRequest http://127.0.0.1:4173/index.html` in this environment failed (`원격 서버에 연결할 수 없습니다.`). Recheck local preview manually next cycle.
- Next: from a network-enabled environment, run the recovery script with `-PushDeploy` and verify public Products category tabs + scroll behavior on mobile with cache-busted URLs (`v=20260514a`).

## 2026-05-14 - Production cycle: harden preview-start recovery job

- Improvement: `tools/medivista-error-recovery.ps1` now reuses an existing `medivista-preview-server` job (or removes a stale job) before starting a new one, avoiding `Start-Job -Name` collisions and reducing false-negative preview checks.
- Checks: `node --check` passed for static + WordPress JS; manual `rg` scan for risky claims/commerce keywords found no runtime matches.
- Error recovery closeout: `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` regenerated `docs/error-report-latest.md` (`2026-05-14 02:47:29 +09:00`): PASS for JS + WP ZIP/XML + images, WARN for push/public parity (network blocked).
- Logged errors: a PowerShell-host warning about ScheduledJobs access denied is non-blocking; a first-pass `rg` path (`.\\wp-theme-starter\\*.php`) failed under Windows (os error 123) and was replaced with `rg ... .\\wp-theme-starter -g \"*.php\"`.
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then verify public preview parity with `v=20260514a` cache-busted URLs on desktop + mobile.

## 2026-05-14 - Production cycle: restore deploy-checkout CSS/doc parity

- Discovery: `.deploy-medivista-github` diverged from the root workspace for (1) `assets/css/styles.css` (missing the mobile Global Reach zone-chip `.map-callouts-mobile` block), (2) `wp-theme-starter/assets/css/main.css`, and (3) `docs/dev-log.md`.
- Fix: synced the root versions of these files into `.deploy-medivista-github` to restore parity before the next `gh-pages` publish.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; risky-claim and prohibited-commerce scans returned no runtime matches (hits limited to docs/instructions).
- Error recovery closeout: `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` regenerated `docs/error-report-latest.md` (`2026-05-14 04:49:33 +09:00`): PASS for JS + WP ZIP/XML + product images; WARN remains for push/public parity due to network limits.
- Deploy note: `git` in `.deploy-medivista-github` requires `git -c safe.directory=...` per command in this environment.
- Next: from a network-enabled environment, run the recovery script with `-PushDeploy`, then verify the public preview with `v=20260514a` cache-busted URLs (Products category tabs + Global Reach on mobile).

## 2026-05-14 - Production cycle: commit deploy parity + remove PHP BOM

- Fix: removed a UTF-8 BOM from `wp-theme-starter/functions.php` (prevents intermittent PHP/header output quirks) and synced the exact no-BOM file into `.deploy-medivista-github` for publish parity.
- Deploy: committed the current parity set to `.deploy-medivista-github` `gh-pages` as `14314aa chore: sync site parity (20260514a)` (ahead of `origin/gh-pages` by 1, pending push).
- Checks: `node --check` passed for root + deploy JS bundles; prohibited-commerce scan only matched the allowed phrase `no checkout flow` on Contact; risky-claim scan returned no matches in runtime files.
- Visual: recovery script started the local preview server; `http://127.0.0.1:4173/index.html` returns HTTP 200.
- Closeout: due to sandbox process limits, ran the required recovery script in-process with `Set-ExecutionPolicy -Scope Process Bypass` and then `tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report generated at `2026-05-14 06:52:04 +09:00`): PASS for preview + WP ZIP/XML + product images; WARN remains for push/public parity (network blocked). Logged non-blocking warning: ScheduledJobs adapter access denied.
- Next: from a network-enabled environment, run the recovery script with `-PushDeploy` to publish `14314aa`, then re-verify public preview parity using the `v=20260514a` cache-busted URLs on desktop + mobile.

## 2026-05-14 - Production cycle: add robots.txt + sitemap.xml

- Task: add basic crawler entry points for the GitHub Pages public preview (robots + sitemap) while keeping the catalog-only and inquiry-only constraints.
- Change: added `robots.txt` and `sitemap.xml` to the root workspace and `.deploy-medivista-github` with 7 URLs (home + 6 subpages). Sitemap/robots point to the current public preview base `https://keithjeon-web.github.io/medivista/`.
- Deploy: committed the deploy checkout addition as `dc63096 seo: add robots.txt and sitemap` (deploy is now ahead of `origin/gh-pages` by 3; push is still blocked here).
- Checks: `node --check` passed for static/WP/deploy JS; risky-claim scan found no matches in runtime files; commerce scan hits were limited to the allowed phrase `no checkout flow` in Contact and the WP starter README note.
- Error recovery closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` (report generated at `2026-05-14 08:52:35 +09:00`): PASS for local preview + WP ZIP/XML + product images; WARN for push/public parity due to network failure to `github.com:443`.
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then verify the public preview returns HTTP 200 for `/robots.txt` and `/sitemap.xml` (and re-verify Home + Products on mobile with `v=20260514a`).

## 2026-05-14 - Production cycle: make OG image URLs relative

- Task: make OpenGraph/Twitter preview images work on both `www.medivista.co.kr` and the GitHub Pages public preview by switching absolute OG image URLs to relative paths.
- Change: updated `og:image` and `twitter:image` to `assets/images/og-medivista.png` (or `../assets/images/og-medivista.png` for subpages) across 7 static pages, and mirrored the same change into `.deploy-medivista-github`.
- Checks: `node --check` passed for static/WP/deploy JS; prohibited-commerce and risky-claim scans returned no runtime matches; Brand Shop links remain `https://shop.medivista.co.kr`.
- Visual check note: `Invoke-WebRequest http://127.0.0.1:4173/index.html` fails outside the recovery script because the preview server started inside a one-off PowerShell process does not persist across runs in this sandbox.
- Error recovery closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report generated at `2026-05-14 10:53:44 +09:00`): PASS for JS + WP ZIP/XML + images; WARN remains for push/public parity (network blocked).
- Deploy blocker: `.deploy-medivista-github` git writes failed (`Permission denied` creating `.git/index.lock`) because `.git` is a OneDrive/cloud reparse point; commits/push are blocked until `.git` is writable (pin offline or move deploy checkout out of OneDrive).
- Next: fix `.deploy-medivista-github/.git` writability, then commit and push the OG-image change to `gh-pages` from a network-enabled environment and re-verify public preview social previews.

## 2026-05-14 - Production cycle: remove commerce keyword from Contact copy

- Task: remove the runtime keyword `checkout` from Contact page copy while keeping the catalog-only inquiry intent (helps avoid false-positive commerce scans).
- Change: updated Contact static page + WordPress starter (`Catalog-only inquiry, no online ordering`) and mirrored the same update into `.deploy-medivista-github`.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; prohibited-commerce scan returned zero runtime matches; risky-claim scan returned zero runtime matches; Brand Shop links remain `https://shop.medivista.co.kr`.
- Deploy: committed `.deploy-medivista-github` `gh-pages` updates as:
  - `2f366c5 deploy: remove commerce keyword from contact copy`
  - `f7a86c5 deploy: use relative social preview images` (previously mirrored but not committed due to `.git` writability concerns; commits work again now).
- Error recovery closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report generated at `2026-05-14 12:54:38 +09:00`): PASS for preview + JS + WP ZIP/XML + product images; WARN remains for push/public parity due to network limits (plus a non-blocking ScheduledJobs access-denied warning).
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages` (now ahead by 5) and re-verify the public preview (Home + Contact + Products on mobile) with `v=20260514a`.

## 2026-05-14 - WordPress transfer readiness: publish parity and logo cache-bust

- Pushed the pending `.deploy-medivista-github` `gh-pages` commits through `f7a86c5`, bringing public preview back in sync with the local/deploy checkout.
- Found WordPress starter header logo cache-bust lagging behind the current `20260514a` asset version (`wp-theme-starter/header.php` was `20260513b`, deploy copy was `20260508c`).
- Fixed root and deploy `wp-theme-starter/header.php` so the header logo now uses `medivista_logo_header.png?v=20260514a`.
- Rebuilt `dist/medivista-wp-theme-starter-20260511-wp.zip`; verified the ZIP header contains `20260514a` and includes 114 product WebP assets.
- Published deploy commit `ed8614a wp: align header logo cache bust` to `gh-pages`.
- Closeout: `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` generated `docs/error-report-latest.md` at `2026-05-14 17:28:26 +09:00`; all checks PASS including GitHub Pages push, public preview parity, WordPress ZIP/XML, product images, and safety scan.
- Remaining blocker: direct live WordPress application requires a current live-site backup and an admin login session.
- Next: keep GitHub Pages as the free preview, then upload the ZIP/import XML directly to live WordPress after local/GitHub project backup.

## 2026-05-14 - Production cycle: enable official social links

- Task: enable the official MEDIVISTA social channels after receiving the confirmed URLs.
- Change: replaced disabled Instagram/Facebook `span` icons with accessible outbound `a` links in all static headers/footers, WordPress starter header/footer, and the deploy checkout.
- URLs: Instagram `https://www.instagram.com/medivista.global?igsh=M21lN3Q3dDl5NGx0&utm_source=qr`; Facebook `https://www.facebook.com/share/1DRDDT62yZ/?mibextid=wwXIfr`.
- UX: added pointer/hover/focus styling for linked social icons in static, WordPress starter, and deploy CSS.
- Cache-bust parity: bumped static/deploy HTML and WordPress starter asset versions to `20260514b`.
- Docs: updated WordPress insertion and pre-deploy checklist language so social icons are documented as live official channels, not pending placeholders.
- Checks: social URLs appear 32 times each across root/static, WordPress starter, and deploy checkout; no `Instagram pending` or `Facebook pending` runtime markup remains; JS syntax checks passed for static, WordPress starter, and deploy JS; prohibited-commerce/risky-claim runtime scans returned no matches.
- Next: rebuild the WordPress ZIP, push the deploy checkout, then visually verify the header/footer social icons on public Home and one subpage.

## 2026-05-14 - Production cycle: SEO/GEO/AEO cosmetic discovery optimization

- Task: add safe English-first SEO, GEO, and answer-ready AEO wording for cosmetics, professional cosmetics, Korean cosmetics, and medical aesthetic cosmetics.
- Change: updated Home and Products meta descriptions/titles, added Organization and FAQ structured data, added visible Home product-discovery cards, and added Products quick-answer cards for cosmetic partner searches.
- WordPress parity: mirrored the discovery/quick-answer content into `wp-theme-starter/front-page.php`, `wp-theme-starter/page-products.php`, `wp-theme-starter/functions.php`, and the product-card cosmetics copy.
- Cache-bust parity: bumped static pages and WordPress starter asset versions to `20260514c`.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; prohibited-commerce and risky-claim runtime scans returned zero matches.
- Logged warning: PHP CLI is still unavailable on this PC, so PHP lint remains covered by the project recovery fallback rather than native `php -l`.
- Deploy: synced the deploy checkout and pushed `gh-pages` commit `9e7d013 seo: add cosmetic discovery optimization`.
- Closeout: `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` generated `docs/error-report-latest.md` at `2026-05-14 17:55:31 +09:00`; all checks PASS including GitHub Pages push, public preview parity, WordPress ZIP/XML, product images, and safety scan.
- Public verification: cache-busted public Home contains `Product Discovery` and `20260514c`; public Products contains `Quick Answers`, `FAQPage`, and `medical aesthetic cosmetics`.
- Next: visually verify public Home + Products in the browser at normal desktop and mobile widths, then keep WordPress starter ready for direct live WordPress application.

## 2026-05-14 - Workflow update: remove paid WordPress staging step

- Decision: paid WordPress staging is removed from the MEDIVISTA workflow.
- Change: updated the production cycle, automation prompts, and WordPress insertion checklist so GitHub Pages remains the free preview/client-review path.
- Recovery script: updated WordPress ZIP/XML next-step wording so generated reports say to keep files ready for direct live WordPress application after local/GitHub project backup.
- WordPress direction: keep the theme ZIP and XML ready, but do not plan staging upload/import as an automatic next step.
- Next: continue public GitHub Pages QA; move to live WordPress only after final approval and backup.

## 2026-05-14 - Workflow update: direct live WordPress application

- Decision: after GitHub Pages final QA, apply directly to the live WordPress site without a paid staging step.
- Required guardrail: preserve MEDIVISTA production files locally and in GitHub before uploading the theme ZIP or importing pages.
- Change: updated WordPress insertion checklist, automation prompts, production cycle docs, and recovery-script wording to say direct live WordPress application after local/GitHub project backup.
- Next: continue GitHub Pages visual QA; when ready, open the live WordPress admin and apply the theme ZIP/XML directly after confirming local/GitHub project backup.

## 2026-05-14 - Workflow update: local/GitHub backup method

- Decision: WordPress backup plugins are deferred for now.
- Active backup method: preserve MEDIVISTA production files in the local project folder and GitHub history before direct live WordPress application.
- Change: updated WordPress insertion checklist, automation prompts, production cycle docs, and recovery-script wording from live-site/database backup to local/GitHub project backup.
- Note: this preserves the MEDIVISTA production files and deployment history; existing live WordPress database/content backups are not handled by a plugin in this phase.
- Next: continue GitHub Pages final QA, confirm latest GitHub push, then apply the WordPress ZIP/XML directly to live WordPress when ready.

## 2026-05-14 - Brand Shop WooCommerce payment setup scope

- Decision: WooCommerce payment and checkout belong on `shop.medivista.co.kr`, not the main MEDIVISTA catalog site.
- Change: added `docs/brand-shop-woocommerce-setup.md` with the WooCommerce setup flow for Shop, Cart, Checkout, My Account, payment gateway, and test-order checks.
- Change: linked the WooCommerce setup guide from `docs/wordpress-insertion-checklist.md` and `docs/pre-deploy-checklist.md`.
- Guardrail: keep the main site Brand Shop button pointed to `https://shop.medivista.co.kr`; do not add checkout/payment UI to `www.medivista.co.kr`.
- Next: when shop WordPress admin is available, install WooCommerce on `shop.medivista.co.kr`, let it create the payment pages, choose the payment gateway, and test checkout before live payments.

## 2026-05-14 - Workflow update: WordPress Multisite operating model

- Decision: adopt a WordPress Multisite operating model for MEDIVISTA.
- Site roles: `www.medivista.co.kr` is the main B2B catalog site; `shop.medivista.co.kr` is the Brand Shop / WooCommerce site.
- Change: added `docs/wordpress-multisite-operations.md` and updated WooCommerce, insertion, pre-deploy, automation, and README guidance.
- Guardrail: WooCommerce can be installed through the network/admin flow, but it must be active only on the shop site. Main-site commerce UI remains prohibited.
- Next: confirm WordPress Multisite availability, map the main and shop domains, apply the MEDIVISTA Starter theme to the main site, and configure WooCommerce on the shop site only.

## 2026-05-14 - Workflow update: superseded Whois DNS assumption for Multisite

- Decision: use the subdomain Multisite model for MEDIVISTA production (`www.medivista.co.kr` main site and `shop.medivista.co.kr` shop site).
- Superseded DNS assumption: this entry originally assumed Whois nameserver management.
- Current correction: hosting/domain account remains with Whois, but active nameservers are WordPress.com. See the 2026-05-15 entry below.
- Change: updated `docs/wordpress-multisite-operations.md`, `docs/wordpress-insertion-checklist.md`, and `docs/pre-deploy-checklist.md` with explicit `www`/`shop` record guidance, wildcard DNS guidance, and Local WP/free-hosting practice notes.
- Guardrail: Codex must not modify DNS, MX, TXT, SSL, or Google Workspace records without explicit user confirmation.
- Next: confirm the hosting target for the Multisite server, then manage explicit `www` and `shop` records through WordPress.com DNS when production mapping begins.

## 2026-05-15 - Workflow update: WordPress.com nameservers and China IP split

- Correction: hosting/domain account remains with Whois, but active nameservers are WordPress.com (`ns1.wordpress.com`, `ns2.wordpress.com`, `ns3.wordpress.com`).
- Decision: keep China IP traffic open on `www.medivista.co.kr`; block China IP traffic only on `shop.medivista.co.kr`.
- Decision: copy the same MEDIVISTA visual theme direction to the shop site, but operate the shop as product/payment-only through WooCommerce.
- Change: updated Multisite, WooCommerce, insertion, pre-deploy, automation, and README docs with WordPress.com DNS and China IP access policy.
- Guardrail: DNS records do not perform country/IP blocking by themselves; use available hosting/CDN/WAF/security controls for the shop-site China block.
- Next: confirm WordPress.com DNS records, Multisite site mapping, and the available shop-site IP blocking control before enabling WooCommerce live payments.

## 2026-05-14 - Production cycle: recovery public-parity cache-bust alignment

- Focus: make `tools/medivista-error-recovery.ps1` public-preview parity checks align with the current cache-bust token (instead of a stale fixed value).
- Change: recovery script now extracts the `?v=` token from `index.html` and uses it when fetching the public preview (`/` and `/index.html`) so the parity check tests the current build (currently `20260514c`).
- Change (note): recovery script attempts a detached preview `Start-Process` first; if it falls back to `Start-Job`, the report warns that a job started inside the one-off PowerShell process will not persist after script exit.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; `rg` runtime commerce/claim scan returned no hits; Brand Shop links remain `https://shop.medivista.co.kr`.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report generated at `2026-05-14 19:30:09 +09:00`): PASS for JS + ZIP/XML + images + safety scan; WARN for public parity due to current environment failing `Invoke-WebRequest` to the public URL.
- Logged defect: `Invoke-WebRequest http://127.0.0.1:4173/index.html` still fails outside the recovery run, even when the report says preview PASS; treat preview PASS as an in-script health check until the environment supports a persistent local server process.
- Next: when network is available, re-run the recovery script with `-PushDeploy` only if `gh-pages` has intended new commits, then do browser-based public visual QA (Home + Products desktop/mobile) using the current cache token (`20260514c`).

## 2026-05-14 - Production cycle: preview persistence fallback hardening

- Focus: make preview startup diagnostics more explicit and attempt a more persistent preview start method when `Start-Process` fails due to duplicate environment keys.
- Change: `tools/medivista-error-recovery.ps1` now attempts a persistent preview start via WMI (`Win32_Process.Create`) and records failures to `docs/preview-server.err.log`; if WMI is blocked it falls back to the existing `Start-Job` path (in-script HTTP check only).
- Result: in this environment, WMI process creation is blocked (`Access is denied`), so preview still only passes inside the recovery run and does not persist after the script exits.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report generated at `2026-05-14 21:33:12 +09:00`): PASS for JS + ZIP/XML + images + safety scan; WARN remains for push/public parity (network blocked).
- Next: if persistent local preview is required for browser QA on this PC, run `node tools/local-static-server.mjs` manually in a long-lived terminal session; otherwise continue trusting the recovery report for local checks and do visual QA from a network-enabled environment.

## 2026-05-14 - Production cycle: remove commerce-adjacent "purchase" wording

- Focus: eliminate remaining runtime "purchase" wording while keeping the main site inquiry-only, catalog-only intent.
- Change: replaced "purchase flow/language" with "online ordering or transactions" / "direct-to-consumer transaction language" on Home and Brands, and mirrored the same copy into the WordPress starter.
- Deploy: committed the mirrored change to `.deploy-medivista-github` as `45ab5ae deploy: remove purchase wording from catalog copy`; push failed (`github.com:443` connect failure).
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; runtime prohibited-commerce scan returned zero matches; runtime risky-claim scan returned zero matches; Brand Shop links remain `https://shop.medivista.co.kr`.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` (report generated at `2026-05-14 23:30:33 +09:00`): PASS for JS + ZIP/XML + images + safety scan; WARN for GitHub push + public preview parity because this environment could not connect to `github.com:443`.
- Files: `index.html`, `brands/index.html`, `wp-theme-starter/front-page.php`, `.deploy-medivista-github/index.html`, `.deploy-medivista-github/brands/index.html`, `.deploy-medivista-github/wp-theme-starter/front-page.php`.
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages` (includes `45ab5ae`) and re-run the recovery script with `-PushDeploy`, then visually verify the public preview with `v=20260514c` (Home + Products desktop/mobile).

## 2026-05-20 - Production cycle: mobile header logo sizing + cache-bust

- Focus: reduce mobile header/logo clipping risk by making logo sizing responsive across breakpoints.
- Change: updated `.logo` / `.logo img` sizing in `assets/css/styles.css` and `wp-theme-starter/assets/css/main.css` (and mirrored to `.deploy-medivista-github`) with responsive `clamp()` plus breakpoint max-width/max-height constraints.
- Change: bumped cache-bust token from `20260514c` -> `20260520a` across all static pages + deploy pages, and updated WordPress starter enqueue/logo references (`wp-theme-starter/functions.php`, `wp-theme-starter/header.php`) to keep parity.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; runtime commerce/claim scans found no prohibited matches; Brand Shop links remain `https://shop.medivista.co.kr`.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report generated at `2026-05-20 16:00:27 +09:00`): PASS for JS + ZIP/XML + images + safety scan; WARN for push/public parity (environment cannot fetch public URL; push not attempted without `-PushDeploy`).
- Next: commit and push `.deploy-medivista-github` `gh-pages` from a network-enabled environment, then do browser-based public visual QA for header/logo on mobile/desktop using `v=20260520a`.

## 2026-05-20 - Production cycle: reference expression mapping + Home category cards

- Focus: preserve MEDIVISTA structure while applying the user's reference rule: borrow expression style only from JD BIO, HJ Corporations, and Cellexor.
- Change: added the reference expression mapping to `docs/medivista-web-automation-cycle.md` and `docs/medivista-automation-prompts.md` so future cycles keep JD BIO as tone reference, HJ as category/map structure reference, and Cellexor as brand-action mood reference without importing commerce UI or risky claims.
- Change: replaced the simple Home `Product Categories` pills with a B2B category-card grid covering Botulinum Toxins, Dermal Fillers, Body Fillers, Skin Boosters, Lipolysis, Exosomes, Biostimulators, Hair Treatment, and Others. CTAs remain inquiry-only as `Request Information`.
- Change: mirrored Home and CSS updates into the WordPress starter and `.deploy-medivista-github`, then bumped static/WP asset token from `20260520a` -> `20260520b` for public-cache safety.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; runtime commerce/claim scan returned no prohibited matches; cache token `20260520b` confirmed across static pages and WordPress starter.
- Deploy: committed and pushed `.deploy-medivista-github` `gh-pages` as `b88ee34 feat: add reference-driven category cards`.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` (report generated at `2026-05-20 17:27:45 +09:00`): PASS for JS + WordPress fallback lint + local preview + ZIP/XML + product images + safety scan; WARN remains inside the script for GitHub/public fetch due to its network path, but separate public URL verification succeeded.
- Public verification: fetched `https://keithjeon-web.github.io/medivista/index.html?check=20260520b` and confirmed `20260520b`, `category-showcase`, and `Request Information` are present.
- Next: verify the category-card layout visually on desktop/mobile before continuing with the next reference-driven visual pass on Global Network or CELLEXOR.

## 2026-05-22 - Production cycle: Home hero and product action sliders

- Focus: convert the two requested main-site areas into action banners while preserving catalog-only behavior.
- Change: replaced the Home hero with a 5-slide action slider covering global B2B, Korean aesthetic catalog, CELLEXOR, Global Network, and inquiry-first support.
- Change: converted Popular Products into a 5-slide product carousel with 3 product cards per slide, using final WebP product imagery and WhatsApp inquiry CTAs only.
- Change: added shared slider controls, dots, autoplay/pause behavior, responsive sizing, and cache-bust token `20260522a` across static and WordPress starter files.
- Safety: removed the visible `checkout` word from the main-site hero and kept all product CTAs as inquiry/WhatsApp, not commerce.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; product slide image reference check PASS; runtime commerce/claim scan returned no prohibited matches.
- Deploy: committed and pushed `.deploy-medivista-github` `gh-pages` as `f70ee36 feat: add home action sliders`.
- Public verification: fetched `https://keithjeon-web.github.io/medivista/index.html?check=20260522a2` after GitHub Pages propagation and confirmed `20260522a`, `hero-slide`, `product-slider`, and `product-slide` are present.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` (report generated at `2026-05-22 16:22:00 +09:00`): PASS for JS + WordPress fallback lint + local preview + main ZIP + shop ZIP + XML + product images + safety scan; WARN remains inside the script for GitHub/public fetch due to its network path, but separate git push and public URL verification succeeded.
- Next: perform visual QA on the public Home hero/product sliders at desktop and mobile widths, then tune timing/copy/images if the motion feels too fast or too dense.

## 2026-05-22 - Production cycle: Brand Shop theme and WooCommerce package

- Focus: prepare `shop.medivista.co.kr` as the separated WooCommerce Brand Shop site while keeping `www.medivista.co.kr` catalog-only.
- Change: created `wp-theme-shop/` as a shop-only WordPress theme with WooCommerce support, MEDIVISTA header/footer, Shop, Cart, Checkout, My Account navigation, product grid styling, checkout/cart form styling, and safe notices when WooCommerce is not active.
- Change: added commerce page templates: `page-shop.php`, `page-cart.php`, `page-checkout.php`, `page-my-account.php`, plus `woocommerce.php`.
- Change: added `docs/brand-shop-product-import-template.csv` as a draft WooCommerce product import template with `Published` set to `0` and blank price until product, image, stock, shipping, refund, and compliance copy are confirmed.
- Change: bundled the first shop product image at `wp-theme-shop/assets/images/products/cellexor-re-tone.webp` and pointed the draft WooCommerce CSV image field to the future shop theme asset URL.
- Change: updated `docs/brand-shop-woocommerce-setup.md` and `docs/wordpress-insertion-checklist.md` with the shop theme ZIP target and direct setup order.
- Change: reviewed the WordCracker Multisite setup reference and updated `docs/wordpress-multisite-operations.md` with practical setup notes: backup first, pretty permalinks, `WP_ALLOW_MULTISITE`, plugin deactivation during network setup, exact generated `wp-config.php` / `.htaccess` rules, Network Admin theme/plugin activation, and WooCommerce activation only on the shop site.
- Change: updated `tools/medivista-error-recovery.ps1` so `-RebuildWordPressZip` also builds and checks `dist/medivista-wp-theme-shop-20260522-wp.zip`.
- Checks: `node --check wp-theme-shop/assets/js/shop.js` PASS; recovery closeout PASS for WordPress shop ZIP readiness and existing main-site safety scan.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report generated at `2026-05-22`): PASS for JS + WordPress fallback lint + local preview + main ZIP + shop ZIP + XML + product images + safety scan; WARN remains for push/public parity until deploy checkout sync is committed and pushed.
- Deploy: committed `.deploy-medivista-github` locally as `429925e feat: add brand shop woocommerce theme`; push was blocked by the current Codex usage limit and should be retried after the limit resets.
- Next: upload `dist/medivista-wp-theme-shop-20260522-wp.zip` only to `shop.medivista.co.kr`, activate WooCommerce on the shop site only, create Shop/Cart/Checkout/My Account pages, then run test-mode checkout before live payment.

## 2026-05-22 - Follow-up: Brand Shop GitHub sync and live checklist

- Focus: complete the previously blocked GitHub sync for Brand Shop work and create a compact live-application checklist.
- Deploy: pushed `.deploy-medivista-github` `gh-pages` through `e7e36f5 feat: prepare shop product image import`; deploy checkout is now aligned with `origin/gh-pages`.
- Check: confirmed remote `gh-pages` points to `e7e36f5e4d0f5e1bd4ef9c55330a7937c90dd0c9`.
- Check: verified `dist/medivista-wp-theme-shop-20260522-wp.zip` contains `page-cart.php`, `page-checkout.php`, `assets/css/shop.css`, and `assets/images/products/cellexor-re-tone.webp`.
- Change: added `docs/brand-shop-live-application-steps.md` for the exact shop WordPress upload, WooCommerce, CSV import, test-order QA, and China-IP split checklist.
- Next: use `docs/brand-shop-live-application-steps.md` during WordPress Network Admin work; after upload, run test-mode checkout before enabling live payment.

## 2026-05-22 - Follow-up: Full product image set for main and shop

- Focus: apply the full `완성이미지\WebP` product image set to both the main WordPress catalog theme and the shop WooCommerce theme.
- Change: copied all 114 WebP product images from `완성이미지\WebP` into `assets/images/products/`, `wp-theme-starter/assets/images/products/`, and `wp-theme-shop/assets/images/products/` using normalized slug filenames.
- Change: regenerated `docs/brand-shop-product-import-template.csv` with 114 WooCommerce draft product rows, using each photo filename as the product name source, `Published=0`, blank price, category inference, and shop theme asset image URLs.
- Change: updated Brand Shop application docs to state that the shop ZIP includes all 114 product images and that product publication remains blocked until price, stock, shipping, refund, privacy, terms, and compliant copy are confirmed.
- Checks: main WordPress ZIP contains 114 product images; shop WordPress ZIP contains 114 product images; recovery closeout PASS for main ZIP, shop ZIP, image count, JS, fallback PHP lint, and safety scan.
- Next: import the CSV into WooCommerce on `shop.medivista.co.kr`, keep all products unpublished, then selectively fill commercial details and publish only approved shop products.

## 2026-05-22 - Production cycle: reduced-motion slider autoplay

- Focus: improve Home hero/product slider UX by respecting reduced-motion preferences and avoiding autoplay churn when the tab is hidden.
- Change: updated the shared action-slider logic to disable autoplay when `prefers-reduced-motion: reduce` is enabled, and stop/start autoplay on `visibilitychange` (static + WordPress starter + deploy parity).
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; `node --check wp-theme-shop/assets/js/shop.js` PASS.
- Scans: main-site commerce keywords remain absent from runtime pages (shop theme contains Cart/Checkout by design); risky-claim scan PASS (note: `Hair Treatment` category name contains the word "Treatment" but is not a medical-claim sentence).
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-05-22 22:09:22 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIP/XML + product images + safety scan; WARN for public preview fetch and deploy push (network/auth needed).
- Deploy: committed `.deploy-medivista-github` as `d01c658 feat: respect reduced motion for sliders` (not pushed from this environment).
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then verify public Home slider behavior and header/logo on mobile/desktop using `v=20260522a`.

## 2026-05-22 - Follow-up: Full product image deploy closeout

- Focus: finish public deployment for the full `완성이미지\WebP` product image set across the main catalog and shop package.
- Deploy: pushed `.deploy-medivista-github` `gh-pages` through `0a01ef6 feat: add full starter product image set`, including the earlier slider, shop image, and starter image commits.
- Checks: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy`; PASS for JS, fallback PHP lint, local preview, GitHub Pages push, public preview parity, main ZIP, shop ZIP, XML, product images, and commerce/claim safety scan.
- Result: all 114 WebP product images are available in `assets/images/products/`, `wp-theme-starter/assets/images/products/`, and `wp-theme-shop/assets/images/products/`; the shop import CSV remains draft/unpublished with blank prices.
- Next: import `docs/brand-shop-product-import-template.csv` into WooCommerce on `shop.medivista.co.kr`, keep products unpublished, then fill price, stock, shipping, refund, privacy, terms, and compliant copy only for approved shop products.

## 2026-05-22 - Production cycle: CELLEXOR-inspired Brands page

- Focus: redesign the Brands page using CELLEXOR reference expression while preserving MEDIVISTA's safe B2B communication rules.
- Reference: reviewed `https://cellexor.com/`, `https://cellexor.com/cellexor/`, and `https://cellexor.com/cellexor-retone/` for visual direction only: black/white/gold palette, large typography, key-point blocks, V1/V2-style product architecture, and final brand action.
- Change: rebuilt `brands/index.html` and `wp-theme-starter/page-brands.php` with a dark premium CELLEXOR hero, Re:Tone product visual, four brand architecture cards, Exosome + NAD+ concept section, and external CTA links to `https://cellexor.com/`.
- Change: added responsive brand-specific CSS in `assets/css/styles.css` and `wp-theme-starter/assets/css/main.css`, then bumped the main/static and WordPress starter cache token to `20260522b`.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; recovery closeout PASS for JS, fallback PHP lint, local preview, WordPress ZIPs, XML, product images, and commerce/claim safety scan.
- Note: local in-app browser automation was unavailable because the browser bridge was not trusted in this session; file-level and recovery-script checks were used instead.
- Next: push `.deploy-medivista-github` `gh-pages`, then visually QA the public Brands page at desktop and mobile widths before expanding the dedicated CELLEXOR product page.

## 2026-05-25 - Production cycle: subdomain network theme package

- Focus: prepare one combined package that includes both the main WordPress theme and the shop subdomain theme while keeping each site activated separately in WordPress Multisite.
- Reference: checked WordPress Multisite guidance confirming themes are installed network-wide but activated per site; a combined ZIP is therefore for hosting/SFTP extraction into `wp-content/themes/`, not for single-theme admin upload.
- Change: updated `tools/medivista-error-recovery.ps1` to generate and verify `dist/medivista-wp-network-themes-20260525.zip`.
- Change: added `docs/subdomain-theme-package-guide.md` and updated `docs/wordpress-multisite-operations.md` plus `docs/brand-shop-live-application-steps.md` with the exact extraction and activation flow.
- Result: network package contains `wp-theme-starter/` and `wp-theme-shop/` at ZIP top level; main site should activate `MEDIVISTA Starter`, shop site should activate `MEDIVISTA Shop`.
- Checks: recovery closeout PASS for JS, fallback PHP lint, local preview, main ZIP, shop ZIP, network themes ZIP, XML, product images, and commerce/claim safety scan.
- Next: upload/extract `dist/medivista-wp-network-themes-20260525.zip` through hosting file manager or SFTP into `wp-content/themes/`, then network-enable both themes and activate the correct theme per subdomain.

## 2026-05-25 - Production cycle: brand palette and hero banner refinement

- Focus: apply design feedback that gold should lead the palette while blue stays limited to functional accents and selected supporting surfaces.
- Change: updated core palette variables to use button blue `#2563EB`, blue typography `#073772`, and gold typography `#5F524A`; reduced the large blue hero surface in favor of gold/neutral banner backgrounds.
- Change: replaced the old full-surface blue linear hero treatment with image-backed action slides using product visuals, subtle gold/blue background image fields, and a two-column hero layout.
- Change: added `assets/images/hero-gold-field.svg` and `assets/images/hero-blue-field.svg`, mirrored them into the WordPress starter, and updated the WordPress hero template.
- Change: bumped static and WordPress starter asset token to `20260525b` for cache parity.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; recovery closeout PASS for JS, fallback PHP lint, local preview, WordPress ZIPs, network themes ZIP, XML, product images, and safety scan.
- Note: no user-supplied A/B banner image files were present in the project folder, so the implementation uses existing product WebP visuals plus prepared background assets.
- Next: visually QA the public Home hero at desktop/mobile widths, then replace the prepared background assets with the supplied A/B image files if they are added to the project.

## 2026-05-25 - Follow-up: supplied A/B hero backgrounds

- Focus: replace the temporary hero background SVGs with the user-supplied A/B banner background files.
- Source: `KakaoTalk_20260524_130527916.png` used as the blue A-option background; `BannerBG_Gold.png` used as the gold B-option background.
- Change: generated web-ready compressed hero assets `assets/images/hero-blue-bg.jpg` and `assets/images/hero-gold-bg.jpg`, then mirrored them into `wp-theme-starter/assets/images/`.
- Change: updated static and WordPress starter CSS to use the supplied A/B background assets and bumped cache token to `20260525c`.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; recovery closeout PASS for JS, fallback PHP lint, local preview, WordPress ZIPs, network themes ZIP, XML, product images, and safety scan.
- Next: visually QA the public Home hero and decide whether all five slides should use the gold B background or keep the first slide as blue A and the remaining slides as gold B.

## 2026-05-25 - Production cycle: skip link + cache-bust parity

- Focus: improve accessibility and keyboard navigation with a global Skip to content link, aligned across static pages + WordPress starter + WordPress shop theme.
- Change: added `.skip-link` + `id="main-content"` anchors across the main static pages and both WordPress themes.
- Cache-bust parity: bumped static pages + WordPress starter + WordPress shop asset versions to `20260525a`.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; `node --check wp-theme-shop/assets/js/shop.js` PASS; commerce/claim scans PASS; Brand Shop URL scan PASS.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` (report `2026-05-25 14:38:30 +09:00`): PASS for JS + fallback PHP lint + local preview + ZIPs/XML + product images + safety scan; WARN for GitHub Pages push and public preview parity due to network connectivity (GitHub port 443 connect failed).
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then verify public preview with `v=20260525a` and visually QA Skip to content on desktop + mobile.

## 2026-05-25 - Production cycle: responsive actual world map SVG

- Focus: reduce mobile/embedded overflow risk by keeping the D3-rendered world map SVG responsive (scale by `viewBox`, not fixed `width`/`height` attributes).
- Change: updated the world map initializer in `assets/js/main.js` and `wp-theme-starter/assets/js/main.js` (and mirrored into `.deploy-medivista-github`) to render at `960x500` via `viewBox` and explicitly remove SVG `width`/`height` attributes after render.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS.
- Safety: commerce scan flagged only documentation mentions (no commerce UI); risky-claim scan (FDA/KFDA/clinically proven/guaranteed) returned no runtime matches; Brand Shop links remain `https://shop.medivista.co.kr`.
- Error: direct script invocation `.\tools\medivista-error-recovery.ps1 ...` was blocked by PowerShell execution policy; recovered by using `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip`.
- Closeout: ran the recovery script (report `2026-05-25 16:31:10 +09:00`): PASS for JS + fallback PHP lint + local preview + ZIPs/XML + images + safety scan; WARN for public preview parity fetch (remote connect blocked) and `gh-pages` push not executed without `-PushDeploy`.
- Deploy: committed `.deploy-medivista-github` `gh-pages` as `ad851b2 fix: make world map SVG responsive` (local branch is ahead 1; push pending).
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then visually QA the Global Network map on public Home at desktop/mobile widths using `v=20260525b`.

## 2026-05-25 - Production cycle: reduce product image layout shift (CLS)

- Focus: reduce layout shift while product images lazy-load by providing explicit `width`/`height` on the JS-inserted `<img>` inside `.product-image`.
- Change: set `img.width = 1200` and `img.height = 900` in `assets/js/main.js`, mirrored into `wp-theme-starter/assets/js/main.js` and `.deploy-medivista-github/assets/js/main.js`.
- Checks: `node --check` PASS for all three JS files; Brand Shop URL scan OK.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-05-25 18:31:44 +09:00`): PASS for JS + fallback PHP lint + local preview + ZIPs/XML + product images + safety scan; WARN for public preview parity fetch and deploy push (network blocked).
- Note: the prohibited-commerce keyword scan returned expected matches in the shop theme and the product name `Cartin`; no commerce UI was added to the main catalog pages.
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then visually QA Products cards (desktop + mobile) for any cropping/letterboxing changes and confirm the public preview shows `v=20260525b`.

## 2026-05-25 - Production cycle: WhatsApp CTA accessibility labels

- Focus: improve accessibility for product inquiry CTAs by ensuring WhatsApp buttons have descriptive accessible labels (screen readers / tooltips) while keeping catalog-only behavior.
- Change: updated the `[data-whatsapp]` initializer to add `aria-label` and `title` using the product name when available (static + WordPress starter + deploy checkout parity).
- Files: `assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, `.deploy-medivista-github/assets/js/main.js`.
- Deploy: committed `.deploy-medivista-github` `gh-pages` as `0f166bb deploy: add WhatsApp CTA labels` (push pending).
- Checks: `node --check` PASS (all three JS files); prohibited-commerce scan PASS; risky-claim scan PASS; Brand Shop URL scan PASS.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-05-25 20:32:03 +09:00`): PASS for JS + fallback PHP lint + local preview + ZIP/XML + product images + safety scan; WARN for deploy push not executed (no `-PushDeploy`) and public preview fetch failing in this environment.
- Next: from a network-enabled environment, run recovery with `-PushDeploy` if publishing is intended, then verify public preview (Home + Products + Contact) and confirm WhatsApp CTAs announce the product name correctly with keyboard/screen-reader navigation.

## 2026-05-25 - Production cycle: wp-theme-shop cache-bust parity

- Focus: reduce stale-cache and parity drift by aligning the WordPress shop theme asset versions with the current site cache-bust token (`20260525c`).
- Change: bumped `wp-theme-shop` enqueue versions and header logo query token from `20260525a` -> `20260525c`.
- Files: `wp-theme-shop/functions.php`, `wp-theme-shop/header.php`.
- Checks: `node --check` PASS (`assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, `wp-theme-shop/assets/js/shop.js`); compliance scans found no prohibited commerce UI or risky claim keywords in runtime pages (expected matches only in `AGENTS.md` and the category label `Hair Treatment`).
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-05-25 22:31:20 +09:00`): PASS for JS + fallback PHP lint + local preview + ZIP/XML + product images + safety scan; WARN for deploy push (not executed without `-PushDeploy`) and public preview parity fetch (network blocked here).
- Next: from a network-enabled environment, run recovery with `-PushDeploy` (or push `.deploy-medivista-github` `gh-pages`) and verify the public preview uses `v=20260525c` (Home + Products + Contact + header/logo on mobile/desktop).

## 2026-06-06 - Production cycle: compact slider controls + cache-bust parity

- Focus: improve mobile Home QA by replacing visible `Prev`/`Next` slider-control text with compact symbolic controls while retaining accessible labels for the Home hero and Popular Products sliders.
- Change: added shared `.slider-control-icon` and `.sr-only` CSS, updated static Home slider buttons, and mirrored the same controls into the WordPress starter hero/product slider templates.
- Change: bumped main static and WordPress starter cache token from `20260525c` to `20260606a` across static pages and WordPress starter enqueue/header references.
- Change: compliance cleanup replaced an existing Brands page mention of `price` with inquiry-only wording so the main runtime commerce scan has no prohibited commerce text matches.
- Deploy: mirrored touched files into `.deploy-medivista-github` and committed the slider-control change plus closeout docs locally; deploy remains ahead of `origin/gh-pages` because push failed from this environment.
- Checks: `node --check` PASS for `assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, and `wp-theme-shop/assets/js/shop.js`; prohibited commerce scan PASS for main runtime files; risky-claim scan PASS; Brand Shop URL scan PASS; old cache token `20260525c` absent from main static/WordPress starter/deploy runtime files.
- Visual defect check: file-level QA confirms smaller slider controls reduce mobile wrapping risk; local preview started inside recovery and returned HTTP 200, but persistent browser visual QA was not available after the recovery process exited.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` (report `2026-06-06 12:26:26 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for GitHub Pages push and public preview parity because `github.com:443` / public fetch are blocked in this environment.
- Next: from a network-enabled environment, push the current `.deploy-medivista-github` `gh-pages` branch, then verify public Home slider controls, header/logo, Products, Contact, and Global Reach at desktop/mobile widths with `v=20260606a`.

## 2026-06-06 - Production cycle: mobile Global Network cards + mojibake cleanup

- Focus: fix the mobile Home `Global Network` defect where the zone-callout separators rendered as mojibake and the market list was hard to scan on phone widths.
- Discovery: the saved mobile Home QA screenshot still showed a cramped Global Network module, and `index.html` contained broken separator characters in the mobile-only market chips.
- Inference: this was a content-encoding/parity defect in the static Home markup rather than a map-rendering failure; the mobile chip format also made long zone lists harder to read.
- Fix: replaced the mobile-only `map-callouts-mobile` chips with structured zone cards in static Home, the WordPress starter Global Network template, and the deploy checkout Home copy.
- Fix: updated shared Global Network mobile CSS in `assets/css/styles.css`, `wp-theme-starter/assets/css/main.css`, and `.deploy-medivista-github/assets/css/styles.css` so the cards render as a 2-column grid with a 1-column fallback below `420px`.
- Fix: bumped the shared static/WordPress starter stylesheet cache token from `20260606a` to `20260606b`.
- Deploy: mirrored the static changes into `.deploy-medivista-github` and committed `c183848 fix: refine mobile global network cards` on local `gh-pages`.
- Checks: `node --check` PASS for `assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, and `.deploy-medivista-github/assets/js/main.js`; prohibited commerce scan PASS for main runtime files; risky-claim scan PASS for main runtime files; Brand Shop URL scan PASS; no `쨌` mojibake remains in checked runtime files.
- Visual defect check: file-level QA confirms the mobile Global Network market list now uses structured zone cards instead of inline chips; the recovery script again reported local preview HTTP 200, but a follow-up `Invoke-WebRequest http://127.0.0.1:4173/index.html?v=20260606b` after script exit failed because the preview job does not persist across this PowerShell process.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-06 14:30:03 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for deploy push/public preview parity because network/public fetch remain blocked here.
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then visually verify public Home `Global Network` mobile cards, header/logo, and map parity with `v=20260606b`.

## 2026-06-06 - Production cycle: Products mobile quick-jump UX + cache token parity

- Focus: improve `Products` mobile UX, which was the next documented priority after the recent Home/mobile work.
- Discovery: the saved `docs/qa-screenshots/products-mobile.png` showed the product search/filter area was functional but dense on phone widths, and the runtime asset tokens were split between `20260606a` and `20260606b`, increasing stale-cache risk during visual QA.
- Inference: the highest-impact safe fix was structural, not cosmetic: make category navigation easier to scan on mobile and align the touched runtime assets behind one shared cache token.
- Fix: added a live catalog summary line, a clearer `Quick jump` helper block, and swipeable mobile category tabs in `products/index.html`, `assets/css/styles.css`, and `assets/js/main.js`.
- Fix: synced the same Products UX behavior into `wp-theme-starter/page-products.php`, `wp-theme-starter/assets/css/main.css`, and `wp-theme-starter/assets/js/main.js`.
- Fix: mirrored the touched Products/CSS/JS files into `.deploy-medivista-github` and aligned static + deploy + WordPress starter runtime asset tokens to `20260606c` for CSS, JS, and the header logo reference.
- Checks: `node --check` PASS for `assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, and `.deploy-medivista-github/assets/js/main.js`; risky-claim scan PASS; Brand Shop URL scan PASS; prohibited-commerce scan returned only the expected product-name false positive `Cartin` plus documentation references, with no commerce UI added to the main runtime pages.
- Visual defect/blocker: the in-app browser rejected `http://127.0.0.1:4173/products/index.html?v=20260606c` due session browser security policy, so I did not bypass it. File-level QA plus the saved screenshots and recovery-script HTTP check were used instead.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-06 16:26:51 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for deploy push/public preview parity because remote/public fetch remain blocked here.
- Next: from a network-enabled environment, commit/push `.deploy-medivista-github` `gh-pages`, then visually verify public `Products` mobile search/filter/tabs, header/logo, and Home/Contact parity with `v=20260606c`.

## 2026-06-06 - Production cycle: Contact inquiry presets + WhatsApp preview

- Focus: move to the next queue item after Products UX by improving the `Contact` inquiry flow without adding any commerce behavior.
- Discovery: the contact page already collected the right B2B fields, but it still behaved like a plain form with no quick-start guidance, no inquiry-path presets, and no preview of the WhatsApp message that the form opens.
- Inference: the highest-impact safe fix was a structural assist layer rather than more visual decoration: guide the visitor into a compliant inquiry path, prefill likely B2B combinations, and make the outgoing WhatsApp message visible before submit.
- Fix: added a `Quick Start` inquiry-assist module with four preset buttons (`Distribution Inquiry`, `Clinic Product Interest`, `CELLEXOR Brand Question`, `New Market Request`) plus a short preparation checklist in [`C:\Users\jhj13\OneDrive\문서\New project\contact\index.html`](C:/Users/jhj13/OneDrive/%EB%AC%B8%EC%84%9C/New%20project/contact/index.html) and [`C:\Users\jhj13\OneDrive\문서\New project\wp-theme-starter\page-contact.php`](C:/Users/jhj13/OneDrive/%EB%AC%B8%EC%84%9C/New%20project/wp-theme-starter/page-contact.php).
- Fix: added shared contact-assist and preview styling in [`C:\Users\jhj13\OneDrive\문서\New project\assets\css\styles.css`](C:/Users/jhj13/OneDrive/%EB%AC%B8%EC%84%9C/New%20project/assets/css/styles.css) and [`C:\Users\jhj13\OneDrive\문서\New project\wp-theme-starter\assets\css\main.css`](C:/Users/jhj13/OneDrive/%EB%AC%B8%EC%84%9C/New%20project/wp-theme-starter/assets/css/main.css).
- Fix: extended the shared contact-form script so presets fill form fields, the preview updates live, and the submitted WhatsApp message reuses the same generated lines in [`C:\Users\jhj13\OneDrive\문서\New project\assets\js\main.js`](C:/Users/jhj13/OneDrive/%EB%AC%B8%EC%84%9C/New%20project/assets/js/main.js) and [`C:\Users\jhj13\OneDrive\문서\New project\wp-theme-starter\assets\js\main.js`](C:/Users/jhj13/OneDrive/%EB%AC%B8%EC%84%9C/New%20project/wp-theme-starter/assets/js/main.js).
- Parity: mirrored the touched static and WordPress starter files into `.deploy-medivista-github`, corrected a lingering `cellexor/index.html` asset-token drift from `20260606a`, and aligned static + deploy + WordPress starter runtime asset references to `20260606d`.
- Checks: `node --check` PASS for `assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, and `.deploy-medivista-github/assets/js/main.js`; prohibited-commerce scan returned only the expected product-name false positive `Cartin`; risky-claim scan returned only the expected category-label false positive `Hair Treatment`; Brand Shop URL scan PASS; runtime token parity scan PASS for `20260606d`.
- Visual defect/blocker: the recovery script again reported local preview HTTP 200 during execution, but a follow-up `Invoke-WebRequest http://127.0.0.1:4173/contact/index.html?v=20260606d` after script exit failed because the preview job does not persist across this PowerShell process.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-06 18:28:07 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for deploy push/public preview parity because remote/public fetch remain blocked here and `.deploy-medivista-github` remains ahead of `origin/gh-pages`.
- Next: from a network-enabled environment, commit/push `.deploy-medivista-github` `gh-pages`, then visually verify public `Contact` presets/live preview, `Products`, header/logo, and mobile `Global Network` parity with `v=20260606d`.

## 2026-06-11 - Production cycle: Brands/CELLEXOR copy safety + parity

- Focus: move to the next documented queue item after `Contact/WhatsApp` by tightening `Brands` and `Cellexor Re:Tone` copy safety without reopening layout or commerce behavior.
- Discovery: `brands/index.html` was mostly compliant, but `cellexor/index.html` still used an ingredient-led hero headline and section labels that were looser than the required brand-story structure.
- Inference: the highest-impact safe fix was a content-only parity pass: keep the premium CELLEXOR mood, but make ingredient references explicitly conceptual and align the page sections more clearly to Brand Philosophy, Brand Story, Core Technology, Synergy Science, Product Philosophy, Brand Promise, and Product CTA.
- Fix: updated `brands/index.html` and `wp-theme-starter/page-brands.php` to replace `Cell + Elixir` with `Brand Concept`, soften the ingredient-story wording, and change `NAD+ activator concept` to `NAD+ support concept`.
- Fix: updated `cellexor/index.html` and `wp-theme-starter/page-cellexor.php` to use a partner-focused hero headline, inquiry-first professional wording, and explicit brand-structure cards for `Brand Story`, `Core Technology`, `Synergy Science`, `Product Philosophy`, `Brand Promise`, and `Product CTA`.
- Parity: mirrored the same file changes into `.deploy-medivista-github` static pages and WordPress starter templates, and refreshed `.deploy-medivista-github/docs/error-report-latest.md` from the current closeout report.
- Checks: `node --check` PASS for `assets/js/main.js`, `wp-theme-starter/assets/js/main.js`, and `wp-theme-shop/assets/js/shop.js`; prohibited-commerce scan PASS for touched runtime files; risky-claim scan PASS for touched runtime files after removing a self-referential compliance phrase from live page copy; Brand Shop URL scan PASS.
- Visual defect/blocker: no new screenshot-driven defect was introduced in the touched brand pages; local visual verification still depends on the temporary preview job started by the recovery script because it does not persist after this PowerShell process exits.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip -PushDeploy` (report `2026-06-11 20:50:19 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for GitHub Pages push (`github.com:443` unreachable here) and public preview parity fetch.
- Next: from a network-enabled environment, push `.deploy-medivista-github` `gh-pages`, then visually verify the public `Brands` and `Cellexor` pages plus existing Home/Products/Contact/mobile `Global Network` parity with `v=20260606d`.

## 2026-06-11 - Production cycle: WooCommerce shop setup package

- Focus: prepare `shop.medivista.co.kr` for WooCommerce operation while preserving the main `www.medivista.co.kr` catalog-only boundary.
- Change: added shop-only regional access control in `wp-theme-shop/inc/access-control.php`; non-admin visitors with country code `KR` are blocked when a CDN/host/WAF/security plugin provides a country header, while administrators, login/admin routes, AJAX, and cron remain exempt.
- Change: updated `wp-theme-shop/front-page.php`, `wp-theme-shop/assets/css/shop.css`, and `wp-theme-shop/README.md` with the shop launch offer, CELLEXOR Re:Tone package pricing, international shipping policy, B2B WhatsApp inquiry direction, and admin-exempt Korea IP policy.
- Change: added `docs/brand-shop-wordpress-admin-manual-ko.md` so the shop can be operated later from WordPress admin without Codex/AI, and added `docs/brand-shop-cellexor-retone-woocommerce-import.csv` for the CELLEXOR Re:Tone 1 Set / 5 Set WooCommerce import draft.
- Change: refreshed WooCommerce/Multisite/live-application/pre-deploy/automation checklist docs from the older China IP wording to the latest Korea IP policy for the shop site only.
- Parity: mirrored touched docs and `wp-theme-shop` files into `.deploy-medivista-github`, then rebuilt the WordPress ZIP packages.
- Checks: `node --check wp-theme-shop/assets/js/shop.js` PASS; risky-claim scan PASS; main runtime commerce scan showed no new price/cart/checkout/payment text outside existing instruction docs; ZIP inspection confirmed `wp-theme-shop/inc/access-control.php` is included in both `dist/medivista-wp-theme-shop-20260522-wp.zip` and `dist/medivista-wp-network-themes-20260525.zip`.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-11 21:05:57 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for deploy push not executed without `-PushDeploy` and public preview fetch blocked in this environment.
- Next: in the live WordPress admin, activate `MEDIVISTA Shop` and WooCommerce only on `shop.medivista.co.kr`, configure USD, `FIRST10`, free shipping over USD 300 / flat USD 50 below USD 300, import the CELLEXOR CSV as unpublished products, and verify the Korea IP block with a real CDN/host GeoIP header while admin remains exempt.

## 2026-06-11 - Production cycle: Home hero slide banner

- Focus: make the first Home front-view section read as a true hero slide banner while preserving the existing catalog-only main-site behavior.
- Change: added the `hero-banner-slider` layer to static Home and the WordPress starter hero template, with per-slide product background images through `--hero-product-image`.
- Change: updated shared static and WordPress starter CSS so the hero slides render as full first-viewport banner panels with background product imagery, layered gradients, desktop controls, and mobile-specific background placement without leaving an empty visual column.
- Change: bumped the shared static and WordPress starter runtime token to `20260611a` across all static pages and WordPress starter enqueue/header references to reduce stale-cache risk.
- Parity: mirrored touched Home/CSS/WordPress starter files and static cache-token updates into `.deploy-medivista-github`; after an initial broad copy risk with repeated `index.html` names, each subpage was recopied into its correct deploy subdirectory and root Home was restored last.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; risky-claim scan PASS; main runtime commerce scan found no new commerce UI text; recovery closeout PASS for JS, fallback PHP lint, local preview, WordPress ZIPs/XML, product images, and safety scan.
- Visual blocker: in-app browser verification was blocked by the browser URL policy for both `http://127.0.0.1:4173/index.html?v=20260611a` and local file URL access, so no browser screenshot was captured in this environment. File-level and recovery-script validation were used instead.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-11 22:50:53 +09:00`): PASS for local/package checks; WARN for deploy push not executed without `-PushDeploy` and public preview fetch blocked in this environment.
- Next: from a network/browser-enabled environment, push `.deploy-medivista-github` `gh-pages`, then visually verify the public Home hero slide banner on desktop and mobile with `v=20260611a`.

## 2026-06-11 - Production cycle: Brands dropdown and CELLEXOR detail page

- Focus: add a CELLEXOR submenu under the Brands navigation category and strengthen the CELLEXOR detail page using the official CELLEXOR brand page as source context.
- Source: reviewed `https://cellexor.com/cellexor/`, including its CELLEXOR brand structure, "Cell + Elixir" concept, exosome-inspired story, "Glow Beyond Expectations", and reverse-aging-inspired brand positioning.
- Change: converted `BRANDS` in the shared static navigation and WordPress starter header into a dropdown with a `CELLEXOR` child link.
- Change: updated `brands/index.html` and `wp-theme-starter/page-brands.php` to describe CELLEXOR as the active brand category and link to the dedicated CELLEXOR detail page plus the official CELLEXOR page.
- Change: expanded `cellexor/index.html` and `wp-theme-starter/page-cellexor.php` into a fuller CELLEXOR detail page with brand philosophy, original Korean brand message, exosome-inspired key concept, brand promise, product philosophy, B2B inquiry CTAs, and official site links.
- Safety: kept CELLEXOR content framed as brand vision and beauty-science concept language, avoiding medical, clinical, certification, or promised-efficacy wording.
- Cache: bumped static and WordPress starter runtime references to `20260611b`.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; risky-claim/mojibake spot scan PASS after removing `guaranteed outcome`; main runtime commerce scan has no new commerce UI.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-11 23:08:11 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for deploy push not executed without `-PushDeploy` and public preview fetch blocked in this environment.
- Next: from a network/browser-enabled environment, push `.deploy-medivista-github` `gh-pages`, then visually verify the Brands dropdown hover/focus and CELLEXOR detail page on desktop and mobile with `v=20260611b`.

## 2026-06-11 - Production cycle: Products submenu operation and WordPress ZIP refresh

- Focus: align the Products category operation with the reference structure at `https://hjcorporations.kr/index` while preserving MEDIVISTA catalog-only rules.
- Reference: reviewed the reference site's navigation pattern where PRODUCTS exposes category-level child links and the product area uses category labels plus product cards.
- Change: converted `PRODUCTS` in the static navigation and WordPress starter header into a category dropdown for Botulinum Toxins, Dermal Fillers, Body Fillers, Skin Boosters, Lipolysis, Exosomes, Biostimulators, Hair Treatment, and Others.
- Change: added Body Fillers, Exosomes, and Hair Treatment to the Products page filter and quick-jump operation, with catalog-only coming-soon inquiry cards where detailed product data is not yet confirmed.
- Change: adjusted dropdown menu sizing for longer category menus and bumped static/WordPress starter runtime references to `20260611c`.
- Package: regenerated `dist/medivista-wp-theme-starter-20260511-wp.zip`, `dist/medivista-wp-theme-shop-20260522-wp.zip`, `dist/medivista-wp-network-themes-20260525.zip`, and the direct upload copy `wp-theme-starter.zip`.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; ZIP inspection confirmed `PRODUCTS` dropdown and Body Fillers / Exosomes / Hair Treatment filters are included in `wp-theme-starter.zip`.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-11 23:29:11 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for deploy push not executed without `-PushDeploy` and public preview fetch blocked in this environment.
- Next: upload `wp-theme-starter.zip` or `dist/medivista-wp-theme-starter-20260511-wp.zip` to the main WordPress site, then verify the Products dropdown and Products page category filters on desktop and mobile.

## 2026-06-11 - Production cycle: Finished product images and category classification

- Focus: use the `완성이미지/WebP` folder as the product image source of truth and align product category classification for the static catalog and WordPress starter.
- Change: re-ran `tools/import-finished-product-images.ps1 -SourceDirectory "완성이미지\WebP"`; 114 WebP product images were copied into `assets/images/products`, `wp-theme-starter/assets/images/products`, and the deploy static image folder.
- Change: normalized product data category labels from `SKIN BOOSTERS` to `Skin Boosters` in static and WordPress starter data files.
- Change: moved `Cellexor Re:Tone` from Skin Boosters to the Exosomes category because its product type is `EXOSOMES`, keeping the existing image `cellexor-re-tone.webp` as a ready product card.
- Change: added `assets/data/product-category-classification.csv` and `wp-theme-starter/assets/data/product-category-classification.csv` as operating classification tables with category slug, product, type, spec, image file, image path, status, source folder, and WordPress asset path.
- Result: classification counts are Botulinum Toxins 20, HA Dermal Fillers 47, Skin Boosters 19, Exosomes 1, Lipolysis 7, Biostimulators 4, Others 16, plus pending operating placeholders for Body Fillers, Hair Treatment, and Cosmetics.
- Cache/package: bumped runtime references to `20260611d`; regenerated `wp-theme-starter.zip`, `dist/medivista-wp-theme-starter-20260511-wp.zip`, `dist/medivista-wp-theme-shop-20260522-wp.zip`, and `dist/medivista-wp-network-themes-20260525.zip`.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; commerce/claim scan PASS; recovery closeout PASS for WordPress ZIPs, network ZIP, page import XML, product images, and safety scan.
- Visual blocker: the in-app browser rejected `http://127.0.0.1:4173/products/index.html?v=20260611d` with a client-side block, so visual browser verification was not completed in this environment.
- Closeout: ran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-11 23:45:11 +09:00`): PASS for JS + fallback PHP lint + local preview + WordPress ZIPs/XML + product images + safety scan; WARN for deploy push not executed without `-PushDeploy` and public preview fetch blocked in this environment.
- Next: upload the refreshed WordPress ZIP and visually verify Products category filters, Exosomes/Cellexor card, and product image loading on the live or browser-enabled preview.

## 2026-06-12 - GitHub/local cross-check routine: contact category parity

- Focus: run the local cross-check routine, compare workspace/deploy/GitHub state, and make one safe maintenance fix only if a concrete compatibility gap was found.
- GitHub check: repository `keithjeon-web/medivista` is reachable; default branch remains `medivista`; open Issue `#11` and open PR `#10` are still the active remote work items; the newest connector-visible default-branch commits remain the older May 2026 docs/bootstrap commits, so no newer committed remote website state displaced the local workspace.
- Local/deploy check: workspace root remains the source of truth for static files; shared static page hashes matched `.deploy-medivista-github` for `index.html`, subpages, `assets/css/styles.css`, and `assets/js/main.js` before this run's edit; `.deploy-medivista-github` remains `gh-pages...origin/gh-pages [ahead 12]`.
- Discovery: header/nav/cache-bust structure is consistent across static pages (`v=20260611d` with shared `styles.css`, `main.js`, `medivista_logo_header.png`, `aria-controls="primary-nav"`, and `id="primary-nav"`), Brand Shop URLs are correct, and catalog-only/risky-claim scans remained clean; however, the Contact page product selector omitted `Body Fillers`, `Exosomes`, and `Hair Treatment`, and used `HA Dermal Fillers` instead of the broader site taxonomy label `Dermal Fillers`.
- Fix: updated `contact/index.html`, `.deploy-medivista-github/contact/index.html`, and `wp-theme-starter/page-contact.php` so the inquiry selector now matches the full MEDIVISTA primary category set used in navigation and the Products page: `Botulinum Toxins`, `Dermal Fillers`, `Body Fillers`, `Skin Boosters`, `Lipolysis`, `Exosomes`, `Biostimulators`, `Hair Treatment`, and `Others`.
- Checks: Brand Shop URL scan PASS; shared CSS/JS parity hash check PASS for root vs deploy and root vs WordPress starter; recovery closeout PASS for JS baseline, fallback PHP lint, local preview during script execution, WordPress ZIP/XML readiness, product images, and safety scan.
- Blockers: direct `.\tools\medivista-error-recovery.ps1` execution was blocked by local PowerShell execution policy and required `powershell -ExecutionPolicy Bypass -File ...`; public preview fetch still failed in this environment; the preview server started by the recovery script does not persist after the PowerShell process exits, so follow-up HTTP/browser verification after closeout remained unavailable from this shell.
- Next: from a network/browser-enabled environment, push `.deploy-medivista-github` `gh-pages`, then visually verify Home header/logo/mobile nav plus the updated Contact page selector on the public preview with `v=20260611d`.

## 2026-06-12 - GitHub/local cross-check routine: deploy contact commit + refreshed closeout

- Focus: re-run the local cross-check routine against the current workspace state, refresh deploy parity, and leave the routine logs in a clean post-check state.
- Local/deploy check: the root workspace still matched `.deploy-medivista-github` for the shared static pages, CSS, JS, and header logo asset; the only deploy drift was an uncommitted `contact/index.html` change carrying the contact-category parity fix.
- Fix: committed the already-synced deploy checkout Contact page update as `.deploy-medivista-github` commit `9a9187b` (`deploy: sync contact product categories`), leaving deploy clean at `gh-pages...origin/gh-pages [ahead 13]`.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; root-vs-deploy parity hash check PASS for key runtime files; Brand Shop URL scan PASS; commerce/claim scan PASS in checked runtime files; reran `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip`, which refreshed `docs/error-report-latest.md`.
- Blockers: the root workspace is still not a Git checkout; `gh` is not installed or not available in this shell, so live GitHub issue/PR/commit refresh was not possible in this run; public preview fetch still failed in this environment; the preview server remains transient to the recovery-script PowerShell process, so immediate post-closeout HTTP checks still failed from this shell.
- Next: from a network/browser-enabled environment, push `.deploy-medivista-github` `gh-pages` commit `9a9187b`, then visually verify the public Home header/logo/mobile nav and Contact category selector.

## 2026-06-12 - GitHub/local cross-check routine

- Re-ran the MEDIVISTA local cross-check routine and re-read the required operating docs plus the latest recovery report.
- Verified local root vs .deploy-medivista-github parity across key static pages and shared assets before maintenance, then found a category-label inconsistency: the Products page still exposed HA Dermal Fillers while the required site taxonomy elsewhere used Dermal Fillers.
- Focused maintenance update: normalized the displayed category label to Dermal Fillers across the static Products page, deploy checkout copy, WordPress starter templates, and WordPress starter product data sources while keeping the internal dermal-fillers anchor/slug unchanged.
- Recovery closeout passed again for JS syntax baseline, fallback PHP lint, transient local preview startup, ZIP/XML readiness, product images, and safety scan.
- GitHub/public blockers remain: git ls-remote to GitHub failed on port 443, gh is unavailable in this shell, public preview fetch is still blocked here, and the preview server started by the recovery script does not persist after that PowerShell process exits.
- Deployment checkout: committed 6adef2e deploy: normalize dermal fillers label; deploy is ready for the next network-enabled gh-pages push.

## 2026-06-12 - GitHub/local cross-check routine: dermal fillers source taxonomy parity

- Focus: re-run the local MEDIVISTA cross-check routine, refresh local/deploy/recovery state, and make one safe maintenance fix only if a concrete compatibility gap remained.
- GitHub/deploy check: re-read the required operating docs, confirmed the root workspace is still the local source of truth, confirmed `.deploy-medivista-github` remote remains `https://github.com/keithjeon-web/medivista.git`, and verified `git ls-remote` still fails on GitHub port `443` from this environment while deploy continued locally at `gh-pages...origin/gh-pages [ahead 14]` before this run's commit.
- Discovery: homepage and key static subpages still matched for shared `v=20260611d` CSS/JS/logo references, Brand Shop routing, English-first copy, category coverage, and catalog-only constraints; however, the source product CSVs and manifests still carried the older `HA Dermal Fillers` label and `ha-dermal-fillers` slug even after the visible Products UI had already been normalized to `Dermal Fillers`.
- Inference: leaving the older label in the source data risked reintroducing taxonomy drift during the next product sync, WordPress starter rebuild, or deploy refresh, even though the current visible page copy already looked correct.
- Fix: normalized the shared source data taxonomy from `HA Dermal Fillers` to `Dermal Fillers` and from `ha-dermal-fillers` to `dermal-fillers` across `assets/data/{medivista-products,product-image-manifest,product-category-classification}.csv`, the matching `wp-theme-starter/assets/data/*.csv` copies, and the mirrored deploy checkout data files.
- Checks: old-taxonomy scan PASS after replacement; `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; `node --check wp-theme-shop/assets/js/shop.js` PASS; Brand Shop URL scan PASS; runtime commerce/risky-claim scan PASS with expected false positives limited to the shop theme and the product name `Cartin`; recovery closeout PASS via `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-12 11:41:00 +09:00`).
- Blockers: GitHub port `443` is still unreachable here, so no live remote issue/PR/commit refresh or deploy push was possible; the root workspace is still not a Git checkout; the preview server started by the recovery script still does not persist after that PowerShell process exits, so post-closeout browser/HTTP verification remains unavailable from this shell.
- Deployment checkout: committed `.deploy-medivista-github` as `c661911` (`deploy: normalize dermal fillers source taxonomy`), leaving deploy ready for the next network-enabled `gh-pages` push.
- Next: from a network-enabled environment, push `.deploy-medivista-github` commit `c661911`, then visually verify the public Home header/logo/mobile nav and Products taxonomy parity after the source-data normalization.

## 2026-06-12 - GitHub/local cross-check routine: Brands submenu label parity

- Focus: re-run the local MEDIVISTA cross-check routine, confirm homepage/static compatibility still holds, and make one safe maintenance fix only where the implemented copy still diverged from `AGENTS.md`.
- GitHub/deploy check: re-read `AGENTS.md`, `docs/dev-log.md`, `docs/github-client-preview.md`, `docs/medivista-web-automation-cycle.md`, `docs/medivista-automation-prompts.md`, `docs/error-resolution-automation.md`, and `docs/error-report-latest.md`; confirmed the root workspace remains the local source of truth; `.deploy-medivista-github` remained locally available while live remote refresh stayed blocked by the environment.
- Discovery: homepage and key static subpages still matched for shared `v=20260611d` CSS/JS/logo references, Brand Shop routing, English-first copy, required category coverage, and catalog-only constraints; however, the `BRANDS` dropdown entry still displayed `CELLEXOR` instead of the required `Cellexor Re:Tone` label in the shared static headers and WordPress starter header.
- Fix: updated the `BRANDS` submenu label from `CELLEXOR` to `Cellexor Re:Tone` across the root static pages, the mirrored `.deploy-medivista-github` pages, and `wp-theme-starter/header.php`, keeping the existing destination path unchanged.
- Checks: root-vs-deploy SHA-256 parity PASS for `index.html`, key subpages, `assets/css/styles.css`, and `assets/js/main.js`; `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; Brand Shop URL scan PASS; runtime commerce/risky-claim scan PASS; recovery closeout PASS via `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` (report `2026-06-12 14:44:10 +09:00`).
- Blockers: GitHub port `443` remains unreachable here, so no live remote issue/PR/commit refresh or deploy push was possible; the root workspace is still not a Git checkout; the preview server started by the recovery script still does not persist after that PowerShell process exits, so post-closeout browser/HTTP verification remains unavailable from this shell.
- Deployment checkout: committed `.deploy-medivista-github` as `979a55a` (`deploy: align brand dropdown label`), leaving deploy at `gh-pages...origin/gh-pages [ahead 16]`.
- Next: from a network-enabled environment, push `.deploy-medivista-github` commit `979a55a`, then visually verify the public Home header/logo/mobile nav and the updated `BRANDS` submenu label on desktop and mobile.

## 2026-06-12 - Routine cross-check: Products taxonomy alignment

- Removed the legacy Cosmetics category from the Products page, mirrored deploy checkout, and WordPress starter data/templates so the catalog matches the current AGENTS/routine category list.
- Re-ran powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip; the report stayed PASS/WARN with the same environment blockers: deploy push not attempted here, public preview fetch blocked, and the preview server remaining transient to the recovery-shell process.
- GitHub connector state remained unchanged in this run: open Issue #11, open Issue #3, and open PR #10; no duplicate branch or PR was created.

## 2026-06-15 - Partner brand logo insertion

- Focus: replace the Home `Trusted Brands / Our Partners` text-only partner badges with the supplied brand logo PNGs while preserving catalog-only B2B positioning.
- Change: added partner logo assets for Botulax, Nabota, The Chaeum, Rejuran, and Liporase under `assets/images/partners/`, mirrored them into `wp-theme-starter/assets/images/partners/`, and synced the same assets into `.deploy-medivista-github`.
- Change: updated `index.html`, `wp-theme-starter/front-page.php`, and the mirrored deploy copies so the partner strip now uses accessible logo image tags instead of text badges.
- Change: updated partner logo CSS in `assets/css/styles.css`, `wp-theme-starter/assets/css/main.css`, and deploy copies for a five-logo grid with stable image sizing and mobile/tablet wrapping.
- Checks: root-vs-deploy hash parity passed for the touched HTML/CSS files; partner logo asset hashes matched between root and deploy; logo dimensions were verified from the PNG files; `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; Brand Shop URL scan PASS; recovery closeout PASS for JS, fallback PHP lint, local preview during script execution, WordPress ZIP/XML readiness, product images, and safety scan.
- Visual blocker: in-app browser verification of `http://127.0.0.1:4173/index.html?v=20260615-partners` and temporary local port `4174` was blocked by the browser client (`ERR_CONNECTION_REFUSED` after the transient recovery server exited, then `ERR_BLOCKED_BY_CLIENT`), so file-level and recovery-script validation were used instead of a screenshot.
- Deployment checkout: committed `.deploy-medivista-github` as `2a6138a` (`deploy: add partner brand logos`); a network-enabled environment still needs to push `gh-pages`.
- Next: push `.deploy-medivista-github` `gh-pages`, then visually verify the Home partner logo strip on desktop and mobile after public cache refresh.

## 2026-06-15 - Partner logo action slider banner

- Focus: adapt the Home `Trusted Brands / Our Partners` logo strip into a CELLEXOR-reference-style icon slider banner, using a dark background, white pill-shaped logo cards, brand labels, and continuous horizontal motion.
- Reference: reviewed `https://cellexor.com/`, where the brand area uses repeated rounded white logo cards over a black band with labels underneath.
- Change: replaced the static partner grid in `index.html`, `.deploy-medivista-github/index.html`, `wp-theme-starter/front-page.php`, and the deploy WordPress copy with a two-track `partner-action-banner` marquee. The visible track links to catalog/brand destinations; the duplicate track is `aria-hidden` with `tabindex="-1"`.
- Change: updated `assets/css/styles.css`, `.deploy-medivista-github/assets/css/styles.css`, `wp-theme-starter/assets/css/main.css`, and the deploy WordPress CSS with dark-section styling, pill logo cards, hover/focus pause, responsive card sizing, and `prefers-reduced-motion` fallback.
- Safety: links route to Products category anchors or Brands only; no price, cart, checkout, payment, or purchase function was added.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; root-vs-deploy hash parity PASS for touched HTML/CSS files; Brand Shop URL scan PASS; CSS feature scan confirmed marquee, dark section, pill shape, and reduced-motion rules.
- Preview blocker: PowerShell HTTP checks intermittently returned HTTP 200 after starting the local static server, but the in-app browser plugin still reported `ERR_CONNECTION_REFUSED` for `http://127.0.0.1:4173/index.html?v=20260615-action-banner`, matching the local-preview persistence limitation seen in recent cycles.
- Next: refresh the open local preview at `http://127.0.0.1:4173/index.html?v=20260615-action-banner` after starting the local server, then push `.deploy-medivista-github` `gh-pages` and verify the public Home partner action slider.

## 2026-06-15 - GitHub/local cross-check routine

- Re-read `AGENTS.md`, `docs/dev-log.md`, `docs/github-client-preview.md`, `docs/medivista-web-automation-cycle.md`, `docs/medivista-automation-prompts.md`, `docs/error-resolution-automation.md`, and `docs/error-report-latest.md` before the routine check.
- GitHub connector state still shows the same open repo items: Issue `#11`, Issue `#3`, and PR `#10`; no newer connector-visible repo commit information overrode the local workspace as source of truth, while direct `git ls-remote` to GitHub still failed on port `443`.
- Homepage/static compatibility checks remained aligned for `v=20260611d` CSS/JS/logo references, Brand Shop routing, English-first copy, required product categories, and catalog-only constraints.
- Focused maintenance fix: synced the stale deploy-only WordPress starter brand submenu label from `CELLEXOR` to `Cellexor Re:Tone` in `.deploy-medivista-github/wp-theme-starter/header.php`, then committed it as `d7549ac deploy: sync brand submenu label`.
- `node --check` passed for `assets/js/main.js` and `wp-theme-starter/assets/js/main.js`; runtime commerce and risky-claim scans passed; `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` passed with the standing WARNs for blocked public preview fetch and deferred deploy push.
- The refreshed recovery report showed pre-existing uncommitted deploy-checkout drift in `.deploy-medivista-github/assets/css/styles.css`, `.deploy-medivista-github/index.html`, `.deploy-medivista-github/wp-theme-starter/assets/css/main.css`, and `.deploy-medivista-github/wp-theme-starter/front-page.php`; those files were preserved untouched in this run.

## 2026-06-15 - Product list and finished image sync

- Focus: cross-check `Product list(홈페이지용).zip` against `완성이미지/WebP` and ensure listed products are uploaded to the catalog product image surfaces.
- Change: re-ran `tools/import-finished-product-images.ps1 -SourceDirectory "완성이미지\WebP"` so the 114 finished WebP product images were copied into `assets/images/products`, `wp-theme-starter/assets/images/products`, `.deploy-medivista-github/assets/images/products`, and `.deploy-medivista-github/wp-theme-starter/assets/images/products`.
- Verification: `assets/data/medivista-products.csv`, `assets/data/product-image-manifest.csv`, and the WordPress starter copies each contain 114 product rows; all 114 manifest products have matching Products page cards and static image files.
- Result: `products/index.html` now reports 114 ready product images from the uploaded list, with only the existing Body Fillers and Hair Treatment preparation placeholders remaining pending.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; Brand Shop URL scan PASS; catalog-only commerce scan PASS; `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` PASS with standing WARNs for deferred deploy push and blocked public preview fetch.

## 2026-06-15 - Products dropdown classification upload alignment

- Focus: align Products page upload sources to the required Products dropdown taxonomy: Botulinum Toxins, Dermal Fillers, Body Fillers, Skin Boosters, Lipolysis, Exosomes, Biostimulators, Hair Treatment, and Others.
- Change: removed the stale WordPress starter `Cosmetics` placeholder from the product-card template and deploy WordPress data so only the 9 dropdown categories remain.
- Change: normalized source product names across root, WordPress starter, and deploy CSVs to match the uploaded image/product cards: Dermalax Deep Plus, EPTQ S100, Lipssom, DermArcane Implant, GC Arginine 2510, GC Arginine 1010, and DAIHAN Sterile Water.
- Verification: all four `product-category-classification.csv` surfaces contain 116 rows with no missing or extra dropdown categories; all four product image manifests contain 114 ready images and no pending uploaded-product images.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; Products page has all 9 dropdown blocks; recovery closeout PASS with the standing WARNs for deferred deploy push and blocked public preview fetch.

## 2026-06-15 - WordPress starter ZIP refresh

- Focus: update the attached `wp-theme-starter.zip` package to include all local WordPress starter changes current as of 2026-06-15.
- Finding: the existing ZIP still contained 2026-06-11 versions of key files even though `wp-theme-starter/` had 2026-06-15 updates for `front-page.php`, `assets/css/main.css`, `assets/data/medivista-products.csv`, `assets/data/product-image-manifest.csv`, and `template-parts/product-card.php`.
- Change: regenerated `wp-theme-starter.zip` from the current `wp-theme-starter/` folder using `bsdtar`, preserving a top-level `wp-theme-starter/` folder and forward-slash ZIP paths for WordPress upload compatibility.
- Verification: ZIP timestamp updated to 2026-06-15 21:12 KST, key updated files are present in the archive, and the ZIP contains 114 WebP product images plus the existing product-image README.
- Checks: `node --check assets/js/main.js` PASS; `node --check wp-theme-starter/assets/js/main.js` PASS; commerce/price/cart/checkout/payment scan PASS; Brand Shop URL scan PASS; `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip` PASS with standing WARNs for deferred deploy push and blocked public preview fetch.

## 2026-06-19 - Routine cross-check: local parity confirmed, deploy publish still pending

- Re-ran the MEDIVISTA GitHub/local cross-check routine in `C:\Users\jhj13\OneDrive\문서\New project` and re-read `AGENTS.md`, `docs/dev-log.md`, `docs/github-client-preview.md`, `docs/medivista-web-automation-cycle.md`, `docs/medivista-automation-prompts.md`, `docs/error-resolution-automation.md`, and the refreshed `docs/error-report-latest.md`.
- GitHub refresh result: repository `keithjeon-web/medivista` still uses default branch `medivista`; direct remote branch probe confirmed `medivista` at `8ce7701` and `gh-pages` at `a749a84`; open PR `#10` remains present and mergeable with head `02049eb`; no newer remote branch state displaced the local workspace as source of truth.
- Deploy state after closeout: `.deploy-medivista-github` still sits at `gh-pages...origin/gh-pages [ahead 1]` on local commit `5982567 deploy: add partner action slider`, with preserved uncommitted CSS drift in `.deploy-medivista-github/assets/css/styles.css` and `.deploy-medivista-github/wp-theme-starter/assets/css/main.css`; those edits already match the current local source files but are not yet committed in the deploy checkout.
- Compatibility result: key static pages, shared CSS/JS, and WordPress starter runtime files remain byte-identical between the local source and `.deploy-medivista-github`; homepage and key subpages still share `v=20260611d` CSS/JS/logo references, mobile-nav wiring still uses `aria-controls="primary-nav"` and `id="primary-nav"`, Brand Shop links still target `https://shop.medivista.co.kr`, English-first copy remains intact, required categories remain complete, and catalog-only plus risky-claim constraints still pass.
- Checks: deploy `status`, `remote -v`, `log`, `rev-parse`, `diff`, and `ls-remote`; root-vs-deploy SHA-256 parity checks for key static/theme runtime files; `node --check assets/js/main.js`; `node --check wp-theme-starter/assets/js/main.js`; `node --check wp-theme-shop/assets/js/shop.js`; Brand Shop URL scan; runtime commerce/risky-claim scan; category coverage scan; `powershell -ExecutionPolicy Bypass -File tools/medivista-error-recovery.ps1 -StartPreview -RebuildWordPressZip`.
- Blockers retained: `gh` is not available in PATH in this shell; public preview fetch remains blocked here; the recovery-script preview server reports PASS inside the closeout process but does not persist after that PowerShell process exits, so browser-level local verification still cannot be completed from this shell session.
- Next priority: from a network-enabled environment, push `.deploy-medivista-github` commit `5982567`, decide whether the pending deploy-only CSS spacing changes should be committed before publish, then visually verify the public Home header/logo/mobile nav, partner action slider spacing, and Products page anchors.
## 2026-06-19 - Unified Shop integration

- Decision: discontinue the separate `shop.medivista.co.kr` implementation and run WooCommerce inside the existing `wp-theme-starter` theme under `/shop/`.
- Change: removed the static `BRAND SHOP` CTA/link surfaces; added an internal WordPress `SHOP` dropdown with Shop, Cart, Checkout, and My Account routes.
- Change: integrated WooCommerce theme support, product gallery support, Shop/Cart/Checkout/My Account templates, `woocommerce.php`, Shop CSS/JS, cart count helpers, and internal Shop URLs into `wp-theme-starter`.
- Access control: Korean IP visitors are blocked only on Shop/WooCommerce routes when a trusted country header is available; Administrator and Shop Manager users are exempt; South Korea is excluded from WooCommerce selling and shipping countries.
- Documentation: replaced the active Multisite/subdomain instructions with the unified site model, marked `wp-theme-shop` as legacy, and updated product CSV image URLs to the `wp-theme-starter` path on `www.medivista.co.kr`.
- Package: rebuilt `wp-theme-starter.zip`; the archive contains all integrated commerce templates and access-control assets.
- Checks: JS syntax PASS for static, starter, and integrated Shop scripts; project PHP structural fallback lint PASS because PHP CLI is unavailable; static `BRAND SHOP`/shop-subdomain runtime scan PASS; risky-claim scan PASS; recovery report PASS for unified WordPress ZIP readiness.
- GitHub context: reviewed open Issue #1 as the closest existing WooCommerce/Geo-IP scope. Its old subdomain assumption is superseded by this 2026-06-19 user decision.

## 2026-06-19 - Products finished-image ordering

- Reorganized the Products catalog around the 114 completed WebP assets already present in `assets/images/products` and `wp-theme-starter/assets/images/products`.
- Sorted product cards by product name within the required category order: Botulinum Toxins, Dermal Fillers, Body Fillers, Skin Boosters, Lipolysis, Exosomes, Biostimulators, Hair Treatment, and Others.
- Updated the static and WordPress Products views to report 116 visible cards: 114 finished-image products plus 2 clearly marked preparation-category cards.
- Added category product counts and replaced the stale product-image placeholder notice with a completed-image status note.
- Sorted all shared product CSV sources by the same category/product order so later imports and page rebuilds preserve the catalog organization.
- Checks: 116 cards, 114 ready images, 2 pending preparation cards; JS syntax PASS; WordPress structural PHP lint PASS; unified WordPress ZIP readiness PASS; commerce and risky-claim scan PASS.

## 2026-06-19 - CELLEXOR, RUMINES, partner banner, and temporary Shop access

- Temporarily disabled the Shop Korean-IP `template_redirect` hook until site construction and Shop QA are complete; the country-detection and restriction functions remain ready for reactivation before production launch.
- Rebuilt the CELLEXOR static and WordPress pages with a premium black, ivory, and gold presentation, product-focused hero, dual-system concept, brand manifesto, product philosophy, and inquiry CTA. Removed the previous mojibake text and kept claims carefully moderated.
- Browser/MCP review attempted `cellexor.co.kr` and the existing official reference URL, but the requested `.co.kr` domain did not resolve and the reference site was unavailable from this environment. The implementation therefore follows the established CELLEXOR materials and MEDIVISTA visual system rather than claiming a live-site pixel match.
- Added RUMINES to the Brands submenu, created static and WordPress Coming Soon pages, and inserted a RUMINES launch teaser on the Brands page.
- Improved the Home partner section with a forced dark premium background, higher-contrast Trusted Brands / Our Partners heading panel, uniform logo card dimensions, and consistent logo fit.
- Bumped shared frontend asset cache tokens to `20260619b`, updated sitemap/theme documentation, and rebuilt `wp-theme-starter.zip`.
- Checks: active JS syntax PASS; WordPress structural PHP lint PASS; risky-claim scan PASS; unified WordPress ZIP readiness PASS; local preview startup passed inside recovery, while persistent browser screenshot verification remained unavailable after the recovery process exited.
- Official-reference follow-up: successfully reviewed `https://cellexor.com/cellexor/` and `https://cellexor.com/cellexor-retone/` through the MCP browser. Updated the brand hero toward the official monochrome cellular mood and revised the Re:Tone hero to the official centered, oversized ivory/gold `RE:TONE` composition with product-first staging. Strong clinical/regulatory claims visible on the source pages were intentionally not copied.

## 2026-06-19 - WordPress consolidated update package

- Audited all WordPress theme files against the current chat decisions: integrated Shop, temporary Korea-IP unblock, 114 finished product images, CELLEXOR official-reference styling, RUMINES Coming Soon, partner banner contrast, and uniform partner logo sizing.
- Updated the WXR page import from 7 to 12 pages and added Rumines, Shop, Cart, Checkout, and My Account with their matching page templates.
- Changed the WXR base URLs and WooCommerce import image URLs from `www.medivista.co.kr` to the requested primary domain `medivista.co.kr`.
- Added a WordPress document-title filter so frontend tabs use `MEDIVISTA` instead of a temporary WordPress site identifier.
- Updated theme instructions for primary-domain setup, Site Title, tagline, redirects, DNS record preservation, and the temporarily disabled Shop Korea-IP restriction.
- Rebuilt `wp-theme-starter.zip`; JS, structural PHP lint, XML parsing with 12 pages, ZIP readiness, product images, commerce, and risky-claim checks passed.

## 2026-06-20 - PRODUCTS image-only catalog and taxonomy update

- Changed PRODUCTS category cards to display product photography only; product names, specifications, descriptions, and per-product WhatsApp buttons remain available in markup for filtering/accessibility but are not visually displayed.
- Added `Vitamin Injections` as a separate category with Guthion 1200mg, Jeil High B, and Vitamin C; renamed `Others` to `Cosmetic`.
- Removed the two preparation cards from the visible catalog, leaving 114 cards backed by 114 ready WebP images across 10 category sections.
- Renamed all public `RUMINES` branding to `RUVENIS` while retaining the existing `/rumines/` route and template filenames for compatibility.
- Mirrored static, WordPress starter, source CSV, WXR, and deploy-checkout surfaces.
- Checks: JS syntax PASS; structural PHP lint PASS; XML parse PASS; 114 cards / 114 ready images PASS; root/deploy parity PASS; commerce and claim safety PASS. Local preview startup passed, but the in-app browser could not reach the shell-hosted localhost server.

## 2026-06-20 - CELLEXOR page build and core-page 404 recovery

- Audited the official CELLEXOR Re:Tone reference in the Codex in-app browser, including page structure, visible links, image formats, metadata, computed body/font/color values, benefit-tab styling, and source claim risk.
- Added `docs/cellexor-page-audit.md` and `docs/cellexor-design-tokens.md`.
- Rebuilt the static and WordPress CELLEXOR pages with Hero, seven technology themes, Exosome × NAD+, V1/V2 system, four care areas, evidence-gated verification, applications, disclaimers, and final CTAs.
- Added WordPress core-page provisioning for `/brands/`, `/cellexor/`, and `/contact/`, including template assignment and rewrite refresh when a missing page is created.
- Replaced static menu and CTA links with clean directory routes and changed Home/Brands CELLEXOR actions to the dedicated `/cellexor/` page.
- External product and partnership CTAs now use `https://cellexor.com/cellexor-retone/` and `https://cellexor.com/contact/` with new-tab security attributes.
- Local HTTP verification: `/brands/`, `/cellexor/`, and `/contact/` returned 200; CELLEXOR contained 9 sections, JSON-LD, Open Graph metadata, safe external CTAs, and explicit image dimensions.
- Checks: JS syntax PASS; fallback PHP lint PASS; local preview PASS; WordPress ZIP/XML/images PASS; commerce and claim scan PASS. The in-app browser successfully audited the external reference but could not access the shell-hosted localhost process, so viewport behavior was validated through responsive CSS breakpoints and local HTTP structure rather than browser screenshots.

## 2026-06-21 - Chrome DevTools CELLEXOR live audit and image inventory

- Connected Chrome DevTools MCP and audited the live MEDIVISTA `/cellexor/` page against `https://cellexor.com/cellexor-retone/`.
- Captured live DOM/computed styles, CTA destinations and security attributes, metadata, console messages, network status, responsive measurements, and full-page desktop/mobile screenshots.
- Tested 1440, 1024, 768, and requested 390px widths; this Chrome instance enforced an effective 500px minimum for the mobile capture. Neither page showed horizontal overflow.
- Confirmed both documents and all observed image/network requests returned HTTP 200; neither page emitted console errors, warnings, or browser issues.
- Inventoried 32 unique reference image URLs, predominantly WebP with SVG brand assets. No reference image was copied into the production theme because reuse rights were not confirmed.
- Replaced `docs/cellexor-page-audit.md` with the live Chrome DevTools comparison and added raw JSON evidence plus four QA screenshots.

## 2026-06-21 - CELLEXOR owned-image integration

- Received owner confirmation that the CELLEXOR reference images are user-owned and approved for MEDIVISTA website use.
- Downloaded the 32 inventoried official assets into the static, WordPress starter, and deploy-mirror asset directories.
- Replaced the generic hero image with the official transparent V1/V2 product pair and added official V1, V2, monochrome editorial, and professional beauty visuals to the page.
- Added responsive layouts, lazy loading, explicit image dimensions, and descriptive alt text for the newly displayed assets.
- Kept microscopy, test-result, numerical, and certificate images unpublished because ownership permission does not replace factual and regulatory verification.
- Added `docs/cellexor-asset-rights.md` as the project rights record.

## 2026-06-21 - PRODUCTS three-column reference redesign

- Audited `https://hjcorporations.kr/241` with Chrome DevTools MCP and recorded its 1280px, white-canvas, three-column square-image catalog pattern.
- Cross-reviewed the supplied `工作表1 (1).html` product sheet and the 114 files in `완성이미지/WebP/` against the existing catalog structure and prepared assets.
- Rebuilt the static and WordPress Products presentation around a minimal three-column desktop gallery, two-column tablet layout, and one-column mobile layout.
- Preserved product search, category filtering, reset, live count, category quick links, hidden searchable metadata, and catalog-only behavior.
- Added Products to WordPress core-page provisioning because the live `/products/` URL returned 404 during the audit.
- Added `docs/products-reference-audit.md`.

## 2026-06-21 - PRODUCTS category child-page navigation

- Replaced the long all-products `/products/` page with a ten-card category directory.
- Added dedicated static child routes for all ten catalog categories and preserved search plus live item count inside each category page.
- Added a generic WordPress `page-product-category.php` template and automatic creation of ten child pages under the Products parent.
- Updated shared static navigation, WordPress header navigation, and homepage partner links from hash anchors to category URLs.
- Retained the three-column reference layout within category pages and kept the corporate catalog free of prices and commerce controls.

## 2026-06-21 - ABOUT corporate profile redesign

- Audited JDBIO CEO Message, Introduction, and Global Network pages with Chrome DevTools MCP.
- Rebuilt MEDIVISTA ABOUT around a corporate hero, horizontal section navigation, CEO letter, company introduction, business focus, vision/mission, core values, and regional network.
- Developed the existing trust, clarity, and global-partnership copy into a fuller English-first company narrative.
- Removed the Contact Us subsection and final inquiry CTA from ABOUT as requested.
- Avoided copying JDBIO text, images, proprietary components, clinical statements, or market-leadership claims.
- Added About to WordPress core-page/template provisioning and created `docs/about-page-audit.md`.

## 2026-06-21 - PRODUCTS directory search and compact category images

- Restored the product-name search, category selector, reset button, result count, and visible category links on the main `/products/` directory.
- Added cross-category search indexing so a product query keeps only category cards containing matching products.
- Reduced category representative images from tall square panels to consistent 265px desktop and 230px tablet/mobile frames.
- Fixed the WordPress category template argument so child pages render and count only their selected category instead of all 114 products.
# 2026-06-21 - Partner logo sizing and product taxonomy cleanup

- Matched the Cellexor wordmark capsule to the same white logo frame used by the other partner icons.
- Removed Hair Treatment from navigation, product directory, category provisioning, contact options, and catalog data.
- Split Others from Cosmetic: the eight supplied items now use Others, while Cosmetic remains visible with no assigned products.
- Updated the static site, WordPress starter, catalog CSV sources, and homepage Liporase links.
# 2026-06-21 - Compact JDBIO-inspired WooCommerce shop layout

- Reworked the integrated `/shop/` presentation around a compact announcement strip, category navigation, clean product shelves, and a three-part service band.
- Reduced WooCommerce product-card padding, image height, title/price scale, and CTA height while keeping purchase functions inside the Shop.
- Added a small WhatsApp inquiry CTA beside each Shop loop purchase button for B2B and wholesale questions.
- Preserved WooCommerce Cart, Checkout, My Account, payment flow, and existing Shop Geo-IP access control.
# 2026-06-21 - Global Network map zoom

- Enlarged only the world-map SVG inside the existing frame to reduce unused edge space.
- Desktop uses a 1.16 zoom, tablet 1.13, and mobile 1.08 while preserving the section height and market callouts.
- Mirrored the adjustment across the static site and WordPress starter theme.
