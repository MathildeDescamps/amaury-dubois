<?php get_header(); ?>
				<div class="eltdf-page-not-found">
					<?php
					$eltdf_title_image_404 = onea_elated_options()->getOptionValue( '404_page_title_image' );
					$eltdf_title_404       = onea_elated_options()->getOptionValue( '404_title' );
					$eltdf_subtitle_404    = onea_elated_options()->getOptionValue( '404_subtitle' );
					$eltdf_text_404        = onea_elated_options()->getOptionValue( '404_text' );
					$eltdf_button_label    = onea_elated_options()->getOptionValue( '404_back_to_home' );
					$eltdf_button_style    = onea_elated_options()->getOptionValue( '404_button_style' );
					
					if ( ! empty( $eltdf_title_image_404 ) ) { ?>
						<div class="eltdf-404-title-image">
							<img src="<?php echo esc_url( $eltdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'onea' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="eltdf-404-title">
						<?php if ( ! empty( $eltdf_title_404 ) ) {
							echo esc_html( $eltdf_title_404 );
						} else {
							esc_html_e( '404', 'onea' );
						} ?>
					</h1>
					
					<h3 class="eltdf-404-subtitle">
						<?php if ( ! empty( $eltdf_subtitle_404 ) ) {
							echo esc_html( $eltdf_subtitle_404 );
						} else {
							esc_html_e( 'Page not found', 'onea' );
						} ?>
					</h3>
					
					<p class="eltdf-404-text">
						<?php if ( ! empty( $eltdf_text_404 ) ) {
							echo esc_html( $eltdf_text_404 );
						} else {
							esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'onea' );
						} ?>
					</p>
					
					<?php
						$button_params = array(
							'link' => esc_url( home_url( '/' ) ),
							'text' => ! empty( $eltdf_button_label ) ? $eltdf_button_label : esc_html__( 'Back to home', 'onea' )
						);
					
						if ( $eltdf_button_style == 'light-style' ) {
							$button_params['custom_class'] = 'eltdf-btn-light-style';
						}
						
						echo onea_elated_return_button_html( $button_params );
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>