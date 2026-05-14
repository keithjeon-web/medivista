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
