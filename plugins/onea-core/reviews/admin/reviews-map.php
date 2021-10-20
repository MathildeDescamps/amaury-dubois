<?php

if ( ! function_exists( 'onea_core_reviews_map' ) ) {
	function onea_core_reviews_map() {
		
		$reviews_panel = onea_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'onea-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'onea-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating on your page', 'onea-core' ),
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'onea-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating on your page', 'onea-core' ),
			)
		);
	}
	
	add_action( 'onea_elated_action_additional_page_options_map', 'onea_core_reviews_map', 75 ); //one after elements
}