---
name: Codex Task
about: Create a task for Codex implementation
title: "[Codex] "
labels: codex-ready, medivista
assignees: ""
---

# Codex Task

## Repository

```text
keithjeon-web/medivista
```

## Base Branch

```text
medivista
```

## Recommended Branch

```text
feature/issue-[issue-number]-[short-task-name]
```

## Objective

<!-- 작업 목적 작성 -->

## Scope

- [ ] Home
- [ ] About
- [ ] Products
- [ ] Brands
- [ ] Blogs
- [ ] Contact
- [ ] CSS / Responsive
- [ ] JavaScript
- [ ] WordPress Starter
- [ ] SEO
- [ ] Compliance Review

## Requirements

```text
작업 요구사항 작성
```

## Do Not

```text
Do not add prices.
Do not add Add to Cart.
Do not add Cart page.
Do not add Checkout.
Do not add payment.
Do not use unverified medical claims.
Do not modify DNS.
Do not modify Google Workspace records.
```

## Acceptance Criteria

- [ ] AGENTS.md was read
- [ ] Frontend copy is English-first
- [ ] Main website remains catalog-only
- [ ] No prices
- [ ] No Add to Cart
- [ ] No Cart
- [ ] No Checkout
- [ ] No payment
- [ ] Brand Shop links to [https://shop.medivista.co.kr](https://shop.medivista.co.kr)
- [ ] PRODUCTS categories are complete if related
- [ ] WhatsApp inquiry works if related
- [ ] Responsive layout checked
- [ ] Risky medical claims avoided
- [ ] PR summary included

## Codex Prompt

```text
Work on this GitHub Issue.

Repository:
keithjeon-web/medivista

Base branch:
medivista

Create a new feature branch.

Read AGENTS.md first.
Implement only the scope described in this Issue.

After implementation:
- Run basic checks
- Summarize changed files
- Open a pull request
- Reference this Issue in the PR description
```
