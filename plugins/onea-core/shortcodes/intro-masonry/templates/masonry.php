<?php
$i    = 0;
$rand = rand( 0, 1000 );
$opacity ='';

?>
<div class="eltdf-intro-masonry <?php echo esc_attr( $holder_classes ); ?>">
    <div class="eltdf-im-preloader"></div>
	<div class="eltdf-im-inner eltdf-outer-space eltdf-masonry-list-wrapper">

<!--        <div class="eltdf-masonry-grid-sizer"></div>-->
<!--        <div class="eltdf-masonry-grid-gutter"></div>-->

		<?php
        foreach ( $images as $image ) {
		    $i++;
		    ?>
			<?php
			$image_classes    = '';
			$image_size_class = get_post_meta( $image['image_id'], 'intro_masonry_image_size', true );
            $image_anim_delay = get_post_meta( $image['image_id'], 'intro_masonry_image_anim_delay', true );
			$new_image_size   = $image_size;
			
			if ( ! empty( $image_size_class ) ) {
				$image_classes = 'eltdf-masonry-size-' . esc_attr( $image_size_class );
				
				if ( $image_size_class === 'large-width-height' ) {
					$new_image_size = 'full';
				} else if ( $image_size_class === 'small' ) {
					$new_image_size = 'onea_elated_image_square';
				} else if ( $image_size_class === 'large-width' ) {
					$new_image_size = 'onea_elated_image_landscape';
				} else if ( $image_size_class === 'large-height' ) {
					$new_image_size = 'onea_elated_image_portrait';
				} else {
					$new_image_size = 'full';
				}
			}

            $anim_delay ='';
			if (!empty($image_anim_delay)) {
			    $anim_delay = 'style="animation-delay: '.esc_attr($image_anim_delay) .'s"';
            }
			?>
			<div class="eltdf-im-image eltdf-item-space <?php echo esc_attr( $image_classes ); ?>" <?php echo $anim_delay; ?>>
				<div class="eltdf-im-image-inner">
						<?php if ( is_array( $image_size ) && count( $image_size ) ) :
							echo onea_elated_generate_thumbnail( $image['image_id'], null, $image_size[0], $image_size[1] );
						else:
							echo wp_get_attachment_image( $image['image_id'], $new_image_size );
						endif; ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>