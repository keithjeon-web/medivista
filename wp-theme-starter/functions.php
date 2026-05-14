<?php
function medivista_enqueue_assets() {
    wp_enqueue_style('medivista-main', get_template_directory_uri() . '/assets/css/main.css', array(), '20260514b');
    wp_enqueue_script('medivista-d3', 'https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js', array(), '7.8.5', true);
    wp_enqueue_script('medivista-topojson', 'https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js', array('medivista-d3'), '3.0.2', true);
    wp_enqueue_script('medivista-main', get_template_directory_uri() . '/assets/js/main.js', array('medivista-d3', 'medivista-topojson'), '20260514b', true);
}
add_action('wp_enqueue_scripts', 'medivista_enqueue_assets');

function medivista_open_graph_meta() {
    global $wp;
    $site_name = 'MEDIVISTA';
    $title = wp_get_document_title();
    $description = get_bloginfo('description');
    if (empty($description)) {
        $description = 'MEDIVISTA global medical aesthetic B2B catalog and professional inquiry website.';
    }
    $request_path = isset($wp->request) ? $wp->request : '';
    $url = home_url($request_path ? '/' . $request_path . '/' : '/');
    if (is_front_page()) {
        $url = home_url('/');
    }
    $image = get_template_directory_uri() . '/assets/images/og-medivista.png';
    ?>
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo esc_attr($title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url($url); ?>">
    <meta property="og:image" content="<?php echo esc_url($image); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($image); ?>">
    <?php
}
add_action('wp_head', 'medivista_open_graph_meta', 5);

function medivista_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'medivista'),
    ));
}
add_action('after_setup_theme', 'medivista_theme_setup');
