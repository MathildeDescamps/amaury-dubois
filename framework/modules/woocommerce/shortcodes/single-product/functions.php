<?php

if ( ! function_exists( 'onea_elated_add_single_product_shortcode' ) ) {
	function onea_elated_add_single_product_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'OneaCore\CPT\Shortcodes\SingleProduct\SingleProduct',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( onea_elated_core_plugin_installed() ) {
		add_filter( 'onea_core_filter_add_vc_shortcode', 'onea_elated_add_single_product_shortcode' );
	}
}

if ( ! function_exists( 'onea_elated_add_single_product_into_shortcodes_list' ) ) {
	function onea_elated_add_single_product_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'eltdf_single_product';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'onea_elated_filter_woocommerce_shortcodes_list', 'onea_elated_add_single_product_into_shortcodes_list' );
}