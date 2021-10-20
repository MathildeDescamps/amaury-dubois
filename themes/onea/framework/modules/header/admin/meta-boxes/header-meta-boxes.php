<?php

if ( ! function_exists( 'onea_elated_header_types_meta_boxes' ) ) {
	function onea_elated_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'onea_elated_filter_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'onea' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'onea_elated_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function onea_elated_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'onea_elated_filter_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( ELATED_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'onea_elated_map_header_meta' ) ) {
	function onea_elated_map_header_meta() {
		$header_type_meta_boxes              = onea_elated_header_types_meta_boxes();
		$header_behavior_meta_boxes_hide_dep = onea_elated_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'onea_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'header_meta' ),
				'title' => esc_html__( 'Header', 'onea' ),
				'name'  => 'header_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'onea' ),
				'description'   => esc_html__( 'Select header type layout', 'onea' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'onea' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'onea' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'onea' ),
					'light-header' => esc_html__( 'Light', 'onea' ),
					'dark-header'  => esc_html__( 'Dark', 'onea' )
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'eltdf_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'onea' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'onea' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'onea' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'onea' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'onea' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'onea' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'onea' )
				),
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);
		
		//additional area
		do_action( 'onea_elated_action_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'onea_elated_action_header_top_area_meta_boxes_map', $header_meta_box );
		
		//logo area
		do_action( 'onea_elated_action_header_logo_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'onea_elated_action_header_menu_area_meta_boxes_map', $header_meta_box );

		//dropdown
		do_action( 'onea_elated_action_dropdown_meta_boxes_map', $header_meta_box );

		//widget areaa
		do_action( 'onea_elated_action_header_widget_areas_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_header_meta', 50 );
}