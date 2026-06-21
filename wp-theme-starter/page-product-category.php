<?php
/*
Template Name: MEDIVISTA Product Category
*/
get_header();
$medivista_active_product_category = get_post_field('post_name', get_queried_object_id());
$category_labels = array(
  'botulinum-toxins' => 'Botulinum Toxins',
  'dermal-fillers' => 'Dermal Fillers',
  'body-fillers' => 'Body Fillers',
  'skin-boosters' => 'Skin Boosters',
  'lipolysis' => 'Lipolysis',
  'exosomes' => 'Exosomes',
  'biostimulators' => 'Biostimulators',
  'hair-treatment' => 'Hair Treatment',
  'vitamin-injections' => 'Vitamin Injections',
  'cosmetic' => 'Cosmetic',
);
$category_label = isset($category_labels[$medivista_active_product_category]) ? $category_labels[$medivista_active_product_category] : 'Products';
?>
<main id="main-content" class="products-page product-category-page">
  <section class="page-banner products-banner"><div class="container"><p class="eyebrow">Products</p><h1><?php echo esc_html($category_label); ?></h1><p><a href="<?php echo esc_url(home_url('/products/')); ?>">View all product categories</a></p></div></section>
  <section class="section products-catalog-section"><div class="container">
    <div class="catalog-toolbar" data-product-catalog>
      <label class="catalog-search"><span>Search products</span><input type="search" data-product-search placeholder="Search this category" autocomplete="off"></label>
      <div class="catalog-status" aria-live="polite"><strong data-product-count>0</strong><span>items shown</span></div>
      <button class="btn secondary catalog-reset" type="button" data-product-reset>Reset</button>
    </div>
    <p class="catalog-summary" data-product-summary>Showing <?php echo esc_html($category_label); ?>.</p>
    <p class="catalog-empty" data-product-empty hidden>No matching products.</p>
    <?php get_template_part('template-parts/product-card'); ?>
  </div></section>
</main>
<?php get_footer(); ?>
