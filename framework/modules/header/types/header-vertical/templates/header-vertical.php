<?php do_action('onea_elated_action_before_page_header'); ?>

<aside class="eltdf-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
	<div class="eltdf-vertical-menu-area-inner">
		<div class="eltdf-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			onea_elated_get_logo();
		} ?>
		<?php onea_elated_get_header_vertical_main_menu(); ?>
		<div class="eltdf-vertical-area-widget-holder">
			<?php onea_elated_get_header_widget_area_one(); ?>
		</div>
	</div>
</aside>

<?php do_action('onea_elated_action_after_page_header'); ?>