<?php

if ( ! function_exists( 'onea_elated_content_bottom_options_map' ) ) {
	function onea_elated_content_bottom_options_map() {
		
		$panel_content_bottom = onea_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__( 'Content Bottom Area Style', 'onea' )
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'enable_content_bottom_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'onea' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'onea' ),
				'parent'        => $panel_content_bottom
			)
		);
		
		$enable_content_bottom_area_container = onea_elated_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'dependency' => array(
					'show' => array(
						'enable_content_bottom_area'  => 'yes'
					)
				)
			)
		);
		
		$onea_custom_sidebars = onea_elated_get_custom_sidebars();
		
		onea_elated_add_admin_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'content_bottom_sidebar_custom_display',
				'default_value' => '',
				'label'         => esc_html__( 'Widget Area to Display', 'onea' ),
				'description'   => esc_html__( 'Choose a Content Bottom widget area to display', 'onea' ),
				'options'       => $onea_custom_sidebars,
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'content_bottom_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Display in Grid', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'onea' ),
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'content_bottom_background_color',
				'label'       => esc_html__( 'Background Color', 'onea' ),
				'description' => esc_html__( 'Choose a background color for Content Bottom area', 'onea' ),
				'parent'      => $enable_content_bottom_area_container
			)
		);
	}
	
	add_action( 'onea_elated_action_additional_page_options_map', 'onea_elated_content_bottom_options_map' );
}