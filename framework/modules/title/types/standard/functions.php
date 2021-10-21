<?php

if ( ! function_exists( 'onea_elated_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function onea_elated_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'onea' );
		
		return $type;
	}
	
	add_filter( 'onea_elated_filter_title_type_global_option', 'onea_elated_set_title_standard_type_for_options' );
	add_filter( 'onea_elated_filter_title_type_meta_boxes', 'onea_elated_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'onea_elated_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function onea_elated_set_title_standard_type_as_default_options( $type ) {
		$type = 'standard';
		
		return $type;
	}
	
	add_filter( 'onea_elated_filter_default_title_type_global_option', 'onea_elated_set_title_standard_type_as_default_options' );
}