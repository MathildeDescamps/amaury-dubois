<?php

if ( ! function_exists( 'onea_elated_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function onea_elated_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'onea_elated_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'onea_elated_header_standard_meta_map' ) ) {
	function onea_elated_header_standard_meta_map( $parent ) {
		$hide_dep_options = onea_elated_get_hide_dep_for_header_standard_meta_boxes();
		
		onea_elated_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'onea' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'onea' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'onea' ),
					'left'   => esc_html__( 'Left', 'onea' ),
					'right'  => esc_html__( 'Right', 'onea' ),
					'center' => esc_html__( 'Center', 'onea' )
				),
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_additional_header_area_meta_boxes_map', 'onea_elated_header_standard_meta_map' );
}