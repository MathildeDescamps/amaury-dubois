<?php

if ( ! function_exists( 'onea_elated_logo_meta_box_map' ) ) {
	function onea_elated_logo_meta_box_map() {
		
		$logo_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'onea_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'onea' ),
				'name'  => 'logo_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'onea' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'onea' ),
				'parent'      => $logo_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'onea' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'onea' ),
				'parent'      => $logo_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'onea' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'onea' ),
				'parent'      => $logo_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'onea' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'onea' ),
				'parent'      => $logo_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'onea' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'onea' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_logo_meta_box_map', 47 );
}