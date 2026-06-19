<?php get_header(); ?>
<main id="main-content">
  <section class="shop-page-title"><div class="container"><p class="shop-eyebrow">Your Order</p><h1>Cart</h1></div></section>
  <section class="section shop-section"><div class="container shop-commerce-frame">
    <?php echo class_exists('WooCommerce') ? do_shortcode('[woocommerce_cart]') : '<article class="shop-notice"><h2>WooCommerce is not active yet</h2></article>'; ?>
  </div></section>
</main>
<?php get_footer(); ?>
