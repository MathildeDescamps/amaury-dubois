<?php

if ( ! function_exists( 'onea_elated_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function onea_elated_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_image_gallery_widget' );
}