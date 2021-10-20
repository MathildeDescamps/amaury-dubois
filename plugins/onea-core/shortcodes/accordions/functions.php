<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Eltdf_Accordion extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Eltdf_Accordion_Tab extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'onea_core_add_accordion_shortcodes' ) ) {
	function onea_core_add_accordion_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'OneaCore\CPT\Shortcodes\Accordion\Accordion',
			'OneaCore\CPT\Shortcodes\AccordionTab\AccordionTab'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'onea_core_filter_add_vc_shortcode', 'onea_core_add_accordion_shortcodes' );
}

if ( ! function_exists( 'onea_core_set_accordion_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for accordion shortcode
	 */
	function onea_core_set_accordion_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_eltdf_accordion_tab { 
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'onea_core_filter_add_vc_shortcodes_custom_style', 'onea_core_set_accordion_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'onea_core_set_accordion_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for accordion shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function onea_core_set_accordion_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-accordion';
		$shortcodes_icon_class_array[] = '.icon-wpb-accordion-tab';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'onea_core_filter_add_vc_shortcodes_custom_icon_class', 'onea_core_set_accordion_icon_class_name_for_vc_shortcodes' );
}