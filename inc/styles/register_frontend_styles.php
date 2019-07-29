<?php 
/**
 * Add file CSS to theme
 */
function frontend_styles() {
    wp_register_style('wordpress-style', THEME_URL.'/style.css', 'all');
    wp_enqueue_style('wordpress-style');
    wp_register_style('main-style', THEME_URL.'/assets/main.css', 'all');
    wp_enqueue_style('main-style');
}
add_action('wp_enqueue_scripts', 'frontend_styles');