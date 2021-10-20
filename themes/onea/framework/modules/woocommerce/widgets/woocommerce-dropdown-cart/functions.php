<?php

if ( ! function_exists( 'onea_elated_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function onea_elated_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'onea_elated_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function onea_elated_get_dropdown_cart_icon_class() {
		$classes = array(
			'eltdf-header-cart'
		);
		
		$classes[] = onea_elated_get_icon_sources_class( 'dropdown_cart', 'eltdf-header-cart' );
		
		return $classes;
	}
}