<?php

if ( ! function_exists( 'onea_elated_map_post_quote_meta' ) ) {
	function onea_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'onea' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'onea' ),
				'description' => esc_html__( 'Enter Quote text', 'onea' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'onea' ),
				'description' => esc_html__( 'Enter Quote author', 'onea' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_post_quote_meta', 25 );
}