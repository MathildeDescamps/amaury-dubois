<?php

if ( ! function_exists( 'onea_elated_get_hide_dep_for_header_widget_areas_meta_boxes' ) ) {
	function onea_elated_get_hide_dep_for_header_widget_areas_meta_boxes() {
		$hide_dep_options = apply_filters( 'onea_elated_filter_header_widget_areas_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'onea_elated_get_hide_dep_for_header_widget_area_two_meta_boxes' ) ) {
	function onea_elated_get_hide_dep_for_header_widget_area_two_meta_boxes() {
		$hide_dep_options = apply_filters( 'onea_elated_filter_header_widget_area_two_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'onea_elated_header_widget_areas_meta_options_map' ) ) {
	function onea_elated_header_widget_areas_meta_options_map( $header_meta_box ) {
		$hide_dep_widgets 			= onea_elated_get_hide_dep_for_header_widget_areas_meta_boxes();
		$hide_dep_widget_area_two 	= onea_elated_get_hide_dep_for_header_widget_area_two_meta_boxes();
		
		$header_widget_areas_container = onea_elated_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'header_widget_areas_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta' => $hide_dep_widgets
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		onea_elated_add_admin_section_title(
			array(
				'parent' => $header_widget_areas_container,
				'name'   => 'header_widget_areas',
				'title'  => esc_html__( 'Widget Areas', 'onea' )
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_header_widget_areas_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Widget Areas', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will hide widget areas from header', 'onea' ),
				'parent'        => $header_widget_areas_container,
			)
		);

		$header_custom_widget_areas_container = onea_elated_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'header_custom_widget_areas_container',
				'parent'     => $header_widget_areas_container,
				'dependency' => array(
					'hide' => array(
						'eltdf_disable_header_widget_areas_meta' => 'yes'
					)
				)
			)
		);
					
		$onea_custom_sidebars = onea_elated_get_custom_sidebars();
		if ( count( $onea_custom_sidebars ) > 0 ) {
			onea_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_header_widget_area_one_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Header Widget Area One', 'onea' ),
					'description' => esc_html__( 'Choose custom widget area to display in header widget area one', 'onea' ),
					'parent'      => $header_custom_widget_areas_container,
					'options'     => $onea_custom_sidebars
				)
			);
		}

		if ( count( $onea_custom_sidebars ) > 0 ) {
			onea_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_header_widget_area_two_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Header Widget Area Two', 'onea' ),
					'description' => esc_html__( 'Choose custom widget area to display in header widget area two', 'onea' ),
					'parent'      => $header_custom_widget_areas_container,
					'options'     => $onea_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'eltdf_header_type_meta' => $hide_dep_widget_area_two
						)
					)
				)
			);
		}
		
		do_action( 'onea_elated_header_widget_areas_additional_meta_boxes_map', $header_widget_areas_container );
	}
	
	add_action( 'onea_elated_action_header_widget_areas_meta_boxes_map', 'onea_elated_header_widget_areas_meta_options_map', 10, 1 );
}