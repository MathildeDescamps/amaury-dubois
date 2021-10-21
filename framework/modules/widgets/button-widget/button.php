<?php

if ( class_exists( 'OneaCoreClassWidget' ) ) {
	class OneaElatedClassButtonWidget extends OneaCoreClassWidget
	{
		public function __construct()
		{
			parent::__construct(
				'eltdf_button_widget',
				esc_html__('Onea Button Widget', 'onea'),
				array('description' => esc_html__('Add button element to widget areas', 'onea'))
			);

			$this->setParams();
		}

		protected function setParams()
		{
			$this->params = array(
				array(
					'type' => 'dropdown',
					'name' => 'type',
					'title' => esc_html__('Type', 'onea'),
					'options' => array(
						'solid' => esc_html__('Solid', 'onea'),
						'outline' => esc_html__('Outline', 'onea'),
						'simple' => esc_html__('Simple', 'onea')
					)
				),
				array(
					'type' => 'dropdown',
					'name' => 'size',
					'title' => esc_html__('Size', 'onea'),
					'options' => array(
						'small' => esc_html__('Small', 'onea'),
						'medium' => esc_html__('Medium', 'onea'),
						'large' => esc_html__('Large', 'onea'),
						'huge' => esc_html__('Huge', 'onea')
					),
					'description' => esc_html__('This option is only available for solid and outline button type', 'onea')
				),
				array(
					'type' => 'textfield',
					'name' => 'text',
					'title' => esc_html__('Text', 'onea'),
					'default' => esc_html__('Button Text', 'onea')
				),
				array(
					'type' => 'textfield',
					'name' => 'link',
					'title' => esc_html__('Link', 'onea')
				),
				array(
					'type' => 'dropdown',
					'name' => 'target',
					'title' => esc_html__('Link Target', 'onea'),
					'options' => onea_elated_get_link_target_array()
				),
				array(
					'type' => 'colorpicker',
					'name' => 'color',
					'title' => esc_html__('Color', 'onea')
				),
				array(
					'type' => 'colorpicker',
					'name' => 'hover_color',
					'title' => esc_html__('Hover Color', 'onea')
				),
				array(
					'type' => 'colorpicker',
					'name' => 'background_color',
					'title' => esc_html__('Background Color', 'onea'),
					'description' => esc_html__('This option is only available for solid button type', 'onea')
				),
				array(
					'type' => 'colorpicker',
					'name' => 'hover_background_color',
					'title' => esc_html__('Hover Background Color', 'onea'),
					'description' => esc_html__('This option is only available for solid button type', 'onea')
				),
				array(
					'type' => 'colorpicker',
					'name' => 'border_color',
					'title' => esc_html__('Border Color', 'onea'),
					'description' => esc_html__('This option is only available for solid and outline button type', 'onea')
				),
				array(
					'type' => 'colorpicker',
					'name' => 'hover_border_color',
					'title' => esc_html__('Hover Border Color', 'onea'),
					'description' => esc_html__('This option is only available for solid and outline button type', 'onea')
				),
				array(
					'type' => 'textfield',
					'name' => 'margin',
					'title' => esc_html__('Margin', 'onea'),
					'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'onea')
				)
			);
		}

		public function widget($args, $instance)
		{
			$params = '';

			if (!is_array($instance)) {
				$instance = array();
			}

			// Filter out all empty params
			$instance = array_filter($instance, function ($array_value) {
				return trim($array_value) != '';
			});

			// Default values
			if (!isset($instance['text'])) {
				$instance['text'] = 'Button Text';
			}

			// Generate shortcode params
			foreach ($instance as $key => $value) {
				$params .= " $key='$value' ";
			}

			echo '<div class="widget eltdf-button-widget">';
			echo do_shortcode("[eltdf_button $params]"); // XSS OK
			echo '</div>';
		}
	}
}