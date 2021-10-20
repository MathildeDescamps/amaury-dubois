<?php

if ( ! function_exists( 'onea_elated_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function onea_elated_header_minimal_full_screen_menu_body_class( $classes ) {
		$classes[] = 'eltdf-' . onea_elated_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		
		return $classes;
	}
	
	if ( onea_elated_check_is_header_type_enabled( 'header-minimal', onea_elated_get_page_id() ) ) {
		add_filter( 'body_class', 'onea_elated_header_minimal_full_screen_menu_body_class' );
	}
}

if ( ! function_exists( 'onea_elated_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function onea_elated_get_header_minimal_full_screen_menu() {
		$parameters = array(
			'fullscreen_menu_in_grid' => onea_elated_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
		);
		
		onea_elated_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
	}
	
	if ( onea_elated_check_is_header_type_enabled( 'header-minimal', onea_elated_get_page_id() ) ) {
		add_action( 'onea_elated_action_after_wrapper_inner', 'onea_elated_get_header_minimal_full_screen_menu', 40 );
	}
}

if ( ! function_exists( 'onea_elated_header_minimal_mobile_menu_module' ) ) {
    /**
     * Function that edits module for mobile menu
     *
     * @param $module - default module value
     *
     * @return string name of module
     */
    function onea_elated_header_minimal_mobile_menu_module( $module ) {
        return 'header/types/header-minimal';
    }

    if ( onea_elated_check_is_header_type_enabled( 'header-minimal', onea_elated_get_page_id() ) ) {
        add_filter('onea_elated_filter_mobile_menu_module', 'onea_elated_header_minimal_mobile_menu_module');
    }
}

if ( ! function_exists( 'onea_elated_header_minimal_mobile_menu_slug' ) ) {
    /**
     * Function that edits slug for mobile menu
     *
     * @param $slug - default slug value
     *
     * @return string name of slug
     */
    function onea_elated_header_minimal_mobile_menu_slug( $slug ) {
        return 'minimal';
    }

    if ( onea_elated_check_is_header_type_enabled( 'header-minimal', onea_elated_get_page_id() ) ) {
        add_filter('onea_elated_filter_mobile_menu_slug', 'onea_elated_header_minimal_mobile_menu_slug');
    }
}

if ( ! function_exists( 'onea_elated_header_minimal_mobile_menu_parameters' ) ) {
    /**
     * Function that edits parameters for mobile menu
     *
     * @param $parameters - default parameters array values
     *
     * @return array of default values and classes for minimal mobile header
     */
    function onea_elated_header_minimal_mobile_menu_parameters( $parameters ) {

		$parameters['fullscreen_menu_icon_class'] = onea_elated_get_fullscreen_menu_icon_class();

        return $parameters;
    }

    if ( onea_elated_check_is_header_type_enabled( 'header-minimal', onea_elated_get_page_id() ) ) {
        add_filter('onea_elated_filter_mobile_menu_parameters', 'onea_elated_header_minimal_mobile_menu_parameters');
    }
}