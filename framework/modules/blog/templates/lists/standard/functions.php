<?php

if ( ! function_exists( 'onea_elated_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function onea_elated_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'onea' );
		
		return $templates;
	}
	
	add_filter( 'onea_elated_filter_register_blog_templates', 'onea_elated_register_blog_standard_template_file' );
}

if ( ! function_exists( 'onea_elated_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function onea_elated_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'onea' );
		
		return $options;
	}
	
	add_filter( 'onea_elated_filter_blog_list_type_global_option', 'onea_elated_set_blog_standard_type_global_option' );
}