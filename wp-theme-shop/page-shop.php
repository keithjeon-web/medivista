<?php get_header(); ?>
<main id="main-content">
  <section class="shop-page-title">
    <div class="shop-container">
      <p class="shop-eyebrow">MEDIVISTA Brand Shop</p>
      <h1>Shop</h1>
      <p>CELLEXOR and own-brand products are managed through WooCommerce on this shop subdomain only.</p>
    </div>
  </section>
  <section class="shop-section">
    <div class="shop-container">
      <?php
      if (class_exists('WooCommerce')) {
          echo do_shortcode('[products limit="12" columns="4" orderby="menu_order" order="ASC"]');
      } else {
          echo '<article class="shop-notice"><h2>WooCommerce is not active yet</h2><p>Activate WooCommerce on shop.medivista.co.kr, then add CELLEXOR or own-brand products.</p></article>';
      }
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
