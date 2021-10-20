<?php

if ( ! function_exists( 'onea_elated_map_general_meta' ) ) {
	function onea_elated_map_general_meta() {
		
		$general_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'onea_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'onea' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'onea' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'onea' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'onea' ),
				'parent'        => $general_meta_box
			)
		);
		
		$eltdf_content_padding_group = onea_elated_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Styles', 'onea' ),
				'description' => esc_html__( 'Define styles for Content area', 'onea' ),
				'parent'      => $general_meta_box
			)
		);
		
			$eltdf_content_padding_row = onea_elated_add_admin_row(
				array(
					'name'   => 'eltdf_content_padding_row',
					'parent' => $eltdf_content_padding_group
				)
			);
			
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_background_color_meta',
						'type'        => 'colorsimple',
						'label'       => esc_html__( 'Page Background Color', 'onea' ),
						'parent'      => $eltdf_content_padding_row
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_page_background_image_meta',
						'type'          => 'imagesimple',
						'label'         => esc_html__( 'Page Background Image', 'onea' ),
						'parent'        => $eltdf_content_padding_row
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_page_background_repeat_meta',
						'type'          => 'selectsimple',
						'default_value' => '',
						'label'         => esc_html__( 'Page Background Image Repeat', 'onea' ),
						'options'       => onea_elated_get_yes_no_select_array(),
						'parent'        => $eltdf_content_padding_row
					)
				);
		
			$eltdf_content_padding_row_1 = onea_elated_add_admin_row(
				array(
					'name'   => 'eltdf_content_padding_row_1',
					'next'   => true,
					'parent' => $eltdf_content_padding_group
				)
			);
		
				onea_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (eg. 10px 5px 10px 5px)', 'onea' ),
						'parent' => $eltdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'    => 'eltdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (eg. 10px 5px 10px 5px)', 'onea' ),
						'parent'  => $eltdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'onea' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'onea' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'onea' ),
					'eltdf-grid-1300' => esc_html__( '1300px', 'onea' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'onea' ),
					'eltdf-grid-1100' => esc_html__( '1100px', 'onea' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'onea' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'onea' )
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_grid_space_meta',
				'type'        => 'select',
				'default_value' => '',
				'label'       => esc_html__( 'Grid Layout Space', 'onea' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page', 'onea' ),
				'options'     => onea_elated_get_space_between_items_array( true ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		onea_elated_create_meta_box_field(
			array(
				'name'    => 'eltdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'onea' ),
				'parent'  => $general_meta_box,
				'options' => onea_elated_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = onea_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_boxed_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'onea' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'onea' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'onea' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'onea' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'onea' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'onea' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'onea' ),
						'description'   => esc_html__( 'Choose background image attachment', 'onea' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'onea' ),
							'fixed'  => esc_html__( 'Fixed', 'onea' ),
							'scroll' => esc_html__( 'Scroll', 'onea' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'onea' ),
				'parent'        => $general_meta_box,
				'options'       => onea_elated_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = onea_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'eltdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'onea' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'onea' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'onea' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'onea' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'onea' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'onea' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				onea_elated_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'onea' ),
						'options'       => onea_elated_get_yes_no_select_array(),
					)
				);
		
				onea_elated_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'onea' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'onea' ),
						'options'       => onea_elated_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'onea' ),
				'parent'        => $general_meta_box,
				'options'       => onea_elated_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = onea_elated_add_admin_container(
				array(
					'parent'     => $general_meta_box,
					'name'       => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_smooth_page_transitions_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				onea_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'onea' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'onea' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => onea_elated_get_yes_no_select_array()
					)
				);
		
				$page_transition_preloader_container_meta = onea_elated_add_admin_container(
					array(
						'parent'     => $page_transitions_container_meta,
						'name'       => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'eltdf_page_transition_preloader_meta' => array( '', 'no' )
							)
						)
					)
				);
				
					onea_elated_create_meta_box_field(
						array(
							'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'onea' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = onea_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'onea' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'onea' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = onea_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					onea_elated_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'eltdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'onea' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'onea' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'onea' ),
								'pulse'                 => esc_html__( 'Pulse', 'onea' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'onea' ),
								'cube'                  => esc_html__( 'Cube', 'onea' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'onea' ),
								'stripes'               => esc_html__( 'Stripes', 'onea' ),
								'wave'                  => esc_html__( 'Wave', 'onea' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'onea' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'onea' ),
								'atom'                  => esc_html__( 'Atom', 'onea' ),
								'clock'                 => esc_html__( 'Clock', 'onea' ),
								'mitosis'               => esc_html__( 'Mitosis', 'onea' ),
								'lines'                 => esc_html__( 'Lines', 'onea' ),
								'fussion'               => esc_html__( 'Fussion', 'onea' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'onea' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'onea' )
							)
						)
					);
					
					onea_elated_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'eltdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'onea' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					onea_elated_create_meta_box_field(
						array(
							'name'        => 'eltdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'onea' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'onea' ),
							'options'     => onea_elated_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'onea' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'onea' ),
				'parent'      => $general_meta_box,
				'options'     => onea_elated_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_general_meta', 10 );
}

if ( ! function_exists( 'onea_elated_container_background_style' ) ) {
	/**
	 * Function that return container style
	 */
	function onea_elated_container_background_style( $style ) {
		$page_id      = onea_elated_get_page_id();
		$class_prefix = onea_elated_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .eltdf-content'
		);
		
		$container_class        = array();
		$page_background_color  = get_post_meta( $page_id, 'eltdf_page_background_color_meta', true );
		$page_background_image  = get_post_meta( $page_id, 'eltdf_page_background_image_meta', true );
		$page_background_repeat = get_post_meta( $page_id, 'eltdf_page_background_repeat_meta', true );
		
		if ( ! empty( $page_background_color ) ) {
			$container_class['background-color'] = $page_background_color;
		}
		
		if ( ! empty( $page_background_image ) ) {
			$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			
			if ( $page_background_repeat === 'yes' ) {
				$container_class['background-repeat']   = 'repeat';
				$container_class['background-position'] = '0 0';
			} else {
				$container_class['background-repeat']   = 'no-repeat';
				$container_class['background-position'] = 'center 0';
				$container_class['background-size']     = 'cover';
			}
		}
		
		$current_style = onea_elated_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'onea_elated_filter_add_page_custom_style', 'onea_elated_container_background_style' );
}