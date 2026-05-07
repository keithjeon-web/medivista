const MEDIVISTA_WHATSAPP_NUMBER = '821059066768';
const MEDIVISTA_WHATSAPP_MESSAGE = 'Hello MEDIVISTA, I would like to inquire about your products.';

function buildWhatsAppUrl(productName, customMessage) {
  const message = customMessage || (productName ? `${MEDIVISTA_WHATSAPP_MESSAGE} Product: ${productName}.` : MEDIVISTA_WHATSAPP_MESSAGE);
  return `https://wa.me/${MEDIVISTA_WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
}

document.querySelectorAll('[data-whatsapp]').forEach((link) => {
  link.setAttribute('href', buildWhatsAppUrl(link.dataset.product));
  link.setAttribute('target', '_blank');
  link.setAttribute('rel', 'noopener noreferrer');
});

document.querySelectorAll('.site-header').forEach((header) => {
  const toggle = header.querySelector('.nav-toggle');
  const nav = header.querySelector('.main-nav');
  if (!toggle || !nav) return;
  toggle.addEventListener('click', () => {
    const isOpen = header.classList.toggle('nav-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });
  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      header.classList.remove('nav-open');
      toggle.setAttribute('aria-expanded', 'false');
    });
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
  840: { zone: 'Zone 1' },
  156: { zone: 'Zone 3' },
  554: { zone: 'Zone 2' },
  36: { zone: 'Zone 2' },
  458: { zone: 'Zone 3' },
  608: { zone: 'Zone 3' },
  764: { zone: 'Zone 3' },
  704: { zone: 'Zone 3' },
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

async function loadScriptOnce(globalName, src) {
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

async function initWorldMap(mapNode) {
  try {
    await loadScriptOnce('d3', 'https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js');
    await loadScriptOnce('topojson', 'https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js');
  } catch (error) {
    console.warn('MEDIVISTA world map library fallback active:', error);
  }
  if (!window.d3 || !window.topojson) return;

  const svg = mapNode.querySelector('svg');
  if (!svg) return;

  const width = Math.max(720, Math.round(mapNode.getBoundingClientRect().width || 960));
  const height = Math.round(width * 0.5);
  svg.setAttribute('viewBox', `0 0 ${width} ${height}`);
  svg.setAttribute('width', String(width));
  svg.setAttribute('height', String(height));
  svg.innerHTML = '<title id="world-map-title">Actual MEDIVISTA global network map by market zone</title>';

  const d3 = window.d3;
  const topojson = window.topojson;
  const projection = d3.geoNaturalEarth1().scale(width / 6.2).translate([width / 2, height / 2 + height * 0.04]);
  const path = d3.geoPath(projection);
  const root = d3.select(svg);

  try {
    const response = await fetch('https://unpkg.com/world-atlas@2/countries-110m.json');
    if (!response.ok) throw new Error(`World atlas request failed: ${response.status}`);
    const world = await response.json();
    const countries = topojson.feature(world, world.objects.countries);
    const borders = topojson.mesh(world, world.objects.countries, (a, b) => a !== b);

    root.append('rect').attr('width', width).attr('height', height).attr('fill', '#07111f');
    root.append('path').datum(d3.geoGraticule10()).attr('d', path).attr('fill', 'none').attr('stroke', 'rgba(42,155,212,0.08)').attr('stroke-width', 0.45);
    root.append('g').selectAll('path').data(countries.features).join('path').attr('d', path).attr('fill', (country) => marketColor(MEDIVISTA_MARKETS[Number(country.id)]?.zone)).attr('stroke', 'rgba(255,255,255,0.08)').attr('stroke-width', 0.35);
    root.append('path').datum(borders).attr('d', path).attr('fill', 'none').attr('stroke', 'rgba(255,255,255,0.13)').attr('stroke-width', 0.4);

    const pinGroup = root.append('g').attr('class', 'actual-map-pins');
    MEDIVISTA_MAP_PINS.forEach((pin) => {
      const point = projection([pin.lon, pin.lat]);
      if (!point) return;
      const [x, y] = point;
      pinGroup.append('circle').attr('cx', x).attr('cy', y).attr('r', 8).attr('fill', 'rgba(201,168,76,0.26)');
      pinGroup.append('circle').attr('cx', x).attr('cy', y).attr('r', 4).attr('fill', '#c9a84c').attr('stroke', '#ffffff').attr('stroke-width', 2);
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
