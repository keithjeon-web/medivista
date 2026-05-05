<?php get_header(); ?>
<main>
  <?php get_template_part('template-parts/hero'); ?>
  <section class="section"><div class="container"><p class="eyebrow">Popular Products</p><h2>Catalog highlights for professional review</h2><?php get_template_part('template-parts/product-card'); ?></div></section>
  <?php get_template_part('template-parts/global-network'); ?>
  <?php get_template_part('template-parts/inquiry-cta'); ?>
</main>
<?php get_footer(); ?>
