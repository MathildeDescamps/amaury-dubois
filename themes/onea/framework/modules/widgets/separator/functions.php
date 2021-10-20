<?php

if ( ! function_exists( 'onea_elated_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function onea_elated_register_separator_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_separator_widget' );
}