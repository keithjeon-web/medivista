const categoryRoot = document.querySelector('[data-product-category-page]');

if (categoryRoot) {
  const categoryId = categoryRoot.dataset.productCategoryPage;
  const categoryLabels = {
    'botulinum-toxins': 'Botulinum Toxins',
    'dermal-fillers': 'Dermal Fillers',
    'body-fillers': 'Body Fillers',
    'skin-boosters': 'Skin Boosters',
    'lipolysis': 'Lipolysis',
    'exosomes': 'Exosomes',
    'biostimulators': 'Biostimulators',
    'hair-treatment': 'Hair Treatment',
    'vitamin-injections': 'Vitamin Injections',
    'cosmetic': 'Cosmetic',
  };
  const categoryLabel = categoryLabels[categoryId] || 'Products';
  const target = categoryRoot.querySelector('[data-category-products]');
  const countNode = categoryRoot.querySelector('[data-product-count]');
  const searchInput = categoryRoot.querySelector('[data-product-search]');
  const emptyNode = categoryRoot.querySelector('[data-product-empty]');
  document.querySelectorAll('[data-category-title]').forEach((node) => {
    node.textContent = categoryLabel;
  });
  document.title = `${categoryLabel} | MEDIVISTA Products`;

  fetch('../catalog-source.html')
    .then((response) => {
      if (!response.ok) throw new Error('Catalog source unavailable');
      return response.text();
    })
    .then((html) => {
      const source = new DOMParser().parseFromString(html, 'text/html');
      const block = source.getElementById(categoryId);
      if (!block || !target) throw new Error('Category unavailable');

      target.classList.add('product-category-block');
      target.replaceChildren(...Array.from(block.children).map((node) => node.cloneNode(true)));
      const cards = Array.from(target.querySelectorAll('.product-card'));
      target.querySelector('.grid')?.classList.add('category-product-grid');

      cards.forEach((card) => {
        const visual = card.querySelector('.product-image');
        const title = card.querySelector('h3')?.textContent?.trim() || 'MEDIVISTA product';
        if (visual?.dataset.image && visual.dataset.imageStatus !== 'pending') {
          const img = document.createElement('img');
          img.src = visual.dataset.image.replace('../assets/', '../../assets/');
          img.alt = title;
          img.width = 1200;
          img.height = 900;
          img.loading = 'lazy';
          img.decoding = 'async';
          visual.classList.add('has-photo');
          visual.appendChild(img);
        }
      });

      const update = () => {
        const query = (searchInput?.value || '').toLowerCase().trim();
        let visible = 0;
        cards.forEach((card) => {
          const show = !query || card.textContent.toLowerCase().includes(query);
          card.classList.toggle('is-hidden', !show);
          if (show) visible += 1;
        });
        if (countNode) countNode.textContent = String(visible);
        if (emptyNode) emptyNode.hidden = visible !== 0;
      };

      searchInput?.addEventListener('input', update);
      update();
    })
    .catch(() => {
      if (emptyNode) {
        emptyNode.hidden = false;
        emptyNode.textContent = 'This category could not be loaded. Please return to Products.';
      }
    });
}
