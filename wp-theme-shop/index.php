<?php get_header(); ?>
<main>
  <section class="shop-section">
    <div class="shop-container">
      <?php if (have_posts()) : ?>
        <div class="shop-post-grid">
          <?php while (have_posts()) : the_post(); ?>
            <article class="shop-card">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 28)); ?></p>
            </article>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <article class="shop-notice">
          <h1>Brand Shop content is being prepared</h1>
          <p>Activate WooCommerce and add CELLEXOR or own-brand products on the shop site.</p>
        </article>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
