<?php

if ( ! function_exists( 'onea_core_map_testimonials_meta' ) ) {
	function onea_core_map_testimonials_meta() {
		$testimonial_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'onea-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'onea-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'onea-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'onea-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'onea-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'onea-core' ),
				'description' => esc_html__( 'Enter author name', 'onea-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'onea-core' ),
				'description' => esc_html__( 'Enter author job position', 'onea-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_core_map_testimonials_meta', 95 );
}