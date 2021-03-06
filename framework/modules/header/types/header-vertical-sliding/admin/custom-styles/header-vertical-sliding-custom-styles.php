<?php

if ( ! function_exists( 'onea_elated_vertical_sliding_menu_styles' ) ) {
	function onea_elated_vertical_sliding_menu_styles() {
		$vertical_header_styles = array();
		
		$vertical_header_selectors = array(
			'.eltdf-header-vertical-sliding .eltdf-vertical-menu-area .eltdf-vertical-area-background'
		);
		
		$vertical_background_color = onea_elated_options()->getOptionValue( 'vertical_header_background_color' );
		$vertical_background_image = onea_elated_options()->getOptionValue( 'vertical_header_background_image' );
		$vertical_shadow_enabled   = onea_elated_options()->getOptionValue( 'vertical_header_shadow' );
		$vertical_border_enabled   = onea_elated_options()->getOptionValue( 'vertical_header_border' );
		
		if ( ! empty( $vertical_background_color ) ) {
			$vertical_header_styles['background-color'] = $vertical_background_color;
		}
		
		if ( ! empty( $vertical_background_image ) ) {
			$vertical_header_styles['background-image'] = 'url(' . esc_url( $vertical_background_image ) . ')';
		}
		
		if ( $vertical_shadow_enabled === 'yes' ) {
			$vertical_header_styles['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
		}
		
		if ( $vertical_border_enabled === 'yes' ) {
			$header_border_color = onea_elated_options()->getOptionValue( 'vertical_header_border_color' );
			
			if ( ! empty( $header_border_color ) ) {
				$vertical_header_styles['border-right'] = '1px solid ' . $header_border_color;
			}
		}
		
		echo onea_elated_dynamic_css( $vertical_header_selectors, $vertical_header_styles );
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_vertical_sliding_menu_styles' );
}

if ( ! function_exists( 'onea_elated_vertical_sliding_main_menu_styles' ) ) {
	/**
	 * Generates styles for vertical main main menu
	 */
	function onea_elated_vertical_sliding_main_menu_styles() {
		$logo_section_styles = array();
		$widget_section_styles = array();

		$menu_top_margin    = onea_elated_options()->getOptionValue( 'vertical_menu_top_margin' );
		$menu_bottom_margin = onea_elated_options()->getOptionValue( 'vertical_menu_bottom_margin' );
		
		if ( ! empty( $menu_top_margin ) ) {
            $logo_section_styles['padding-top'] = onea_elated_filter_px( $menu_top_margin ) . 'px';
		}
		if ( ! empty( $menu_bottom_margin ) ) {
            $widget_section_styles['bottom'] = onea_elated_filter_px( $menu_bottom_margin ) . 'px';
		}

        $logo_section_selector = array(
			'.eltdf-header-vertical-sliding .eltdf-logo-wrapper'
		);
        $widget_section_selector = array(
            '.eltdf-header-vertical-sliding .eltdf-vertical-area-widget-holder'
        );
		
		echo onea_elated_dynamic_css( $logo_section_selector, $logo_section_styles );
		echo onea_elated_dynamic_css( $widget_section_selector, $widget_section_styles );

		// vertical menu 1st level style
		
		$first_level_styles = onea_elated_get_typography_styles( 'vertical_menu_1st' );
		
		$first_level_selector = array(
                '.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu > ul > li > a'
		);
		
		echo onea_elated_dynamic_css( $first_level_selector, $first_level_styles );
		
		$first_level_hover_styles = array();
		
		$first_level_hover_color = onea_elated_options()->getOptionValue( 'vertical_menu_1st_hover_color' );
		if ( ! empty( $first_level_hover_color ) ) {
			$first_level_hover_styles['color'] = $first_level_hover_color;
		}
		
		$first_level_hover_selector = array(
			'.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu > ul > li > a:hover',
			'.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu > ul > li > a.eltdf-active-item',
			'.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu > ul > li > a.current-menu-ancestor'
		);
		
		echo onea_elated_dynamic_css( $first_level_hover_selector, $first_level_hover_styles );
		
		// vertical menu 2nd level style
		
		$second_level_styles = onea_elated_get_typography_styles( 'vertical_menu_2nd' );
		
		$second_level_selector = array(
			'.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li a'
		);
		
		echo onea_elated_dynamic_css( $second_level_selector, $second_level_styles );
		
		$second_level_hover_styles = array();
		
		$second_level_hover_color = onea_elated_options()->getOptionValue( 'vertical_menu_2nd_hover_color' );
		if ( ! empty( $second_level_hover_color ) ) {
			$second_level_hover_styles['color'] = $second_level_hover_color;
		}
		
		$second_level_hover_selector = array(
            '.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li a:hover',
            '.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li.current-menu-ancestor > a',
            '.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li.current-menu-item > a'
		);
		
		echo onea_elated_dynamic_css( $second_level_hover_selector, $second_level_hover_styles );
		
		// vertical menu 3rd level style
		
		$third_level_styles = onea_elated_get_typography_styles( 'vertical_menu_3rd' );
		
		$third_level_selector = array(
			'.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li ul li a'
		);
		
		echo onea_elated_dynamic_css( $third_level_selector, $third_level_styles );
		
		
		$third_level_hover_styles = array();
		
		$third_level_hover_color = onea_elated_options()->getOptionValue( 'vertical_menu_3rd_hover_color' );
		if ( ! empty( $third_level_hover_color ) ) {
			$third_level_hover_styles['color'] = $third_level_hover_color;
		}
		
		$third_level_hover_selector = array(
            '.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li ul li a:hover',
            '.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li ul li.current-menu-ancestor > a',
            '.eltdf-header-vertical-sliding nav.eltdf-fullscreen-menu ul li ul li ul li.current-menu-item > a'
		);
		
		echo onea_elated_dynamic_css( $third_level_hover_selector, $third_level_hover_styles );
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_vertical_sliding_main_menu_styles' );
}

if ( ! function_exists( 'onea_elated_vertical_sliding_icon_styles' ) ) {
	function onea_elated_vertical_sliding_icon_styles() {
		$icon_color       = onea_elated_options()->getOptionValue( 'vertical_sliding_icon_color' );
		$icon_hover_color = onea_elated_options()->getOptionValue( 'vertical_sliding_icon_hover_color' );
		
		$icon_hover_selector = array(
			'.eltdf-vertical-menu-opener a:hover'
		);
		
		if ( ! empty( $icon_color ) ) {
			echo onea_elated_dynamic_css( '.eltdf-vertical-menu-opener a', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo onea_elated_dynamic_css( $icon_hover_selector, array(
				'color' => $icon_hover_color . '!important'
			) );
		}
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_vertical_sliding_icon_styles' );
}