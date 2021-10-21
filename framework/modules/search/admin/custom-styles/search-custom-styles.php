<?php

if ( ! function_exists( 'onea_elated_search_opener_icon_size' ) ) {
	function onea_elated_search_opener_icon_size() {
		$icon_size = onea_elated_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo onea_elated_dynamic_css( '.eltdf-search-opener', array(
				'font-size' => onea_elated_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_search_opener_icon_size' );
}

if ( ! function_exists( 'onea_elated_search_opener_icon_colors' ) ) {
	function onea_elated_search_opener_icon_colors() {
		$icon_color       = onea_elated_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = onea_elated_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo onea_elated_dynamic_css( '.eltdf-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo onea_elated_dynamic_css( '.eltdf-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_search_opener_icon_colors' );
}

if ( ! function_exists( 'onea_elated_search_opener_text_styles' ) ) {
	function onea_elated_search_opener_text_styles() {
		$item_styles = onea_elated_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.eltdf-search-icon-text'
		);
		
		echo onea_elated_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = onea_elated_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo onea_elated_dynamic_css( '.eltdf-search-opener:hover .eltdf-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'onea_elated_action_style_dynamic', 'onea_elated_search_opener_text_styles' );
}