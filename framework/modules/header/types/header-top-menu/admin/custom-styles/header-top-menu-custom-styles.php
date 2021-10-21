<?php

if ( ! function_exists( 'onea_elated_header_top_menu_logo_area_styles' ) ) {
	/**
	 * Generates styles for menu area
	 */
	function onea_elated_header_top_menu_logo_area_styles() {
		$menu_area_height = onea_elated_options()->getOptionValue( 'menu_area_height' );
		
		if ( ! empty( $menu_area_height ) ) {
			echo onea_elated_dynamic_css( '.eltdf-header-top-menu .eltdf-page-header .eltdf-logo-area', array( 'margin-top' => $menu_area_height . 'px' ) );
		}
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_header_top_menu_logo_area_styles' );
}