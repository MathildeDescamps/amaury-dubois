<?php

if ( ! function_exists( 'onea_elated_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function onea_elated_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'onea' );
		
		return $templates;
	}
	
	add_filter( 'onea_elated_filter_register_blog_templates', 'onea_elated_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'onea_elated_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function onea_elated_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'onea' );
		
		return $options;
	}
	
	add_filter( 'onea_elated_filter_blog_list_type_global_option', 'onea_elated_set_blog_masonry_type_global_option' );
}