<?php

if ( ! function_exists( 'onea_elated_map_post_link_meta' ) ) {
	function onea_elated_map_post_link_meta() {
		$link_post_format_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'onea' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'onea' ),
				'description' => esc_html__( 'Enter link', 'onea' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_post_link_meta', 24 );
}