<?php

if ( ! function_exists( 'onea_elated_portfolio_options_map' ) ) {
	function onea_elated_portfolio_options_map() {
		
		onea_elated_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'onea-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = onea_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'onea-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'onea-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'onea-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'onea-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'onea-core' ),
				'parent'        => $panel_archive,
				'options'       => onea_elated_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'onea-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'onea-core' ),
				'default_value' => 'normal',
				'options'       => onea_elated_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'onea-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'onea-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'onea-core' ),
					'landscape' => esc_html__( 'Landscape', 'onea-core' ),
					'portrait'  => esc_html__( 'Portrait', 'onea-core' ),
					'square'    => esc_html__( 'Square', 'onea-core' )
				)
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'onea-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'onea-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'onea-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'onea-core' )
				)
			)
		);
		
		$panel = onea_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'onea-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'onea-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'onea-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = onea_elated_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'onea-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'onea-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => onea_elated_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'onea-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'onea-core' ),
				'default_value' => 'normal',
				'options'       => onea_elated_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = onea_elated_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'onea-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'onea-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => onea_elated_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'onea-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'onea-core' ),
				'default_value' => 'normal',
				'options'       => onea_elated_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		onea_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'onea-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'onea-core' ),
					'yes' => esc_html__( 'Yes', 'onea-core' ),
					'no'  => esc_html__( 'No', 'onea-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'onea-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'onea-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'onea-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'onea-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'onea-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'onea-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'onea-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = onea_elated_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'onea-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'onea-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		onea_elated_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'onea-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'onea-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_options_map', 'onea_elated_portfolio_options_map', onea_elated_set_options_map_position( 'portfolio' ) );
}