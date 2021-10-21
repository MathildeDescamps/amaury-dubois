<?php

if ( ! function_exists( 'onea_elated_set_header_bottom_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function onea_elated_set_header_bottom_type_global_option( $header_types ) {
		$header_types['header-bottom'] = array(
			'image' => ELATED_FRAMEWORK_HEADER_TYPES_ROOT . '/header-bottom/assets/img/header-bottom.png',
			'label' => esc_html__( 'Bottom', 'onea' )
		);
		
		return $header_types;
	}
	
	add_filter( 'onea_elated_filter_header_type_global_option', 'onea_elated_set_header_bottom_type_global_option' );
}

if ( ! function_exists( 'onea_elated_set_header_bottom_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function onea_elated_set_header_bottom_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-bottom'] = esc_html__( 'Bottom', 'onea' );
		
		return $header_type_options;
	}
	
	add_filter( 'onea_elated_filter_header_type_meta_boxes', 'onea_elated_set_header_bottom_type_meta_boxes_option' );
}

if ( ! function_exists( 'onea_elated_set_hide_dep_options_header_bottom' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function onea_elated_set_hide_dep_options_header_bottom( $hide_dep_options ) {
		$hide_dep_options[] = 'header-bottom';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'onea_elated_filter_header_logo_area_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_header_main_menu_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	
	// header global panel meta boxes
	add_filter( 'onea_elated_filter_header_logo_area_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_bottom' );

	// header behavior panel options
	add_filter( 'onea_elated_filter_header_behavior_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_fixed_header_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_sticky_header_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	
	// header types panel options
	add_filter( 'onea_elated_filter_header_centered_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_full_screen_menu_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_header_standard_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_header_vertical_closed_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_header_vertical_sliding_hide_global_option', 'onea_elated_set_hide_dep_options_header_bottom' );


	// header types panel meta boxes
	add_filter( 'onea_elated_filter_header_centered_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_header_vertical_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_bottom' );
	add_filter( 'onea_elated_filter_header_standard_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_bottom' );

	// header dropdown styles meta boxes
	add_filter( 'onea_elated_filter_dropdown_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_bottom' );
}