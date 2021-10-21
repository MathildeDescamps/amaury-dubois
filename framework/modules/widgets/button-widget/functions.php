<?php

if ( ! function_exists( 'onea_elated_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function onea_elated_register_button_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_button_widget' );
}