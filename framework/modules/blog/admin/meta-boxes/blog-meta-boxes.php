<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'onea_elated_map_blog_meta' ) ) {
	function onea_elated_map_blog_meta() {
		$eltdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'onea' ),
				'name'  => 'blog_meta'
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'onea' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'onea' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'onea' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'onea' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'onea' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'onea' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'onea' ),
					'in-grid'    => esc_html__( 'In Grid', 'onea' ),
					'full-width' => esc_html__( 'Full Width', 'onea' )
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'onea' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'onea' ),
				'parent'      => $blog_meta_box,
				'options'     => onea_elated_get_number_of_columns_array( true, array( 'one', 'six' ) )
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'onea' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'onea' ),
				'options'     => onea_elated_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'onea' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'onea' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'onea' ),
					'fixed'    => esc_html__( 'Fixed', 'onea' ),
					'original' => esc_html__( 'Original', 'onea' )
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'onea' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'onea' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'onea' ),
					'standard'        => esc_html__( 'Standard', 'onea' ),
					'load-more'       => esc_html__( 'Load More', 'onea' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'onea' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'onea' )
				)
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'onea' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'onea' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_blog_meta', 30 );
}