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
  'vitamin-injections' => array('label' => 'Vitamin Injections', 'image' => 'vitamin-c.webp'),
  'others' => array('label' => 'Others', 'image' => 'cartin.webp'),
  'cosmetic' => array('label' => 'Cosmetic', 'image' => ''),
);
?>
<main id="main-content" class="products-page">
  <section class="page-banner products-banner"><div class="container"><p class="eyebrow">MEDIVISTA Catalog</p><h1>PRODUCTS</h1><p>Select a category to open its dedicated product catalog.</p></div></section>
  <section class="section products-directory-section"><div class="container">
    <div class="catalog-toolbar products-directory-toolbar" data-product-directory>
      <label class="catalog-search"><span>Search products</span><input type="search" data-directory-search placeholder="Search by product name" autocomplete="off"></label>
      <label class="catalog-select"><span>Category</span><select data-directory-category><option value="all">All categories</option><?php foreach ($product_categories as $slug => $category) : ?><option value="<?php echo esc_attr($slug); ?>"><?php echo esc_html($category['label']); ?></option><?php endforeach; ?></select></label>
      <div class="catalog-status" aria-live="polite"><strong data-directory-count>107</strong><span>items found</span></div>
      <button class="btn secondary catalog-reset" type="button" data-directory-reset>Reset</button>
    </div>
    <p class="catalog-summary" data-directory-summary>Search all products or select a category below.</p>
    <p class="catalog-empty" data-directory-empty hidden>No matching products or categories.</p>
    <div class="category-tabs products-directory-tabs" aria-label="Product categories"><?php foreach ($product_categories as $slug => $category) : ?><a href="<?php echo esc_url(home_url('/products/' . $slug . '/')); ?>"><?php echo esc_html($category['label']); ?></a><?php endforeach; ?></div>
    <div class="product-category-directory">
    <?php foreach ($product_categories as $slug => $category) : ?>
      <a href="<?php echo esc_url(home_url('/products/' . $slug . '/')); ?>" data-directory-card="<?php echo esc_attr($slug); ?>">
        <?php if ($category['image']) : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/products/' . $category['image']); ?>" alt="" width="1200" height="900" loading="lazy">
        <?php else : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/medivista_logo_gold.png'); ?>" alt="" width="500" height="125" loading="lazy">
        <?php endif; ?>
        <span><?php echo esc_html($category['label']); ?></span>
      </a>
    <?php endforeach; ?>
    </div>
    <div hidden data-directory-source><?php get_template_part('template-parts/product-card'); ?></div>
  </div></section>
</main>
<?php get_footer(); ?>
