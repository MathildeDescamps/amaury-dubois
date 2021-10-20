<?php

if ( ! function_exists( 'onea_membership_add_reset_password_shortcodes' ) ) {
	function onea_membership_add_reset_password_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'OneaMembership\Shortcodes\OneaUserResetPassword\OneaUserResetPassword'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'onea_membership_filter_add_vc_shortcode', 'onea_membership_add_reset_password_shortcodes' );
}