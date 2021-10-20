<?php
class OneaElatedClassWoocommerceYithWishlist extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'eltdf_woocommerce_yith_wishlist',
			esc_html__('Onea Woocommerce Wishlist', 'onea'),
			array( 'description' => esc_html__( 'Display a wishlist icon with number of products that are in the wishlist', 'onea' ), )
		);
	}

    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        foreach($this->params as $param) {
            $param_name = $param['name'];

            $instance[$param_name] = sanitize_text_field($new_instance[$param_name]);
        }

        return $instance;
    }

	public function widget( $args, $instance ) {
		extract( $args );

		global $yith_wcwl;

		?>
            <a class="eltdf-wishlist-widget-holder eltdf-wishlist-widget-link" href="<?php echo esc_url($yith_wcwl->get_wishlist_url()); ?>" title="<?php echo esc_attr__('View Wish list', 'onea'); ?>">
                <span class="eltdf-wishlist-opener-wrapper">
					<span class="eltdf-icon-font-elegant icon_heart_alt"></span>
					<span class="eltdf-wishlist-text"><?php echo esc_html__('Wishlist', 'onea'); ?></span>
				</span>
            </a>
		<?php
	}
}

?>