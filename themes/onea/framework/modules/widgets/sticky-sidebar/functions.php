<?php

if ( ! function_exists( 'onea_elated_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function onea_elated_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_sticky_sidebar_widget' );
}