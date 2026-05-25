<?php get_header(); ?>
<main id="main-content">
  <?php get_template_part('template-parts/hero'); ?>

  <section class="section product-action-section">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Popular Products</p><h2>Catalog highlights for professional review</h2></div>
        <p>Browse representative products and request details through the inquiry flow prepared for international B2B communication.</p>
      </div>
      <?php $img_base = get_template_directory_uri() . '/assets/images/products/'; ?>
      <div class="product-slider action-slider" data-action-slider data-autoplay="7200" aria-label="Popular product slides">
        <div class="action-slides">
          <div class="action-slide product-slide is-active" data-slide><div class="grid grid-3">
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'cellexor-re-tone.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Own Brand</p><h3>Cellexor Re:Tone</h3><p>Designed for premium aesthetic care with an exosome and NAD+ inspired concept.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Cellexor Re:Tone">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'rejuran-healer.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Skin Boosters</p><h3>Rejuran Healer</h3><p>Professional aesthetic solution information for partner consultation and product review.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Rejuran Healer">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'the-chaeum-premium-no-3.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Dermal Fillers</p><h3>The Chaeum Premium No.3</h3><p>Formulated for professional aesthetic use and presented through a catalog-only inquiry path.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="The Chaeum Premium No.3">Inquire via WhatsApp</a></article>
          </div></div>
          <div class="action-slide product-slide" data-slide><div class="grid grid-3">
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'botulax-100units.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Botulinum Toxins</p><h3>Botulax 100 Units</h3><p>Catalog-ready product information for professional B2B review and partner inquiry.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Botulax 100 Units">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'revolax-deep.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Dermal Fillers</p><h3>Revolax Deep</h3><p>Structured filler category information prepared for international product comparison.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Revolax Deep">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'elravie-premier-ultra-volume-l.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Dermal Fillers</p><h3>Elravie Ultra Volume</h3><p>Premium catalog presentation for partner review and professional inquiry routing.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Elravie Ultra Volume">Inquire via WhatsApp</a></article>
          </div></div>
          <div class="action-slide product-slide" data-slide><div class="grid grid-3">
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'nabota-100units.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Botulinum Toxins</p><h3>Nabota 100 Units</h3><p>English-first product naming and category context for global B2B partners.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Nabota 100 Units">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'rejuran-hb-plus.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Skin Boosters</p><h3>Rejuran HB Plus</h3><p>Professional aesthetic care information presented without unverified efficacy claims.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Rejuran HB Plus">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'sculptra.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Biostimulators</p><h3>Sculptra</h3><p>Category-led product information organized for professional partner discussion.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Sculptra">Inquire via WhatsApp</a></article>
          </div></div>
          <div class="action-slide product-slide" data-slide><div class="grid grid-3">
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'innotox-100units.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Botulinum Toxins</p><h3>Innotox 100 Units</h3><p>Professional catalog entry prepared for clinics, distributors, and brand partners.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Innotox 100 Units">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'revs-pro-32.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Skin Boosters</p><h3>REVS Pro 32</h3><p>Beauty science-oriented product context with an inquiry-first communication path.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="REVS Pro 32">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'kabelline.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Lipolysis</p><h3>Kabelline</h3><p>Organized product information for professional market review and follow-up.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Kabelline">Inquire via WhatsApp</a></article>
          </div></div>
          <div class="action-slide product-slide" data-slide><div class="grid grid-3">
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'liporase.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Others</p><h3>Liporase</h3><p>Supplementary product catalog information for targeted partner inquiry.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Liporase">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'gouri.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Biostimulators</p><h3>Gouri</h3><p>Product overview written for careful B2B evaluation and information requests.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Gouri">Inquire via WhatsApp</a></article>
            <article class="product-card"><div class="product-image" data-image="<?php echo esc_url($img_base . 'guthion-1200mg.webp'); ?>" data-image-status="ready"></div><p class="card-meta">Vitamin Injections</p><h3>Guthion 1200mg</h3><p>Catalog entry prepared with clear naming, category context, and inquiry routing.</p><a class="btn whatsapp" href="#" data-whatsapp data-product="Guthion 1200mg">Inquire via WhatsApp</a></article>
          </div></div>
        </div>
        <div class="slider-controls product-controls" aria-label="Popular products slider controls">
          <button type="button" data-slider-prev aria-label="Previous product slide">Prev</button>
          <div class="slider-dots" data-slider-dots></div>
          <button type="button" data-slider-next aria-label="Next product slide">Next</button>
        </div>
      </div>
    </div>
  </section>

  <section class="section alt">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Product Categories</p><h2>Structured product information</h2></div>
        <p>Categories are organized for scanning, comparison, and professional inquiry without direct online ordering or transactions on the main site.</p>
      </div>
      <div class="category-showcase" aria-label="MEDIVISTA product category overview">
        <article class="category-card"><span>01</span><p class="card-meta">Core catalog</p><h3>Botulinum Toxins</h3><p>Professional product information prepared for international partner review.</p><a href="<?php echo esc_url(home_url('/products/#botulinum-toxins')); ?>">Request Information</a></article>
        <article class="category-card"><span>02</span><p class="card-meta">HA category</p><h3>Dermal Fillers</h3><p>Curated Korean aesthetic catalog entries for distributor comparison.</p><a href="<?php echo esc_url(home_url('/products/#dermal-fillers')); ?>">Request Information</a></article>
        <article class="category-card"><span>03</span><p class="card-meta">Volume concept</p><h3>Body Fillers</h3><p>Organized category language for B2B product discovery and inquiry.</p><a href="<?php echo esc_url(home_url('/products/#body-fillers')); ?>">Request Information</a></article>
        <article class="category-card"><span>04</span><p class="card-meta">Beauty science</p><h3>Skin Boosters</h3><p>Premium aesthetic care information with safe, inquiry-first copy.</p><a href="<?php echo esc_url(home_url('/products/#skin-boosters')); ?>">Request Information</a></article>
        <article class="category-card"><span>05</span><p class="card-meta">Body care</p><h3>Lipolysis</h3><p>Catalog-only product context for professional market conversations.</p><a href="<?php echo esc_url(home_url('/products/#lipolysis')); ?>">Request Information</a></article>
        <article class="category-card"><span>06</span><p class="card-meta">Advanced concept</p><h3>Exosomes</h3><p>Science-based beauty positioning written without unverified claims.</p><a href="<?php echo esc_url(home_url('/products/#exosomes')); ?>">Request Information</a></article>
        <article class="category-card"><span>07</span><p class="card-meta">Professional care</p><h3>Biostimulators</h3><p>Structured category information for clinics, distributors, and partners.</p><a href="<?php echo esc_url(home_url('/products/#biostimulators')); ?>">Request Information</a></article>
        <article class="category-card"><span>08</span><p class="card-meta">Hair category</p><h3>Hair Treatment</h3><p>Partner-ready product naming and catalog navigation for review.</p><a href="<?php echo esc_url(home_url('/products/#hair-treatment')); ?>">Request Information</a></article>
        <article class="category-card"><span>09</span><p class="card-meta">Additional lines</p><h3>Others</h3><p>Supplementary product groups kept organized for fast inquiry routing.</p><a href="<?php echo esc_url(home_url('/products/#others')); ?>">Request Information</a></article>
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
