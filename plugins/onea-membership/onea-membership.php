<?php
/**
 * Plugin Name: Onea Membership
 * Description: Plugin that adds social login and user dashboard page
 * Author: Elated Themes
 * Version: 1.0.1
 */

require_once 'load.php';

if ( ! function_exists( 'onea_membership_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function onea_membership_text_domain() {
		load_plugin_textdomain( 'onea-membership', false, ONEA_MEMBERSHIP_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'onea_membership_text_domain' );
}

if ( ! function_exists( 'onea_membership_scripts' ) ) {
	/**
	 * Loads plugin scripts
	 */
	function onea_membership_scripts() {
		wp_enqueue_style( 'onea-membership-style', plugins_url( ONEA_MEMBERSHIP_REL_PATH . '/assets/css/membership.min.css' ) );
		if ( function_exists( 'onea_elated_is_responsive_on' ) && onea_elated_is_responsive_on() ) {
			wp_enqueue_style( 'onea-membership-responsive-style', plugins_url( ONEA_MEMBERSHIP_REL_PATH . '/assets/css/membership-responsive.min.css' ) );
		}
		
		//include google+ api
		wp_enqueue_script( 'onea-membership-google-plus-api', 'https://apis.google.com/js/platform.js', array(), null, false );
		
		//underscore for facebook and google login
		//tabs for login widget
		$array_deps = array(
			'underscore',
			'jquery-ui-tabs'
		);
		
		if ( onea_membership_theme_installed() ) {
			$array_deps[] = 'onea-elated-modules';
		}
		
		wp_enqueue_script( 'onea-membership-script', plugins_url( ONEA_MEMBERSHIP_REL_PATH . '/assets/js/membership.min.js' ), $array_deps, false, true );
	}
	
	add_action( 'wp_enqueue_scripts', 'onea_membership_scripts' );
}

if ( ! function_exists( 'onea_membership_style_dynamics_deps' ) ) {
	function onea_membership_style_dynamics_deps( $deps ) {
		$style_dynamic_deps_array   = array();
		$style_dynamic_deps_array[] = 'onea-membership-style';
		
		if ( function_exists( 'onea_elated_is_responsive_on' ) && onea_elated_is_responsive_on() ) {
			$style_dynamic_deps_array[] = 'onea-membership-responsive-style';
		}
		
		return array_merge( $deps, $style_dynamic_deps_array );
	}
	
	add_filter( 'onea_elated_style_dynamic_deps', 'onea_membership_style_dynamics_deps' );
}

if ( ! function_exists( 'onea_membership_render_login_form' ) ) {
	function onea_membership_render_login_form() {
		
		if ( ! is_user_logged_in() ) {
			//Render modal with login and register forms
			echo onea_membership_get_module_template_part( 'widgets', 'login-widget', 'login-modal-template' );
		}
	}
	
	add_action( 'wp_footer', 'onea_membership_render_login_form' );
}
