<div class="eltdf-pl-holder eltdf-grid-list eltdf-disable-bottom-space <?php echo esc_attr( $holder_classes ) ?>" <?php echo wp_kses( $holder_data, array( 'data' ) ); ?>>
    <?php if ( $query_results->have_posts() ):  ?>
    <?php echo onea_elated_get_woo_shortcode_module_template_part( 'templates/parts/categories-filter', 'product-list', '', $params ); ?>
    <div class="eltdf-prl-loading">
        <span class="eltdf-prl-loading-msg"><?php esc_html_e('Loading...', 'onea') ?></span>
    </div>
    <div class="eltdf-pl-outer eltdf-outer-space">
        <?php
        while ( $query_results->have_posts() ) : $query_results->the_post();
			echo onea_elated_get_woo_shortcode_module_template_part( 'templates/parts/' . $info_position, 'product-list', '', $params );
		endwhile;
		else:
			onea_elated_get_module_template_part( 'templates/parts/no-posts', 'woocommerce', '', $params );
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>