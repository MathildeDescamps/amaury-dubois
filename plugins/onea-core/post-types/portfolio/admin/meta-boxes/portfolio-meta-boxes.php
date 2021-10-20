<?php

if ( ! function_exists( 'onea_core_map_portfolio_meta' ) ) {
	function onea_core_map_portfolio_meta() {
		global $onea_elated_global_Framework;
		
		$onea_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$onea_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$onea_portfolio_images = new OneaElatedClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'onea-core' ), '', '', 'portfolio_images' );
		$onea_elated_global_Framework->eltdMetaBoxes->addMetaBox( 'portfolio_images', $onea_portfolio_images );
		
		$onea_portfolio_image_gallery = new OneaElatedClassMultipleImages( 'eltdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'onea-core' ), esc_html__( 'Choose your portfolio images', 'onea-core' ) );
		$onea_portfolio_images->addChild( 'eltdf-portfolio-image-gallery', $onea_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$onea_portfolio_images_videos = onea_elated_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'onea-core' ),
				'name'  => 'eltdf_portfolio_images_videos'
			)
		);
		onea_elated_add_repeater_field(
			array(
				'name'        => 'eltdf_portfolio_single_upload',
				'parent'      => $onea_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'onea-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'onea-core' ),
						'options' => array(
							'image' => esc_html__('Image','onea-core'),
							'video' => esc_html__('Video','onea-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'onea-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'onea-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'onea-core'),
							'vimeo' => esc_html__('Vimeo', 'onea-core'),
							'self' => esc_html__('Self Hosted', 'onea-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'onea-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'onea-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'onea-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$onea_additional_sidebar_items = onea_elated_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'onea-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		onea_elated_add_repeater_field(
			array(
				'name'        => 'eltdf_portfolio_properties',
				'parent'      => $onea_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'onea-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'onea-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'onea-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'onea-core' )
					)
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_core_map_portfolio_meta', 40 );
}