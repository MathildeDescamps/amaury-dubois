<?php

if ( ! function_exists( 'onea_elated_get_title_types_meta_boxes' ) ) {
	function onea_elated_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'onea_elated_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'onea' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'onea_elated_map_title_meta' ) ) {
	function onea_elated_map_title_meta() {
		$title_type_meta_boxes = onea_elated_get_title_types_meta_boxes();
		
		$title_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'onea_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'onea' ),
				'name'  => 'title_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'onea' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'onea' ),
				'parent'        => $title_meta_box,
				'options'       => onea_elated_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = onea_elated_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'eltdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'eltdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'onea' ),
						'description'   => esc_html__( 'Choose title type', 'onea' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'onea' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'onea' ),
						'options'       => onea_elated_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'onea' ),
						'description' => esc_html__( 'Set a height for Title Area', 'onea' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'onea' ),
						'description' => esc_html__( 'Choose a background color for title area', 'onea' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'onea' ),
						'description' => esc_html__( 'Choose an Image for title area', 'onea' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'onea' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'onea' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'onea' ),
							'hide'                => esc_html__( 'Hide Image', 'onea' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'onea' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'onea' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'onea' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'onea' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'onea' )
						)
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'onea' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'onea' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'onea' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'onea' ),
							'window-top'    => esc_html__( 'From Window Top', 'onea' )
						)
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'onea' ),
						'options'       => onea_elated_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'onea' ),
						'description' => esc_html__( 'Choose a color for title text', 'onea' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'onea' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'onea' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'onea' ),
						'options'       => onea_elated_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'onea' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'onea' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'onea_elated_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_title_meta', 60 );
}