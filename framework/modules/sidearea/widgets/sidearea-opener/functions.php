<?php

if ( ! function_exists( 'onea_elated_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function onea_elated_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_sidearea_opener_widget' );
}