<?php

if ( ! function_exists( 'onea_elated_include_search_types_before_load' ) ) {
    /**
     * Load's all header types before load files by going through all folders that are placed directly in header types folder.
     * Functions from this files before-load are used to set all hooks and variables before global options map are init
     */
    function onea_elated_include_search_types_before_load() {
        foreach ( glob( ELATED_FRAMEWORK_SEARCH_ROOT_DIR . '/types/*/before-load.php' ) as $module_load ) {
            include_once $module_load;
        }
    }

    add_action( 'onea_elated_action_options_map', 'onea_elated_include_search_types_before_load', 1 ); // 1 is set to just be before header option map init
}

if ( ! function_exists( 'onea_elated_load_search' ) ) {
	function onea_elated_load_search() {
		$search_type_meta = onea_elated_options()->getOptionValue( 'search_type' );
		$search_type      = ! empty( $search_type_meta ) ? $search_type_meta : 'fullscreen';
		
		if ( onea_elated_active_widget( false, false, 'eltdf_search_opener' ) ) {
			include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '/' . $search_type . '.php';
		}
	}
	
	add_action( 'init', 'onea_elated_load_search' );
}

if ( ! function_exists( 'onea_elated_get_holder_params_search' ) ) {
	/**
	 * Function which return holder class and holder inner class for blog pages
	 */
	function onea_elated_get_holder_params_search() {
		$params_list = array();
		
		$layout = onea_elated_options()->getOptionValue( 'search_page_layout' );
		if ( $layout == 'in-grid' ) {
			$params_list['holder'] = 'eltdf-container';
			$params_list['inner']  = 'eltdf-container-inner clearfix';
		} else {
			$params_list['holder'] = 'eltdf-full-width';
			$params_list['inner']  = 'eltdf-full-width-inner';
		}
		
		/**
		 * Available parameters for holder params
		 * -holder
		 * -inner
		 */
		return apply_filters( 'onea_elated_filter_search_holder_params', $params_list );
	}
}

if ( ! function_exists( 'onea_elated_get_search_page' ) ) {
	function onea_elated_get_search_page() {
		$sidebar_layout = onea_elated_sidebar_layout();
		
		$params = array(
			'sidebar_layout' => $sidebar_layout
		);
		
		onea_elated_get_module_template_part( 'templates/holder', 'search', '', $params );
	}
}

if ( ! function_exists( 'onea_elated_get_search_page_layout' ) ) {
	/**
	 * Function which create query for blog lists
	 */
	function onea_elated_get_search_page_layout() {
		global $wp_query;
		$path   = apply_filters( 'onea_elated_filter_search_page_path', 'templates/page' );
		$type   = apply_filters( 'onea_elated_filter_search_page_layout', 'default' );
		$module = apply_filters( 'onea_elated_filter_search_page_module', 'search' );
		$plugin = apply_filters( 'onea_elated_filter_search_page_plugin_override', false );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$params = array(
			'type'          => $type,
			'query'         => $wp_query,
			'paged'         => $paged,
			'max_num_pages' => onea_elated_get_max_number_of_pages(),
		);
		
		$params = apply_filters( 'onea_elated_filter_search_page_params', $params );
		
		onea_elated_get_module_template_part( $path . '/' . $type, $module, '', $params, $plugin );
	}
}

if ( ! function_exists( 'onea_elated_get_search_submit_icon_class' ) ) {
	/**
	 * Loads search submit icon class
	 */
	function onea_elated_get_search_submit_icon_class() {
		$classes = array(
			'eltdf-search-submit'
		);
		
		$classes[] = onea_elated_get_icon_sources_class( 'search', 'eltdf-search-submit' );

		return $classes;
	}
}

if ( ! function_exists( 'onea_elated_get_search_close_icon_class' ) ) {
	/**
	 * Loads search close icon class
	 */
	function onea_elated_get_search_close_icon_class() {
		$classes = array(
			'eltdf-search-close'
		);
		
		$classes[] = onea_elated_get_icon_sources_class( 'search', 'eltdf-search-close' );

		return $classes;
	}
}