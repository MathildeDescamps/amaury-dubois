<?php

if ( ! function_exists( 'onea_elated_get_hide_dep_for_header_centered_meta_boxes' ) ) {
	function onea_elated_get_hide_dep_for_header_centered_meta_boxes() {
		$hide_dep_options = apply_filters( 'onea_elated_filter_header_centered_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'onea_elated_header_centered_meta_map' ) ) {
	function onea_elated_header_centered_meta_map( $parent ) {
		$hide_dep_options = onea_elated_get_hide_dep_for_header_centered_meta_boxes();
		
		onea_elated_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'eltdf_logo_wrapper_padding_header_centered_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'onea' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'onea' ),
				'args'            => array(
					'col_width' => 3
				),
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_header_logo_area_additional_meta_boxes_map', 'onea_elated_header_centered_meta_map', 10, 1 );
}