<?php

if ( ! function_exists( 'onea_elated_disable_wpml_css' ) ) {
	function onea_elated_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'onea_elated_disable_wpml_css' );
}