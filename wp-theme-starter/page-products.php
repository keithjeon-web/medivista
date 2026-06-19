<?php
/*
Template Name: MEDIVISTA Products
*/
get_header();
?>
<main id="main-content">
  <section class="page-banner">
    <div class="container">
      <p class="eyebrow">Products</p>
      <h1>Professional catalog for global aesthetic partners.</h1>
      <p>Review MEDIVISTA product categories and send a focused inquiry.</p>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="section-head">
        <div><p class="eyebrow">Quick Answers</p><h2>Cosmetic and aesthetic product discovery</h2></div>
        <p>Answer-ready information for partners reviewing MEDIVISTA catalog categories for global B2B inquiry.</p>
      </div>
      <div class="grid grid-3">
        <article class="info-card">
          <p class="card-meta">What categories?</p>
          <h3>Professional cosmetic support</h3>
          <p>MEDIVISTA organizes inquiry-ready category information for global aesthetic partners using careful catalog-only language.</p>
        </article>
        <article class="info-card">
          <p class="card-meta">How to inquire?</p>
          <h3>Catalog-only B2B flow</h3>
          <p>The MEDIVISTA main website is a catalog-only information site. Product questions move through WhatsApp or the contact inquiry flow.</p>
        </article>
        <article class="info-card">
          <p class="card-meta">How presented?</p>
          <h3>English-first review format</h3>
          <p>Products are presented with English names, category context, white-background imagery, and careful B2B descriptions for partner review.</p>
        </article>
      </div>
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
            <option value="dermal-fillers">Dermal Fillers</option>
            <option value="body-fillers">Body Fillers</option>
            <option value="skin-boosters">Skin Boosters</option>
            <option value="lipolysis">Lipolysis</option>
            <option value="exosomes">Exosomes</option>
            <option value="biostimulators">Biostimulators</option>
            <option value="hair-treatment">Hair Treatment</option>
            <option value="others">Others</option>
          </select>
        </label>
        <div class="catalog-status" aria-live="polite"><strong data-product-count>116</strong><span>items shown</span></div>
        <button class="btn secondary catalog-reset" type="button" data-product-reset>Reset</button>
      </div>
      <p class="catalog-summary" data-product-summary>Showing all MEDIVISTA catalog categories for professional partner review.</p>
      <p class="catalog-empty" data-product-empty hidden>No matching products. Try another product name, type, or category.</p>
      <p class="catalog-note"><strong>114 finished product images</strong> are now organized by category and product name. Body Fillers and Hair Treatment remain clearly marked as preparation categories.</p>
      <div class="catalog-tabs-bar">
        <div class="catalog-tabs-head">
          <p class="catalog-tabs-kicker">Quick jump</p>
          <p class="catalog-tabs-copy">Swipe categories on mobile or use the filter menu above.</p>
        </div>
        <div class="category-tabs" aria-label="Product category quick links">
          <a href="#botulinum-toxins">Botulinum Toxins</a>
          <a href="#dermal-fillers">Dermal Fillers</a>
          <a href="#body-fillers">Body Fillers</a>
          <a href="#skin-boosters">Skin Boosters</a>
          <a href="#lipolysis">Lipolysis</a>
          <a href="#exosomes">Exosomes</a>
          <a href="#biostimulators">Biostimulators</a>
          <a href="#hair-treatment">Hair Treatment</a>
          <a href="#others">Others</a>
        </div>
      </div>
      <?php get_template_part('template-parts/product-card'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
