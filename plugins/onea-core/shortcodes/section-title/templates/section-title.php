<div class="eltdf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo onea_elated_get_inline_style($holder_styles); ?>>
	<div class="eltdf-st-inner">
		<?php if(!empty($subtitle)) { ?>
			<p class="eltdf-st-subtitle">
				<?php echo wp_kses($subtitle, array('br' => true)); ?>
			</p>
		<?php } ?>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="eltdf-st-title" <?php echo onea_elated_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php 
			echo '
				<p class="eltdf-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin volutpat, lectus vel aliquam laoreet, 
				erat sapien semper nisi, vitae venenatis diam tortor non leo. Nam varius dui id nisi consequat maximus. 
				Proin consequat neque vel ipsum consequat, sit amet congue risus porttitor. Sed augue ipsum, feugiat id placerat nec, 
				blandit sit amet sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at risus velit. In vel interdum felis. 
				Fusce quis sapien orci.</p> 
			';
		?>
		<?php if(!empty($text)) { ?>
			<<?php echo esc_attr($text_tag); ?> class="eltdf-st-text" <?php echo onea_elated_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true)); ?>
			</<?php echo esc_attr($text_tag); ?>>
		<?php } ?>
	</div>
</div>