<?php

if ( ! function_exists( 'onea_elated_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function onea_elated_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'onea' ),
				'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'onea' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'onea_elated_register_sidebars', 1 );
}

if ( ! function_exists( 'onea_elated_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates OneaElatedClassSidebar object
	 */
	function onea_elated_add_support_custom_sidebar() {
		add_theme_support( 'OneaElatedClassSidebar' );
		
		if ( get_theme_support( 'OneaElatedClassSidebar' ) ) {
			new OneaElatedClassSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'onea_elated_add_support_custom_sidebar' );
}