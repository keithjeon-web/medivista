const MEDIVISTA_WHATSAPP_NUMBER = '821059066768';
const MEDIVISTA_WHATSAPP_MESSAGE = 'Hello MEDIVISTA, I would like to inquire about your products.';

function buildWhatsAppUrl(productName, customMessage) {
  const message = customMessage || (
    productName
      ? `${MEDIVISTA_WHATSAPP_MESSAGE} Product: ${productName}.`
      : MEDIVISTA_WHATSAPP_MESSAGE
  );
  return `https://wa.me/${MEDIVISTA_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
}

document.querySelectorAll('[data-whatsapp]').forEach((link) => {
  const productName = link.dataset.product?.trim();
  link.setAttribute('href', buildWhatsAppUrl(productName));
  link.setAttribute('target', '_blank');
  link.setAttribute('rel', 'noopener noreferrer');
  const label = productName ? `Inquire via WhatsApp about ${productName}` : 'Inquire via WhatsApp';
  link.setAttribute('aria-label', label);
  link.setAttribute('title', label);
});

document.querySelectorAll('.site-header').forEach((header) => {
  const toggle = header.querySelector('.nav-toggle');
  const nav = header.querySelector('.main-nav');
  if (!toggle || !nav) return;

  if (!nav.id) nav.id = 'primary-nav';
  toggle.setAttribute('aria-controls', nav.id);

  function closeNav({ returnFocus } = {}) {
    header.classList.remove('nav-open');
    toggle.setAttribute('aria-expanded', 'false');
    if (returnFocus) toggle.focus();
  }

  toggle.addEventListener('click', () => {
    const isOpen = header.classList.toggle('nav-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      closeNav();
    });
  });

  document.addEventListener('click', (event) => {
    if (!header.classList.contains('nav-open')) return;
    if (header.contains(event.target)) return;
    closeNav();
  });

  document.addEventListener('keydown', (event) => {
    if (!header.classList.contains('nav-open')) return;
    if (event.key !== 'Escape') return;
    closeNav({ returnFocus: true });
  });
});

window.addEventListener('resize', () => {
  if (window.innerWidth > 980) {
    document.querySelectorAll('.site-header.nav-open').forEach((header) => {
      header.classList.remove('nav-open');
      header.querySelector('.nav-toggle')?.setAttribute('aria-expanded', 'false');
    });
  }
});

document.querySelectorAll('[data-action-slider]').forEach((slider) => {
  const slides = Array.from(slider.querySelectorAll('[data-slide]')).slice(0, 5);
  const prev = slider.querySelector('[data-slider-prev]');
  const next = slider.querySelector('[data-slider-next]');
  const dotsWrap = slider.querySelector('[data-slider-dots]');
  let intervalMs = Number(slider.dataset.autoplay || 0);
  const prefersReducedMotion = window.matchMedia?.('(prefers-reduced-motion: reduce)')?.matches;
  if (intervalMs && prefersReducedMotion) intervalMs = 0;
  let activeIndex = Math.max(0, slides.findIndex((slide) => slide.classList.contains('is-active')));
  let timer = null;

  if (slides.length <= 1) return;

  function setSlide(index) {
    activeIndex = (index + slides.length) % slides.length;
    slides.forEach((slide, slideIndex) => {
      const isActive = slideIndex === activeIndex;
      slide.classList.toggle('is-active', isActive);
      slide.setAttribute('aria-hidden', String(!isActive));
    });
    dotsWrap?.querySelectorAll('button').forEach((dot, dotIndex) => {
      dot.classList.toggle('is-active', dotIndex === activeIndex);
      dot.setAttribute('aria-current', dotIndex === activeIndex ? 'true' : 'false');
    });
  }

  function stop() {
    if (timer) window.clearInterval(timer);
    timer = null;
  }

  function start() {
    stop();
    if (!intervalMs) return;
    timer = window.setInterval(() => setSlide(activeIndex + 1), intervalMs);
  }

  if (dotsWrap) {
    dotsWrap.innerHTML = '';
    slides.forEach((_, dotIndex) => {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.setAttribute('aria-label', `Go to slide ${dotIndex + 1}`);
      dot.addEventListener('click', () => {
        setSlide(dotIndex);
        start();
      });
      dotsWrap.appendChild(dot);
    });
  }

  prev?.addEventListener('click', () => {
    setSlide(activeIndex - 1);
    start();
  });
  next?.addEventListener('click', () => {
    setSlide(activeIndex + 1);
    start();
  });
  slider.addEventListener('mouseenter', stop);
  slider.addEventListener('mouseleave', start);
  slider.addEventListener('focusin', stop);
  slider.addEventListener('focusout', start);
  document.addEventListener('visibilitychange', () => {
    if (document.hidden) stop();
    else start();
  });

  setSlide(activeIndex);
  start();
});

document.querySelectorAll('.contact-form').forEach((form) => {
  form.addEventListener('submit', (event) => {
    event.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    const data = new FormData(form);
    const lines = [
      'Hello MEDIVISTA, I would like to send a B2B inquiry.',
      `Name: ${data.get('first-name') || ''}`,
      `Email: ${data.get('email') || ''}`,
      `Contact Number: ${data.get('contact-number') || ''}`,
      `Country: ${data.get('country') || ''}`,
      `Business Type: ${data.get('business-type') || 'Not specified'}`,
      `Product Type: ${data.get('product-type') || 'Not specified'}`,
      data.get('message') ? `Message: ${data.get('message')}` : '',
    ].filter(Boolean);

    window.open(buildWhatsAppUrl(null, lines.join('\n')), '_blank', 'noopener,noreferrer');
  });
});

function inferVisualTone(text) {
  const value = text.toLowerCase();
  if (value.includes('cellexor') || value.includes('exosome') || value.includes('nad')) return 'brand';
  if (value.includes('filler') || value.includes('chaeum') || value.includes('revolax') || value.includes('dermalax') || value.includes('elravie')) return 'filler';
  if (value.includes('rejuran') || value.includes('booster')) return 'booster';
  return 'catalog';
}

document.querySelectorAll('.product-image').forEach((visual) => {
  const card = visual.closest('article');
  const title = card?.querySelector('h3')?.textContent?.trim();
  const meta = card?.querySelector('.card-meta')?.textContent?.trim();
  const label = title || meta || 'MEDIVISTA Catalog';
  visual.dataset.label = label;
  visual.dataset.tone = inferVisualTone(`${label} ${meta || ''}`);

  if (visual.dataset.image && visual.dataset.imageStatus !== 'pending') {
    const img = document.createElement('img');
    img.src = visual.dataset.image;
    img.alt = label;
    img.width = 1200;
    img.height = 900;
    img.loading = 'lazy';
    img.decoding = 'async';
    img.addEventListener('error', () => {
      visual.classList.remove('has-photo');
      img.remove();
    });
    visual.classList.add('has-photo');
    visual.appendChild(img);
  }
});

document.querySelectorAll('[data-product-catalog]').forEach((toolbar) => {
  const section = toolbar.closest('.section');
  const searchInput = toolbar.querySelector('[data-product-search]');
  const categoryFilter = toolbar.querySelector('[data-product-filter]');
  const resetButton = toolbar.querySelector('[data-product-reset]');
  const countNode = toolbar.querySelector('[data-product-count]');
  const emptyNode = section?.querySelector('[data-product-empty]');
  const cards = Array.from(section?.querySelectorAll('.product-card') || []);
  const blocks = Array.from(section?.querySelectorAll('.product-category-block') || []);
  const tabs = section?.querySelector('.category-tabs');

  function normalize(value) {
    return (value || '').toLowerCase().trim();
  }

  function scrollToBlock(block) {
    if (!block) return;

    const header = document.querySelector('.site-header');
    const headerHeight = header?.getBoundingClientRect().height || 0;
    const offset = headerHeight + 18;
    const top = block.getBoundingClientRect().top + window.scrollY - offset;

    window.scrollTo({ top, behavior: 'smooth' });
  }

  function setActiveTab(blockId) {
    if (!tabs) return;
    const activeHref = `#${blockId}`;
    tabs.querySelectorAll('a').forEach((link) => {
      const isActive = link.getAttribute('href') === activeHref;
      if (isActive) link.setAttribute('aria-current', 'true');
      else link.removeAttribute('aria-current');
    });
  }

  function updateCatalog() {
    const query = normalize(searchInput?.value);
    const selectedCategory = categoryFilter?.value || 'all';
    let visibleCount = 0;

    cards.forEach((card) => {
      const block = card.closest('.product-category-block');
      const matchesCategory = selectedCategory === 'all' || block?.id === selectedCategory;
      const matchesSearch = !query || normalize(card.textContent).includes(query);
      const isVisible = matchesCategory && matchesSearch;
      card.classList.toggle('is-hidden', !isVisible);
      if (isVisible) visibleCount += 1;
    });

    blocks.forEach((block) => {
      const hasVisibleCards = Boolean(block.querySelector('.product-card:not(.is-hidden)'));
      block.classList.toggle('is-hidden', !hasVisibleCards);
    });

    if (countNode) countNode.textContent = String(visibleCount);
    if (emptyNode) emptyNode.hidden = visibleCount !== 0;
  }

  searchInput?.addEventListener('input', updateCatalog);
  categoryFilter?.addEventListener('change', () => {
    updateCatalog();

    const selectedCategory = categoryFilter?.value || 'all';
    if (selectedCategory !== 'all') {
      const target = section?.querySelector(`#${CSS.escape(selectedCategory)}`);
      if (target) {
        setActiveTab(selectedCategory);
        scrollToBlock(target);
      }
    }
  });
  resetButton?.addEventListener('click', () => {
    if (searchInput) searchInput.value = '';
    if (categoryFilter) categoryFilter.value = 'all';
    updateCatalog();
    searchInput?.focus();
  });

  updateCatalog();

  if (tabs) {
    tabs.querySelectorAll('a[href^=\"#\"]').forEach((link) => {
      link.addEventListener('click', (event) => {
        const href = link.getAttribute('href');
        if (!href) return;
        const id = href.slice(1);
        const target = section?.querySelector(`#${CSS.escape(id)}`);
        if (!target) return;

        event.preventDefault();
        setActiveTab(id);
        scrollToBlock(target);
      });
    });

    if ('IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        const visible = entries
          .filter((entry) => entry.isIntersecting)
          .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];
        const id = visible?.target?.id;
        if (id) setActiveTab(id);
      }, { rootMargin: '-35% 0px -55% 0px', threshold: [0, 0.1, 0.25, 0.4, 0.6] });

      blocks.forEach((block) => observer.observe(block));
    }
  }
});

document.querySelectorAll('.blog-thumb').forEach((visual) => {
  const card = visual.closest('article');
  visual.dataset.label = card?.querySelector('h3')?.textContent?.trim() || 'MEDIVISTA Insight';
});

document.querySelectorAll('.brand-visual').forEach((visual) => {
  const section = visual.closest('section');
  visual.dataset.label = section?.querySelector('h1, h2')?.textContent?.trim() || 'CELLEXOR';
});

const MEDIVISTA_MARKETS = {
  840: { name: 'United States', region: 'North America', zone: 'Zone 1' },
  156: { name: 'China', region: 'East Asia', zone: 'Zone 3' },
  554: { name: 'New Zealand', region: 'Oceania', zone: 'Zone 2' },
  36: { name: 'Australia', region: 'Oceania', zone: 'Zone 2' },
  458: { name: 'Malaysia', region: 'Southeast Asia', zone: 'Zone 3' },
  608: { name: 'Philippines', region: 'Southeast Asia', zone: 'Zone 3' },
  764: { name: 'Thailand', region: 'Southeast Asia', zone: 'Zone 3' },
  704: { name: 'Vietnam', region: 'Southeast Asia', zone: 'Zone 3' },
};

const MEDIVISTA_MAP_PINS = [
  { label: 'North America', sub: 'United States', lon: -98, lat: 40 },
  { label: 'East Asia', sub: 'China', lon: 104, lat: 36 },
  { label: 'SE Asia', sub: 'Malaysia - Philippines / Thailand - Vietnam', lon: 114, lat: 8 },
  { label: 'Oceania', sub: 'Australia - NZ', lon: 133, lat: -25 },
];

function marketColor(zone) {
  if (zone === 'Zone 2') return '#1a7a5a';
  if (zone === 'Zone 1' || zone === 'Zone 3') return '#1a5fa0';
  return 'rgba(255,255,255,0.06)';
}

async function initWorldMap(mapNode) {
  async function ensureMapLibrary(globalName, src) {
    if (window[globalName]) return true;
    await new Promise((resolve, reject) => {
      const existing = document.querySelector(`script[src="${src}"]`);
      if (existing) {
        existing.addEventListener('load', resolve, { once: true });
        existing.addEventListener('error', reject, { once: true });
        return;
      }
      const script = document.createElement('script');
      script.src = src;
      script.async = true;
      script.addEventListener('load', resolve, { once: true });
      script.addEventListener('error', reject, { once: true });
      document.head.appendChild(script);
    });
    return Boolean(window[globalName]);
  }

  try {
    await ensureMapLibrary('d3', 'https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js');
    await ensureMapLibrary('topojson', 'https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js');
  } catch (error) {
    console.warn('MEDIVISTA world map library fallback active:', error);
  }

  if (!window.d3 || !window.topojson) return;

  const svg = mapNode.querySelector('svg');
  if (!svg) return;

  const d3 = window.d3;
  const topojson = window.topojson;

  try {
    const response = await fetch('https://unpkg.com/world-atlas@2/countries-110m.json');
    if (!response.ok) throw new Error(`World atlas request failed: ${response.status}`);
    const world = await response.json();

    const width = 960;
    const height = 500;
    svg.setAttribute('viewBox', `0 0 ${width} ${height}`);
    svg.removeAttribute('width');
    svg.removeAttribute('height');
    svg.innerHTML = '<title id="world-map-title">Actual MEDIVISTA global network map by market zone</title>';

    const projection = d3.geoNaturalEarth1().scale(width / 6.2).translate([width / 2, height / 2 + height * 0.04]);
    const path = d3.geoPath(projection);
    const root = d3.select(svg);

    const countries = topojson.feature(world, world.objects.countries);
    const borders = topojson.mesh(world, world.objects.countries, (a, b) => a !== b);

    root.append('rect').attr('width', width).attr('height', height).attr('fill', '#07111f');
    root.append('path')
      .datum(d3.geoGraticule10())
      .attr('d', path)
      .attr('fill', 'none')
      .attr('stroke', 'rgba(42,155,212,0.08)')
      .attr('stroke-width', 0.45);

    root.append('g')
      .selectAll('path')
      .data(countries.features)
      .join('path')
      .attr('d', path)
      .attr('fill', (country) => marketColor(MEDIVISTA_MARKETS[Number(country.id)]?.zone))
      .attr('stroke', 'rgba(255,255,255,0.08)')
      .attr('stroke-width', 0.35);

    root.append('path')
      .datum(borders)
      .attr('d', path)
      .attr('fill', 'none')
      .attr('stroke', 'rgba(255,255,255,0.13)')
      .attr('stroke-width', 0.4);

    const pinGroup = root.append('g').attr('class', 'actual-map-pins');
    MEDIVISTA_MAP_PINS.forEach((pin) => {
      const point = projection([pin.lon, pin.lat]);
      if (!point) return;
      const [x, y] = point;
      pinGroup.append('circle')
        .attr('cx', x)
        .attr('cy', y)
        .attr('r', 8)
        .attr('fill', 'rgba(201,168,76,0.26)');
      pinGroup.append('circle')
        .attr('cx', x)
        .attr('cy', y)
        .attr('r', 4)
        .attr('fill', '#c9a84c')
        .attr('stroke', '#ffffff')
        .attr('stroke-width', 2);
    });

    mapNode.classList.add('is-actual-map');
  } catch (error) {
    console.warn('MEDIVISTA world map fallback active:', error);
  }
}

document.querySelectorAll('[data-world-map]').forEach((mapNode) => {
  initWorldMap(mapNode);
});

document.querySelectorAll('[data-year]').forEach((node) => {
  node.textContent = new Date().getFullYear();
});
