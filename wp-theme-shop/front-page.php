<?php get_header(); ?>
<main>
  <section class="shop-hero">
    <div class="shop-container shop-hero-grid">
      <div>
        <p class="shop-eyebrow">MEDIVISTA Brand Shop</p>
        <h1>CELLEXOR and own-brand commerce for professional aesthetic care.</h1>
        <p>Shop flow is separated from the MEDIVISTA catalog site and runs only on the Brand Shop subdomain.</p>
        <div class="shop-actions">
          <a class="shop-button primary" href="<?php echo esc_url(home_url('/shop/')); ?>">View Products</a>
          <a class="shop-button secondary" href="<?php echo esc_url(medivista_shop_cart_url()); ?>">View Cart</a>
        </div>
      </div>
      <div class="shop-hero-panel" aria-label="Brand Shop highlights">
        <span>CELLEXOR</span>
        <strong>Re:Tone</strong>
        <p>Advanced beauty science, premium product presentation, and WooCommerce checkout prepared for the shop site.</p>
      </div>
    </div>
  </section>

  <section class="shop-section">
    <div class="shop-container">
      <div class="shop-section-head">
        <p class="shop-eyebrow">Featured Products</p>
        <h2>Brand Shop product lineup</h2>
      </div>
      <?php if (class_exists('WooCommerce')) : ?>
        <?php echo do_shortcode('[products limit="4" columns="4" orderby="date" order="DESC"]'); ?>
      <?php else : ?>
        <article class="shop-notice">
          <h3>WooCommerce is not active yet</h3>
          <p>Activate WooCommerce on the shop site only, then create Shop, Cart, Checkout, and My Account pages.</p>
        </article>
      <?php endif; ?>
    </div>
  </section>

  <section class="shop-section shop-section-dark">
    <div class="shop-container shop-process">
      <article><span>01</span><strong>Product</strong><p>CELLEXOR and own-brand products are managed through WooCommerce.</p></article>
      <article><span>02</span><strong>Cart</strong><p>Customers review selected products on the shop subdomain only.</p></article>
      <article><span>03</span><strong>Checkout</strong><p>Payment, shipping, tax, privacy, and terms are configured in WooCommerce.</p></article>
    </div>
  </section>
</main>
<?php get_footer(); ?>
