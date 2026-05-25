<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="MEDIVISTA home">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/medivista_logo_header.png?v=20260525b'); ?>" alt="MEDIVISTA">
      
    </a>
    <button class="nav-toggle" type="button" aria-label="Toggle menu" aria-expanded="false" aria-controls="primary-nav"><span></span><span></span><span></span></button>
    <nav id="primary-nav" class="main-nav" aria-label="Main menu">
      <a href="<?php echo esc_url(home_url('/about/')); ?>">ABOUT</a>
      <a href="<?php echo esc_url(home_url('/products/')); ?>">PRODUCTS</a>
      <a href="<?php echo esc_url(home_url('/brands/')); ?>">BRANDS</a>
      <a href="<?php echo esc_url(home_url('/blogs/')); ?>">BLOGS</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT US</a>
      <a class="nav-pill" href="https://shop.medivista.co.kr">BRAND SHOP</a>
      <span class="nav-utility"><a href="<?php echo esc_url(home_url('/')); ?>">EN</a><span class="nav-disabled" aria-disabled="true">KO</span></span>
      <a class="social-icon social-instagram" href="https://www.instagram.com/medivista.global?igsh=M21lN3Q3dDl5NGx0&utm_source=qr" target="_blank" rel="noopener" aria-label="Instagram"></a>
      <a class="social-icon social-facebook" href="https://www.facebook.com/share/1DRDDT62yZ/?mibextid=wwXIfr" target="_blank" rel="noopener" aria-label="Facebook"></a>
    </nav>
  </div>
</header>


