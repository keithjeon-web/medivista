<?php
function medivista_enqueue_assets() {
    wp_enqueue_style('medivista-main', get_template_directory_uri() . '/assets/css/main.css', array(), '20260620c');
    wp_enqueue_script('medivista-d3', 'https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js', array(), '7.8.5', true);
    wp_enqueue_script('medivista-topojson', 'https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js', array('medivista-d3'), '3.0.2', true);
    wp_enqueue_script('medivista-main', get_template_directory_uri() . '/assets/js/main.js', array('medivista-d3', 'medivista-topojson'), '20260620c', true);

    if (medivista_is_shop_request()) {
        wp_enqueue_style('medivista-shop', get_template_directory_uri() . '/assets/css/shop.css', array('medivista-main'), '20260619a');
        wp_enqueue_script('medivista-shop', get_template_directory_uri() . '/assets/js/shop.js', array(), '20260619a', true);
    }
}
add_action('wp_enqueue_scripts', 'medivista_enqueue_assets');

function medivista_open_graph_meta() {
    global $wp;
    $site_name = 'MEDIVISTA';
    $title = wp_get_document_title();
    $description = get_bloginfo('description');
    if (empty($description)) {
        $description = 'MEDIVISTA provides English-first B2B catalog information for Korean aesthetic products, professional cosmetics, medical aesthetic cosmetics, and partner inquiry.';
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

function medivista_structured_data() {
    $data = null;
    if (is_front_page()) {
        $data = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'MEDIVISTA',
            'url' => home_url('/'),
            'description' => 'English-first B2B catalog information for Korean aesthetic products, professional cosmetics, medical aesthetic cosmetics, skin boosters, dermal fillers, and partner inquiry.',
            'sameAs' => array(
                'https://www.instagram.com/medivista.global?igsh=M21lN3Q3dDl5NGx0&utm_source=qr',
                'https://www.facebook.com/share/1DRDDT62yZ/?mibextid=wwXIfr',
            ),
            'knowsAbout' => array(
                'Korean aesthetic products',
                'professional cosmetics',
                'medical aesthetic cosmetics',
                'skin boosters',
                'dermal fillers',
                'B2B product catalog',
            ),
        );
    } elseif (is_page_template('page-products.php')) {
        $data = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array(
                array(
                    '@type' => 'Question',
                    'name' => 'What cosmetic categories can MEDIVISTA support?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'MEDIVISTA can organize professional cosmetics, Korean cosmetics, medical aesthetic cosmetics, clinic-facing cosmetic catalog items, and cosmetic science-inspired beauty concepts after source details are confirmed.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'Where are MEDIVISTA online orders handled?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Corporate and catalog pages remain inquiry-focused. Online ordering is available only through the integrated MEDIVISTA Shop and WooCommerce routes.',
                    ),
                ),
                array(
                    '@type' => 'Question',
                    'name' => 'How are cosmetic products presented?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Products are presented with English names, category context, white-background imagery, and careful B2B descriptions for partner review.',
                    ),
                ),
            ),
        );
    }

    if ($data) {
        echo '<script type="application/ld+json">' . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    }
}
add_action('wp_head', 'medivista_structured_data', 20);

function medivista_document_title_parts($title) {
    $title['site'] = 'MEDIVISTA';

    if (is_front_page()) {
        $title['title'] = 'Global Medical Aesthetic B2B';
    }

    return $title;
}
add_filter('document_title_parts', 'medivista_document_title_parts');

function medivista_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'medivista'),
    ));
}
add_action('after_setup_theme', 'medivista_theme_setup');

function medivista_ensure_core_pages() {
    $pages = array(
        'brands' => array(
            'title' => 'Brands',
            'template' => 'page-brands.php',
            'content' => 'MEDIVISTA brand portfolio and partner information.',
        ),
        'cellexor' => array(
            'title' => 'Cellexor Re:Tone',
            'template' => 'page-cellexor.php',
            'content' => 'CELLEXOR Re:Tone brand and product concept page.',
        ),
        'contact' => array(
            'title' => 'Contact',
            'template' => 'page-contact.php',
            'content' => 'MEDIVISTA global B2B inquiry page.',
        ),
    );

    $created_page = false;

    foreach ($pages as $slug => $page_data) {
        $page = get_page_by_path($slug, OBJECT, 'page');

        if (!$page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $slug,
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
            ));

            if (!is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                $created_page = true;
            }
            continue;
        }

        if (get_page_template_slug($page->ID) !== $page_data['template']) {
            update_post_meta($page->ID, '_wp_page_template', $page_data['template']);
        }
    }

    if ($created_page) {
        flush_rewrite_rules(false);
    }
}
add_action('after_switch_theme', 'medivista_ensure_core_pages');
add_action('admin_init', 'medivista_ensure_core_pages');
add_action('init', 'medivista_ensure_core_pages', 5);

function medivista_is_shop_request() {
    if (function_exists('is_woocommerce') && is_woocommerce()) {
        return true;
    }

    if (function_exists('is_cart') && is_cart()) {
        return true;
    }

    if (function_exists('is_checkout') && is_checkout()) {
        return true;
    }

    if (function_exists('is_account_page') && is_account_page()) {
        return true;
    }

    return is_page(array('shop', 'cart', 'checkout', 'my-account'));
}

function medivista_shop_cart_count() {
    if (!function_exists('WC') || !WC()->cart) {
        return 0;
    }

    return WC()->cart->get_cart_contents_count();
}

function medivista_shop_cart_url() {
    return function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
}

function medivista_shop_checkout_url() {
    return function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : home_url('/checkout/');
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

function medivista_shop_body_class($classes) {
    if (medivista_is_shop_request()) {
        $classes[] = 'medivista-shop-area';
    }

    return $classes;
}
add_filter('body_class', 'medivista_shop_body_class');

require_once get_template_directory() . '/inc/shop-access-control.php';


