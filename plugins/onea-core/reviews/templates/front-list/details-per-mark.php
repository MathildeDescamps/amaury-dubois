<div class="eltdf-reviews-list-info eltdf-reviews-per-mark">
	<?php foreach ( $post_ratings as $rating ) { ?>
		<?php
		$average_rating     = onea_core_post_average_rating( $rating );
		$rating_count       = $rating['count'];
		$rating_count_label = $rating_count === 1 ? esc_html__( 'Rating', 'onea-core' ) : esc_html__( 'Ratings', 'onea-core' );
		$rating_marks       = $rating['marks'];
		?>
		<div class="eltdf-grid-row">
			<div class="eltdf-grid-col-4">
				<div class="eltdf-reviews-number-wrapper">
					<span class="eltdf-reviews-number"><?php echo esc_html( $average_rating ); ?></span>
					<span class="eltdf-stars-wrapper">
                        <span class="eltdf-stars">
                            <?php
                            for ( $i = 1; $i <= $average_rating; $i ++ ) { ?>
	                            <i class="fa fa-star" aria-hidden="true"></i>
                            <?php } ?>
                        </span>
                        <span class="eltdf-reviews-count">
                            <?php esc_html_e( 'Rated', 'onea-core' ) . ' ' . $average_rating . ' ' . esc_html__( 'out of', 'onea-core' ) . ' ' . $rating_count . ' ' . $rating_count_label; ?>
                        </span>
                    </span>
				</div>
			</div>
			<div class="eltdf-grid-col-8">
				<div class="eltdf-rating-percentage-wrapper">
					<?php
					foreach ( $rating_marks as $item => $value ) {
						$percentage = $rating_count == 0 ? 0 : round( ( $value / $rating_count ) * 100 );
						echo do_shortcode( '[eltdf_progress_bar percent="' . esc_attr( $percentage ) . '" title="' . esc_attr( $item ) . esc_html__( ' stars', 'onea-core' ) . '"]' );
					}
					?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
