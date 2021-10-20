<?php

if ( ! function_exists( 'onea_elated_map_content_bottom_meta' ) ) {
	function onea_elated_map_content_bottom_meta() {
		
		$content_bottom_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'onea_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'onea' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'onea' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'onea' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => onea_elated_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = onea_elated_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'eltdf_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'eltdf_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'onea' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'onea' ),
				'options'       => onea_elated_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'onea' ),
				'options'       => onea_elated_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'eltdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'onea' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'onea' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_content_bottom_meta', 71 );
}