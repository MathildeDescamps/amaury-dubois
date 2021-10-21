<div class="eltdf-subscribe-popup-holder <?php echo esc_attr( $holder_classes ); ?>">
	<div class="eltdf-sp-table">
		<div class="eltdf-sp-table-cell">
            <div class="eltdf-sp-close-area"></div>
			<div class="eltdf-sp-inner">
				<a class="eltdf-sp-close" href="javascript:void(0)">
                    <svg x="0px" y="0px" width="17px" height="16px" viewBox="-0.26 -0.512 17 16" enable-background="new -0.26 -0.512 17 16" xml:space="preserve">
                        <line stroke="currentColor" stroke-miterlimit="10" x2="0.583" y2="14.593" x1="15.895" y1="0.353"/>
                        <line stroke="currentColor" stroke-miterlimit="10" x2="15.896" y2="14.593" x1="0.584" y1="0.353"/>
                    </svg>
				</a>
				<?php if ( ! empty( $background_styles ) ) { ?>
					<div class="eltdf-sp-background" <?php onea_elated_inline_style( $background_styles ); ?>></div>
				<?php } ?>
				<div class="eltdf-sp-content-container">
					<div class="eltdf-sp-content-text">
						<?php if ( ! empty( $title ) ) { ?>
							<h3 class="eltdf-sp-title"><?php echo esc_html( $title ); ?></h3>
						<?php } ?>
						<?php if ( ! empty( $subtitle ) ) { ?>
							<div class="eltdf-sp-subtitle">
								<?php echo esc_html($subtitle); ?>
							</div>
						<?php } ?>
					</div>
					<?php echo do_shortcode('[contact-form-7 id="' . $contact_form .'" html_class="'. $contact_form_style .'"]'); ?>
					<?php if ( $enable_prevent === 'yes' ) { ?>
						<div class="eltdf-sp-prevent">
							<div class="eltdf-sp-prevent-inner">
				                <span class="eltdf-sp-prevent-input" data-value="no">
					                <svg x="0px" y="0px" width="10.656px" height="10.692px" viewBox="0 0 10.656 10.692" enable-background="new 0 0 10.656 10.692" xml:space="preserve">
										<path d="M10.415,9.752c0.252,0.254,0.303,0.611,0.114,0.8l0,0c-0.188,0.188-0.545,0.136-0.798-0.118L0.242,0.913 C-0.011,0.658-0.062,0.3,0.127,0.111l0,0C0.316-0.075,0.673-0.023,0.926,0.23L10.415,9.752z"/>
										<path d="M0.229,9.779c-0.253,0.253-0.305,0.609-0.117,0.799l0,0c0.188,0.189,0.545,0.138,0.799-0.115l9.515-9.495 c0.253-0.254,0.305-0.611,0.117-0.801l0,0C10.355-0.021,9.998,0.03,9.744,0.283L0.229,9.779z"/>
									</svg>
				                </span>
								<label class="eltdf-sp-prevent-label"><?php esc_html_e( 'Prevent This Pop-up', 'onea' ); ?></label>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
