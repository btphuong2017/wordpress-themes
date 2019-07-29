<?php 
/**
 * Add file CSS to theme
 */
function frontend_scripts() {
    wp_register_script('vendor-script', THEME_URL.'/assets/vendor.js', 'all', false, true);
    wp_enqueue_script('vendor-script');
    wp_register_script('main-script', THEME_URL.'/assets/main.js', 'all', false, true);
    wp_enqueue_script('main-script');
}
add_action('wp_enqueue_scripts', 'frontend_scripts');