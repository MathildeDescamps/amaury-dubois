<div class="eltdf-fullscreen-menu-holder-outer">
	<div class="eltdf-fullscreen-menu-holder">
		<div class="eltdf-fullscreen-menu-holder-inner">
			<?php if ($fullscreen_menu_in_grid) : ?>
				<div class="eltdf-container-inner">
			<?php endif; ?>
			
			<?php 
			//Navigation
			onea_elated_get_module_template_part('templates/full-screen-menu-navigation', 'header/types/header-minimal');;

			?>

			<div class="eltdf-fullscreen-below-menu-widget-holder">
				<?php onea_elated_get_header_widget_area_two(); ?>
			</div>
			
			<?php if ($fullscreen_menu_in_grid) : ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>