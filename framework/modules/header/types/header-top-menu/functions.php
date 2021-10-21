<?php

if ( ! function_exists( 'onea_elated_register_header_top_menu_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function onea_elated_register_header_top_menu_type( $header_types ) {
		$header_type = array(
			'header-top-menu' => 'OneaElatedNamespace\Modules\Header\Types\HeaderTopMenu'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'onea_elated_init_register_header_top_menu_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function onea_elated_init_register_header_top_menu_type() {
		add_filter( 'onea_elated_filter_register_header_type_class', 'onea_elated_register_header_top_menu_type' );
	}
	
	add_action( 'onea_elated_action_before_header_function_init', 'onea_elated_init_register_header_top_menu_type' );
}

if ( ! function_exists( 'onea_elated_header_top_menu_per_page_custom_styles' ) ) {
	/**
	 * Return header per page styles
	 */
	function onea_elated_header_top_menu_per_page_custom_styles( $style, $class_prefix, $page_id ) {
		$header_area_style    = array();
		$header_area_selector = array( $class_prefix . '.eltdf-header-top-menu .eltdf-page-header .eltdf-logo-area' );
		
		$header_top_menu_logo_area_margin_top = get_post_meta( $page_id, 'eltdf_menu_area_height_meta', true );
		
		if ( ! empty( $header_top_menu_logo_area_margin_top ) ) {
			$header_area_style['margin-top'] = onea_elated_filter_px( $header_top_menu_logo_area_margin_top)  . 'px';
		}
		
		$current_style = '';
		
		if ( ! empty( $header_area_style ) ) {
			$current_style .= onea_elated_dynamic_css( $header_area_selector, $header_area_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'onea_elated_filter_add_header_page_custom_style', 'onea_elated_header_top_menu_per_page_custom_styles', 10, 3 );
}