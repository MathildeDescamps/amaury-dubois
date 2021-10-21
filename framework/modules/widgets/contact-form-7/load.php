<?php

if ( onea_elated_contact_form_7_installed() ) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'onea_elated_filter_register_widgets', 'onea_elated_register_cf7_widget' );
}

if ( ! function_exists( 'onea_elated_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function onea_elated_register_cf7_widget( $widgets ) {
		$widgets[] = 'OneaElatedClassContactForm7Widget';
		
		return $widgets;
	}
}