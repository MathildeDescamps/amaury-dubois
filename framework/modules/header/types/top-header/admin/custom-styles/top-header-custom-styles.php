<?php

if ( ! function_exists( 'onea_elated_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function onea_elated_header_top_bar_styles() {
		$top_header_height = onea_elated_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo onea_elated_dynamic_css( '.eltdf-top-bar', array( 'height' => onea_elated_filter_px( $top_header_height ) . 'px' ) );
			echo onea_elated_dynamic_css( '.eltdf-top-bar .eltdf-logo-wrapper a', array( 'max-height' => onea_elated_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo onea_elated_dynamic_css( '.eltdf-header-box .eltdf-top-bar-background', array( 'height' => onea_elated_get_top_bar_background_height() . 'px' ) );
		
		$top_bar_container_selector = '.eltdf-top-bar > .eltdf-vertical-align-containers';
		$top_bar_container_styles   = array();
		$container_side_padding     = onea_elated_options()->getOptionValue( 'top_bar_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( onea_elated_string_ends_with( $container_side_padding, 'px' ) || onea_elated_string_ends_with( $container_side_padding, '%' ) ) {
				$top_bar_container_styles['padding-left'] = $container_side_padding;
				$top_bar_container_styles['padding-right'] = $container_side_padding;
			} else {
				$top_bar_container_styles['padding-left'] = onea_elated_filter_px( $container_side_padding ) . 'px';
				$top_bar_container_styles['padding-right'] = onea_elated_filter_px( $container_side_padding ) . 'px';
			}
			
			echo onea_elated_dynamic_css( $top_bar_container_selector, $top_bar_container_styles );
		}
		
		if ( onea_elated_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.eltdf-top-bar .eltdf-grid .eltdf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = onea_elated_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = onea_elated_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = onea_elated_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo onea_elated_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = onea_elated_options()->getOptionValue( 'top_bar_background_color' );
		$border_color     = onea_elated_options()->getOptionValue( 'top_bar_border_color' );
		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( onea_elated_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = onea_elated_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = onea_elated_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			
			echo onea_elated_dynamic_css( '.eltdf-header-box .eltdf-top-bar-background', array( 'background-color' => $background_color ) );
		}
		
		if ( onea_elated_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo onea_elated_dynamic_css( '.eltdf-top-bar', $top_bar_styles );
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_header_top_bar_styles' );
}