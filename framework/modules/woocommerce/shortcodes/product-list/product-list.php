<?php

namespace OneaCore\CPT\Shortcodes\ProductList;

use OneaCore\Lib;

class ProductList implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'eltdf_product_list';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Product category Only filter
        add_filter('vc_autocomplete_eltdf_product_list_category_values_callback', array(&$this, 'productCategoryOnlyAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Product category Only render
        add_filter('vc_autocomplete_eltdf_product_list_category_values_render', array(&$this, 'productCategoryOnlyAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array

        //Product category filter
        add_filter('vc_autocomplete_eltdf_product_list_taxonomy_category_values_callback', array(&$this, 'productCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Product category render
        add_filter('vc_autocomplete_eltdf_product_list_taxonomy_category_values_render', array(&$this, 'productCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name'                      => esc_html__('Product List', 'onea'),
                    'base'                      => $this->base,
                    'icon'                      => 'icon-wpb-product-list extended-custom-icon',
                    'category'                  => esc_html__('by ONEA', 'onea'),
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array(
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'type',
                            'heading'     => esc_html__('Type', 'onea'),
                            'value'       => array(
                                esc_html__('Standard', 'onea') => 'standard',
                                esc_html__('Masonry', 'onea')  => 'masonry',
                                esc_html__('Carousel', 'onea') => 'carousel'
                            ),
                            'admin_label' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'info_position',
                            'heading'     => esc_html__('Product Info Position', 'onea'),
                            'value'       => array(
                                esc_html__('Info On Image Hover', 'onea') => 'info-on-image',
                                esc_html__('Info Below Image', 'onea')    => 'info-below-image',
                                esc_html__('Info Below Image, icons on image', 'onea')    => 'info-below-image-icons-on',
                                esc_html__('Custom Text Outside', 'onea') => 'info-outside-with-custom-text'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_text',
                            'heading'     => esc_html__('Custom Text', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'description' => esc_html__('This option is available only if "Custom Text Outside" is chosen as Product Info Position', 'onea'),
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'with_custom_text_position',
                            'heading'     => esc_html__('Custom Text Position', 'onea'),
                            'value'       => array(
                                esc_html__('Left', 'onea')  => 'left',
                                esc_html__('Right', 'onea') => 'right',
                            ),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'save_always' => true,
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),

                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_text_font_size',
                            'heading'     => esc_html__('Custom Text Font Size', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'save_always' => true,
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_text_line_height',
                            'heading'     => esc_html__('Custom Text Line Height', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'save_always' => true,
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_title',
                            'heading'     => esc_html__('Custom Title Text', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'description' => esc_html__('This option is available only if "Custom Text Outside" is chosen as Product Info Position', 'onea'),
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_button',
                            'heading'     => esc_html__('Custom Button Text', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'description' => esc_html__('This option is available only if "Custom Text Outside" is chosen as Product Info Position', 'onea'),
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_button_link',
                            'heading'     => esc_html__('Custom Button Link', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'description' => esc_html__('This option is available only if "Custom Text Outside" is chosen as Product Info Position', 'onea'),
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_holder_position_top',
                            'heading'     => esc_html__('Custom Holder Top Position', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'save_always' => true,
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'with_custom_holder_position_left',
                            'heading'     => esc_html__('Custom Holder Left Position', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'save_always' => true,
                            'group'       => esc_html__('Custom Text', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'enable_random_fadein',
                            'heading'    => esc_html__( 'Enable Random FadeIn Effect', 'onea' ),
                            'value'      => array_flip( onea_elated_get_yes_no_select_array( true, true ) )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'number_of_posts',
                            'heading'    => esc_html__('Number of Products', 'onea')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'number_of_columns',
                            'heading'     => esc_html__('Number of Columns', 'onea'),
                            'value'       => array_flip(onea_elated_get_number_of_columns_array(true)),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'space_between_items',
                            'heading'     => esc_html__('Space Between Items', 'onea'),
                            'value'       => array_flip(onea_elated_get_space_between_items_array()),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'number_of_visible_items',
                            'heading'     => esc_html__('Number Of Visible Items', 'onea'),
                            'value'       => array(
                                esc_html__('One', 'onea')   => '1',
                                esc_html__('Two', 'onea')   => '2',
                                esc_html__('Three', 'onea') => '3',
                                esc_html__('Four', 'onea')  => '4',
                                esc_html__('Five', 'onea')  => '5',
                                esc_html__('Six', 'onea')   => '6'
                            ),
                            'save_always' => true,
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'group'       => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'slider_loop',
                            'heading'     => esc_html__('Enable Slider Loop', 'onea'),
                            'value'       => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'group'       => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'slider_autoplay',
                            'heading'     => esc_html__('Enable Slider Autoplay', 'onea'),
                            'value'       => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'group'       => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'slider_speed',
                            'heading'     => esc_html__('Slide Duration', 'onea'),
                            'description' => esc_html__('Default value is 5000 (ms)', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'group'       => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'slider_speed_animation',
                            'heading'     => esc_html__('Slide Animation Duration', 'onea'),
                            'description' => esc_html__('Speed of slide animation in milliseconds. Default value is 600.', 'onea'),
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'group'       => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'slider_navigation',
                            'heading'     => esc_html__('Enable Slider Navigation Arrows', 'onea'),
                            'value'       => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'group'       => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'slider_navigation_position',
                            'heading'    => esc_html__('Slider Navigation Position', 'onea'),
                            'value'      => array(
                                esc_html__('Below Carousel', 'onea')  => 'bellow-slider',
                                esc_html__('Inside Carousel', 'onea') => 'inside-slider'
                            ),
                            'dependency' => array('element' => 'slider_navigation', 'value' => array('yes')),
                            'group'      => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'slider_pagination',
                            'heading'     => esc_html__('Enable Slider Pagination', 'onea'),
                            'value'       => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'dependency'  => array('element' => 'type', 'value' => array('carousel')),
                            'group'       => esc_html__('Carousel Settings', 'onea')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'orderby',
                            'heading'     => esc_html__('Order By', 'onea'),
                            'value'       => array_flip(onea_elated_get_query_order_by_array(false, array('on-sale' => esc_html__('On Sale', 'onea')))),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'order',
                            'heading'     => esc_html__('Order', 'onea'),
                            'value'       => array_flip(onea_elated_get_query_order_array()),
                            'save_always' => true
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'show_category_filter',
                            'heading'    => esc_html__('Show Category Filter', 'onea'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, false)),
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'category_values',
                            'heading'     => esc_html__('Enter Category Values', 'onea'),
                            'settings'    => array(
                                'multiple'      => true,
                                'sortable'      => true,
                                'unique_values' => true
                            ),
                            'description' => esc_html__('Separate values (category slugs) with a comma', 'onea'),
                            'dependency'  => array('element' => 'show_category_filter', 'value' => array('yes')),
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'show_all_item_in_filter',
                            'heading'    => esc_html__('Show "All" Item in Filter', 'onea'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'dependency' => array('element' => 'show_category_filter', 'value' => array('yes')),
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'taxonomy_to_display',
                            'heading'     => esc_html__('Choose Sorting Taxonomy', 'onea'),
                            'value'       => array(
                                esc_html__('Category', 'onea') => 'category',
                                esc_html__('Tag', 'onea')      => 'tag',
                                esc_html__('Id', 'onea')       => 'id'
                            ),
                            'save_always' => true,
                            'dependency'  => array('element' => 'show_category_filter', 'value' => array('no')),
                            'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'taxonomy_values',
                            'heading'     => esc_html__('Enter Taxonomy Values', 'onea'),
                            'dependency'  => array('element' => 'show_category_filter', 'value' => array('no')),
                            'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'image_size',
                            'heading'    => esc_html__('Image Proportions', 'onea'),
                            'value'      => array(
                                esc_html__('Default', 'onea')        => '',
                                esc_html__('Original', 'onea')       => 'full',
                                esc_html__('Square', 'onea')         => 'square',
                                esc_html__('Landscape', 'onea')      => 'landscape',
                                esc_html__('Portrait', 'onea')       => 'portrait',
                                esc_html__('Medium', 'onea')         => 'medium',
                                esc_html__('Large', 'onea')          => 'large',
                                esc_html__('Shop Single', 'onea')    => 'woocommerce_single',
                                esc_html__('Shop Thumbnail', 'onea') => 'woocommerce_thumbnail'
                            )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_title',
                            'heading'    => esc_html__('Display Title', 'onea'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'group'      => esc_html__('Product Info', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'title_tag',
                            'heading'    => esc_html__('Title Tag', 'onea'),
                            'value'      => array_flip(onea_elated_get_title_tag(true)),
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group'      => esc_html__('Title Style', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'title_transform',
                            'heading'    => esc_html__('Title Text Transform', 'onea'),
                            'value'      => array_flip(onea_elated_get_text_transform_array(true)),
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group'      => esc_html__('Title Style', 'onea')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_margin_bottom',
                            'heading'    => esc_html__('Title Margin Bottom (px)', 'onea'),
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group'      => esc_html__('Title Style', 'onea')
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
                            'param_name' => 'display_rating',
                            'heading'    => esc_html__('Display Rating', 'onea'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, false)),
                            'group'      => esc_html__('Product Info', 'onea')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'rating_margin_top',
                            'heading'    => esc_html__('Rating Margin Top (px)', 'onea'),
                            'dependency' => array('element' => 'display_rating', 'value' => array('yes')),
                            'group'      => esc_html__('Rating Style', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_price',
                            'heading'    => esc_html__('Display Price', 'onea'),
                            'value'      => array_flip(onea_elated_get_yes_no_select_array(false, true)),
                            'group'      => esc_html__('Product Info', 'onea')
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'price_color',
                            'heading'    => esc_html__('Price Color', 'onea'),
                            'dependency' => array('element' => 'display_price', 'value' => array('yes')),
                            'group'      => esc_html__('Price Style', 'onea')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'price_font_size',
                            'heading'    => esc_html__('Price Font Size (px)', 'onea'),
                            'dependency' => array('element' => 'display_price', 'value' => array('yes')),
                            'group'      => esc_html__('Price Style', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'price_font_weight',
                            'heading'    => esc_html__('Price Font Weight', 'onea'),
                            'value'      => array_flip(onea_elated_get_font_weight_array(true)),
                            'dependency' => array('element' => 'display_price', 'value' => array('yes')),
                            'group'      => esc_html__('Price Style', 'onea')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'price_margin_top',
                            'heading'    => esc_html__('Price Margin Top (px)', 'onea'),
                            'dependency' => array('element' => 'display_price', 'value' => array('yes')),
                            'group'      => esc_html__('Price Style', 'onea')
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
                            'type'       => 'textfield',
                            'param_name' => 'button_margin_top',
                            'heading'    => esc_html__('Button Margin Top (px)', 'onea'),
                            'dependency' => array('element' => 'display_button', 'value' => array('yes')),
                            'group'      => esc_html__('Button Style', 'onea')
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'shader_background_color',
                            'heading'    => esc_html__('Shader Background Color', 'onea'),
                            'group'      => esc_html__('Product Info Style', 'onea')
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
                            'group'       => esc_html__('Product Info Style', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'info_bottom_text_align',
                            'heading'    => esc_html__('Product Info Text Alignment', 'onea'),
                            'value'      => array(
                                esc_html__('Default', 'onea') => '',
                                esc_html__('Left', 'onea')    => 'left',
                                esc_html__('Center', 'onea')  => 'center',
                                esc_html__('Right', 'onea')   => 'right'
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-below-image','info-below-image-icons-on')),
                            'group'      => esc_html__('Product Info Style', 'onea')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'info_bottom_margin',
                            'heading'    => esc_html__('Product Info Bottom Margin (px)', 'onea'),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-below-image','info-below-image-icons-on')),
                            'group'      => esc_html__('Product Info Style', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'product_info_skin',
                            'heading'    => esc_html__('Product Info Skin', 'onea'),
                            'value'      => array(
                                esc_html__('Default', 'onea') => 'default',
                                esc_html__('Light', 'onea')   => 'light',
                                esc_html__('Dark', 'onea')    => 'dark'
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-on-image')),
                            'group'      => esc_html__('Product Info Style', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'info_position_vertical',
                            'heading'    => esc_html__('Info Position Vertical', 'onea'),
                            'value'      => array(
                                esc_html__('Default', 'onea') => '',
                                esc_html__('Top', 'onea')     => 'top',
                                esc_html__('Middle', 'onea')  => 'middle',
                                esc_html__('Bottom', 'onea')  => 'bottom',
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-on-image')),
                            'group'      => esc_html__('Product Info Style', 'onea')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'info_position_horizontal',
                            'heading'    => esc_html__('Info Position Horizontal', 'onea'),
                            'value'      => array(
                                esc_html__('Default', 'onea') => '',
                                esc_html__('Left', 'onea')    => 'left',
                                esc_html__('Center', 'onea')  => 'center',
                                esc_html__('Right', 'onea')   => 'right',
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-on-image')),
                            'group'      => esc_html__('Product Info Style', 'onea')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'info_content_padding',
                            'heading'     => esc_html__('Info Content Padding', 'onea'),
                            'description' => esc_html__('Please insert padding in format top right bottom left', 'onea'),
                            'group'       => esc_html__('Product Info Style', 'onea')
                        ),
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type'                             => 'standard',
            'info_position'                    => 'info-below-image',
            'number_of_posts'                  => '8',
            'with_custom_text'                 => '',
            'with_custom_text_position'        => 'left',
            'with_custom_text_font_size'       => '',
            'with_custom_text_line_height'     => '',
            'with_custom_title'                => '',
            'with_custom_button'               => '',
            'with_custom_button_link'          => '',
            'with_custom_holder_position_top'  => '',
            'with_custom_holder_position_left' => '',
            'enable_random_fadein'             => '',
            'number_of_columns'                => 'four',
            'space_between_items'              => 'normal',
            'orderby'                          => 'date',
            'order'                            => 'ASC',
            'category_values'                  => '',
            'show_all_item_in_filter'          => 'yes',
            'taxonomy_to_display'              => 'category',
            'taxonomy_values'                  => '',
            'show_category_filter'             => 'no',
            'image_size'                       => 'full',
            'product_info_skin'                => '',
            'info_position_vertical'           => '',
            'info_position_horizontal'         => '',
            'info_content_padding'             => '',
            'display_title'                    => 'yes',
            'title_tag'                        => 'h5',
            'title_transform'                  => '',
            'title_margin_bottom'              => '',
            'display_category'                 => 'yes',
            'display_excerpt'                  => 'no',
            'excerpt_length'                   => '50',
            'excerpt_margin_bottom'            => '',
            'display_rating'                   => 'no',
            'rating_margin_top'                => '',
            'display_price'                    => 'yes',
            'price_color'                      => '',
            'price_font_size'                  => '',
            'price_font_weight'                => '',
            'price_margin_top'                 => '',
            'display_button'                   => 'yes',
            'button_skin'                      => 'default',
            'add_to_cart_in_box'               => '',
            'button_margin_top'                => '',
            'shader_background_color'          => '',
            'hover_type'                       => 'simple',
            'info_bottom_text_align'           => '',
            'info_bottom_margin'               => '',
            'number_of_visible_items'          => '3',
            'slider_loop'                      => 'yes',
            'slider_autoplay'                  => 'yes',
            'slider_speed'                     => '5000',
            'slider_speed_animation'           => '600',
            'slider_navigation'                => 'yes',
            'slider_navigation_position'       => 'bellow-slider',
            'slider_pagination'                => 'yes',
        );
        $params = shortcode_atts($default_atts, $atts);

        $params['class_name'] = 'pli';
        $params['type'] = !empty($params['type']) ? $params['type'] : $default_atts['type'];
        $params['info_position'] = !empty($params['info_position']) ? $params['info_position'] : $default_atts['info_position'];
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];

        $params['category'] = ''; //used for ajax calling in category filter
        $params['meta_key'] = ''; //used for ajax calling in category filter

        $additional_params = array();
        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $additional_params['query_results'] = $query_result;

        $additional_params['holder_data'] = onea_elated_get_holder_data_for_cpt($params, $additional_params);
        $params['categories_filter_list'] = $this->getProductCategoriesList($params);
        $additional_params['slider_data'] = $this->getProductListCarouselDataAttributes($params);
        $additional_params['holder_classes'] = $this->getHolderClasses($params, $default_atts);

        $params['this_object'] = $this;

        $html = onea_elated_get_woo_shortcode_module_template_part('templates/product-list', 'product-list', $params['type'], $params, $additional_params);

        return $html;
    }

    private function getHolderClasses($params, $default_atts) {
        $holderClasses = array();
        $holderClasses[] = !empty($params['type']) ? 'eltdf-' . $params['type'] . '-layout' : 'eltdf-' . $default_atts['type'] . '-layout';

        $holderClasses[] = !empty($params['number_of_columns']) && $params['type'] !== 'carousel' ? 'eltdf-' . $params['number_of_columns'] . '-columns' : 'eltdf-one-columns';

        $holderClasses[] = !empty($params['space_between_items']) ? 'eltdf-' . $params['space_between_items'] . '-space' : 'eltdf-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = !empty($params['info_position']) ? 'eltdf-' . $params['info_position'] : 'eltdf-' . $default_atts['info_position'];
        $holderClasses[] = !empty($params['product_info_skin']) ? 'eltdf-product-info-' . $params['product_info_skin'] : '';
        $holderClasses[] = ($params['add_to_cart_in_box'] !== 'no') ? 'eltdf-product-add-to-cart-in-box' : '';
        $holderClasses[] = ($params['enable_random_fadein'] == 'yes') ? 'eltdf-enable-rand-fadein' : '';
        $holderClasses[] = !empty($params['info_position_horizontal']) ? 'eltdf-product-horizontal-' . $params['info_position_horizontal'] : '';
        $holderClasses[] = !empty($params['info_position_vertical']) ? 'eltdf-product-vertical-' . $params['info_position_vertical'] : '';
        $holderClasses[] = !empty($params['info_bottom_text_align']) ? 'eltdf-product-info-align-' . $params['info_bottom_text_align'] : '';
        $holderClasses[] = !empty($params['hover_type']) ? 'eltdf-hover-type-' . $params['hover_type'] : '';
        $holderClasses[] = !empty($params['with_custom_text_position']) ? 'custom-text-position-' . $params['with_custom_text_position'] : '';
        $holderClasses[] = !empty($params['slider_navigation_position']) ? 'eltdf-navigation-' . $params['slider_navigation_position'] : '';

        return implode(' ', $holderClasses);
    }

    private function getProductListCarouselDataAttributes($params) {
        $slider_data = array();

        $slider_data['data-number-of-items'] = !empty($params['number_of_visible_items']) ? $params['number_of_visible_items'] : '3';
        $slider_data['data-enable-loop'] = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
        $slider_data['data-enable-autoplay'] = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
        $slider_data['data-slider-speed'] = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
        $slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
        $slider_data['data-enable-navigation'] = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
        $slider_data['data-enable-pagination'] = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';

        return $slider_data;
    }

    public function generateProductQueryArray($params) {
        $queryArray = array(
            'post_status'         => 'publish',
            'post_type'           => 'product',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => $params['number_of_posts'],
            'orderby'             => $params['orderby'],
            'order'               => $params['order']
        );

        if ($params['orderby'] === 'on-sale') {
            $queryArray['no_found_rows'] = 1;
            $queryArray['post__in'] = array_merge(array(0), wc_get_product_ids_on_sale());
        }

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

        //used for ajax calling in category filter
        if ($params['show_category_filter'] == 'yes') {
            if ($params['category_values'] !== '' && $params['category'] == '') {
                $queryArray['product_cat'] = $params['category_values'];
            } else {
                $queryArray['product_cat'] = $params['category'];
            }
        }

        return $queryArray;
    }

    public function getItemClasses($params) {
        $itemClasses = array();

        $image_size_meta = get_post_meta(get_the_ID(), 'eltdf_product_featured_image_size', true);

        if (!empty($image_size_meta)) {
            $itemClasses[] = 'eltdf-fixed-masonry-item eltdf-masonry-size-' . $image_size_meta;
        }

        return implode(' ', $itemClasses);
    }

    public function getTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_transform'])) {
            $styles[] = 'text-transform: ' . $params['title_transform'];
        }

        if (!empty($params['title_margin_bottom'])) {
            $styles[] = 'margin-bottom: ' . onea_elated_filter_px($params['title_margin_bottom']) . 'px';
        }

        return implode(';', $styles);
    }

    public function getPriceStyles($params) {
        $styles = array();

        if (!empty($params['price_font_size'])) {
            $styles[] = 'font-size: ' . $params['price_font_size'];
        }

        if (!empty($params['price_color'])) {
            $styles[] = 'color: ' . $params['price_color'];
        }

        if (!empty($params['price_font_weight'])) {
            $styles[] = 'font-weight: ' . $params['price_font_weight'];
        }

        if (!empty($params['price_margin_top'])) {
            $styles[] = 'margin-top: ' . onea_elated_filter_px($params['price_margin_top']) . 'px';
        }

        return implode(';', $styles);
    }

    public function getRatingStyles($params) {
        $styles = array();

        if (!empty($params['rating_margin_top'])) {
            $styles[] = 'margin-top: ' . onea_elated_filter_px($params['rating_margin_top']) . 'px';
        }

        return implode(';', $styles);
    }

    public function getExcerptStyles($params) {
        $styles = array();

        if (!empty($params['excerpt_margin_bottom'])) {
            $styles[] = 'margin-bottom: ' . onea_elated_filter_px($params['excerpt_margin_bottom']) . 'px';
        }

        return implode(';', $styles);
    }

    public function getButtonStyles($params) {
        $styles = array();

        if (!empty($params['button_margin_top'])) {
            $styles[] = 'margin-top: ' . onea_elated_filter_px($params['button_margin_top']) . 'px';
        }

        return implode(';', $styles);
    }

    public function getShaderStyles($params) {
        $styles = array();

        if (!empty($params['info_content_padding'])) {
            $styles[] = 'padding: ' . $params['info_content_padding'];
        }

        if (!empty($params['shader_background_color'])) {
            $styles[] = 'background-color: ' . $params['shader_background_color'];
        }

        return implode(';', $styles);
    }

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
     * Return product categories
     *
     * * @param $params
     * @return string
     */
    public function getProductCategoriesList($params) {
        $category_html = '';

        if ($params['show_category_filter'] == 'yes') {
            $taxonomy = 'product_cat';
            $orderby = 'name';
            $show_count = 0;      // 1 for yes, 0 for no
            $pad_counts = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
            $title = '';
            $empty = 0;
            $parent = 0;

            $args = array(
                'taxonomy'     => $taxonomy,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty,
                'parent'       => $parent
            );

            $all_categories_string = '';
            if ($params['category_values'] == '') {

                $all_categories = get_categories($args);

            } else {
                $all_categories = array();
                $categories = explode(',', $params['category_values']);
                foreach ($categories as $cat) {
                    $all_categories[] = get_term_by('slug', $cat, 'product_cat');
                    $all_categories_string .= $cat . ',';
                }
            }

            if ($params['show_all_item_in_filter'] == 'yes') {
                $category_html .= '<li><a class="eltdf-no-smooth-transitions active" data-category="' . $all_categories_string . '" href="#">' . esc_html__('All', 'onea') . '</a></li>';
            }
            foreach ($all_categories as $cat) {
                if ($cat != '') {
                    $category_html .= '<li><a class="eltdf-no-smooth-transitions" data-category="' . $cat->slug . '" href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></li>';

                    $termchildren = get_term_children($cat->term_id, 'product_cat');

                    if (!empty($termchildren)) {
                        foreach ($termchildren as $child) {
                            $cat = get_term_by('id', $child, 'product_cat');
                            $category_html .= '<li><a class="eltdf-no-smooth-transitions" data-category="' . $cat->slug . '" href="' . get_term_link($child, 'product_cat') . '">' . $cat->name . '</a></li>';
                        }
                    }
                }
            }
        }

        return $category_html;
    }

    /**
     * Filter product categories
     *
     * @param $query
     *
     * @return array
     */
    public function productCategoryOnlyAutocompleteSuggester($query) {
        global $wpdb;

        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS product_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'product_cat' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['product_category_title']) > 0) ? esc_html__('Category', 'onea') . ': ' . $value['product_category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;
    }

    /**
     * Find product category by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function productCategoryOnlyAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get product category
            $product_category = get_term_by('slug', $query, 'product_cat');
            if (is_object($product_category)) {

                $product_category_slug = $product_category->slug;
                $product_category_title = $product_category->name;

                $product_category_title_display = '';
                if (!empty($product_category_title)) {
                    $product_category_title_display = esc_html__('Category', 'onea') . ': ' . $product_category_title;
                }

                $data = array();
                $data['value'] = $product_category_slug;
                $data['label'] = $product_category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }

    /**
     * Filter product categories
     *
     * @param $query
     *
     * @return array
     */
    public function productCategoryAutocompleteSuggester($query) {
        global $wpdb;

        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS product_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'product_cat' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['product_category_title']) > 0) ? esc_html__('Category', 'onea') . ': ' . $value['product_category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;
    }

    /**
     * Find product category by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function productCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get product category
            $product_category = get_term_by('slug', $query, 'product_cat');
            if (is_object($product_category)) {

                $product_category_slug = $product_category->slug;
                $product_category_title = $product_category->name;

                $product_category_title_display = '';
                if (!empty($product_category_title)) {
                    $product_category_title_display = esc_html__('Category', 'onea') . ': ' . $product_category_title;
                }

                $data = array();
                $data['value'] = $product_category_slug;
                $data['label'] = $product_category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}