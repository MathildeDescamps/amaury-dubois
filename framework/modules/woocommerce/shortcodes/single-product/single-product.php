<?php
namespace OneaCore\CPT\Shortcodes\SingleProduct;

use OneaCore\Lib;

class SingleProduct implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_single_product';
		
		add_action('vc_before_init', array($this,'vcMap'));
		
		//Product id filter
		add_filter( 'vc_autocomplete_eltdf_single_product_product_id_callback', array( &$this, 'productIdAutocompleteSuggester', ), 10, 1 );
		
		//Product id render
		add_filter( 'vc_autocomplete_eltdf_single_product_product_id_render', array( &$this, 'productIdAutocompleteRender', ), 10, 1 );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Single Product', 'onea' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ONEA', 'onea' ),
					'icon'                      => 'icon-wpb-single-product extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'product_id',
							'heading'     => esc_html__( 'Selected Product', 'onea' ),
							'settings'    => array(
								'sortable'      => true,
								'unique_values' => true
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => esc_html__( 'If you left this field empty then product ID will be of the current page', 'onea' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'onea' ),
							'value'       => array_flip( onea_elated_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'description' => esc_html__( 'Set title tag for product title element', 'onea' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_text_outside',
							'heading'     => esc_html__( 'Enable Text Outside', 'onea' ),
							'value'       => array_flip( onea_elated_get_yes_no_select_array(false)),
							'save_always' => true,
							'description' => esc_html__( 'Set text to be outside layer', 'onea' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_break_words',
							'heading'     => esc_html__( 'Position of Line Breaks', 'onea' ),
							'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break (e.g. if you would like the line break after first, third, and fourth word , you would enter "1,3,4")', 'onea' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'small_image_size',
							'heading'    => esc_html__( 'Small Image Proportions', 'onea' ),
							'value'      => array(
								esc_html__( 'Default', 'onea' )        => '',
								esc_html__( 'Original', 'onea' )       => 'full',
								esc_html__( 'Square', 'onea' )         => 'onea_elated_image_square',
								esc_html__( 'Landscape', 'onea' )      => 'onea_elated_image_landscape',
								esc_html__( 'Portrait', 'onea' )       => 'onea_elated_image_portrait',
								esc_html__( 'Custom', 'onea')          => 'custom'
							),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'small_custom_image_width',
							'heading'     => esc_html__('Custom Small Image Width', 'onea'),
							'description' => esc_html__('Enter Small image width in px', 'onea'),
							'dependency'  => array('element' => 'small_image_size', 'value' => 'custom')
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'small_custom_image_height',
							'heading'     => esc_html__('Custom Small Image Height', 'onea'),
							'description' => esc_html__('Enter Small image height in px', 'onea'),
							'dependency'  => array('element' => 'small_image_size', 'value' => 'custom')
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'featured_image_size',
							'heading'    => esc_html__( 'Featured Image Proportions', 'onea' ),
							'value'      => array(
								esc_html__( 'Default', 'onea' )        => '',
								esc_html__( 'Original', 'onea' )       => 'full',
								esc_html__( 'Square', 'onea' )         => 'onea_elated_image_square',
								esc_html__( 'Landscape', 'onea' )      => 'onea_elated_image_landscape',
								esc_html__( 'Portrait', 'onea' )       => 'onea_elated_image_portrait',
								esc_html__( 'Custom', 'onea')          => 'custom'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'featured_image_position',
							'heading'    => esc_html__( 'Featured Image Prosition', 'onea' ),
							'value'      => array(
								esc_html__( 'Left', 'onea' )        => 'left',
								esc_html__( 'Right', 'onea' )       => 'right'
							),
							'save_always' => true
						),
						array(
				            'type'        => 'textfield',
				            'param_name'  => 'featured_custom_image_width',
				            'heading'     => esc_html__('Custom Featured Image Width', 'onea'),
				            'description' => esc_html__('Enter Featured image width in px', 'onea'),
				            'dependency'  => array('element' => 'featured_image_size', 'value' => 'custom')
				        ),
				        array(
				            'type'        => 'textfield',
				            'param_name'  => 'featured_custom_image_height',
				            'heading'     => esc_html__('Custom Featured Image Height', 'onea'),
				            'description' => esc_html__('Enter Featured image height in px', 'onea'),
				            'dependency'  => array('element' => 'featured_image_size', 'value' => 'custom')
				        ),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_button',
							'heading'    => esc_html__( 'Enable Button', 'onea' ),
							'value'      => array(
								esc_html__( 'Yes', 'onea' )        => 'yes',
								esc_html__( 'Right', 'onea' )       => 'no'
							),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_text',
							'heading'     => esc_html__('Button Text', 'onea'),
							'dependency'  => array('element' => 'enable_button', 'value' => 'yes')
						),
					)
				)
			);
		}
    }
	
    public function render($atts, $content = null) {
        $args = array(
	        'product_id'                  => '',
	        'title_tag'                   => 'h3',
	        'title_break_words'           => '',
	        'enable_text_outside'         => 'no',
	        'small_image_size'            => 'full',
	        'small_custom_image_width'    => '',
	        'small_custom_image_height'   => '',
	        'featured_image_size'         => 'full',
	        'featured_image_position'     => 'left',
	        'featured_custom_image_width' => '',
	        'featured_custom_image_height'=> '',
	        'enable_button'               => 'yes',
	        'button_text'                 => 'Learn More'
        );

		$params = shortcode_atts($args, $atts);

	    $params['product_id']          = ! empty( $params['product_id'] ) ? $params['product_id'] : get_the_ID();
	    $params['title_tag']           = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
	    $params['featured_image_size'] = ! empty( $params['featured_image_size'] ) ? $params['featured_image_size'] : $args['featured_image_size'];

	    $classes = array('eltdf-product-single', 'eltdf-product-single-featured-' . $params['featured_image_position']);
	    $classes[] = $params['enable_text_outside'] === 'yes' ? 'eltdf-product-text-outside' : '';


	    $product = wc_get_product( $params['product_id'] );

	    $product_params = array(
		    'product_id'                   => $params['product_id'],
		    'categories'                   => wp_get_post_terms( $params['product_id'], 'product_cat' ),
		    'title'                        => get_the_title( $params['product_id'] ),
		    'title_break_words'            => $params['title_break_words'],
		    'title_tag'                    => $params['title_tag'],
		    'featured_image_size'          => $params['featured_image_size'],
		    'featured_image_position'      => $params['featured_image_position'],
		    'featured_custom_image_width'  => $params['featured_custom_image_width'],
		    'featured_custom_image_height' => $params['featured_custom_image_height'],
		    'small_image_size'             => $params['small_image_size'],
		    'small_custom_image_width'     => $params['small_custom_image_width'],
		    'small_custom_image_height'    => $params['small_custom_image_height'],
		    'price'                        => ! empty( $product ) ? $product->get_price_html() : '',
		    'rating'                       => $this->getItemRatingHtml( $params ),
		    'enable_button'                => $params['enable_button'],
		    'button_text'                  => $params['button_text'],
		    'classes'                      => $classes
	    );

	    $product_params['title'] = $this->getModifiedTitle( $product_params );

		$html = onea_elated_get_woo_shortcode_module_template_part( 'templates/single-product-template', 'single-product', '', $product_params );

        return $html;
	}

	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$title_break_words = str_replace( ' ', '', $params['title_break_words'] );

		if ( ! empty( $title ) ) {
			$split_title = explode( ' ', $title );
			$break_words = explode( ',', $title_break_words );
			$end_string  = count( $split_title );

			if ( ! empty( $title_break_words ) ) {
				foreach ( $break_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = $split_title[ $value - 1 ] . '<br />';
					}
				}
			}

			$title = implode( ' ', $split_title );
		}

		return $title;
	}
	
	public function getItemRatingHtml( $params ) {
		$html               = '';
		$product_id         = $params['product_id'];
		$product            = wc_get_product( $product_id );
		
		if ( ! empty( $product ) && get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$average = $product->get_average_rating();
			
			$html = '<div class="eltdf-sp-rating" title="' . sprintf( esc_attr__( "Rated %s out of 5", "onea" ), $average ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"></span></div>';
		}
		
		return $html;
	}
	
	/**
	 * Filter product by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function productIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$product_id = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'product' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $product_id > 0 ? $product_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'onea' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'onea' ) . ': ' . $value['title'] : '' );
				$results[] = $data;
			}
		}

		return $results;

	}

	/**
	 * Find product by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function productIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			
			$product = get_post( (int) $query );
			if ( ! is_wp_error( $product ) ) {
				
				$product_id = $product->ID;
				$product_title = $product->post_title;
				
				$product_title_display = '';
				if ( ! empty( $product_title ) ) {
					$product_title_display = ' - ' . esc_html__( 'Title', 'onea' ) . ': ' . $product_title;
				}
				
				$product_id_display = esc_html__( 'Id', 'onea' ) . ': ' . $product_id;

				$data          = array();
				$data['value'] = $product_id;
				$data['label'] = $product_id_display . $product_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
}