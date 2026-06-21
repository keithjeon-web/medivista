<?php
/*
Template Name: MEDIVISTA Products
*/
get_header();
$product_categories = array(
  'botulinum-toxins' => array('label' => 'Botulinum Toxins', 'image' => 'botulax-100units.webp'),
  'dermal-fillers' => array('label' => 'Dermal Fillers', 'image' => 'revolax-deep.webp'),
  'body-fillers' => array('label' => 'Body Fillers', 'image' => 'elasty-d-plus.webp'),
  'skin-boosters' => array('label' => 'Skin Boosters', 'image' => 'rejuran-healer.webp'),
  'lipolysis' => array('label' => 'Lipolysis', 'image' => 'lipo-lab.webp'),
  'exosomes' => array('label' => 'Exosomes', 'image' => 'cellexor-re-tone.webp'),
  'biostimulators' => array('label' => 'Biostimulators', 'image' => 'sculptra.webp'),
  'hair-treatment' => array('label' => 'Hair Treatment', 'image' => ''),
  'vitamin-injections' => array('label' => 'Vitamin Injections', 'image' => 'vitamin-c.webp'),
  'cosmetic' => array('label' => 'Cosmetic', 'image' => 'cindella.webp'),
);
?>
<main id="main-content" class="products-page">
  <section class="page-banner products-banner"><div class="container"><p class="eyebrow">MEDIVISTA Catalog</p><h1>PRODUCTS</h1><p>Select a category to open its dedicated product catalog.</p></div></section>
  <section class="section products-directory-section"><div class="container"><div class="product-category-directory">
    <?php foreach ($product_categories as $slug => $category) : ?>
      <a href="<?php echo esc_url(home_url('/products/' . $slug . '/')); ?>">
        <?php if ($category['image']) : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/products/' . $category['image']); ?>" alt="" width="1200" height="900" loading="lazy">
        <?php else : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/medivista_logo_gold.png'); ?>" alt="" width="500" height="125" loading="lazy">
        <?php endif; ?>
        <span><?php echo esc_html($category['label']); ?></span>
      </a>
    <?php endforeach; ?>
  </div></div></section>
</main>
<?php get_footer(); ?>
