<?php
$attachment_meta = onea_elated_get_attachment_meta_from_url( $logo_image );
$hwstring        = ! empty( $attachment_meta ) ? image_hwstring( $attachment_meta['width'], $attachment_meta['height'] ) : '';

do_action( 'onea_elated_action_before_mobile_logo' ); ?>

<div class="eltdf-mobile-logo-wrapper">
	<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php onea_elated_inline_style( $logo_styles ); ?>>
		<img itemprop="image" src="<?php echo esc_url( $logo_image ); ?>" <?php echo wp_kses( $hwstring, array( 'width'  => true, 'height' => true ) ); ?> alt="<?php esc_attr_e( 'Mobile Logo', 'onea' ); ?>"/>
	</a>
</div>

<?php do_action( 'onea_elated_action_after_mobile_logo' ); ?>