<?php get_header(); ?>
<main id="main-content">
  <section class="shop-page-title"><div class="container"><p class="shop-eyebrow">Customer Area</p><h1>My Account</h1></div></section>
  <section class="section shop-section"><div class="container shop-commerce-frame">
    <?php echo class_exists('WooCommerce') ? do_shortcode('[woocommerce_my_account]') : '<article class="shop-notice"><h2>WooCommerce is not active yet</h2></article>'; ?>
  </div></section>
</main>
<?php get_footer(); ?>
