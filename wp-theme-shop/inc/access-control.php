<?php
/**
 * Shop-only regional access control.
 *
 * WordPress core does not include a country GeoIP database. This guard relies on
 * a hosting, CDN, WAF, or security plugin country header such as CF-IPCountry.
 */

function medivista_shop_country_code_from_request() {
    $headers = array(
        'HTTP_CF_IPCOUNTRY',
        'HTTP_X_COUNTRY_CODE',
        'HTTP_X_GEOIP_COUNTRY_CODE',
        'HTTP_X_FORWARDED_COUNTRY',
    );

    foreach ($headers as $header) {
        if (!empty($_SERVER[$header])) {
            return strtoupper(sanitize_text_field(wp_unslash($_SERVER[$header])));
        }
    }

    return '';
}

function medivista_shop_is_admin_exempt() {
    if (is_user_logged_in() && current_user_can('manage_options')) {
        return true;
    }

    if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
        return true;
    }

    $request_uri = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
    return (strpos($request_uri, '/wp-login.php') !== false || strpos($request_uri, '/wp-admin') !== false);
}

function medivista_shop_block_restricted_country_access() {
    if (medivista_shop_is_admin_exempt()) {
        return;
    }

    $blocked_countries = apply_filters('medivista_shop_blocked_countries', array('KR'));
    $country_code = medivista_shop_country_code_from_request();

    if ($country_code && in_array($country_code, $blocked_countries, true)) {
        status_header(403);
        nocache_headers();
        wp_die(
            esc_html__('Brand Shop access is restricted in your current region. B2B partners may contact MEDIVISTA through WhatsApp for assistance.', 'medivista-shop'),
            esc_html__('Access Restricted', 'medivista-shop'),
            array('response' => 403)
        );
    }
}
add_action('template_redirect', 'medivista_shop_block_restricted_country_access', 1);
