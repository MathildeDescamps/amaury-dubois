<?php

if ( ! function_exists( 'onea_elated_map_woocommerce_meta' ) ) {
	function onea_elated_map_woocommerce_meta() {
		
		$woocommerce_meta_box = onea_elated_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'onea' ),
				'name'  => 'woo_product_meta'
			)
		);

		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_woo_set_thumb_images_position_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'onea' ),
				'options'       => array(
					''  					=> esc_html__( 'Default', 'onea' ),
					'below-image'  			=> esc_html__( 'Below Featured Image', 'onea' ),
					'on-left-side' 			=> esc_html__( 'On The Left Side Of Featured Image', 'onea' ),
					'large-images' 			=> esc_html__( 'Large Images', 'onea' ),
					'full-width-gallery' 	=> esc_html__( 'Full Width Gallery', 'onea' ),
					'sticky-info' 			=> esc_html__( 'Sticky Info', 'onea' ),
				),
				'parent'        => $woocommerce_meta_box
			)
		);

		onea_elated_create_meta_box_field(array(
			'name'          => 'eltdf_single_related_products_in_grid_meta',
			'type'          => 'yesno',
			'label'         => esc_html__('Set Related Product in Grid', 'onea'),
			'default_value' => 'no',
			'description'   => esc_html__('Set option to Yes to display Related Product in Grid', 'onea'),
			'dependency' => array(
				'show' => array(
					'eltdf_woo_set_thumb_images_position_meta'  => array('full-width-gallery','sticky-info')
				)
			),
			'parent'        => $woocommerce_meta_box
		));

		onea_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_product_featured_image_size_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'onea' ),
				'description' => esc_html__( 'Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'onea' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'onea' ),
					'small'              => esc_html__( 'Small', 'onea' ),
					'large-width'        => esc_html__( 'Large Width', 'onea' ),
					'large-height'       => esc_html__( 'Large Height', 'onea' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'onea' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'onea' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'onea' ),
				'options'       => onea_elated_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		onea_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'onea' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'onea' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'onea_elated_action_meta_boxes_map', 'onea_elated_map_woocommerce_meta', 99 );
}