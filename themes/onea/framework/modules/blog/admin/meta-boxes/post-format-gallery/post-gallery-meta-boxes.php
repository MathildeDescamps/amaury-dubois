<?php

if ( ! function_exists( 'onea_elated_map_post_gallery_meta' ) ) {
	
	function onea_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'onea' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		onea_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'onea' ),
				'description' => esc_html__( 'Choose your gallery images', 'onea' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_post_gallery_meta', 21 );
}
