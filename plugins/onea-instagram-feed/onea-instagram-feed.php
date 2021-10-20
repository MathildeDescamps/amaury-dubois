<?php
/*
Plugin Name: Onea Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Elated Themes
Version: 2.0.1
*/
define('ONEA_INSTAGRAM_FEED_VERSION', '2.0.1');
define('ONEA_INSTAGRAM_ABS_PATH', dirname(__FILE__));
define('ONEA_INSTAGRAM_REL_PATH', dirname(plugin_basename(__FILE__ )));
define( 'ONEA_INSTAGRAM_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'ONEA_INSTAGRAM_ASSETS_PATH', ONEA_INSTAGRAM_ABS_PATH . '/assets' );
define( 'ONEA_INSTAGRAM_ASSETS_URL_PATH', ONEA_INSTAGRAM_URL_PATH . 'assets' );
define( 'ONEA_INSTAGRAM_SHORTCODES_PATH', ONEA_INSTAGRAM_ABS_PATH . '/shortcodes' );
define( 'ONEA_INSTAGRAM_SHORTCODES_URL_PATH', ONEA_INSTAGRAM_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'onea_instagram_theme_installed' ) ) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function onea_instagram_theme_installed() {
        return defined( 'ELATED_ROOT' );
    }
}

if ( ! function_exists( 'onea_instagram_core_plugin_installed()' ) ) {
	function onea_instagram_core_plugin_installed() {
		return defined( 'ONEA_CORE_VERSION' );
	}
}

if ( ! function_exists( 'onea_instagram_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function onea_instagram_feed_text_domain() {
		load_plugin_textdomain( 'onea-instagram-feed', false, ONEA_INSTAGRAM_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'onea_instagram_feed_text_domain' );
}