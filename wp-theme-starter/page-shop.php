<?php get_header(); ?>
<main id="main-content">
  <div class="shop-notice-strip" aria-label="Shop information">
    <div class="container">
      <span>Worldwide shipping available</span>
      <span>Wholesale inquiries welcome</span>
      <span>Secure WooCommerce ordering</span>
    </div>
  </div>
  <section class="shop-page-title shop-home-hero">
    <div class="container">
      <p class="shop-eyebrow">MEDIVISTA Shop</p>
      <h1>Professional Aesthetic Shop</h1>
      <p>Browse products available for online ordering outside South Korea. For B2B and bulk orders, use the compact WhatsApp inquiry on each product.</p>
      <nav class="shop-category-nav" aria-label="Shop categories">
        <a href="<?php echo esc_url(home_url('/shop/')); ?>">Best</a>
        <a href="<?php echo esc_url(home_url('/shop/?product_cat=botulinum-toxins')); ?>">Toxin</a>
        <a href="<?php echo esc_url(home_url('/shop/?product_cat=dermal-fillers')); ?>">Filler</a>
        <a href="<?php echo esc_url(home_url('/shop/?product_cat=skin-boosters')); ?>">Skin Booster</a>
        <a href="<?php echo esc_url(home_url('/shop/?product_cat=lipolysis')); ?>">Fat Dissolvers</a>
        <a href="<?php echo esc_url(home_url('/shop/?product_cat=others')); ?>">Others</a>
      </nav>
    </div>
  </section>
  <section class="section shop-section">
    <div class="container">
      <div class="shop-section-heading"><p class="shop-eyebrow">Curated Selection</p><h2>Best Products</h2></div>
      <?php if (class_exists('WooCommerce')) : ?>
        <?php echo do_shortcode('[products limit="12" columns="4" orderby="menu_order" order="ASC"]'); ?>
      <?php else : ?>
        <article class="shop-notice"><h2>WooCommerce is not active yet</h2><p>Install and activate WooCommerce to enable the integrated Shop, Cart, Checkout, and My Account pages.</p></article>
      <?php endif; ?>
    </div>
  </section>
  <section class="shop-service-band">
    <div class="container">
      <span><strong>Worldwide Shipping</strong>Available destinations are confirmed at checkout.</span>
      <span><strong>Partner Support</strong>Ask about product and wholesale availability.</span>
      <span><strong>Secure Ordering</strong>Payments remain inside WooCommerce.</span>
    </div>
  </section>
</main>
<?php get_footer(); ?>
