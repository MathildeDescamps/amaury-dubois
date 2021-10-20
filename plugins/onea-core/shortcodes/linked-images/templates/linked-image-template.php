<?php if($image != '') {  ?>
	<div class="eltdf-linked-image-holder">
		<div class="eltdf-linked-image-holder-inner">
			<div class="eltdf-linked-image-image-holder">
                <div class="eltdf-linked-image-image" style="background-image: url(<?php echo esc_url($image); ?>);"></div>
                <div class="eltdf-linked-image-description-wrapper">
                    <div class="eltdf-linked-image-description-inner">
                        <?php if( $foreground_image != '') {  ?>
                        <a class="eltdf-linked-image-foreground-image" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>" <?php onea_elated_inline_style($fg_image_styles) ?>>
                            <img src="<?php echo esc_url($foreground_image); ?>">
                        </a>
                        <?php } ?>
                        <?php if( $button_text != '') { ?>
                            <div class="eltdf-linked-image-button">
                                <?php echo onea_elated_get_button_html($button_params); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if($link != '') { ?>
                        <a class="eltdf-linked-image-image-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>"></a>
                    <?php } ?>
                </div>
			</div>
		</div>
	</div>
<?php } ?>