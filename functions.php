<?php 
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

/** Define Const */
define ('THEME_URL', get_stylesheet_directory_uri());
define ('THEME_DIR', get_stylesheet_directory());
define ('CORE', THEME_DIR.'/core');
define ('INC', THEME_DIR.'/inc');
define ('THEME_NAME', 'custom');
/**
 * Require File Init.php
 */
require_once(CORE.'/init.php');
require_once(INC.'/init.php');
/**
 * Theme Setup
 */
if (!function_exists('custom_theme_setup')) {
    function custom_theme_setup() {

        /**
         *  Enable Post Thumbnails ( Post Avatar ) 
         */
        add_theme_support('post-thumbnails');

        /**
         * Enabel Post Formats
         */
        $post_formats = array(
            'image', 
            'video',
            'gallery',
            'quote',
            'link',
            'status',
            'audio',
            'chat'
        );
        
        add_theme_support('post_formats', $post_formats);

        /**
         * Custom Logo
         */
        add_theme_support('custom-logo');
        
        /**
         * Add support for Block Styles
         */
        add_theme_support('wp-block-styles');

        /**
         * Add multi languages for theme
         */
        $language_folder = THEME_URL.'/languages';
        load_theme_textdomain(THEME_NAME);
    }
    add_action('init', 'custom_theme_setup');
}