<?php get_header(); ?>
<main id="main-content">
  <section class="shop-page-title">
    <div class="container">
      <p class="shop-eyebrow">MEDIVISTA Shop</p>
      <h1>Shop</h1>
      <p>Browse products available for online ordering outside South Korea. B2B and bulk orders may also be discussed through WhatsApp.</p>
    </div>
  </section>
  <section class="section shop-section">
    <div class="container">
      <?php if (class_exists('WooCommerce')) : ?>
        <?php echo do_shortcode('[products limit="12" columns="4" orderby="menu_order" order="ASC"]'); ?>
      <?php else : ?>
        <article class="shop-notice"><h2>WooCommerce is not active yet</h2><p>Install and activate WooCommerce to enable the integrated Shop, Cart, Checkout, and My Account pages.</p></article>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
