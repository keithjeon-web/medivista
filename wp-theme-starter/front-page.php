<?php get_header(); ?>
<main>
  <?php get_template_part('template-parts/hero'); ?>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Popular Products</p><h2>Catalog highlights for professional review</h2></div>
        <p>Browse representative products and request details through the inquiry flow prepared for international B2B communication.</p>
      </div>
      <div class="grid grid-3">
        <article class="product-card">
          <div class="product-image" data-image="<?php echo esc_url(get_template_directory_uri() . '/assets/images/products/cellexor-re-tone.webp'); ?>" data-image-status="ready"></div>
          <p class="card-meta">Own Brand</p>
          <h3>Cellexor Re:Tone</h3>
          <p>Designed for premium aesthetic care with an exosome and NAD+ inspired concept.</p>
          <a class="btn whatsapp" href="#" data-whatsapp data-product="Cellexor Re:Tone">Inquire via WhatsApp</a>
        </article>
        <article class="product-card">
          <div class="product-image" data-image="<?php echo esc_url(get_template_directory_uri() . '/assets/images/products/rejuran-healer.webp'); ?>" data-image-status="ready"></div>
          <p class="card-meta">Skin Boosters</p>
          <h3>Rejuran Healer</h3>
          <p>Professional aesthetic solution information for partner consultation and product review.</p>
          <a class="btn whatsapp" href="#" data-whatsapp data-product="Rejuran Healer">Inquire via WhatsApp</a>
        </article>
        <article class="product-card">
          <div class="product-image" data-image="<?php echo esc_url(get_template_directory_uri() . '/assets/images/products/the-chaeum-premium-no-3.webp'); ?>" data-image-status="ready"></div>
          <p class="card-meta">Dermal Fillers</p>
          <h3>The Chaeum Premium No.3</h3>
          <p>Formulated for professional aesthetic use and presented through a catalog-only inquiry path.</p>
          <a class="btn whatsapp" href="#" data-whatsapp data-product="The Chaeum Premium No.3">Inquire via WhatsApp</a>
        </article>
      </div>
    </div>
  </section>

  <section class="section alt">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Product Categories</p><h2>Structured product information</h2></div>
        <p>Categories are organized for scanning, comparison, and professional inquiry without direct consumer purchase flow on the main site.</p>
      </div>
      <div class="category-tabs">
        <a href="<?php echo esc_url(home_url('/products/#botulinum-toxins')); ?>">Botulinum Toxins</a>
        <a href="<?php echo esc_url(home_url('/products/#dermal-fillers')); ?>">Dermal Fillers</a>
        <a href="<?php echo esc_url(home_url('/products/#skin-boosters')); ?>">Skin Boosters</a>
        <a href="<?php echo esc_url(home_url('/products/#lipolysis')); ?>">Lipolysis</a>
        <a href="<?php echo esc_url(home_url('/products/#biostimulators')); ?>">Biostimulators</a>
        <a href="<?php echo esc_url(home_url('/products/#cosmetics')); ?>">Cosmetics</a>
        <a href="<?php echo esc_url(home_url('/products/#others')); ?>">Others</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Product Discovery</p><h2>Aesthetic and cosmetic catalog focus</h2></div>
        <p>MEDIVISTA organizes English-first B2B information for Korean aesthetic products, professional cosmetics, cosmetic science concepts, and medical aesthetic cosmetic categories.</p>
      </div>
      <div class="grid grid-3">
        <article class="info-card">
          <p class="card-meta">Professional cosmetics</p>
          <h3>Catalog-ready beauty information</h3>
          <p>Product naming and category context prepared for professional beauty partners, clinics, distributors, and brand teams.</p>
        </article>
        <article class="info-card">
          <p class="card-meta">Medical aesthetic cosmetics</p>
          <h3>Inquiry-first category language</h3>
          <p>Cosmetic product information positioned around professional aesthetic care, partner review, and careful B2B communication.</p>
        </article>
        <article class="info-card">
          <p class="card-meta">Korean cosmetic catalog</p>
          <h3>English-first partner review</h3>
          <p>English product naming, white-background image standards, and market-ready catalog structure for international inquiries.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">B2B Inquiry Flow</p><h2>From catalog review to partner follow-up</h2></div>
        <p>The main website keeps product information inquiry-led. Partners can review categories, send a focused request, and continue communication through MEDIVISTA's professional contact flow.</p>
      </div>
      <div class="process-list">
        <article class="process-step"><span>01</span><h3>Review catalog categories</h3><p>Scan product groups, brand pages, and safe product descriptions prepared for B2B review.</p></article>
        <article class="process-step"><span>02</span><h3>Send a focused inquiry</h3><p>Use WhatsApp or the contact form to share market, business type, and product interest.</p></article>
        <article class="process-step"><span>03</span><h3>Receive partner follow-up</h3><p>Continue with MEDIVISTA for organized product information and next-step communication.</p></article>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/global-network'); ?>

  <section class="section alt partners-section">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Trusted Brands</p><h2>Our Partners</h2></div>
        <p>Representative product and brand lines are presented as logo-first signals for global B2B catalog review.</p>
      </div>
      <div class="partner-logos" aria-label="MEDIVISTA product and brand partner logos">
        <span class="partner-logo">BOTULAX</span>
        <span class="partner-logo">NABOTA</span>
        <span class="partner-logo">THE CHAEUM</span>
        <span class="partner-logo">REJURAN</span>
        <span class="partner-logo">LIPORASE</span>
        <span class="partner-logo partner-logo-featured">CELLEXOR <small>RE:TONE</small></span>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Core Values</p><h2>What We Stand For</h2></div>
        <p>Our partner approach focuses on product clarity, responsive inquiry handling, and a clean professional catalog experience.</p>
      </div>
      <div class="grid grid-4 values">
        <article class="info-card value-card"><div class="value-top"><span class="value-index">01</span><span class="value-icon value-icon-tech" aria-hidden="true"><span></span></span></div><strong>TECHNOLOGY</strong><p>Advanced beauty science and structured product information for global medical aesthetic partners.</p></article>
        <article class="info-card value-card"><div class="value-top"><span class="value-index">02</span><span class="value-icon value-icon-trust" aria-hidden="true"><span></span></span></div><strong>TRUST</strong><p>Clear sourcing, transparent communication, and responsive support for international B2B inquiry.</p></article>
        <article class="info-card value-card"><div class="value-top"><span class="value-index">03</span><span class="value-icon value-icon-quality" aria-hidden="true"><span></span></span></div><strong>QUALITY</strong><p>Curated catalog presentation that helps partners review categories with clarity and confidence.</p></article>
        <article class="info-card value-card"><div class="value-top"><span class="value-index">04</span><span class="value-icon value-icon-beauty" aria-hidden="true"><span></span></span></div><strong>BEAUTY</strong><p>Premium aesthetic brand tone designed for polished professional communication across markets.</p></article>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/inquiry-cta'); ?>
</main>
<?php get_footer(); ?>
