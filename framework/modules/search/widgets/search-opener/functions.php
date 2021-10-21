<?php

if ( ! function_exists( 'onea_elated_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function onea_elated_register_search_opener_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_search_opener_widget' );
}