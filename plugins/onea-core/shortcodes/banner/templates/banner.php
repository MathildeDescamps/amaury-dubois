<div class="eltdf-banner-holder <?php echo esc_attr($holder_classes); ?>" <?php onea_elated_inline_style($holder_style) ?> >
    <div class="eltdf-banner-image">
        <?php echo wp_get_attachment_image($image, 'full'); ?>
    </div>
    <div class="eltdf-banner-text-holder" <?php echo onea_elated_get_inline_style($overlay_styles); ?>>
	    <div class="eltdf-banner-text-outer">
		    <div class="eltdf-banner-text-inner">
			    <?php if(!empty($inner_image)) { ?>
                    <div class="eltdf-banner-inner-image" <?php echo onea_elated_get_inline_style($inner_image_styles); ?>>
                        <?php echo wp_get_attachment_image($inner_image, 'full'); ?>
                    </div>
			    <?php } ?>
                <?php if(!empty($title)) { ?>
                    <<?php echo esc_attr($title_tag); ?> class="eltdf-banner-title" <?php echo onea_elated_get_inline_style($title_styles); ?>>
                        <?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
                    </<?php echo esc_attr($title_tag); ?>>
                <?php } ?>
		        <?php if(!empty($subtitle)) { ?>
		            <<?php echo esc_attr($subtitle_tag); ?> class="eltdf-banner-subtitle" <?php echo onea_elated_get_inline_style($subtitle_styles); ?>>
			            <?php echo esc_html($subtitle); ?>
		            </<?php echo esc_attr($subtitle_tag); ?>>
		        <?php } ?>

				<?php if(!empty($button_params)) { ?>
                    <div class="eltdf-banner-button" <?php onea_elated_inline_style($button_styles) ?>><?php echo onea_elated_get_button_html($button_params); ?></div>
		        <?php } ?>
			</div>
		</div>
	</div>
</div>