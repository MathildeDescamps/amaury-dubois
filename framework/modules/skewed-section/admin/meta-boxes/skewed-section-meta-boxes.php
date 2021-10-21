<?php

if ( ! function_exists( 'onea_elated_skewed_section_title_meta' ) ) {
	function onea_elated_skewed_section_title_meta( $show_title_area_container ) {
		
		onea_elated_add_admin_section_title(
			array(
				'parent' => $show_title_area_container,
				'name'   => 'skewed_section_container',
				'title'  => esc_html__( 'Skewed Section', 'onea' )
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_enable_skewed_section_on_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Skewed Section', 'onea' ),
				'description'   => esc_html__( 'This option will enable/disable Skew Section on Title Area', 'onea' ),
				'options'       => onea_elated_get_yes_no_select_array(),
				'parent'        => $show_title_area_container
			)
		);
		
		$show_skewed_section_title_area_container = onea_elated_add_admin_container(
			array(
				'parent'     => $show_title_area_container,
				'name'       => 'show_skewed_section_title_area_container',
				'dependency' => array(
					'show' => array(
						'eltdf_enable_skewed_section_on_title_area_meta' => 'yes'
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_skewed_section_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Position', 'onea' ),
				'description'   => esc_html__( 'Specify skewed section position', 'onea' ),
				'parent'        => $show_skewed_section_title_area_container,
				'options'       => array(
					''        => esc_html__( 'Default', 'onea' ),
					'outline' => esc_html__( 'Outline', 'onea' ),
					'inset'   => esc_html__( 'Inset', 'onea' )
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_title_area_container,
				'type'        => 'textarea',
				'name'        => 'eltdf_title_area_skewed_section_svg_path_meta',
				'label'       => esc_html__( 'Skewed Section On Title Area SVG Path', 'onea' ),
				'description' => esc_html__( 'Enter your Section On Title Area SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'onea' ),
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_title_area_container,
				'type'        => 'color',
				'name'        => 'eltdf_title_area_skewed_section_svg_color_meta',
				'label'       => esc_html__( 'Skewed Section Color', 'onea' ),
				'description' => esc_html__( 'Choose a background color for Skewed Section', 'onea' ),
			)
		);
	}
	
	add_action( 'onea_elated_action_additional_title_area_meta_boxes', 'onea_elated_skewed_section_title_meta', 10, 1 );
}

if ( ! function_exists( 'onea_elated_skewed_section_header_meta' ) ) {
	function onea_elated_skewed_section_header_meta( $show_header_area_container ) {
		
		onea_elated_add_admin_section_title(
			array(
				'parent' => $show_header_area_container,
				'name'   => 'skewed_section_container',
				'title'  => esc_html__( 'Skewed Section', 'onea' )
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_enable_skewed_section_on_header_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Skewed Section', 'onea' ),
				'description'   => esc_html__( 'This option will enable/disable Skew Section on Header Area', 'onea' ),
				'options'       => onea_elated_get_yes_no_select_array(),
				'parent'        => $show_header_area_container
			)
		);
		
		$show_skewed_section_header_area_container = onea_elated_add_admin_container(
			array(
				'parent'     => $show_header_area_container,
				'name'       => 'show_skewed_section_header_area_container',
				'dependency' => array(
					'show' => array(
						'eltdf_enable_skewed_section_on_header_area_meta' => 'yes'
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_header_area_container,
				'type'        => 'textarea',
				'name'        => 'eltdf_header_area_skewed_section_svg_path_meta',
				'label'       => esc_html__( 'Skewed Section On Header Area SVG Path', 'onea' ),
				'description' => esc_html__( 'Enter your Section On Header Area SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'onea' ),
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_header_area_container,
				'type'        => 'color',
				'name'        => 'eltdf_header_area_skewed_section_svg_color_meta',
				'label'       => esc_html__( 'Skewed Section Color', 'onea' ),
				'description' => esc_html__( 'Choose a background color for Skewed Section', 'onea' ),
			)
		);
	}
	
	add_action( 'onea_elated_action_additional_header_area_meta_boxes', 'onea_elated_skewed_section_header_meta', 10, 1 );
}