<?php

class OneaMembershipLoginRegister extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'eltdf_login_register_widget',
			esc_html__( 'Onea Login Widget', 'onea-membership' ),
			array( 'description' => esc_html__( 'Login and register membership widget', 'onea-membership' ) )
		);
	}
	
	public function widget( $args, $instance ) {
		$additional_class = is_user_logged_in() ? 'eltdf-user-logged-in' : 'eltdf-user-not-logged-in';
		
		echo '<div class="widget eltdf-login-register-widget ' . esc_attr( $additional_class ) . '">';
        if ( ! is_user_logged_in() ) {
            echo onea_membership_get_module_template_part( 'widgets', 'login-widget', 'login-widget-template', 'logged-out' );
        } else {
            echo onea_membership_get_module_template_part( 'widgets', 'login-widget', 'login-widget-template', 'logged-in' );
        }
		echo '</div>';
	}
}

if ( ! function_exists( 'onea_membership_login_widget_load' ) ) {
	function onea_membership_login_widget_load() {
		register_widget( 'OneaMembershipLoginRegister' );
	}
	
	add_action( 'widgets_init', 'onea_membership_login_widget_load' );
}

