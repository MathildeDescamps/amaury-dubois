<?php

if ( ! function_exists( 'onea_elated_portfolio_category_additional_fields' ) ) {
	function onea_elated_portfolio_category_additional_fields() {
		
		$fields = onea_elated_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		onea_elated_add_taxonomy_field(
			array(
				'name'   => 'eltdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'onea-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'onea_elated_action_custom_taxonomy_fields', 'onea_elated_portfolio_category_additional_fields' );
}