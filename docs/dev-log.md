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

## 2026-05-11 - Production cycle: mobile nav accessibility + close behavior

- Improved mobile navigation behavior: when the menu is open, clicking outside the header closes it, and pressing `Escape` closes it and returns focus to the toggle.
- Added `aria-controls="primary-nav"` on the mobile toggle and `id="primary-nav"` on the primary nav across all static pages, plus the WordPress starter header.
- Synced the same nav behavior into `wp-theme-starter/assets/js/main.js` for parity.
- Checks: `node --check assets/js/main.js` and `node --check wp-theme-starter/assets/js/main.js` passed; commerce flow scan and risky-claim scan found no issues outside instruction docs.
- Deploy checkout: committed the same change in `.deploy-medivista-github` as `deploy: improve mobile nav close behavior` (commit `6c24315`).
- Deploy blocker: `git` inside `.deploy-medivista-github` requires `-c safe.directory=...` per invocation; global safe-directory config failed due to sandbox permission (`.gitconfig` lock denied). Subpage directories inside `.deploy-medivista-github` are `ReparsePoint` placeholders and appear empty in this environment, so only root `index.html` + shared assets could be updated this cycle.
