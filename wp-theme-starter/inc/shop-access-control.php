<?php
/**
 * Restrict the integrated Shop area for Korean IP visitors.
 *
 * A trusted CDN, WAF, host, or GeoIP plugin must provide a country header.
 * The public corporate and catalog pages remain available in every region.
 */

function medivista_shop_country_code_from_request() {
    $headers = array(
        'HTTP_CF_IPCOUNTRY',
        'HTTP_CLOUDFRONT_VIEWER_COUNTRY',
        'HTTP_X_APPENGINE_COUNTRY',
        'GEOIP_COUNTRY_CODE',
        'HTTP_X_COUNTRY_CODE',
        'HTTP_X_GEOIP_COUNTRY_CODE',
        'HTTP_X_FORWARDED_COUNTRY',
    );

    foreach ($headers as $header) {
        if (!empty($_SERVER[$header])) {
            $header_value = sanitize_text_field(wp_unslash($_SERVER[$header]));
            $country_code = strtoupper(trim(explode(',', $header_value)[0]));
            if (preg_match('/^[A-Z]{2}$/', $country_code)) {
                return apply_filters('medivista_shop_country_code', $country_code);
            }
        }
    }

    if (class_exists('WC_Geolocation')) {
        $location = WC_Geolocation::geolocate_ip('', true, false);
        if (!empty($location['country'])) {
            return apply_filters(
                'medivista_shop_country_code',
                strtoupper(sanitize_text_field($location['country']))
            );
        }
    }

    return apply_filters('medivista_shop_country_code', '');
}

function medivista_shop_user_is_exempt() {
    if (is_user_logged_in() && (current_user_can('manage_options') || current_user_can('manage_woocommerce'))) {
        return true;
    }

    if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
        return true;
    }

    $request_uri = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
    return strpos($request_uri, '/wp-login.php') !== false || strpos($request_uri, '/wp-admin') !== false;
}

function medivista_shop_block_korean_ip() {
    if (!medivista_is_shop_request() || medivista_shop_user_is_exempt()) {
        return;
    }

    $country_code = medivista_shop_country_code_from_request();
    if ($country_code !== 'KR') {
        return;
    }

    status_header(403);
    nocache_headers();
    wp_die(
        esc_html__('Online purchasing is not available in your region. Please contact our team for further assistance.', 'medivista'),
        esc_html__('Shop Access Restricted', 'medivista'),
        array('response' => 403)
    );
}
add_action('template_redirect', 'medivista_shop_block_korean_ip', 1);

function medivista_shop_exclude_korea_from_sales($countries) {
    unset($countries['KR']);
    return $countries;
}
add_filter('woocommerce_countries_allowed_countries', 'medivista_shop_exclude_korea_from_sales');
add_filter('woocommerce_countries_shipping_countries', 'medivista_shop_exclude_korea_from_sales');
