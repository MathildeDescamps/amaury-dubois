<?php

namespace OneaCore\CPT\Shortcodes\ProductListAnimated;

use OneaCore\Lib;

class ProductListAnimated implements Lib\ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {

		$this->base = 'eltdf_product_list_animated';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Product List - Animated', 'onea'),
			'base' => $this->base,
			'icon' => 'icon-wpb-product-list-animated extended-custom-icon',
			'category'                  => esc_html__('by ONEA', 'onea'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
							'type'   	  => 'dropdown',
							'heading' 	  => esc_html__('Enable Animation', 'onea'),
							'param_name'  => 'enable_animation',
							'value'       => array_flip(onea_elated_get_yes_no_select_array(false, true))
					),
					array(
						'type'   	  => 'textfield',
						'holder' 	  => 'div',
						'class'  	  => '',
						'heading' 	  => esc_html__('Number of Products', 'onea'),
						'param_name'  => 'number_of_posts',
						'description' => ''
					),
                    array(
                        'type' 		  => 'dropdown',
                        'holder' 	  => 'div',
                        'class' 	  => '',
                        'heading'	  => esc_html__('Number of Columns', 'onea'),
                        'param_name'  => 'number_of_columns',
                        'value' => array(
							esc_html__('One', 'onea')   => '1',
							esc_html__('Two', 'onea')   => '2',
							esc_html__('Three', 'onea') => '3',
							esc_html__('Four', 'onea')  => '4',
							esc_html__('Five', 'onea')  => '5',
							esc_html__('Six', 'onea')   => '6'
                        ),
                        'description' => '',
                        'save_always' => true
                    ),
					array(
						'type' 	 	 => 'dropdown',
						'holder'  	 => 'div',
						'class'   	 => '',
						'heading'	 => esc_html__('Order By', 'onea'),
						'param_name' => 'order_by',
						'value' 	 => array(
							esc_html__('Title', 'onea') 		=> 'title',
							esc_html__('Date', 'onea') 		=> 'date',
							esc_html__('Random', 'onea')     => 'rand',
							esc_html__('Post Name', 'onea')  => 'name',
							esc_html__('ID', 'onea') 		=> 'id',
                            esc_html__('Menu Order', 'onea') => 'menu_order'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' 		  => 'dropdown',
						'holder' 	  => 'div',
						'class' 	  => '',
						'heading' 	  => esc_html__('Order', 'onea'),
						'param_name'  => 'order',
						'value' 	  => array(
							esc_html__('ASC', 'onea')  => 'ASC',
							esc_html__('DESC', 'onea') => 'DESC'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
	                    'type' 		   => 'dropdown',
	                    'heading'	   => esc_html__('Choose Sorting Taxonomy', 'onea'),
	                    'param_name'   => 'taxonomy_to_display',
	                    'value' 	   => array(
	                        esc_html__('Category', 'onea') => 'category',
	                        esc_html__('Tag', 'onea') => 'tag',
	                        esc_html__('Id', 'onea') => 'id'
	                    ),
	                    'save_always'  => true,
	                    'admin_label'  => true,
	                    'description'  => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display.', 'onea')
	                ),
	                array(
	                    'type' 	 	  => 'textfield',
	                    'heading' 	  => esc_html__('Enter Taxonomy Values', 'onea'),
	                    'param_name'  => 'taxonomy_values',
	                    'value' 	  => '',
	                    'admin_label' => true,
	                    'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'onea')
	                ),
	                array(
						'type'		  => 'dropdown',
						'heading' 	  => esc_html__('Image Proportions', 'onea'),
						'param_name'  => 'image_size',
						'value' => array(
							esc_html__('Default', 'onea') => '',
							esc_html__('Original', 'onea') => 'original',
							esc_html__('Square', 'onea') => 'square',
							esc_html__('Landscape', 'onea') => 'landscape',
						),
						'save_always' => true
					),
                    array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_button',
                            'heading'    => esc_html__('Display Button', 'onea'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'group'      => esc_html__('Product Info', 'onea')
                    ),
                    array(
                            'type'       => 'dropdown',
                            'param_name' => 'button_skin',
                            'heading'    => esc_html__('Button Skin', 'onea'),
                            'value'      => array(
                                    esc_html__('Default', 'onea') => 'default',
                                    esc_html__('Light', 'onea')   => 'light',
                                    esc_html__('Dark', 'onea')    => 'dark'
                            ),
                            'dependency' => array('element' => 'display_button', 'value' => array('yes')),
                            'group'      => esc_html__('Button Style', 'onea')
                    ),
                    array(
                            'type'        => 'dropdown',
                            'param_name'  => 'add_to_cart_in_box',
                            'heading'     => esc_html__('Button Position', 'onea'),
                            'value'       => array(
                                    esc_html__('In the Box', 'onea') => '',
                                    esc_html__('Outside of the Box', 'onea')    => 'no',
                            ),
                            'dependency'  => array('element' => 'display_button', 'value' => array('yes')),
                            'description' => esc_html__('This option is available only if "Info On Image Hover" is chosen as Product Info Position', 'onea'),
                            'group'       => esc_html__('Button Style', 'onea')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'display_category',
                        'heading'    => esc_html__('Display Category', 'onea'),
                        'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                        'group'      => esc_html__('Product Info', 'onea')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'display_excerpt',
                        'heading'    => esc_html__('Display Excerpt', 'onea'),
                        'value'      => array_flip(onea_elated_get_yes_no_select_array(false)),
                        'group'      => esc_html__('Product Info', 'onea')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'excerpt_length',
                        'heading'     => esc_html__('Excerpt Length', 'onea'),
                        'description' => esc_html__('Number of characters', 'onea'),
                        'dependency'  => array('element' => 'display_excerpt', 'value' => array('yes')),
                        'group'       => esc_html__('Excerpt Style', 'onea')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'excerpt_margin_bottom',
                        'heading'    => esc_html__('Excerpt Margin Bottom (px)', 'onea'),
                        'dependency' => array('element' => 'display_excerpt', 'value' => array('yes')),
                        'group'      => esc_html__('Excerpt Style', 'onea')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'display_price',
                        'heading'    => esc_html__('Display Price', 'onea'),
                        'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                        'group'      => esc_html__('Product Info', 'onea')
                    ),
	                array(
						'type' 		  => 'colorpicker',
						'holder'      => 'div',
						'heading'     => esc_html__('Shader Background Color', 'onea'),
						'param_name'  => 'shader_background_color',
						'description' => '',
						'group'		  => esc_html__('Product Info', 'onea')
					),
                    array(
                            'type' 		  => 'dropdown',
                            'holder' 	  => 'div',
                            'class' 	  => '',
                            'heading' 	  => esc_html__('Display Rating', 'onea'),
                            'param_name'  => 'display_rating',
                            'value' 	  => array_flip(onea_elated_get_yes_no_select_array(false)),
                            'save_always' => true,
                            'description' => '',
                            'group'		  => esc_html__('Product Info', 'onea')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'hover_type',
                        'heading'     => esc_html__('Hover Type', 'onea'),
                        'value'       => array(
                            esc_html__('Simple', 'onea')         => 'simple',
                            esc_html__('Standard Dark', 'onea')  => 'standard-dark',
                            esc_html__('Standard Light', 'onea') => 'standard-light',
                            esc_html__('None', 'onea')           => 'none',
                        ),
                        'save_always' => true,
                        'group'       => esc_html__('Product Info', 'onea')
                    ),
					array(
						'type'		  => 'dropdown',
						'admin_label' => true,
						'heading'	  => esc_html__('Title Tag', 'onea'),
						'param_name'  => 'title_tag',
						'value'		  => array_flip(onea_elated_get_title_tag(true)),
						'save_always' => true,
						'description' => '',
						'dependency'  => array('element' => 'display_title', 'value' => array('yes')),
						'group'		  => esc_html__('Title Style', 'onea')
					),
					array(
						'type'        => 'dropdown',
						'holder'      => 'div',
						'class'       => '',
						'heading'     => esc_html__('Title Text Transform', 'onea'),
						'param_name'  => 'title_transform',
						'value'       => array(
							esc_html__('Default', 'onea') 	 => '',
							esc_html__('None', 'onea') 		 => 'none',
							esc_html__('Capitalize', 'onea')  => 'capitalize',
							esc_html__('Lowercase', 'onea')   => 'lowercase',
							esc_html__('Uppercase', 'onea')   => 'uppercase'
						),
						'save_always' => true,
						'description' => '',
						'dependency'  => array('element' => 'display_title', 'value' => array('yes')),
						'group'		  => esc_html__('Title Style', 'onea')
					),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'title_margin_bottom',
                        'heading'    => esc_html__('Title Margin Bottom (px)', 'onea'),
                        'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                        'group'      => esc_html__('Title Style', 'onea')
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'info_bottom_margin',
                        'heading'    => esc_html__('Product Info Bottom Margin (px)', 'onea'),
                        'dependency' => array('element' => 'info_position', 'value' => array('info-below-image','info-below-image-icons-on')),
                        'group'      => esc_html__('Product Info', 'onea')
                    ),
				)
		) );
	}

	public function render($atts, $content = null) {
		
		$default_atts = array(
			'enable_animation'		  => 'yes',
            'number_of_posts' 		  => '8',
            'number_of_columns' 	  => '4',
            'order_by' 				  => '',
            'order' 				  => '',
            'taxonomy_to_display' 	  => 'category',
            'taxonomy_values' 		  => '',
            'image_size'			  => '',
            'shader_background_color' => '',
            'hover_type'              => 'standard-dark',
            'title_tag'				  => 'h5',
            'title_transform'		  => 'lowercase',
            'display_rating' 		  => 'no',
            'display_button'          => 'yes',
            'button_skin'             => 'default',
            'add_to_cart_in_box'      => 'yes',
            'display_title'           => 'yes',
            'title_margin_bottom'     => '',
            'display_excerpt'         => 'no',
            'excerpt_length'          => '50',
            'excerpt_margin_bottom'   => '',
            'display_category'        => 'yes',
            'display_price'           => 'yes',
            'info_bottom_text_align'  => 'center',
            'info_bottom_margin'      => ''
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
        $params['class_name'] = 'pla';
		$params['holder_classes'] = $this->getHolderClasses($params);
        $params['title_styles'] = $this->getTitleStyles($params);
        $params['excerpt_styles'] = $this->getExcerptStyles($params);
        $params['text_wrapper_styles'] = $this->getTextWrapperStyles($params);

        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);

		$params['shader_styles'] = $this->getShaderStyles($params);

		$queryArray = $this->generateProductQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	

		$html = onea_elated_get_woo_shortcode_module_template_part('templates/product-list-animated', 'product-list-animated', '', $params);

		return $html;	
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getHolderClasses($params){
		$holderClasses = '';
		$enable_animation = '';

        $columnNumber = $this->getColumnNumberClass($params);

		if($params['enable_animation'] == 'no'){
			$enable_animation = 'eltdf-pla-animation-disabled';
		}
        $holderClasses .= ($params['add_to_cart_in_box'] !== 'no') ? 'eltdf-product-add-to-cart-in-box' : '';
        $holderClasses .= !empty($params['hover_type']) ? ' eltdf-hover-type-' . $params['hover_type'] . ' ' : '';

        $holderClasses .= $columnNumber . ' ' . $enable_animation;
		
		return $holderClasses;
	}

    /**
    * Returns custom styles for Wrapper
    *
    * @param $params
    *
    * @return string
    */
    public function getTextWrapperStyles($params) {
        $styles = array();

        if (!empty($params['info_bottom_text_align'])) {
            $styles[] = 'text-align: ' . $params['info_bottom_text_align'];
        }

        if ($params['info_bottom_margin'] !== '') {
            $styles[] = 'margin-bottom: ' . onea_elated_filter_px($params['info_bottom_margin']) . 'px';
        }

        return implode(';', $styles);
    }

    /**
     * Generates columns number classes for product list holder
     *
     * @param $params
     *
     * @return string
     */
    private function getColumnNumberClass($params){

        $columnsNumber = '';
        $columns = $params['number_of_columns'];

        switch ($columns) {
            case 1:
                $columnsNumber = 'eltdf-one-column';
                break;
            case 2:
                $columnsNumber = 'eltdf-two-columns';
                break;
            case 3:
                $columnsNumber = 'eltdf-three-columns';
                break;
            case 4:
                $columnsNumber = 'eltdf-four-columns';
                break;
            case 5:
                $columnsNumber = 'eltdf-five-columns';
                break;
            case 6:
                $columnsNumber = 'eltdf-six-columns';
                break;        
            default:
                $columnsNumber = 'eltdf-four-columns';
                break;
        }

        return $columnsNumber;
    }

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateProductQueryArray($params){
		
		$queryArray = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $params['number_of_posts'],
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'meta_query' => WC()->query->get_meta_query()
		);

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
	}

	/**
     * Return Style for Title
     *
     * @param $params
     * @return string
     */
    private function getTitleStyles($params) {
        $item_styles = array();
		
        if ($params['title_transform'] !== '') {
            $item_styles[] = 'text-transform: '.$params['title_transform'];
        }

        if (!empty($params['title_margin_bottom'])) {
            $item_styles[] = 'margin-bottom: ' . onea_elated_filter_px($params['title_margin_bottom']) . 'px';
        }

		return implode(';', $item_styles);
    }

    /**
     * Return Style for Shader
     *
     * @param $params
     * @return string
     */
    private function getShaderStyles($params) {
        $item_styles = array();

        if ($params['shader_background_color'] !== '') {
            $item_styles[] = 'background-color: '.$params['shader_background_color'];
        }

		return implode(';', $item_styles);
    }

    /**
     * Returns custom styles for Excerpt
     *
     * @param $params
     *
     * @return string
     */
    public function getExcerptStyles($params) {
        $styles = array();

        if (!empty($params['excerpt_margin_bottom'])) {
            $styles[] = 'margin-bottom: ' . onea_elated_filter_px($params['excerpt_margin_bottom']) . 'px';
        }

        return implode(';', $styles);
    }
}