<?php

if ( ! function_exists( 'onea_elated_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function onea_elated_register_custom_font_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_custom_font_widget' );
}