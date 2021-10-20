<?php

if ( ! function_exists( 'onea_elated_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function onea_elated_register_author_info_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_author_info_widget' );
}