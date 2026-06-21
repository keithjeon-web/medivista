document.querySelectorAll('[data-product-directory]').forEach((toolbar) => {
  const page = toolbar.closest('.products-page');
  const cards = Array.from(page?.querySelectorAll('[data-directory-card]') || []);
  const search = toolbar.querySelector('[data-directory-search]');
  const select = toolbar.querySelector('[data-directory-category]');
  const reset = toolbar.querySelector('[data-directory-reset]');
  const count = toolbar.querySelector('[data-directory-count]');
  const summary = page?.querySelector('[data-directory-summary]');
  const empty = page?.querySelector('[data-directory-empty]');
  const embeddedSource = page?.querySelector('[data-directory-source]');
  const index = new Map();

  const buildIndex = (source) => {
    cards.forEach((card) => {
      const slug = card.dataset.directoryCard;
      const block = source.querySelector(`#${CSS.escape(slug)}`);
      const products = Array.from(block?.querySelector(':scope > .grid')?.children || [])
        .filter((product) => product.classList.contains('product-card'));
      index.set(slug, {
        total: products.length,
        terms: products.map((product) => product.textContent.toLowerCase()),
      });
    });
  };

  const update = () => {
    const query = (search?.value || '').trim().toLowerCase();
    let matchedProducts = 0;
    let visibleCategories = 0;

    cards.forEach((card) => {
      const data = index.get(card.dataset.directoryCard);
      const matches = !query
        ? (data?.total || 0)
        : (data?.terms.filter((term) => term.includes(query)).length || 0);
      const visible = !query || matches > 0;
      card.hidden = !visible;
      if (visible) visibleCategories += 1;
      matchedProducts += matches;
    });

    if (count) count.textContent = String(matchedProducts);
    if (empty) empty.hidden = visibleCategories !== 0;
    if (summary) {
      summary.textContent = query
        ? `${matchedProducts} product${matchedProducts === 1 ? '' : 's'} found across ${visibleCategories} categor${visibleCategories === 1 ? 'y' : 'ies'}.`
        : 'Search all products or select a category below.';
    }
  };

  const ready = (source) => {
    buildIndex(source);
    update();
  };

  if (embeddedSource) {
    ready(embeddedSource);
  } else {
    fetch('catalog-source.html')
      .then((response) => response.text())
      .then((html) => ready(new DOMParser().parseFromString(html, 'text/html')))
      .catch(() => update());
  }

  search?.addEventListener('input', update);
  select?.addEventListener('change', () => {
    if (select.value === 'all') return;
    const card = cards.find((item) => item.dataset.directoryCard === select.value);
    if (card) window.location.href = card.href;
  });
  reset?.addEventListener('click', () => {
    if (search) search.value = '';
    if (select) select.value = 'all';
    update();
    search?.focus();
  });
});
