<?php

if ($display_rating === 'yes' && get_option( 'woocommerce_enable_review_rating' ) !== 'no') {
	$product = onea_elated_return_woocommerce_global_variable();
	$average = $product->get_average_rating();
	$rating_styles = (isset($rating_styles)) ? $rating_styles : '';
	?>
	
	<div class="eltdf-<?php echo esc_attr($class_name); ?>-rating-holder" <?php echo onea_elated_get_inline_style($rating_styles); ?>>
		<div class="eltdf-<?php echo esc_attr($class_name); ?>-rating" title="<?php sprintf(esc_attr_e("Rated %s out of 5", "onea"), $average ); ?>">
			<span style="width: <?php echo esc_attr( ( $average / 5 ) * 100 ) . '%'; ?>"></span>
		</div>
	</div>
<?php } ?>