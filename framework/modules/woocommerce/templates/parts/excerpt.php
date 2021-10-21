<?php

if($display_excerpt === 'yes' && $excerpt_length > 0) {
	$excerpt = ($excerpt_length > 0) ? substr(get_the_excerpt(), 0, intval($excerpt_length)) : get_the_excerpt();
	$excerpt_styles = (isset($excerpt_styles)) ? $excerpt_styles : '';
	?>
	
	<p itemprop="description" class="eltdf-<?php echo esc_attr($class_name); ?>-excerpt" <?php echo onea_elated_get_inline_style($excerpt_styles); ?>><?php echo esc_html($excerpt); ?></p>
<?php } ?>