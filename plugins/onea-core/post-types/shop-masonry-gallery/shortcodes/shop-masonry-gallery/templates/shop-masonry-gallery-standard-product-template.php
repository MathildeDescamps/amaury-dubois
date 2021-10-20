<?php
extract($this_object->getStandardParams($params));
?>
<article class="eltdf-item-space <?php echo esc_attr( $this_object->getItemClasses() ) ?>">
	<div class="eltdf-smg-content">
		<div class="eltdf-smg-image">
			<?php print $featured_image_html ?>
		</div>
		<div class="eltdf-smg-item-outer">
			<div class="eltdf-smg-item-inner">
                <div class="eltdf-smg-item-content">
                    <?php print $title_html ?>
                    <?php print $category_html ?>
                    <?php print $price_html ?>
                    <?php print $button_html;
                    do_action('onea_elated_woocommerce_info_image_bottom');
                    ?>
                    <a class="eltdf-smg-item-link" itemprop="url" href="<?php echo get_the_permalink($product_id); ?>" title="<?php the_title_attribute(); ?>"></a>
                </div>
			</div>
		</div>
	</div>
</article>