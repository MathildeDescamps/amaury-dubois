<?php

if ( ! function_exists( 'onea_core_include_reviews_shortcodes_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function onea_core_include_reviews_shortcodes_files() {
		
		if( onea_core_is_theme_registered() ) {
			foreach ( glob( ONEA_CORE_ABS_PATH . '/reviews/shortcodes/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}
	
	add_action( 'onea_core_action_include_shortcodes_file', 'onea_core_include_reviews_shortcodes_files' );
}