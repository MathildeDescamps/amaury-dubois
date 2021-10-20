<?php

if ( ! function_exists( 'onea_elated_set_header_standard_extended_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function onea_elated_set_header_standard_extended_type_global_option( $header_types ) {
		$header_types['header-standard-extended'] = array(
			'image' => ELATED_FRAMEWORK_HEADER_TYPES_ROOT . '/header-standard-extended/assets/img/header-standard-extended.png',
			'label' => esc_html__( 'Standard Extended', 'onea' )
		);
		
		return $header_types;
	}
	
	add_filter( 'onea_elated_filter_header_type_global_option', 'onea_elated_set_header_standard_extended_type_global_option' );
}

if ( ! function_exists( 'onea_elated_set_header_standard_extended_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function onea_elated_set_header_standard_extended_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-standard-extended'] = esc_html__( 'Standard Extended', 'onea' );
		
		return $header_type_options;
	}
	
	add_filter( 'onea_elated_filter_header_type_meta_boxes', 'onea_elated_set_header_standard_extended_type_meta_boxes_option' );
}

if ( ! function_exists( 'onea_elated_set_hide_dep_options_header_standard_extended' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function onea_elated_set_hide_dep_options_header_standard_extended( $hide_dep_options ) {
		$hide_dep_options[] = 'header-standard-extended';
		
		return $hide_dep_options;
	}
	
	// header types panel options
	add_filter( 'onea_elated_filter_full_screen_menu_hide_global_option', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_centered_hide_global_option', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_standard_hide_global_option', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_vertical_hide_global_option', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_vertical_menu_hide_global_option', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_vertical_closed_hide_global_option', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_vertical_sliding_hide_global_option', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	
	// header types panel meta boxes
	add_filter( 'onea_elated_filter_header_centered_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_standard_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_standard_extended' );
	add_filter( 'onea_elated_filter_header_vertical_hide_meta_boxes', 'onea_elated_set_hide_dep_options_header_standard_extended' );
}