<?php

if ( ! function_exists( 'onea_elated_register_product_list_widget' ) ) {
	/**
	 * Function that register product list widget
	 */
	function onea_elated_register_product_list_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassProductListWidget';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_product_list_widget' );
}