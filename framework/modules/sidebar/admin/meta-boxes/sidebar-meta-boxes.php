<?php

if ( ! function_exists( 'onea_elated_map_sidebar_meta' ) ) {
	function onea_elated_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'onea_elated_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'onea' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'onea' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'onea' ),
				'parent'      => $eltdf_sidebar_meta_box,
                'options'       => onea_elated_get_custom_sidebars_options( true )
			)
		);
		
		$eltdf_custom_sidebars = onea_elated_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			onea_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'onea' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'onea' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_sidebar_meta', 31 );
}