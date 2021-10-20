<?php

if ( ! function_exists( 'onea_elated_set_header_top_menu_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function onea_elated_set_header_top_menu_type_global_option( $header_types ) {
		$header_types['header-top-menu'] = array(
			'image' => ELATED_FRAMEWORK_HEADER_TYPES_ROOT . '/header-top-menu/assets/img/header-top-menu.png',
			'label' => esc_html__( 'Top Menu', 'onea' )
		);
		
		return $header_types;
	}
	
	add_filter( 'onea_elated_filter_header_type_global_option', 'onea_elated_set_header_top_menu_type_global_option' );
}

if ( ! function_exists( 'onea_elated_set_header_top_menu_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function onea_elated_set_header_top_menu_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-top-menu'] = esc_html__( 'Top Menu', 'onea' );
		
		return $header_type_options;
	}
	
	add_filter( 'onea_elated_filter_header_type_meta_boxes', 'onea_elated_set_header_top_menu_type_meta_boxes_option' );
}

if ( ! function_exists( 'onea_elated_set_hide_dep_options_header_top_menu' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function onea_elated_set_hide_dep_options_header_top_menu( $hide_dep_options ) {
		$hide_dep_options[] = 'header-top-menu';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'onea_elated_filter_top_header_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	
	// header global panel meta boxes
	add_filter( 'onea_elated_filter_top_header_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_top_menu' );
	
	// header behavior panel options
	add_filter( 'onea_elated_filter_header_behavior_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_fixed_header_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_sticky_header_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	
	// header behavior panel meta boxes
	add_filter( 'onea_elated_filter_header_behavior_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_top_menu' );
	
	// header types panel options
	add_filter( 'onea_elated_filter_full_screen_menu_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_centered_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_standard_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_vertical_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_vertical_menu_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_vertical_closed_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_vertical_sliding_hide_global_option', 'onea_elated_set_hide_dep_options_header_top_menu' );
	
	// header types panel meta boxes
	add_filter( 'onea_elated_filter_header_centered_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_standard_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_top_menu' );
	add_filter( 'onea_elated_filter_header_vertical_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_top_menu' );

	// header widget area meta boxes
	add_filter( 'onea_elated_filter_header_widget_area_two_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_top_menu' );
}