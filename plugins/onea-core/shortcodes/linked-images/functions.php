<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Eltdf_Linked_Images extends WPBakeryShortCodesContainer {}
}

if(!function_exists('onea_core_add_linked_image_shortcodes')) {
    function onea_core_add_linked_image_shortcodes($shortcodes_class_name) {
        $shortcodes = array(
            'OneaCore\CPT\Shortcodes\LinkedImage\LinkedImage',
            'OneaCore\CPT\Shortcodes\LinkedImage\LinkedImages'
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    add_filter('onea_core_filter_add_vc_shortcode', 'onea_core_add_linked_image_shortcodes');
}

if( !function_exists('onea_core_set_linked_image_custom_style_for_vc_shortcodes') ) {
    /**
     * Function that set custom css style for linked_image shortcode
     */
    function onea_core_set_linked_image_custom_style_for_vc_shortcodes($style) {
        $current_style = '.vc_shortcodes_container.wpb_eltdf_linked_image_item > .wpb_element_wrapper { 
			background-color: #f4f4f4; 
		}';

        $style = $style . $current_style;

        return $style;
    }

    add_filter('onea_core_filter_add_vc_shortcodes_custom_style', 'onea_core_set_linked_image_custom_style_for_vc_shortcodes');
}

if( !function_exists('onea_core_set_linked_image_icon_class_name_for_vc_shortcodes') ) {
    /**
     * Function that set custom icon class name for linked_image shortcode to set our icon for Visual Composer shortcodes panel
     */
    function onea_core_set_linked_image_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
        $shortcodes_icon_class_array[] = '.icon-wpb-linked-image';
        $shortcodes_icon_class_array[] = '.icon-wpb-linked-image-item';

        return $shortcodes_icon_class_array;
    }

    add_filter('onea_core_filter_add_vc_shortcodes_custom_icon_class', 'onea_core_set_linked_image_icon_class_name_for_vc_shortcodes');
}