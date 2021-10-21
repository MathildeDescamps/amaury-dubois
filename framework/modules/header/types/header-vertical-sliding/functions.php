<?php

if ( ! function_exists( 'onea_elated_register_header_vertical_sliding_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function onea_elated_register_header_vertical_sliding_type( $header_types ) {
		$header_type = array(
			'header-vertical-sliding' => 'OneaElatedNamespace\Modules\Header\Types\HeaderVerticalSliding'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'onea_elated_init_register_header_vertical_sliding_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function onea_elated_init_register_header_vertical_sliding_type() {
		add_filter( 'onea_elated_filter_register_header_type_class', 'onea_elated_register_header_vertical_sliding_type' );
	}
	
	add_action( 'onea_elated_action_before_header_function_init', 'onea_elated_init_register_header_vertical_sliding_type' );
}

if ( ! function_exists( 'onea_elated_include_header_vertical_sliding_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function onea_elated_include_header_vertical_sliding_menu( $menus ) {
		if ( ! array_key_exists( 'vertical-navigation', $menus ) ) {
			$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'onea' );
		}
		
		return $menus;
	}
	
	if ( onea_elated_check_is_header_type_enabled( 'header-vertical-sliding' ) ) {
		add_filter( 'onea_elated_filter_register_headers_menu', 'onea_elated_include_header_vertical_sliding_menu' );
	}
}

if ( ! function_exists( 'onea_elated_get_header_vertical_sliding_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function onea_elated_get_header_vertical_sliding_main_menu() {
		onea_elated_get_module_template_part( 'templates/vertical-sliding-navigation', 'header/types/header-vertical-sliding' );
	}
}

if ( ! function_exists( 'onea_elated_vertical_sliding_header_holder_class' ) ) {
	/**
	 * Return holder class for this header type html
	 */
	function onea_elated_vertical_sliding_header_holder_class() {
		$center_content = onea_elated_get_meta_field_intersect( 'vertical_header_center_content', onea_elated_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'eltdf-vertical-alignment-center' : 'eltdf-vertical-alignment-top';
		
		return $holder_class;
	}
}

if ( ! function_exists( 'onea_elated_header_vertical_sliding_per_page_custom_styles' ) ) {
    /**
     * Return header per page styles
     */
    function onea_elated_header_vertical_sliding_per_page_custom_styles( $style, $class_prefix, $page_id ) {
        $header_area_style    = array();
        $header_area_selector = array( $class_prefix . '.eltdf-header-vertical-sliding .eltdf-vertical-menu-area .eltdf-vertical-area-background' );

        $vertical_header_background_color  = get_post_meta( $page_id, 'eltdf_vertical_header_background_color_meta', true );
        $disable_vertical_background_image = get_post_meta( $page_id, 'eltdf_disable_vertical_header_background_image_meta', true );
        $vertical_background_image         = get_post_meta( $page_id, 'eltdf_vertical_header_background_image_meta', true );
        $vertical_shadow                   = get_post_meta( $page_id, 'eltdf_vertical_header_shadow_meta', true );
        $vertical_border                   = get_post_meta( $page_id, 'eltdf_vertical_header_border_meta', true );

        if ( ! empty( $vertical_header_background_color ) ) {
            $header_area_style['background-color'] = $vertical_header_background_color;
        }

        if ( $disable_vertical_background_image == 'yes' ) {
            $header_area_style['background-image'] = 'none';
        } elseif ( $vertical_background_image !== '' ) {
            $header_area_style['background-image'] = 'url(' . $vertical_background_image . ')';
        }

        if ( $vertical_shadow == 'yes' ) {
            $header_area_style['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
        }

        if ( $vertical_border == 'yes' ) {
            $header_border_color = get_post_meta( $page_id, 'eltdf_vertical_header_border_color_meta', true );

            if ( $header_border_color !== '' ) {
                $header_area_style['border-right'] = '1px solid ' . $header_border_color;
            }
        }

        $current_style = '';

        if ( ! empty( $header_area_style ) ) {
            $current_style .= onea_elated_dynamic_css( $header_area_selector, $header_area_style );
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter( 'onea_elated_filter_add_header_page_custom_style', 'onea_elated_header_vertical_sliding_per_page_custom_styles', 10, 3 );
}

if ( ! function_exists( 'onea_elated_get_vertical_sliding_header_icon_class' ) ) {
	/**
	 * Loads vertical closed icon class
	 */
	function onea_elated_get_vertical_sliding_header_icon_class() {
		$classes = array(
			'eltdf-vertical-sliding-opener'
		);
		
		$classes[] = onea_elated_get_icon_sources_class( 'vertical_sliding', 'eltdf-vertical-sliding-opener' );
		
		return $classes;
	}
}