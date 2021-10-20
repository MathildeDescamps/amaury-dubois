<div class="eltdf-eh-item <?php echo esc_attr($holder_classes); ?>" <?php echo onea_elated_get_inline_style($holder_styles); ?> <?php echo onea_elated_get_inline_attrs($holder_data); ?>>
	<div class="eltdf-eh-item-inner">
		<div class="eltdf-eh-item-content" <?php echo onea_elated_get_inline_style($content_styles); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
    <div class="eltdf-elements-holder-background-outer" <?php echo onea_elated_get_inline_style($bgsurface_styles); ?> <?php echo onea_elated_get_inline_attrs($bgsurface_data); ?>>
        <div class="eltdf-elements-holder-background-inner" <?php echo onea_elated_get_inline_style($bgsurface_color); ?>></div>
    </div>
</div>