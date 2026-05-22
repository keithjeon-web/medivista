<?php get_header(); ?>
<main>
  <section class="shop-page-title">
    <div class="shop-container">
      <p class="shop-eyebrow">Brand Shop</p>
      <h1><?php woocommerce_page_title(); ?></h1>
    </div>
  </section>
  <section class="shop-section">
    <div class="shop-container">
      <?php woocommerce_content(); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
