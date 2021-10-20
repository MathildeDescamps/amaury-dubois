<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'onea_elated_child_theme_enqueue_scripts' ) ) {
	function onea_elated_child_theme_enqueue_scripts() {
		$parent_style = 'onea-elated-default-style';
		
		wp_enqueue_style( 'onea-elated-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'onea_elated_child_theme_enqueue_scripts' );
}

//WooCommerce Theme Support declaration
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );