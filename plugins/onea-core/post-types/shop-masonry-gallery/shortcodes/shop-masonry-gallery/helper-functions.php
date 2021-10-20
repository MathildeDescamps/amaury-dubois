<?php
if ( ! function_exists( 'onea_core_add_shop_masonry_gallery_shortcode' ) ) {
	function onea_core_add_shop_masonry_gallery_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'OneaCore\CPT\Shortcodes\ShopMasonryGallery\ShopMasonryGallery'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'onea_core_filter_add_vc_shortcode', 'onea_core_add_shop_masonry_gallery_shortcode' );
}

if ( ! function_exists( 'onea_core_set_shop_masonry_gallery_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for masonry gallery shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function onea_core_set_shop_masonry_gallery_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-shop-masonry-gallery';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'onea_core_filter_add_vc_shortcodes_custom_icon_class', 'onea_core_set_shop_masonry_gallery_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'onea_core_get_shop_masonry_image_ration' ) ) {
	function onea_core_get_shop_masonry_image_ration( ) {
		return 1.3;
	}
}

if ( ! function_exists( 'onea_core_get_shop_masonry_image_default_size' ) ) {
	function onea_core_get_shop_masonry_image_default_size( ) {
		return 768;
	}
}
