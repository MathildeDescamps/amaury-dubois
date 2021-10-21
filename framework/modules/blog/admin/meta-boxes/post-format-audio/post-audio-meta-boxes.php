<?php

if ( ! function_exists( 'onea_elated_map_post_audio_meta' ) ) {
	function onea_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'onea' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'onea' ),
				'description'   => esc_html__( 'Choose audio type', 'onea' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'onea' ),
					'self'            => esc_html__( 'Self Hosted', 'onea' )
				)
			)
		);
		
		$eltdf_audio_embedded_container = onea_elated_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'eltdf_audio_embedded_container'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'onea' ),
				'description' => esc_html__( 'Enter audio URL', 'onea' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'onea' ),
				'description' => esc_html__( 'Enter audio link', 'onea' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_post_audio_meta', 23 );
}