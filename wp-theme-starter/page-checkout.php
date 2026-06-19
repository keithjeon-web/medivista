<?php get_header(); ?>
<main id="main-content">
  <section class="shop-page-title"><div class="container"><p class="shop-eyebrow">Secure Order</p><h1>Checkout</h1><p>Complete payment, shipping, tax, privacy, and refund configuration before enabling live transactions.</p></div></section>
  <section class="section shop-section"><div class="container shop-commerce-frame">
    <?php echo class_exists('WooCommerce') ? do_shortcode('[woocommerce_checkout]') : '<article class="shop-notice"><h2>WooCommerce is not active yet</h2></article>'; ?>
  </div></section>
</main>
<?php get_footer(); ?>
