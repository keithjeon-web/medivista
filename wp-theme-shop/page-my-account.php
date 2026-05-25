<?php get_header(); ?>
<main id="main-content">
  <section class="shop-page-title">
    <div class="shop-container">
      <p class="shop-eyebrow">Customer Area</p>
      <h1>My Account</h1>
    </div>
  </section>
  <section class="shop-section">
    <div class="shop-container shop-commerce-frame">
      <?php
      if (class_exists('WooCommerce')) {
          echo do_shortcode('[woocommerce_my_account]');
      } else {
          echo '<article class="shop-notice"><h2>WooCommerce is not active yet</h2><p>Activate WooCommerce on the shop site only to enable customer accounts.</p></article>';
      }
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
