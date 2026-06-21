<?php get_header(); ?>
<main id="main-content">
  <div class="shop-notice-strip" aria-label="Shop information"><div class="container"><span>Worldwide shipping available</span><span>Wholesale inquiries welcome</span><span>Secure WooCommerce ordering</span></div></div>
  <section class="shop-page-title"><div class="container"><p class="shop-eyebrow">MEDIVISTA Shop</p><h1><?php woocommerce_page_title(); ?></h1><nav class="shop-category-nav" aria-label="Shop categories"><a href="<?php echo esc_url(home_url('/shop/')); ?>">Best</a><a href="<?php echo esc_url(home_url('/shop/?product_cat=botulinum-toxins')); ?>">Toxin</a><a href="<?php echo esc_url(home_url('/shop/?product_cat=dermal-fillers')); ?>">Filler</a><a href="<?php echo esc_url(home_url('/shop/?product_cat=skin-boosters')); ?>">Skin Booster</a><a href="<?php echo esc_url(home_url('/shop/?product_cat=lipolysis')); ?>">Fat Dissolvers</a><a href="<?php echo esc_url(home_url('/shop/?product_cat=others')); ?>">Others</a></nav></div></section>
  <section class="section shop-section"><div class="container"><?php woocommerce_content(); ?></div></section>
  <section class="shop-service-band"><div class="container"><span><strong>Worldwide Shipping</strong>Available destinations are confirmed at checkout.</span><span><strong>Partner Support</strong>Ask about product and wholesale availability.</span><span><strong>Secure Ordering</strong>Payments remain inside WooCommerce.</span></div></section>
</main>
<?php get_footer(); ?>
