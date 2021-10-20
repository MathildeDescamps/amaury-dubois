<?php

if ( ! function_exists( 'onea_elated_sidebar_options_map' ) ) {
	function onea_elated_sidebar_options_map() {
		
		onea_elated_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'onea' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = onea_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'onea' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		onea_elated_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'onea' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'onea' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => onea_elated_get_custom_sidebars_options()
		) );
		
		$onea_custom_sidebars = onea_elated_get_custom_sidebars();
		if ( count( $onea_custom_sidebars ) > 0 ) {
			onea_elated_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'onea' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'onea' ),
				'parent'      => $sidebar_panel,
				'options'     => $onea_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'onea_elated_action_options_map', 'onea_elated_sidebar_options_map', onea_elated_set_options_map_position( 'sidebar' ) );
}