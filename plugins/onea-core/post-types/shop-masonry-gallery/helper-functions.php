<?php

if ( ! function_exists( 'onea_core_shop_masonry_gallery_meta_box_functions' ) ) {
	function onea_core_shop_masonry_gallery_meta_box_functions( $post_types ) {
		$post_types[] = 'shop-masonry-gallery';
		
		return $post_types;
	}
	
	add_filter( 'onea_elated_filter_meta_box_post_types_save', 'onea_core_shop_masonry_gallery_meta_box_functions' );
	add_filter( 'onea_elated_filter_meta_box_post_types_remove', 'onea_core_shop_masonry_gallery_meta_box_functions' );
	
}

if ( ! function_exists( 'onea_core_register_shop_masonry_gallery_cpt' ) ) {
	function onea_core_register_shop_masonry_gallery_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'OneaCore\CPT\ShopMasonryGallery\ShopMasonryGalleryRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'onea_core_filter_register_custom_post_types', 'onea_core_register_shop_masonry_gallery_cpt' );
}

if ( ! function_exists( 'onea_core_add_shop_masonry_gallery_to_search_types' ) ) {
	function onea_core_add_shop_masonry_gallery_to_search_types( $post_types ) {
		$post_types['shop-masonry-gallery'] = 'Shop Masonry Gallery';
		
		return $post_types;
	}
	
	add_filter( 'eltdf_themename_search_post_type_widget_params_post_type', 'onea_core_add_shop_masonry_gallery_to_search_types' );
}

// Load masonry gallery shortcodes
if(!function_exists('onea_core_include_shop_masonry_gallery_shortcodes_files')) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function onea_core_include_shop_masonry_gallery_shortcodes_files() {
		if ( onea_elated_core_plugin_installed() && onea_core_is_theme_registered() ) {
			foreach ( glob( ONEA_CORE_CPT_PATH . '/shop-masonry-gallery/shortcodes/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}
	
	add_action('onea_core_action_include_shortcodes_file', 'onea_core_include_shop_masonry_gallery_shortcodes_files');
}