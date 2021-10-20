<?php

if ( ! function_exists( 'onea_core_testimonials_meta_box_functions' ) ) {
	function onea_core_testimonials_meta_box_functions( $post_types ) {
		$post_types[] = 'testimonials';
		
		return $post_types;
	}
	
	add_filter( 'onea_elated_filter_meta_box_post_types_save', 'onea_core_testimonials_meta_box_functions' );
	add_filter( 'onea_elated_filter_meta_box_post_types_remove', 'onea_core_testimonials_meta_box_functions' );
}

if ( ! function_exists( 'onea_core_register_testimonials_cpt' ) ) {
	function onea_core_register_testimonials_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'OneaCore\CPT\Testimonials\TestimonialsRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'onea_core_filter_register_custom_post_types', 'onea_core_register_testimonials_cpt' );
}

// Load testimonials shortcodes
if ( ! function_exists( 'onea_core_include_testimonials_shortcodes_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function onea_core_include_testimonials_shortcodes_files() {
		
		if( onea_core_is_theme_registered() ) {
			
			foreach ( glob( ONEA_CORE_CPT_PATH . '/testimonials/shortcodes/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
			
		}
	}
	
	add_action( 'onea_core_action_include_shortcodes_file', 'onea_core_include_testimonials_shortcodes_files' );
}