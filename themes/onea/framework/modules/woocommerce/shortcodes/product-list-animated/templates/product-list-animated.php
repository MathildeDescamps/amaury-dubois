<div class="eltdf-pla-holder <?php echo esc_attr($holder_classes) ?>">
	<?php if($query_result->have_posts()): while ($query_result->have_posts()) : $query_result->the_post(); ?>
		<?php 
			$product = onea_elated_return_woocommerce_global_variable();

			$rating_enabled = false;
			if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
				$rating_enabled = true;
				$average      = $product->get_average_rating();
			}
			$new_layout = onea_elated_get_meta_field_intersect('single_product_new');
		?>
		<div class="eltdf-pla-item">
			<div class="eltdf-pla-inner">
				<div class="eltdf-pla-image">
					<?php if ( $product->is_on_sale() ) : ?>
						<span class="eltdf-pla-onsale"><?php esc_html_e('SALE', 'onea'); ?></span>
					<?php endif; ?>
					<?php if (!$product->is_in_stock()) : ?>
						<span class="eltdf-pla-out-of-stock"><?php esc_html_e('OUT OF STOCK', 'onea'); ?></span>
					<?php endif; ?>
					<?php if ($new_layout === 'yes') : ?>
						<span class="eltdf-pla-new-product"><?php esc_html_e('NEW', 'onea'); ?></span>
					<?php endif; ?>

                        <?php onea_elated_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
				</div>
				<div class="eltdf-pla-text" <?php echo onea_elated_get_inline_style($shader_styles); ?>>
                    <div class="eltdf-pla-text-outer">
                        <div class="eltdf-pla-text-inner">

                            <?php if($add_to_cart_in_box !== 'yes') {
                                onea_elated_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params );
                            } ?>

                            <div class="eltdf-pla-icons-holder">
                                <?php if($add_to_cart_in_box === 'yes') {
                                    onea_elated_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params );
                                }

                                onea_elated_woocommerce_quick_view_button();
                                do_action('onea_elated_woocommerce_info_image_bottom');

                                ?>
                            </div>
                        </div>
                    </div>
				</div>
				<a class="eltdf-pla-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
			</div>
            <div class="eltdf-pla-text-wrapper" <?php echo onea_elated_get_inline_style($text_wrapper_styles); ?>>

                <?php onea_elated_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>

                <?php onea_elated_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>

                <?php if($info_bottom_text_align !== '') { ?>
                    <?php onea_elated_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
                <?php } ?>

                <?php onea_elated_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>

                <?php if($info_bottom_text_align === '') { ?>
                    <?php onea_elated_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
                <?php } ?>

                <?php onea_elated_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>

				<?php if ($rating_enabled && $display_rating === 'yes') { ?>
					<div class="eltdf-pla-rating-holder">
						<div class="eltdf-pla-rating" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'onea' ), $average ); ?>">
							<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%"></span>
						</div>
					</div>	
				<?php } ?>
			</div>
		</div>
	<?php endwhile;	else: ?>
		<div class="eltdf-pla-messsage">
			<p><?php esc_html_e('No posts were found.', 'onea'); ?></p>
		</div>
	<?php endif;
		wp_reset_postdata();
	?>
</div>