<?php

if ( ! function_exists( 'onea_elated_sticky_header_meta_boxes_options_map' ) ) {
	function onea_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = onea_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'eltdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'onea' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'onea' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$onea_custom_sidebars = onea_elated_get_custom_sidebars();
		if ( count( $onea_custom_sidebars ) > 0 ) {
			onea_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'onea' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'onea' ),
					'parent'      => $header_meta_box,
					'options'     => $onea_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'eltdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'onea_elated_action_additional_header_area_meta_boxes_map', 'onea_elated_sticky_header_meta_boxes_options_map', 8, 1 );
}