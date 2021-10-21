<?php

if ( ! function_exists( 'onea_elated_map_post_video_meta' ) ) {
	function onea_elated_map_post_video_meta() {
		$video_post_format_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'onea' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'onea' ),
				'description'   => esc_html__( 'Choose video type', 'onea' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'onea' ),
					'self'            => esc_html__( 'Self Hosted', 'onea' )
				)
			)
		);
		
		$eltdf_video_embedded_container = onea_elated_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'eltdf_video_embedded_container'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'onea' ),
				'description' => esc_html__( 'Enter Video URL', 'onea' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'onea' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'onea' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'onea' ),
				'description' => esc_html__( 'Enter video image', 'onea' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_post_video_meta', 22 );
}