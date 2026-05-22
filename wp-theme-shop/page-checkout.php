<?php get_header(); ?>
<main>
  <section class="shop-page-title">
    <div class="shop-container">
      <p class="shop-eyebrow">Secure Checkout</p>
      <h1>Checkout</h1>
      <p>Complete test-mode payment checks before enabling live payment methods.</p>
    </div>
  </section>
  <section class="shop-section">
    <div class="shop-container shop-commerce-frame">
      <?php
      if (class_exists('WooCommerce')) {
          echo do_shortcode('[woocommerce_checkout]');
      } else {
          echo '<article class="shop-notice"><h2>WooCommerce is not active yet</h2><p>Activate WooCommerce on the shop site only to enable checkout.</p></article>';
      }
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
