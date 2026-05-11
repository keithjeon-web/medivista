<?php get_header(); ?>
<main>
  <section class="page-banner">
    <div class="container">
      <p class="eyebrow">Products</p>
      <h1>Professional catalog for global aesthetic partners.</h1>
      <p>Review MEDIVISTA product categories and send a focused inquiry.</p>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="catalog-toolbar" data-product-catalog>
        <label class="catalog-search">
          <span>Search products</span>
          <input type="search" data-product-search placeholder="Search by product, type, or spec" autocomplete="off">
        </label>
        <label class="catalog-select">
          <span>Category</span>
          <select data-product-filter>
            <option value="all">All categories</option>
            <option value="botulinum-toxins">Botulinum Toxins</option>
            <option value="dermal-fillers">HA Dermal Fillers</option>
            <option value="skin-boosters">Skin Boosters</option>
            <option value="lipolysis">Lipolysis</option>
            <option value="biostimulators">Biostimulators</option>
            <option value="cosmetics">Cosmetics</option>
            <option value="others">Others</option>
          </select>
        </label>
        <div class="catalog-status" aria-live="polite"><strong data-product-count>115</strong><span>items shown</span></div>
        <button class="btn secondary catalog-reset" type="button" data-product-reset>Reset</button>
      </div>
      <p class="catalog-empty" data-product-empty hidden>No matching products. Try another product name, type, or category.</p>
      <p class="catalog-note">Product image slots are prepared for 1200x900px WebP files with a white background. Cards keep the MEDIVISTA placeholder until final product images are inserted.</p>
      <div class="category-tabs" aria-label="Product category quick links">
        <a href="#botulinum-toxins">Botulinum Toxins</a>
        <a href="#dermal-fillers">HA Dermal Fillers</a>
        <a href="#skin-boosters">Skin Boosters</a>
        <a href="#lipolysis">Lipolysis</a>
        <a href="#biostimulators">Biostimulators</a>
        <a href="#cosmetics">Cosmetics</a>
        <a href="#others">Others</a>
      </div>
      <?php get_template_part('template-parts/product-card'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
