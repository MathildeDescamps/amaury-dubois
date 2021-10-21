<?php

if ( ! function_exists( 'onea_elated_include_woocommerce_shortcodes' ) ) {
	function onea_elated_include_woocommerce_shortcodes() {
		if ( onea_elated_core_plugin_installed() && onea_elated_is_theme_registered() ) {
			foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}
	
	if ( onea_elated_core_plugin_installed() && onea_elated_is_theme_registered() ) {
		add_action( 'onea_core_action_include_shortcodes_file', 'onea_elated_include_woocommerce_shortcodes' );
	}
}
