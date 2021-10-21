<?php

if ( class_exists( 'OneaCoreClassWidget' ) ) {
	class OneaElatedClassSideAreaOpener extends OneaCoreClassWidget
	{
		public function __construct()
		{
			parent::__construct(
				'eltdf_side_area_opener',
				esc_html__('Onea Side Area Opener', 'onea'),
				array('description' => esc_html__('Display a "hamburger" icon that opens the side area', 'onea'))
			);

			$this->setParams();
		}

		protected function setParams()
		{
			$this->params = array(
				array(
					'type' => 'colorpicker',
					'name' => 'icon_color',
					'title' => esc_html__('Side Area Opener Color', 'onea'),
					'description' => esc_html__('Define color for side area opener', 'onea')
				),
				array(
					'type' => 'colorpicker',
					'name' => 'icon_hover_color',
					'title' => esc_html__('Side Area Opener Hover Color', 'onea'),
					'description' => esc_html__('Define hover color for side area opener', 'onea')
				),
				array(
					'type' => 'textfield',
					'name' => 'widget_margin',
					'title' => esc_html__('Side Area Opener Margin', 'onea'),
					'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'onea')
				),
				array(
					'type' => 'textfield',
					'name' => 'widget_title',
					'title' => esc_html__('Side Area Opener Title', 'onea')
				)
			);
		}

		public function widget($args, $instance)
		{
			$classes = array(
				'eltdf-side-menu-button-opener',
				'eltdf-icon-has-hover'
			);

			$classes[] = onea_elated_get_icon_sources_class('side_area', 'eltdf-side-menu-button-opener');

			$styles = array();
			if (!empty($instance['icon_color'])) {
				$styles[] = 'color: ' . $instance['icon_color'] . ';';
			}
			if (!empty($instance['widget_margin'])) {
				$styles[] = 'margin: ' . $instance['widget_margin'];
			}
			?>

			<a <?php onea_elated_class_attribute($classes); ?> <?php echo onea_elated_get_inline_attr($instance['icon_hover_color'], 'data-hover-color'); ?>
					href="javascript:void(0)" <?php onea_elated_inline_style($styles); ?>>
				<?php if (!empty($instance['widget_title'])) { ?>
					<h5 class="eltdf-side-menu-title"><?php echo esc_html($instance['widget_title']); ?></h5>
				<?php } ?>
				<span class="eltdf-side-menu-icon">
				<?php echo onea_elated_get_icon_sources_html('side_area'); ?>
            </span>
			</a>
		<?php }
	}
}