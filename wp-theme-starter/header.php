<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="MEDIVISTA home">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/medivista_logo_gold.png'); ?>" alt="MEDIVISTA">
      <span class="logo-fallback">MEDIVISTA</span>
    </a>
    <nav class="main-nav" aria-label="Main menu">
      <a href="<?php echo esc_url(home_url('/about/')); ?>">ABOUT</a>
      <a href="<?php echo esc_url(home_url('/products/')); ?>">PRODUCTS</a>
      <a href="<?php echo esc_url(home_url('/brands/')); ?>">BRANDS</a>
      <a href="<?php echo esc_url(home_url('/blogs/')); ?>">BLOGS</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT US</a>
      <a class="nav-pill" href="https://shop.medivista.co.kr">BRAND SHOP</a>
    </nav>
  </div>
</header>
