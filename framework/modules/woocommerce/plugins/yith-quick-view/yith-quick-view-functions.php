<?php

if(!function_exists('onea_elated_woocommerce_quick_view_button')) {
	/**
	 * Function that adds Quick view button in product loop
	 */
	function onea_elated_woocommerce_quick_view_button() {

		if( class_exists( 'YITH_WCQV_Frontend' ) ) {
			global $product;
			$label = esc_html( get_option( 'yith-wcqv-button-label' ) );

			print '<a href="#" class="yith-quickview-button yith-wcqv-button" data-product_id="'.$product->get_id().'">'.$label.'</a>';
		}
	}
}
