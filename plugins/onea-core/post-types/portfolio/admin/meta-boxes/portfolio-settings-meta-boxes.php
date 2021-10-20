<?php

if ( ! function_exists( 'onea_core_map_portfolio_settings_meta' ) ) {
	function onea_core_map_portfolio_settings_meta() {
		$meta_box = onea_elated_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'onea-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		onea_elated_create_meta_box_field( array(
			'name'        => 'eltdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'onea-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'onea-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'onea-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'onea-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'onea-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'onea-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'onea-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'onea-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'onea-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'onea-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'onea-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'onea-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'onea-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'onea-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = onea_elated_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'eltdf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'eltdf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'onea-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'onea-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => onea_elated_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'onea-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'onea-core' ),
				'default_value' => '',
				'options'       => onea_elated_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = onea_elated_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'eltdf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'eltdf_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'onea-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'onea-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => onea_elated_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'onea-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'onea-core' ),
				'default_value' => '',
				'options'       => onea_elated_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'onea-core' ),
				'parent'        => $meta_box,
				'options'       => onea_elated_get_yes_no_select_array()
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'onea-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'onea-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'onea-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'onea-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'onea-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'onea-core' ),
				'parent'      => $meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'onea-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'onea-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'onea-core' ),
					'small'              => esc_html__( 'Small', 'onea-core' ),
					'large-width'        => esc_html__( 'Large Width', 'onea-core' ),
					'large-height'       => esc_html__( 'Large Height', 'onea-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'onea-core' )
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'onea-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'onea-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'onea-core' ),
					'large-width' => esc_html__( 'Large Width', 'onea-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'onea-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'onea-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_core_map_portfolio_settings_meta', 41 );
}