<?php
/*
Template Name: MEDIVISTA Cellexor
*/
get_header();
$cellexor_image = get_template_directory_uri() . '/assets/images/products/cellexor-re-tone.webp';
?>
<main id="main-content" class="cellexor-page">
  <section class="cellexor-hero">
    <div class="container cellexor-hero-grid">
      <div class="cellexor-hero-copy">
        <p class="cellexor-kicker">CELLEXOR · Re:Tone</p>
        <h1>Glow Beyond<br><em>Expectations.</em></h1>
        <p class="cellexor-lead">A refined professional beauty concept shaped around exosome-inspired storytelling, NAD+ positioning, and a luminous gold-on-black visual language.</p>
        <div class="button-row">
          <a class="btn primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Request Brand Inquiry</a>
          <a class="btn secondary dark" href="#" data-whatsapp data-product="Cellexor Re:Tone">WhatsApp Inquiry</a>
        </div>
      </div>
      <figure class="cellexor-product-orbit">
        <span class="orbit orbit-one"></span><span class="orbit orbit-two"></span>
        <img src="<?php echo esc_url($cellexor_image); ?>" alt="CELLEXOR Re:Tone product">
        <figcaption>Professional aesthetic solution</figcaption>
      </figure>
    </div>
  </section>

  <section class="cellexor-manifesto">
    <div class="container cellexor-manifesto-grid">
      <p class="cellexor-index">01 · Brand Philosophy</p>
      <div><h2>Beauty science, expressed with restraint.</h2><p>CELLEXOR brings together a premium clinical-inspired atmosphere and carefully moderated beauty language. The experience is designed for international partners seeking a distinctive own-brand story without overstated efficacy claims.</p></div>
    </div>
  </section>

  <section class="section cellexor-formula-section">
    <div class="container">
      <div class="section-head cellexor-section-head">
        <div><p class="eyebrow">Dual-System Concept</p><h2>Two expressions. One refined ritual.</h2></div>
        <p>Formula information is presented as a professional product concept for partner review and source confirmation.</p>
      </div>
      <div class="cellexor-formula-grid">
        <article><span>V1</span><h3>Exosome-inspired powder</h3><p>A premium first-step concept designed to frame the CELLEXOR identity with precision and clarity.</p></article>
        <article><span>V2</span><h3>NAD+ solution concept</h3><p>A complementary second-step concept positioned around vitality-inspired beauty storytelling.</p></article>
        <article class="cellexor-formula-feature"><span>Re:Tone</span><h3>Synergy, beautifully considered</h3><p>Presented together as a polished professional ritual for global aesthetic partners.</p></article>
      </div>
    </div>
  </section>

  <section class="section cellexor-story-section">
    <div class="container grid grid-2">
      <div class="cellexor-story-visual"><img src="<?php echo esc_url($cellexor_image); ?>" alt="CELLEXOR Re:Tone package"></div>
      <div class="cellexor-story-copy">
        <p class="eyebrow">Product Philosophy</p>
        <h2>Radiance begins with a clear point of view.</h2>
        <p>Every detail—from the restrained palette to the measured product language—is designed to communicate trust, sophistication, and advanced beauty science.</p>
        <ul class="cellexor-list"><li>English-first global presentation</li><li>Inquiry-led professional information</li><li>Premium gold, ivory, and deep-black visual system</li><li>Responsible, evidence-conscious product wording</li></ul>
      </div>
    </div>
  </section>

  <section class="inquiry-band cellexor-cta">
    <div class="container">
      <p class="eyebrow">CELLEXOR Partnership</p>
      <h2>Bring the Re:Tone story to your market.</h2>
      <p>Request product, distribution, and brand presentation information from MEDIVISTA.</p>
      <div class="button-row"><a class="btn primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact MEDIVISTA</a><a class="btn secondary" href="#" data-whatsapp data-product="Cellexor Re:Tone">Inquire via WhatsApp</a></div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
