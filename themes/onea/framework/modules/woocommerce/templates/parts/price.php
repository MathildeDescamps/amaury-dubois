<?php
$product = onea_elated_return_woocommerce_global_variable();
$price_styles = (isset($price_styles)) ? $price_styles : '';

if ($display_price === 'yes' && $price_html = $product->get_price_html()) { ?>
	<div class="eltdf-<?php echo esc_attr($class_name); ?>-price" <?php echo onea_elated_get_inline_style($price_styles); ?>><?php echo wp_kses_post($price_html); ?></div>
<?php } ?>