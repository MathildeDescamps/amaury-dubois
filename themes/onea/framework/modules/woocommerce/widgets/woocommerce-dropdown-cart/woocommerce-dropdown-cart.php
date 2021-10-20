<?php

if ( class_exists( 'OneaCoreClassWidget' ) ) {
	class OneaElatedClassWoocommerceDropdownCart extends OneaCoreClassWidget
	{
		public function __construct()
		{
			parent::__construct(
				'eltdf_woocommerce_dropdown_cart',
				esc_html__('Onea Woocommerce Dropdown Cart', 'onea'),
				array('description' => esc_html__('Display a shop cart icon with a dropdown that shows products that are in the cart', 'onea'),)
			);

			$this->setParams();
		}

		protected function setParams()
		{
			$this->params = array(
				array(
					'type' => 'textfield',
					'name' => 'woocommerce_dropdown_cart_margin',
					'title' => esc_html__('Icon Margin', 'onea'),
					'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'onea')
				)
			);
		}

		public function widget($args, $instance)
		{
			extract($args);

			global $woocommerce;

			$icon_styles = array();

			if ($instance['woocommerce_dropdown_cart_margin'] !== '') {
				$icon_styles[] = 'margin: ' . $instance['woocommerce_dropdown_cart_margin'];
			}
            if ( is_object( WC()->cart ) ) {

			$cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

			$dropdown_cart_icon_class = onea_elated_get_dropdown_cart_icon_class();
			?>
			<div class="eltdf-shopping-cart-holder" <?php onea_elated_inline_style($icon_styles) ?>>
				<div class="eltdf-shopping-cart-inner">
					<a itemprop="url" <?php onea_elated_class_attribute($dropdown_cart_icon_class); ?>
					   href="<?php echo esc_url(wc_get_cart_url()); ?>">
						<span class="eltdf-cart-icon"><?php echo onea_elated_get_icon_sources_html('dropdown_cart', false, array('dropdown_cart' => 'yes')); ?></span>
						<span class="eltdf-cart-text-holder">
                        <span class="eltdf-cart-quantity"><?php echo esc_html($woocommerce->cart->get_cart_contents_count()); ?></span>
                        <span class="eltdf-cart-total-amount">
                                <?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
									'span' => array(
										'class' => true,
										'id' => true
									)
								)); ?>
                        </span>
                    </span>
					</a>
					<div class="eltdf-shopping-cart-dropdown">
						<ul>
							<?php if (!$cart_is_empty) : ?>
								<?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
									$_product = $cart_item['data'];
									// Only display if allowed
									if (!$_product->exists() || $cart_item['quantity'] == 0) {
										continue;
									}
									// Get price
									$product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
									?>
									<li>
										<div class="eltdf-item-image-holder">
											<a itemprop="url"
											   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
												<?php echo wp_kses($_product->get_image(), array(
													'img' => array(
														'src' => true,
														'width' => true,
														'height' => true,
														'class' => true,
														'alt' => true,
														'title' => true,
														'id' => true
													)
												)); ?>
											</a>
										</div>
										<div class="eltdf-item-info-holder">
											<h5 itemprop="name" class="eltdf-product-title">
												<a itemprop="url"
												   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('onea_elated_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
											</h5>
											<?php if (apply_filters('onea_elated_woo_cart_enable_quantity', true)) { ?>
												<span class="eltdf-quantity"><?php echo esc_html($cart_item['quantity']); ?></span>
											<?php } ?>
											<?php echo apply_filters('onea_elated_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
											<?php echo apply_filters('onea_elated_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), esc_attr__('Remove this item', 'onea')), $cart_item_key); ?>
										</div>
									</li>
								<?php endforeach; ?>
								<li class="eltdf-cart-bottom">
									<div class="eltdf-subtotal-holder clearfix">
										<span class="eltdf-total"><?php esc_html_e('Total bag:', 'onea'); ?></span>
										<span class="eltdf-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
											'span' => array(
												'class' => true,
												'id' => true
											)
										)); ?>
									</span>
									</div>
									<div class="eltdf-btn-holder clearfix">
										<a itemprop="url" href="<?php echo esc_url(wc_get_checkout_url()); ?>"
										   class="eltdf-view-checkout"><?php esc_html_e('Checkout', 'onea'); ?></a>
										<a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>"
										   class="eltdf-view-cart"><?php esc_html_e('View Cart', 'onea'); ?></a>
									</div>
								</li>
							<?php else : ?>
								<li class="eltdf-empty-cart"><?php esc_html_e('No products in the cart.', 'onea'); ?></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
            <?php } ?>
			<?php
		}
	}

	add_filter('woocommerce_add_to_cart_fragments', 'onea_elated_woocommerce_header_add_to_cart_fragment');

	function onea_elated_woocommerce_header_add_to_cart_fragment($fragments)
	{
		global $woocommerce;

		ob_start();

		$cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

		$dropdown_cart_icon_class = onea_elated_get_dropdown_cart_icon_class();

		?>
		<div class="eltdf-shopping-cart-inner">
			<a itemprop="url" <?php onea_elated_class_attribute($dropdown_cart_icon_class); ?>
			   href="<?php echo esc_url(wc_get_cart_url()); ?>">
				<span class="eltdf-cart-icon"><?php echo onea_elated_get_icon_sources_html('dropdown_cart', false, array('dropdown_cart' => 'yes')); ?></span>
				<span class="eltdf-cart-text-holder">
                <span class="eltdf-cart-quantity"><?php echo esc_html($woocommerce->cart->get_cart_contents_count()); ?></span>
                <span class="eltdf-cart-total-amount">
                        <?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
							'span' => array(
								'class' => true,
								'id' => true
							)
						)); ?>
                </span>
            </span>
				<div class="eltdf-shopping-cart-dropdown">
					<ul>
						<?php if (!$cart_is_empty) : ?>
							<?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
								$_product = $cart_item['data'];
								// Only display if allowed
								if (!$_product->exists() || $cart_item['quantity'] == 0) {
									continue;
								}
								// Get price
								$product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
								?>
								<li>
									<div class="eltdf-item-image-holder">
										<a itemprop="url"
										   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
											<?php echo wp_kses($_product->get_image(), array(
												'img' => array(
													'src' => true,
													'width' => true,
													'height' => true,
													'class' => true,
													'alt' => true,
													'title' => true,
													'id' => true
												)
											)); ?>
										</a>
									</div>
									<div class="eltdf-item-info-holder">
										<h5 itemprop="name" class="eltdf-product-title">
											<a itemprop="url"
											   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('onea_elated_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
										</h5>
										<?php if (apply_filters('onea_elated_woo_cart_enable_quantity', true)) { ?>
											<span class="eltdf-quantity"><?php echo esc_html($cart_item['quantity']); ?></span>
										<?php } ?>
										<?php echo apply_filters('onea_elated_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
										<?php echo apply_filters('onea_elated_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), esc_attr__('Remove this item', 'onea')), $cart_item_key); ?>
									</div>
								</li>
							<?php endforeach; ?>
							<li class="eltdf-cart-bottom">
								<div class="eltdf-subtotal-holder clearfix">
									<span class="eltdf-total"><?php esc_html_e('Total bag:', 'onea'); ?></span>
									<span class="eltdf-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
									'span' => array(
										'class' => true,
										'id' => true
									)
								)); ?>
							</span>
								</div>
								<div class="eltdf-btn-holder clearfix">
									<a itemprop="url" href="<?php echo esc_url(wc_get_checkout_url()); ?>"
									   class="eltdf-view-checkout"><?php esc_html_e('Checkout', 'onea'); ?></a>
									<a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>"
									   class="eltdf-view-cart"><?php esc_html_e('View Cart', 'onea'); ?></a>
								</div>
							</li>
						<?php else : ?>
							<li class="eltdf-empty-cart"><?php esc_html_e('No products in the cart.', 'onea'); ?></li>
						<?php endif; ?>
					</ul>
				</div>
		</div>

		<?php
		$fragments['div.eltdf-shopping-cart-inner'] = ob_get_clean();

		return $fragments;
	}
}

?>