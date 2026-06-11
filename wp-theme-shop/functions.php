<?php
function medivista_shop_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus(array(
        'shop_primary' => __('Shop Primary Menu', 'medivista-shop'),
    ));
}
add_action('after_setup_theme', 'medivista_shop_setup');

function medivista_shop_enqueue_assets() {
    wp_enqueue_style('medivista-shop', get_template_directory_uri() . '/assets/css/shop.css', array(), '20260525c');
    wp_enqueue_script('medivista-shop', get_template_directory_uri() . '/assets/js/shop.js', array(), '20260525c', true);
}
add_action('wp_enqueue_scripts', 'medivista_shop_enqueue_assets');

function medivista_shop_open_graph_meta() {
    $description = get_bloginfo('description');
    if (empty($description)) {
        $description = 'MEDIVISTA Brand Shop for CELLEXOR and own-brand professional aesthetic care products.';
    }
    $image = get_template_directory_uri() . '/assets/images/og-medivista.png';
    ?>
    <meta property="og:site_name" content="MEDIVISTA Brand Shop">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <?php
}
add_action('wp_head', 'medivista_shop_open_graph_meta', 5);

function medivista_shop_body_class($classes) {
    $classes[] = 'medivista-shop-site';
    if (function_exists('is_checkout') && is_checkout()) {
        $classes[] = 'medivista-checkout-page';
    }
    return $classes;
}
add_filter('body_class', 'medivista_shop_body_class');

require_once get_template_directory() . '/inc/access-control.php';

function medivista_shop_cart_count() {
    if (!function_exists('WC') || !WC()->cart) {
        return 0;
    }
    return WC()->cart->get_cart_contents_count();
}

function medivista_shop_url($path = '/') {
    return home_url($path);
}

function medivista_shop_cart_url() {
    if (function_exists('wc_get_cart_url')) {
        return wc_get_cart_url();
    }
    return home_url('/cart/');
}

function medivista_shop_checkout_url() {
    if (function_exists('wc_get_checkout_url')) {
        return wc_get_checkout_url();
    }
    return home_url('/checkout/');
}

function medivista_shop_account_url() {
    if (function_exists('wc_get_page_id')) {
        $page_id = wc_get_page_id('myaccount');
        if ($page_id && $page_id > 0) {
            return get_permalink($page_id);
        }
    }
    return home_url('/my-account/');
}
