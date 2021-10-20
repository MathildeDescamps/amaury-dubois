<?php

if (!function_exists('onea_elated_woocommerce_wishlist')) {
    /**
     * Function that adds tag before share and like section
     */
    function onea_elated_woocommerce_wishlist() {

        if( class_exists( 'YITH_WCWL' ) ) {
            echo do_shortcode('[yith_wcwl_add_to_wishlist]');
        }
    }
}

if ( ! function_exists( 'onea_elated_register_yith_wishlist_widget' ) ) {
	/**
	 * Function that register yith wishlist widget
	 */
	function onea_elated_register_yith_wishlist_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassWoocommerceYithWishlist';

		return $widgets;
	}

	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_yith_wishlist_widget' );
}