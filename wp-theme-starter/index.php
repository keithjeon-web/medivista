<?php get_header(); ?>
<main>
  <section class="page-banner">
    <div class="container">
      <p class="eyebrow">MEDIVISTA</p>
      <h1><?php echo esc_html(get_the_title() ?: 'MEDIVISTA'); ?></h1>
      <p>Global medical aesthetic B2B catalog and professional inquiry website.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <?php if (have_posts()) : ?>
        <div class="grid grid-3">
          <?php while (have_posts()) : the_post(); ?>
            <article class="info-card">
              <p class="card-meta"><?php echo esc_html(get_post_type()); ?></p>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
            </article>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <article class="info-card">
          <h3>Content is being prepared</h3>
          <p>Please use the contact page for professional B2B inquiry.</p>
        </article>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
