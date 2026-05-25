<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="shop-header">
  <div class="shop-container shop-header-inner">
    <a class="shop-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="MEDIVISTA Brand Shop home">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/medivista_logo_header.png?v=20260525a'); ?>" alt="MEDIVISTA Brand Shop">
    </a>
    <nav class="shop-nav" aria-label="Brand Shop menu">
      <a href="<?php echo esc_url(home_url('/')); ?>">Shop</a>
      <a href="<?php echo esc_url(home_url('/product-category/cellexor/')); ?>">CELLEXOR</a>
      <a href="<?php echo esc_url(medivista_shop_cart_url()); ?>">Cart <span><?php echo esc_html(medivista_shop_cart_count()); ?></span></a>
      <a href="<?php echo esc_url(medivista_shop_checkout_url()); ?>">Checkout</a>
      <a href="<?php echo esc_url(medivista_shop_account_url()); ?>">My Account</a>
    </nav>
  </div>
</header>
