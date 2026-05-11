<?php get_header(); ?>
<main>
  <section class="page-banner">
    <div class="container">
      <p class="eyebrow">About MEDIVISTA</p>
      <h1>A premium global B2B aesthetic partner.</h1>
      <p>MEDIVISTA presents company direction, product information, and inquiry support for professional partners around the world.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="subtabs">
        <a href="#ceo-message">CEO Message</a>
        <a href="#introduction">Introduction</a>
        <a href="#vision-mission">Vision & Mission</a>
        <a href="#global-network">Global Network</a>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
      </div>
      <div class="grid grid-2">
        <article class="info-card" id="ceo-message">
          <p class="card-meta">CEO Message</p>
          <h3>Trust through clarity</h3>
          <p>MEDIVISTA aims to build reliable relationships with global partners through clear product communication and a professional inquiry experience.</p>
        </article>
        <article class="info-card" id="introduction">
          <p class="card-meta">Introduction</p>
          <h3>Global medical aesthetic B2B</h3>
          <p>The main website is an English-first catalog and company platform for distributors, clinics, and brand partners.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section alt" id="vision-mission">
    <div class="container grid grid-2">
      <article class="info-card">
        <p class="card-meta">Vision</p>
        <h3>Global connection</h3>
        <p>To connect premium Korean aesthetic product information with international professional partners.</p>
      </article>
      <article class="info-card">
        <p class="card-meta">Mission</p>
        <h3>Responsible beauty science</h3>
        <p>To communicate products with careful language, organized information, and inquiry-led support.</p>
      </article>
    </div>
  </section>

  <?php get_template_part('template-parts/global-network'); ?>
  <?php get_template_part('template-parts/inquiry-cta'); ?>
</main>
<?php get_footer(); ?>
