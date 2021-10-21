<?php

if ( ! function_exists( 'onea_elated_map_footer_meta' ) ) {
	function onea_elated_map_footer_meta() {
		
		$footer_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'onea_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'onea' ),
				'name'  => 'footer_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'onea' ),
				'options'       => onea_elated_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = onea_elated_add_admin_container(
			array(
				'name'       => 'eltdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'eltdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			onea_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'onea' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'onea' ),
					'options'       => onea_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			onea_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'onea' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'onea' ),
					'options'       => onea_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			onea_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'onea' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'onea' ),
					'options'       => onea_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

			onea_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_dark_text_footer_meta',
					'type'          => 'select',
					'default_value' => 'default',
					'label'         => esc_html__( 'Enable Dark Footer Text', 'onea' ),
					'description'   => esc_html__( 'Enabling this option will set the Footer Text to Dark', 'onea' ),
                    'options'       => onea_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container,
				)
			);
		
			$footer_top_styles_group = onea_elated_add_admin_group(
				array(
					'name'        => 'footer_top_styles_group',
					'title'       => esc_html__( 'Footer Top Styles', 'onea' ),
					'description' => esc_html__( 'Define style for footer top area', 'onea' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'show' => array(
							'eltdf_show_footer_top_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			$footer_top_styles_row_1 = onea_elated_add_admin_row(
				array(
					'name'   => 'footer_top_styles_row_1',
					'parent' => $footer_top_styles_group
				)
			);
		
				onea_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_footer_top_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'onea' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_footer_top_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'onea' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_footer_top_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'onea' ),
						'parent' => $footer_top_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
			
			onea_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'onea' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'onea' ),
					'options'       => onea_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_bottom_styles_group = onea_elated_add_admin_group(
				array(
					'name'        => 'footer_bottom_styles_group',
					'title'       => esc_html__( 'Footer Bottom Styles', 'onea' ),
					'description' => esc_html__( 'Define style for footer bottom area', 'onea' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'show' => array(
							'eltdf_show_footer_bottom_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			$footer_bottom_styles_row_1 = onea_elated_add_admin_row(
				array(
					'name'   => 'footer_bottom_styles_row_1',
					'parent' => $footer_bottom_styles_group
				)
			);
			
				onea_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_footer_bottom_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'onea' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_footer_bottom_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'onea' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_footer_bottom_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'onea' ),
						'parent' => $footer_bottom_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_footer_meta', 70 );
}