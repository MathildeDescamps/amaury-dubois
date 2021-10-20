<?php

if ( class_exists( 'OneaCoreClassWidget' ) ) {
	class OneaElatedClassProductListWidget extends OneaCoreClassWidget
	{
		public function __construct()
		{
			parent::__construct(
				'eltdf_product_list_widget',
				esc_html__('Onea Product List Widget', 'onea'),
				array('description' => esc_html__('Display a list of your product posts', 'onea'))
			);

			$this->setParams();
		}

		protected function setParams()
		{
			$this->params = array(
				array(
					'type' => 'textfield',
					'name' => 'widget_bottom_margin',
					'title' => esc_html__('Widget Bottom Margin (px)', 'onea')
				),
				array(
					'type' => 'textfield',
					'name' => 'widget_title',
					'title' => esc_html__('Widget Title', 'onea')
				),
				array(
					'type' => 'textfield',
					'name' => 'widget_title_bottom_margin',
					'title' => esc_html__('Widget Title Bottom Margin (px)', 'onea')
				),
				array(
					'type' => 'dropdown',
					'name' => 'type',
					'title' => esc_html__('Type', 'onea'),
					'options' => array(
						'standard' => esc_html__('Standard', 'onea')
					)
				),
				array(
					'type' => 'dropdown',
					'name' => 'info_position',
					'title' => esc_html__('Product Info Position', 'onea'),
					'options' => array(
						'info-below-image' => esc_html__('Info Below Image', 'onea'),
					),
					'save_always' => true
				),
				array(
					'type' => 'textfield',
					'name' => 'number_of_posts',
					'title' => esc_html__('Number of Products', 'onea')
				),
				array(
					'type' => 'dropdown',
					'name' => 'number_of_columns',
					'title' => esc_html__('Number of Columns', 'onea'),
					'options' => array(
						'one' => esc_html__('One', 'onea'),
						'two' => esc_html__('Two', 'onea'),
						'three' => esc_html__('Three', 'onea'),
						'four' => esc_html__('Four', 'onea'),
						'five' => esc_html__('Five', 'onea'),
						'six' => esc_html__('Six', 'onea')
					),
				),
				array(
					'type' => 'dropdown',
					'name' => 'space_between_items',
					'title' => esc_html__('Space Between Items', 'onea'),
					'options' => onea_elated_get_space_between_items_array(),
				),
				array(
					'type' => 'dropdown',
					'name' => 'orderby',
					'title' => esc_html__('Order By', 'onea'),
					'options' => onea_elated_get_query_order_by_array()
				),
				array(
					'type' => 'dropdown',
					'name' => 'order',
					'title' => esc_html__('Order', 'onea'),
					'options' => array_flip(onea_elated_get_query_order_array()),
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'name' => 'display_category',
					'title' => esc_html__('Display Category', 'onea'),
					'options' => array_flip(onea_elated_get_yes_no_select_array(false, true))
				),
			);
		}

		public function widget($args, $instance)
		{
			if (!is_array($instance)) {
				$instance = array();
			}

			// Filter out all empty params
			$instance = array_filter($instance, function ($array_value) {
				return trim($array_value) != '';
			});
			$instance['type'] = !empty($instance['type']) ? $instance['type'] : 'standard';

			$params = '';
			//generate shortcode params
			foreach ($instance as $key => $value) {
				$params .= " $key='$value' ";
			}

			$widget_styles = array();
			if (isset($instance['widget_bottom_margin']) && $instance['widget_bottom_margin'] !== '') {
				$widget_styles[] = 'margin-bottom: ' . onea_elated_filter_px($instance['widget_bottom_margin']) . 'px';
			}

			$widget_title_styles = array();
			if (isset($instance['widget_title_bottom_margin']) && $instance['widget_title_bottom_margin'] !== '') {
				$widget_title_styles[] = 'margin-bottom: ' . onea_elated_filter_px($instance['widget_title_bottom_margin']) . 'px';
			}

			echo '<div class="widget eltdf-product-list-widget" ' . onea_elated_get_inline_style($widget_styles) . '>';
			if (!empty($instance['widget_title'])) {
				if (!empty($widget_title_styles)) {
					$args['before_title'] = onea_elated_widget_modified_before_title($args['before_title'], $widget_title_styles);
				}

				echo wp_kses_post($args['before_title']) . esc_html($instance['widget_title']) . wp_kses_post($args['after_title']);
			}

			echo do_shortcode("[eltdf_product_list $params]"); // XSS OK
			echo '</div>';
		}
	}
}