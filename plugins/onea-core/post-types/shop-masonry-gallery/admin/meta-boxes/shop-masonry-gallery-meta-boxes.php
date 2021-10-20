<?php

if(!function_exists('onea_core_map_shop_masonry_gallery_meta')) {
    function onea_core_map_shop_masonry_gallery_meta() {
        $shop_masonry_gallery_meta_box = onea_elated_create_meta_box(
            array(
                'scope' => array('shop-masonry-gallery'),
                'title' => esc_html__('Shop Masonry Gallery General', 'onea-core'),
                'name' => 'shop_masonry_gallery_meta'
            )
        );

        onea_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_shop_masonry_gallery_item_size',
                'type' => 'select',
                'default_value' => 'square-small',
                'label' => esc_html__('Size', 'onea-core'),
                'parent' => $shop_masonry_gallery_meta_box,
                'options' => array(
                    'square-small'          => esc_html__('Square Small', 'onea-core'),
                    'square-big'            => esc_html__('Square Big', 'onea-core'),
                    'rectangle-portrait'    => esc_html__('Rectangle Portrait', 'onea-core'),
                    'rectangle-landscape'   => esc_html__('Rectangle Landscape', 'onea-core'),
                    'rectangle-portrait-big'   => esc_html__('Rectangle Portrait Big', 'onea-core')
                )
            )
        );

        onea_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_shop_masonry_gallery_item_type',
                'type' => 'select',
                'default_value' => 'standard-product',
                'label' => esc_html__('Type', 'onea-core'),
                'parent' => $shop_masonry_gallery_meta_box,
                'options' => array(
                    'standard-product'  => esc_html__('Standard Product', 'onea-core'),
                    'gallery-product'   => esc_html__('Gallery Product', 'onea-core'),
                    'banner'            => esc_html__('Banner', 'onea-core')
                )
            )
        );

        $shop_masonry_gallery_item_standard_product_type_container = onea_elated_add_admin_container_no_style(array(
            'name'              => 'shop_masonry_gallery_item_standard_product_type_container',
            'parent'            => $shop_masonry_gallery_meta_box,
            'dependency' => array(
	            'hide' => array(
		            'eltdf_shop_masonry_gallery_item_type'  => array('gallery-product','banner')
	            )
            )
        ));

        onea_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_shop_masonry_gallery_standard_product_item_id',
                'type' => 'text',
                'label' => esc_html__('Product ID', 'onea-core'),
                'parent' => $shop_masonry_gallery_item_standard_product_type_container
            )
        );

        $shop_masonry_gallery_item_gallery_product_type_container = onea_elated_add_admin_container_no_style(array(
            'name'              => 'shop_masonry_gallery_item_gallery_product_type_container',
            'parent'            => $shop_masonry_gallery_meta_box,
            'dependency' => array(
	            'hide' => array(
		            'eltdf_shop_masonry_gallery_item_type'  => array('standard-product','banner')
	            )
            )
        ));

        onea_elated_create_meta_box_field(
            array(
                'name' => 'eltdf_shop_masonry_gallery_gallery_product_item_id',
                'type' => 'text',
                'label' => esc_html__('Product ID', 'onea-core'),
                'parent' => $shop_masonry_gallery_item_gallery_product_type_container
            )
        );

        $shop_masonry_gallery_item_banner_type_container = onea_elated_add_admin_container_no_style(array(
            'name'              => 'shop_masonry_gallery_item_banner_type_container',
            'parent'            => $shop_masonry_gallery_meta_box,
            'dependency' => array(
	            'hide' => array(
		            'eltdf_shop_masonry_gallery_item_type'  => array('standard-product','gallery-product')
	            )
            )
        ));

	    onea_elated_add_repeater_field( array(
		    'name'        => 'shop_masonry_gallery_item_banner',
		    'parent'      => $shop_masonry_gallery_item_banner_type_container,
		    'button_text' => '',
		    'fields'      => array_merge( array(
			    array(
				    'type'        => 'image',
				    'name'        => 'image',
				    'label'       => esc_html__( 'Image', 'onea-core' ),
				    'col_width'   => '4'
			    ),
		    	array(
				    'type'        => 'text',
				    'name'        => 'title',
				    'label'       => esc_html__( 'Title', 'onea-core' ),
				    'col_width'   => '4'
			    ),
			    array(
				    'type'        => 'select',
				    'name'        => 'title_tag',
				    'label'       => esc_html__( 'Title Tag', 'onea-core' ),
				    'options' => onea_elated_get_title_tag(),
				    'col_width'   => '4',
				    'args'        => array(
					    'col_width' => 12,
					    'select2'  => true
				    ),
			    ),
			    array(
				    'type'        => 'text',
				    'name'        => 'button_text',
				    'label'       => esc_html__( 'Button Text', 'onea-core' ),
				    'col_width'   => '4'
			    ),
			    array(
				    'type'        => 'text',
				    'name'        => 'button_link',
				    'label'       => esc_html__( 'Button Link', 'onea-core' ),
				    'col_width'   => '4'
			    ),
			    array(
				    'type'        => 'select',
				    'name'        => 'button_target',
				    'label'       => esc_html__( 'Button Target', 'onea-core' ),
				    'options' => onea_elated_get_link_target_array(),
				    'col_width'   => '4',
				    'args'        => array(
					    'col_width' => 12,
					    'select2'  => true
				    ),
			    ),

		    ) )
	    ) );
    }

    add_action('onea_elated_action_meta_boxes_map', 'onea_core_map_shop_masonry_gallery_meta', 45);
}