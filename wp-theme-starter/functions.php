<?php
function medivista_enqueue_assets() {
    wp_enqueue_style('medivista-main', get_template_directory_uri() . '/assets/css/main.css', array(), '20260525a');
    wp_enqueue_script('medivista-d3', 'https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js', array(), '7.8.5', true);
    wp_enqueue_script('medivista-topojson', 'https://cdnjs.cloudflare.com/ajax/libs/topojson/3.0.2/topojson.min.js', array('medivista-d3'), '3.0.2', true);
    wp_enqueue_script('medivista-main', get_template_directory_uri() . '/assets/js/main.js', array('medivista-d3', 'medivista-topojson'), '20260525a', true);
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
                    'name' => 'Is the MEDIVISTA main website a shop?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'The MEDIVISTA main website is a catalog-only B2B information site. Product questions move through WhatsApp or the contact inquiry flow.',
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

function medivista_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'medivista'),
    ));
}
add_action('after_setup_theme', 'medivista_theme_setup');
