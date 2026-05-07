# Codex Thread Linkage - MEDIVISTA Client Preview

Date: 2026-05-07
Codex thread: 019df785-5622-7b60-b0ca-a6fcd4a9b739
Repository: https://github.com/keithjeon-web/medivista

## Purpose

Connect the active Codex website build conversation to this GitHub repository so future MEDIVISTA work can continue from the same project context.

## Current Local Build

The active local preview in Codex Desktop is running at:

```text
http://127.0.0.1:4173/index.html
```

The local working folder is:

```text
C:\Users\jhj13\OneDrive\문서\New project
```

## Public Preview Target

Recommended client preview target after GitHub Pages is enabled and the current static files are pushed:

```text
https://keithjeon-web.github.io/medivista/
```

Recommended GitHub Pages source:

```text
Branch: gh-pages
Folder: /
```

## Deployment Constraint Logged From Codex

The current local folder is not a Git checkout and the desktop shell did not expose local `git` / `gh` commands, so the full current static site cannot be pushed via the normal local Git workflow from this folder yet.

## Next Step

Use a Git-enabled checkout of this repository, copy the current static site files into it, then publish to a `gh-pages` branch or merge through the normal PR workflow.

## Site Rules To Preserve

- Main site remains catalog-only.
- No price, cart, checkout, or payment flow on the main site.
- Brand Shop routes to https://shop.medivista.co.kr.
- Frontend copy remains English-first.
- Avoid unverified medical or guaranteed efficacy claims.
