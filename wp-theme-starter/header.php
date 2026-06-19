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
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/medivista_logo_header.png?v=20260611d'); ?>" alt="MEDIVISTA">
      
    </a>
    <button class="nav-toggle" type="button" aria-label="Toggle menu" aria-expanded="false" aria-controls="primary-nav"><span></span><span></span><span></span></button>
    <nav id="primary-nav" class="main-nav" aria-label="Main menu">
      <a href="<?php echo esc_url(home_url('/about/')); ?>">ABOUT</a>
      <div class="nav-dropdown">
        <a class="nav-dropdown-toggle" href="<?php echo esc_url(home_url('/products/')); ?>" aria-haspopup="true">PRODUCTS</a>
        <div class="nav-dropdown-menu">
          <a href="<?php echo esc_url(home_url('/products/#botulinum-toxins')); ?>">Botulinum Toxins</a>
          <a href="<?php echo esc_url(home_url('/products/#dermal-fillers')); ?>">Dermal Fillers</a>
          <a href="<?php echo esc_url(home_url('/products/#body-fillers')); ?>">Body Fillers</a>
          <a href="<?php echo esc_url(home_url('/products/#skin-boosters')); ?>">Skin Boosters</a>
          <a href="<?php echo esc_url(home_url('/products/#lipolysis')); ?>">Lipolysis</a>
          <a href="<?php echo esc_url(home_url('/products/#exosomes')); ?>">Exosomes</a>
          <a href="<?php echo esc_url(home_url('/products/#biostimulators')); ?>">Biostimulators</a>
          <a href="<?php echo esc_url(home_url('/products/#hair-treatment')); ?>">Hair Treatment</a>
          <a href="<?php echo esc_url(home_url('/products/#others')); ?>">Others</a>
        </div>
      </div>
      <div class="nav-dropdown">
        <a class="nav-dropdown-toggle" href="<?php echo esc_url(home_url('/brands/')); ?>" aria-haspopup="true">BRANDS</a>
        <div class="nav-dropdown-menu">
          <a href="<?php echo esc_url(home_url('/cellexor/')); ?>">Cellexor Re:Tone</a>
        </div>
      </div>
      <a href="<?php echo esc_url(home_url('/blogs/')); ?>">BLOGS</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT US</a>
      <div class="nav-dropdown shop-nav-dropdown">
        <a class="nav-dropdown-toggle" href="<?php echo esc_url(home_url('/shop/')); ?>" aria-haspopup="true">SHOP</a>
        <div class="nav-dropdown-menu">
          <a href="<?php echo esc_url(home_url('/shop/')); ?>">Shop</a>
          <a href="<?php echo esc_url(medivista_shop_cart_url()); ?>">Cart (<?php echo esc_html(medivista_shop_cart_count()); ?>)</a>
          <a href="<?php echo esc_url(medivista_shop_checkout_url()); ?>">Checkout</a>
          <a href="<?php echo esc_url(medivista_shop_account_url()); ?>">My Account</a>
        </div>
      </div>
      <span class="nav-utility"><a href="<?php echo esc_url(home_url('/')); ?>">EN</a><span class="nav-disabled" aria-disabled="true">KO</span></span>
      <a class="social-icon social-instagram" href="https://www.instagram.com/medivista.global?igsh=M21lN3Q3dDl5NGx0&utm_source=qr" target="_blank" rel="noopener" aria-label="Instagram"></a>
      <a class="social-icon social-facebook" href="https://www.facebook.com/share/1DRDDT62yZ/?mibextid=wwXIfr" target="_blank" rel="noopener" aria-label="Facebook"></a>
    </nav>
  </div>
</header>




