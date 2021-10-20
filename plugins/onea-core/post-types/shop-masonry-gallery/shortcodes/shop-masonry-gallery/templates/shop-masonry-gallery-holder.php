<div class="eltdf-shop-masonry-gallery-holder eltdf-disable-bottom-space <?php echo esc_attr( $holder_classes ) ?>" <?php onea_elated_get_inline_attrs( $holder_data ) ?>>
    <div class="eltdf-smg-inner eltdf-outer-space">
        <div class="eltdf-smg-grid-sizer"></div>
        <div class="eltdf-smg-grid-gutter"></div>
		<?php

		if ( $query->have_posts() ) :

			while ( $query->have_posts() ) : $query->the_post();

				echo onea_core_get_cpt_shortcode_module_template_part( 'shop-masonry-gallery', 'shop-masonry-gallery', 'shop-masonry-gallery-' . $this_object->getType() . '-template', '', $params );

				$itemID = get_the_ID();

			endwhile;
		else:
			esc_html_e( 'Sorry, no posts matched your criteria.', 'onea-core' );
		endif;
		wp_reset_postdata(); ?>
    </div>
</div>