<?php

if ( ! function_exists('onea_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function onea_elated_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'onea'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'onea') => 'default',
				esc_html__('Custom Style 1', 'onea') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'onea') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'onea') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'onea')
		));
	}
	
	add_action('vc_after_init', 'onea_elated_contact_form_map');
}