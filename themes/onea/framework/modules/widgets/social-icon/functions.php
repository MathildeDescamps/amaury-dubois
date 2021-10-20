<?php

if ( ! function_exists( 'onea_elated_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function onea_elated_register_social_icon_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_social_icon_widget' );
}