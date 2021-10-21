<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
$params['price_styles'] = $this_object->getPriceStyles( $params );
$params['rating_styles'] = $this_object->getRatingStyles( $params );
$params['excerpt_styles'] = $this_object->getExcerptStyles( $params );
$params['button_styles'] = $this_object->getButtonStyles( $params );
?>
<div class="eltdf-pli eltdf-item-space <?php echo esc_attr( $item_classes ); ?>">
	<div class="eltdf-pli-inner">
		<div class="eltdf-pli-image">
			<?php onea_elated_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<div class="eltdf-pli-text" <?php echo onea_elated_get_inline_style( $shader_styles ); ?>>
			<div class="eltdf-pli-text-outer">
				<div class="eltdf-pli-text-inner">
					<?php onea_elated_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
				</div>
			</div>
		</div>
		<a class="eltdf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
</div>