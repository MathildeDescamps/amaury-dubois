<?php

if ( ! function_exists( 'onea_elated_footer_options_map' ) ) {
	function onea_elated_footer_options_map() {

		onea_elated_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'onea' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = onea_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'onea' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		onea_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'onea' ),
				'parent'        => $footer_panel
			)
		);

        onea_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'onea' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'onea' ),
                'parent'        => $footer_panel
            )
        );

		onea_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'onea' ),
				'parent'        => $footer_panel
			)
		);

		onea_elated_create_meta_box_field(
			array(
				'name'          => 'dark_text_footer',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Dark Footer Text', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will set the Footer Text to Dark', 'onea' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = onea_elated_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		onea_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'onea' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'onea' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4',
					'2 2 2 2 2 2' => '6'
				)
			)
		);

		onea_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'onea' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'onea' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'onea' ),
					'left'   => esc_html__( 'Left', 'onea' ),
					'center' => esc_html__( 'Center', 'onea' ),
					'right'  => esc_html__( 'Right', 'onea' )
				),
				'parent'        => $show_footer_top_container
			)
		);
		
		$footer_top_styles_group = onea_elated_add_admin_group(
			array(
				'name'        => 'footer_top_styles_group',
				'title'       => esc_html__( 'Footer Top Styles', 'onea' ),
				'description' => esc_html__( 'Define style for footer top area', 'onea' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		$footer_top_styles_row_1 = onea_elated_add_admin_row(
			array(
				'name'   => 'footer_top_styles_row_1',
				'parent' => $footer_top_styles_group
			)
		);
		
			onea_elated_add_admin_field(
				array(
					'name'   => 'footer_top_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'onea' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'name'   => 'footer_top_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'onea' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'name'   => 'footer_top_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'onea' ),
					'parent' => $footer_top_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);

		onea_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'onea' ),
				'parent'        => $footer_panel
			)
		);

		$show_footer_bottom_container = onea_elated_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		onea_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'onea' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'onea' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_group = onea_elated_add_admin_group(
			array(
				'name'        => 'footer_bottom_styles_group',
				'title'       => esc_html__( 'Footer Bottom Styles', 'onea' ),
				'description' => esc_html__( 'Define style for footer bottom area', 'onea' ),
				'parent'      => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_row_1 = onea_elated_add_admin_row(
			array(
				'name'   => 'footer_bottom_styles_row_1',
				'parent' => $footer_bottom_styles_group
			)
		);
		
			onea_elated_add_admin_field(
				array(
					'name'   => 'footer_bottom_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'onea' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'onea' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'onea' ),
					'parent' => $footer_bottom_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);
	}

	add_action( 'onea_elated_action_options_map', 'onea_elated_footer_options_map', onea_elated_set_options_map_position( 'footer' ) );
}