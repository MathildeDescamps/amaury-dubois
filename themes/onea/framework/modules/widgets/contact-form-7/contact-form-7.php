<?php

if ( class_exists( 'OneaCoreClassWidget' ) ) {
	class OneaElatedClassContactForm7Widget extends OneaCoreClassWidget
	{
		public function __construct()
		{
			parent::__construct(
				'eltdf_contact_form_7_widget',
				esc_html__('Onea Contact Form 7 Widget', 'onea'),
				array('description' => esc_html__('Add contact form 7 to widget areas', 'onea'))
			);

			$this->setParams();
		}

		protected function setParams()
		{
			$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

			$contact_forms = array();
			if ($cf7) {
				foreach ($cf7 as $cform) {
					$contact_forms[$cform->ID] = $cform->post_title;
				}
			} else {
				$contact_forms[0] = esc_html__('No contact forms found', 'onea');
			}

			$this->params = array(
				array(
					'type' => 'textfield',
					'name' => 'extra_class',
					'title' => esc_html__('Extra Class Name', 'onea')
				),
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
					'name' => 'contact_form',
					'title' => esc_html__('Select Contact Form 7', 'onea'),
					'options' => $contact_forms
				),
				array(
					'type' => 'dropdown',
					'name' => 'contact_form_style',
					'title' => esc_html__('Contact Form 7 Style', 'onea'),
					'options' => array(
						'' => esc_html__('Default', 'onea'),
						'cf7_custom_style_1' => esc_html__('Custom Style 1', 'onea'),
						'cf7_custom_style_2' => esc_html__('Custom Style 2', 'onea'),
						'cf7_custom_style_3' => esc_html__('Custom Style 3', 'onea')
					)
				)
			);
		}

		public function widget($args, $instance)
		{
			$extra_class = !empty($instance['extra_class']) ? esc_attr($instance['extra_class']) : '';

			$widget_styles = array();
			if (isset($instance['widget_bottom_margin']) && $instance['widget_bottom_margin'] !== '') {
				$widget_styles[] = 'margin-bottom: ' . onea_elated_filter_px($instance['widget_bottom_margin']) . 'px';
			}

			$widget_title_styles = array();
			if (isset($instance['widget_title_bottom_margin']) && $instance['widget_title_bottom_margin'] !== '') {
				$widget_title_styles[] = 'margin-bottom: ' . onea_elated_filter_px($instance['widget_title_bottom_margin']) . 'px';
			}
			?>
			<div class="widget eltdf-contact-form-7-widget <?php echo esc_attr($extra_class); ?>" <?php echo onea_elated_get_inline_style($widget_styles); ?>>
				<?php if (!empty($instance['widget_title'])) {
					if (!empty($widget_title_styles)) {
						$args['before_title'] = onea_elated_widget_modified_before_title($args['before_title'], $widget_title_styles);
					}

					echo wp_kses_post($args['before_title']) . esc_html($instance['widget_title']) . wp_kses_post($args['after_title']);
				} ?>
				<?php if (!empty($instance['contact_form'])) {
					echo do_shortcode('[contact-form-7 id="' . esc_attr($instance['contact_form']) . '" html_class="' . esc_attr($instance['contact_form_style']) . '"]');
				} ?>
			</div>
			<?php
		}
	}
}