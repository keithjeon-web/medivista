<?php
function medivista_enqueue_assets() {
    wp_enqueue_style('medivista-main', get_template_directory_uri() . '/assets/css/main.css', array(), '0.1.0');
    wp_enqueue_script('medivista-main', get_template_directory_uri() . '/assets/js/main.js', array(), '0.1.0', true);
}
add_action('wp_enqueue_scripts', 'medivista_enqueue_assets');

function medivista_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'medivista'),
    ));
}
add_action('after_setup_theme', 'medivista_theme_setup');
