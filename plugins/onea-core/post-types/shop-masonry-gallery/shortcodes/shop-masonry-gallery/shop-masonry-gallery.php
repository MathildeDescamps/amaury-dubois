<?php

namespace OneaCore\CPT\Shortcodes\ShopMasonryGallery;

use OneaCore\Lib;

class ShopMasonryGallery implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'eltdf_shop_masonry_gallery';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Shop Masonry Gallery category filter
		add_filter( 'vc_autocomplete_eltdf_shop_masonry_gallery_category_callback', array( &$this, 'shopMasonryGalleryCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Shop Masonry Gallery category render
		add_filter( 'vc_autocomplete_eltdf_shop_masonry_gallery_category_render', array( &$this, 'shopMasonryGalleryCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Onea Shop Masonry Gallery', 'onea-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by ONEA', 'onea-core' ),
					'icon'                      => 'icon-wpb-shop-masonry-gallery extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'number',
							'heading'    => esc_html__( 'Number of Items', 'onea-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'onea-core' ),
							'value'       => array_flip( onea_elated_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__( 'Category', 'onea-core' ),
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'onea-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order_by',
							'heading'     => esc_html__( 'Order By', 'onea-core' ),
							'value'       => array_flip( onea_elated_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'onea-core' ),
							'value'       => array_flip( onea_elated_get_query_order_array() ),
							'save_always' => true
						)
					)
				)
			);
		}
	}

	public function render( $atts, $content = null ) {
		$default_args = array(
			'number'              => - 1,
			'space_between_items' => 'normal',
			'category'            => '',
			'order_by'            => 'date',
			'order'               => 'ASC'
		);

		$params = shortcode_atts( $default_args, $atts );

		$query_array     = $this->getQueryArray( $params );
		$query = new \WP_Query( $query_array );

		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_data']    = $this->getHolderDataAttr( $params );
		$params['this_object']  = $this;
		$params['query'] = $query;

		$html = onea_core_get_cpt_shortcode_module_template_part( 'shop-masonry-gallery', 'shop-masonry-gallery', 'shop-masonry-gallery-holder', '', $params );

		return $html;
	}

	/**
	 * This function return type of shop masonry
	 */
	public function getType() {

		$type = get_post_meta( get_the_ID(), 'eltdf_shop_masonry_gallery_item_type', true );
		return !empty( $type ) ? $type : 'standard_product';
	}

	/**
	 * Get params for item standard type
	 * @param $params
	 *
	 * @return array
	 */
	public function getStandardParams($params) {

		$templates = array();
		$templates_params = array();

		$this_object = $params['this_object'];

		$templates_params['product_id']          = get_post_meta( get_the_ID(), 'eltdf_shop_masonry_gallery_standard_product_item_id', true );

		$templates['product_id']          = $templates_params['product_id'];
		$templates['title_html']          = $this_object->getItemTitleHtml( $templates_params );
		$templates['price_html']          = $this_object->getItemPriceHtml( $templates_params );
		$templates['button_html']         = $this_object->getItemButtonHtml( $templates_params );

		$templates['featured_image_html'] = $this_object->getItemFeaturedImageHtml( $templates_params );
		$templates['category_html']       = $this_object->getItemCategoryHtml( $templates_params );

		return $templates;
	}

	/**
	 * Get params for item gallery type
	 * @param $params
	 *
	 * @return array
	 */
	public function getGalleryParams($params) {

		$templates = array();
		$templates_params = array();

		$this_object = $params['this_object'];
		$templates_params['product_id']      = get_post_meta( get_the_ID(), 'eltdf_shop_masonry_gallery_gallery_product_item_id', true );

		$templates['product_id']      = $templates_params['product_id'];
		$templates['title_html']      = $this_object->getItemTitleHtml( $templates_params );
		$templates['category_html']      = $this_object->getItemCategoryHtml( $templates_params );
        $templates['price_html']      = $this_object->getItemPriceHtml( $templates_params );
		$templates['button_html']     = $this_object->getItemButtonHtml( $templates_params );

		$templates['thumbnails_html'] = $this_object->getItemThumbnailsHtml( $templates_params );

		return $templates;
	}

	/**
	 * Get params for item banner type
	 * @param $params
	 *
	 * @return array
	 */
	public function getBannerParams($params) {

		$templates = array();

		$this_object = $params['this_object'];

		$templates['image_size'] = $this_object->getImageSize();
		$templates['banners']    = get_post_meta( get_the_ID(), 'shop_masonry_gallery_item_banner', true );

		return $templates;
	}



	/**
	 * @return string of classes for item
	 */
	public function getItemClasses() {
		$classes = array( 'eltdf-smg-item' );

		$item_ID          = get_the_ID();
		$type            = get_post_meta( $item_ID, 'eltdf_shop_masonry_gallery_item_type', true );
		$image_size      = get_post_meta( $item_ID, 'eltdf_shop_masonry_gallery_item_size', true );

		if ( ! empty( $type ) ) {
			$classes[] = 'eltdf-smg-' . $type;
		}

		if ( ! empty( $image_size ) ) {
			$classes[] = 'eltdf-smg-' . $image_size;
		}

		return implode( ' ', $classes );
	}

	/**
	 * Generates product title html based on id
	 *
	 * @param $params
	 *
	 * @return string html
	 */
	public function getItemTitleHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$title              = get_the_title( $product_id );
		$title_tag          = 'h5';

		if ( ! empty( $title ) ) {
			$html = '<' . esc_attr( $title_tag ) . ' itemprop="name" class="eltdf-smg-title entry-title">';
			$html .= '<a itemprop="url" href="' . esc_url( get_the_permalink( $product_id ) ) . '">' . esc_html( $title ) . '</a>';
			$html .= '</' . esc_attr( $title_tag ) . '>';
		}

		return $html;
	}

	/**
	 * Generates product price html based on id
	 *
	 * @param $params
	 *
	 * @return string html
	 */
	public function getItemPriceHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$product            = wc_get_product( $product_id );

		if($product) {
            if ($price_html = $product->get_price_html()) {
                $html = '<div class="eltdf-smg-price">' . $price_html . '</div>';
            }
        } else {
            $html = 'No products match given ID';
        }

		return $html;
	}

	/**
	 * Generates product button html based on id
	 *
	 * @param $params
	 *
	 * @return string html
	 */
	public function getItemButtonHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$product            = wc_get_product( $product_id );

		$buttonSkinClass = '';
		if(!empty($button_skin)) {
			$buttonSkinClass = 'eltdf-'.$button_skin.'-skin';
		}
        if($product) {
            if (!$product->is_in_stock()) {
                $button_classes = 'button ajax_add_to_cart eltdf-button';
            } else if ($product->get_type() === 'variable') {
                $button_classes = 'button product_type_variable add_to_cart_button eltdf-button';
            } else if ($product->get_type() === 'external') {
                $button_classes = 'button product_type_external eltdf-button';
            } else {
                $button_classes = 'button add_to_cart_button ajax_add_to_cart eltdf-button';
            }

		$html .= '<div class="eltdf-smg-icons-holder">';
		$html .= apply_filters( 'onea_elated_filter_product_list_add_to_cart_link',
			sprintf( '<div class="eltdf-smg-add-to-cart eltdf-default-skin"><a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a></div>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				esc_attr( $button_classes ),
				esc_html( $product->add_to_cart_text() )
			),
			$product );

        $label = esc_html( get_option( 'yith-wcqv-button-label' ) );

		$html .= '<a href="#" class="yith-quickview-button yith-wcqv-button" data-product_id="'.$product->get_id().'">'.$label.'</a>';

        $html .= do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$product->get_id().']');
		$html .= '</div>';

        } else {
            $html = 'No products match given ID';
        }


		return $html;
	}

	/**
	 * Generates product featured image html based on id
	 * ONLY FOR STANDARD TYPE
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemFeaturedImageHtml( $params ) {
		$html                = '';
		$product_id          = $params['product_id'];

		$ratio = onea_core_get_shop_masonry_image_ration();
		$width = $height = onea_core_get_shop_masonry_image_default_size();

		$itemID          = get_the_ID();
		$image_size      = get_post_meta( $itemID, 'eltdf_shop_masonry_gallery_item_size', true );

		switch ($image_size) {
			case 'rectangle-portrait' :
			case 'rectangle-portrait-big' : {
				$width /= $ratio;
			} break;
			case 'rectangle-landscape' : {
				$height /= $ratio;
			} break;
		}

		$featured_image = onea_elated_generate_thumbnail(get_post_thumbnail_id( $product_id ), null, $width, $height);

		if ( ! empty( $featured_image ) ) {
			$html = '<a itemprop="url" class="eltdf-smg-img" href="' . esc_url( get_the_permalink( $product_id ) ) . '">' . $featured_image . '</a>';
		}

		return $html;
	}

	/**
	 * Generates product categories html based on id
	 * ONLY FOR STANDARD TYPE
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemCategoryHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$categories         = wp_get_post_terms( $product_id, 'product_cat' );

		if ( ! empty( $categories ) ) {
			$html .= '<div class="eltdf-smg-category">';
				foreach ( $categories as $cat ) {
					$html .= '<a itemprop="url" class="eltdf-smg-category-item" href="' . esc_url( get_term_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
				}
			$html .= '</div>';
		}

		return $html;
	}

	/**
	 * Generates product thumbnails based on id
	 * ONLY FOR GALLERY TYPE
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemThumbnailsHtml( $params ) {

		$html = '';
		$product_id         = $params['product_id'];
		$product            = wc_get_product( $product_id );

        if($product) {
            $attachment_ids 	= $product->get_gallery_image_ids();

            $ratio = onea_core_get_shop_masonry_image_ration();
            $width = $height = onea_core_get_shop_masonry_image_default_size();

            $itemID          = get_the_ID();
            $image_size      = get_post_meta( $itemID, 'eltdf_shop_masonry_gallery_item_size', true );


            switch ($image_size) {
                case 'rectangle-portrait' :
                case 'rectangle-portrait-big' :
                    {
                        $width /= $ratio;
                    }
                    break;
                case 'rectangle-landscape' :
                    {
                        $height /= $ratio;
                    }
                    break;
            }

            $html .= '<div class="images eltdf-smg-gallery eltdf-owl-slider">';
            $html .= '<div class="item">';
            $html .= onea_elated_generate_thumbnail(get_post_thumbnail_id( $product_id ), null, $width, $height);
            $html .= '</div>';
            if ( $attachment_ids ) {
                foreach ($attachment_ids as $attachment_id) {
                    $image_link = wp_get_attachment_url($attachment_id);
                    if ($image_link !== '') {
                        $html .= '<div class="item">';
                        $html .= onea_elated_generate_thumbnail($attachment_id, null, $width, $height);
                        $html .= '</div>';
                    }
                }
            }
            $html .= '</div>';

        } else {
            $html = 'No products match given ID';
        }

        return $html;
	}

	private function getHolderDataAttr( $space_between_items ) {
		$data = array();

		if ( ! empty( $space_between_items ) ) {
			$data['data-space-between-items'] = $space_between_items;
		}

		return $data;
	}

	/**
	 * Generates width and height
	 * ONLY FOR BANNER TYPE
	 *
	 * @return array
	 */
	public function getImageSize( ) {

		$ratio = onea_core_get_shop_masonry_image_ration();
		$width = $height = onea_core_get_shop_masonry_image_default_size();

		$itemID          = get_the_ID();
		$image_size      = get_post_meta( $itemID, 'eltdf_shop_masonry_gallery_item_size', true );

		switch ($image_size) {
			case 'rectangle-portrait' :
			case 'rectangle-portrait-big' : {
				$width /= $ratio;
			} break;
			case 'rectangle-landscape' : {
				$height /= $ratio;
			} break;
		}

		return array(
			'width' => $width,
			'height' => $height,
		);
	}

	/**
	 * Filter shop masonry gallery categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function shopMasonryGalleryCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS shop_masonry_gallery_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'shop-masonry-gallery-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['shop_masonry_gallery_category_title'] ) > 0 ) ? esc_html__( 'Category', 'onea-core' ) . ': ' . $value['shop_masonry_gallery_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find shop masonry gallery category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function shopMasonryGalleryCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$shop_masonry_gallery_category = get_term_by( 'slug', $query, 'shop-masonry-gallery-category' );
			if ( is_object( $shop_masonry_gallery_category ) ) {

				$shop_masonry_gallery_category_slug  = $shop_masonry_gallery_category->slug;
				$shop_masonry_gallery_category_title = $shop_masonry_gallery_category->name;

				$shop_masonry_gallery_category_title_display = '';
				if ( ! empty( $shop_masonry_gallery_category_title ) ) {
					$shop_masonry_gallery_category_title_display = esc_html__( 'Category', 'onea-core' ) . ': ' . $shop_masonry_gallery_category_title;
				}

				$data          = array();
				$data['value'] = $shop_masonry_gallery_category_slug;
				$data['label'] = $shop_masonry_gallery_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * This is function that returns query params
	 *
	 * @param $params array
	 *
	 * @return array
	 */
	private function getQueryArray( $params ) {

		/* Query for items */
		$query_args = array(
			'post_type'      => 'shop-masonry-gallery',
			'orderby'        => $params['order_by'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number']
		);

		if ( ! empty( $params['category'] ) ) {
			$query_args['shop-masonry-gallery-category'] = $params['category'];
		}

		return $query_args;

	}

	private function getHolderClasses($params ) {

		$classes = array();

		if ( ! empty( $space_between_items ) ) {
			$classes[] = 'eltdf-' . $params['space_between_items'] . '-space';
		}


		return implode( ' ', $classes );

	}

}