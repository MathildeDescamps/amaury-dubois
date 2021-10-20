<?php

if ( class_exists( 'OneaCoreClassWidget' ) ) {
	class OneaElatedClassClassIconsGroupWidget extends OneaCoreClassWidget
	{
		public function __construct()
		{
			parent::__construct(
				'eltdf_social_icons_group_widget',
				esc_html__('Onea Social Icons Group Widget', 'onea'),
				array('description' => esc_html__('Use this widget to add a group of up to 6 social icons to a widget area.', 'onea'))
			);

			$this->setParams();
		}

		protected function setParams()
		{
			$this->params = array_merge(
				array(
					array(
						'type' => 'textfield',
						'name' => 'widget_title',
						'title' => esc_html__('Widget Title', 'onea')
					)
				),
				onea_elated_icon_collections()->getSocialIconWidgetMultipleParamsArray(6),
				array(
					array(
						'type' => 'dropdown',
						'name' => 'layout',
						'title' => esc_html__('Icons Layout', 'onea'),
						'options' => array(
							'' => esc_html__('Default', 'onea'),
							'square-icons' => esc_html__('Square', 'onea'),
						)
					),
					array(
						'type' => 'dropdown',
						'name' => 'skin',
						'title' => esc_html__('Square Icons Skin', 'onea'),
						'description' => esc_html__('This applies to the square layout', 'onea'),
						'options' => array(
							'' => esc_html__('Dark Skin', 'onea'),
							'light-skin' => esc_html__('Light Skin', 'onea'),
						)
					),
					array(
						'type' => 'dropdown',
						'name' => 'alignment',
						'title' => esc_html__('Text Alignment', 'onea'),
						'options' => array(
							'left' => esc_html__('Left', 'onea'),
							'center' => esc_html__('Center', 'onea'),
							'right' => esc_html__('Right', 'onea')
						)
					),
					array(
						'type' => 'textfield',
						'name' => 'icon_size',
						'title' => esc_html__('Icons Size (px)', 'onea')
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
						'type' => 'textfield',
						'name' => 'margin',
						'title' => esc_html__('Margin', 'onea'),
						'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'onea')
					)
				)
			);
		}

		public function widget($args, $instance)
		{
			$icon_styles = array();
			$class = array();

			if (!empty($instance['skin'])) {
				$class[] = 'eltdf-' . $instance['skin'];
			}

			if (!empty($instance['layout'])) {
				$class[] = 'eltdf-' . $instance['layout'];
			}

			if (!empty($instance['alignment'])) {
				$class[] = 'text-align-' . $instance['alignment'];
			}

			if (!empty($instance['color'])) {
				$icon_styles[] = 'color: ' . $instance['color'] . ';';
			}

			if (!empty($instance['icon_size'])) {
				$icon_styles[] = 'font-size: ' . onea_elated_filter_px($instance['icon_size']) . 'px';
			}

			if (!empty($instance['margin'])) {
				$icon_styles[] = 'margin: ' . $instance['margin'] . ';';
			}

			$hover_color = !empty($instance['hover_color']) ? $instance['hover_color'] : '';
			$class = implode(' ', $class);

			echo '<div class="widget eltdf-social-icons-group-widget ' . esc_attr($class) . '">';

			if (!empty($instance['widget_title'])) {
				echo wp_kses_post($args['before_title']) . esc_html($instance['widget_title']) . wp_kses_post($args['after_title']);
			}

			for ($n = 1; $n <= 6; $n++) {
				$link = !empty($instance['link_' . $n]) ? $instance['link_' . $n] : '#';
				$target = !empty($instance['target_' . $n]) ? $instance['target_' . $n] : '_self';

				$icon_holder_html = '';
				if (!empty($instance['icon_pack'])) {
					$icon_class = array('eltdf-social-icon-widget');
					if (!empty($instance['fa_icon_' . $n]) && $instance['icon_pack'] === 'font_awesome') {
						$icon_class[] = $instance['fa_icon_' . $n];
					}

					if (!empty($instance['fe_icon_' . $n]) && $instance['icon_pack'] === 'font_elegant') {
						$icon_class[] = $instance['fe_icon_' . $n];
					}

					if (!empty($instance['ion_icon_' . $n]) && $instance['icon_pack'] === 'ion_icons') {
						$icon_class[] = $instance['ion_icon_' . $n];
					}

					if (!empty($instance['simple_line_icon_' . $n]) && $instance['icon_pack'] === 'simple_line_icons') {
						$icon_class[] = $instance['simple_line_icon_' . $n];
					}

					if (!empty($icon_class) && isset($icon_class[1]) && !empty($icon_class[1])) {
						$icon_class = implode(' ', $icon_class);
						$icon_holder_html = '<span class="' . $icon_class . '"></span>';
					} else {
						$icon_holder_html = '';
					}
				}
				?>
				<?php if (!empty($icon_holder_html)) { ?>
					<a class="eltdf-social-icon-widget-holder eltdf-icon-has-hover" <?php echo onea_elated_get_inline_attr($hover_color, 'data-hover-color'); ?> <?php onea_elated_inline_style($icon_styles) ?>
					   href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
						<?php echo wp_kses_post($icon_holder_html); ?>
					</a>
				<?php }
			}
			echo '</div>';
		}
	}
}