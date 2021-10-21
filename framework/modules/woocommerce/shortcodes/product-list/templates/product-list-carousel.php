<div class="eltdf-pl-holder eltdf-grid-list <?php echo esc_attr( $holder_classes ) ?>">
	<?php
	if ( $params['with_custom_text'] !== '' && $params['info_position'] === 'info-outside-with-custom-text' ) {
		echo '<span class="eltdf-with-custom-text">'. $params['with_custom_text'] . '</span>';
	}

	if ($params['with_custom_title'] !== '' && $params['with_custom_button'] !== '') {

		echo '<span class="eltdf-with-custom-holder" style="top:' . $params['with_custom_holder_position_top'] . '; left:' . $params['with_custom_holder_position_left'] . '">';

		if ($params['with_custom_title'] !== '' && $params['info_position'] === 'info-outside-with-custom-text') {
			echo '<span class="eltdf-with-custom-title" style="font-size:' . $params['with_custom_text_font_size'] . '; line-height: ' .$params['with_custom_text_line_height']. '">' . $params['with_custom_title'] . '</span>';
		}

		if ($params['with_custom_button'] !== '' && $params['info_position'] === 'info-outside-with-custom-text') {
			echo '<a class="eltdf-with-custom-link eltdf-btn eltdf-btn-simple" itemprop="url" href="' . $params['with_custom_button_link'] . '">' . '<span class="eltdf-with-custom-button eltdf-btn-text">' . $params['with_custom_button'] . '</span>' . '</a>';
		}

		echo '</span>';

	}

	?>


	<div class="eltdf-pl-outer eltdf-outer-space eltdf-owl-slider" <?php echo onea_elated_get_inline_attrs( $slider_data ); ?>>
		<?php if ( $query_results->have_posts() ): ?>
			<?php echo onea_elated_get_woo_shortcode_module_template_part( 'templates/parts/categories-filter', 'product-list', '', $params ); ?>
			<?php while ( $query_results->have_posts() ) : $query_results->the_post();
				echo onea_elated_get_woo_shortcode_module_template_part( 'templates/parts/' . $info_position, 'product-list', '', $params );
			endwhile;
		else:
			onea_elated_get_module_template_part( 'templates/parts/no-posts', 'woocommerce', '', $params );
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>