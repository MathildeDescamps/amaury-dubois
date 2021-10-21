<?php

if ( ! function_exists( 'onea_elated_get_hide_dep_for_header_standard_options' ) ) {
	function onea_elated_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'onea_elated_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'onea_elated_header_standard_map' ) ) {
	function onea_elated_header_standard_map( $parent ) {
		$hide_dep_options = onea_elated_get_hide_dep_for_header_standard_options();
		
		onea_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'left',
				'label'           => esc_html__( 'Choose Menu Area Position', 'onea' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'onea' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'onea' ),
					'left'   => esc_html__( 'Left', 'onea' ),
					'center' => esc_html__( 'Center', 'onea' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_additional_header_menu_area_options_map', 'onea_elated_header_standard_map' );
}