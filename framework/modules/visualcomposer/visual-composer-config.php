<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'onea_elated_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function onea_elated_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'onea_elated_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'onea_elated_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function onea_elated_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'onea' ),
				'value'      => array(
					esc_html__( 'Full Width', 'onea' ) => 'full-width',
					esc_html__( 'In Grid', 'onea' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Elated Anchor ID', 'onea' ),
				'description' => esc_html__( 'For example "home"', 'onea' ),
				'group'       => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'onea' ),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'onea' ),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Elated Background Position', 'onea' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'onea' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'onea' ),
				'value'       => array(
					esc_html__( 'Never', 'onea' )        => '',
					esc_html__( 'Below 1280px', 'onea' ) => '1280',
					esc_html__( 'Below 1024px', 'onea' ) => '1024',
					esc_html__( 'Below 768px', 'onea' )  => '768',
					esc_html__( 'Below 680px', 'onea' )  => '680',
					esc_html__( 'Below 480px', 'onea' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'onea' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Elated Parallax Background Image', 'onea' ),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Elated Parallax Speed', 'onea' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'onea' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Elated Parallax Section Height (px)', 'onea' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'onea' ),
				'value'      => array(
					esc_html__( 'Default', 'onea' ) => '',
					esc_html__( 'Left', 'onea' )    => 'left',
					esc_html__( 'Center', 'onea' )  => 'center',
					esc_html__( 'Right', 'onea' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);

		do_action( 'onea_elated_action_additional_vc_row_params' );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'onea' ),
				'value'      => array(
					esc_html__( 'Full Width', 'onea' ) => 'full-width',
					esc_html__( 'In Grid', 'onea' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'onea' ),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'onea' ),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Elated Background Position', 'onea' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'onea' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'onea' ),
				'value'       => array(
					esc_html__( 'Never', 'onea' )        => '',
					esc_html__( 'Below 1280px', 'onea' ) => '1280',
					esc_html__( 'Below 1024px', 'onea' ) => '1024',
					esc_html__( 'Below 768px', 'onea' )  => '768',
					esc_html__( 'Below 680px', 'onea' )  => '680',
					esc_html__( 'Below 480px', 'onea' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'onea' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'onea' ),
				'value'      => array(
					esc_html__( 'Default', 'onea' ) => '',
					esc_html__( 'Left', 'onea' )    => 'left',
					esc_html__( 'Center', 'onea' )  => 'center',
					esc_html__( 'Right', 'onea' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'onea' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( onea_elated_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Elated Enable Passepartout', 'onea' ),
					'value'       => array_flip( onea_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Elated Settings', 'onea' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Elated Passepartout Size', 'onea' ),
					'value'       => array(
						esc_html__( 'Tiny', 'onea' )   => 'tiny',
						esc_html__( 'Small', 'onea' )  => 'small',
						esc_html__( 'Normal', 'onea' ) => 'normal',
						esc_html__( 'Large', 'onea' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'onea' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Elated Disable Side Passepartout', 'onea' ),
					'value'       => array_flip( onea_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'onea' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Elated Disable Top Passepartout', 'onea' ),
					'value'       => array_flip( onea_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'onea' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'onea_elated_vc_row_map' );
}