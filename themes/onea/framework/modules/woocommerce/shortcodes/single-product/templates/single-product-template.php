<article <?php post_class($classes); ?>>
    <div class="eltdf-product-single-content">
        <?php if ( has_post_thumbnail($product_id) ) { ?>
        	<?php if($featured_image_position === 'left') { ?>
	            <div class="eltdf-product-single-image">
		            <?php
		            if ( $featured_image_size != 'custom' ) {
						echo get_the_post_thumbnail($product_id, $featured_image_size);
					} elseif ( $featured_custom_image_width != '' && $featured_custom_image_height != '' ) {
						echo onea_elated_generate_thumbnail( get_post_thumbnail_id( $product_id ), null, $featured_custom_image_width, $featured_custom_image_height );
					}
		            ?>
	            </div>
		        <div class="eltdf-product-single-text">
		            <div class="eltdf-product-single-text-inner">
		            	<?php 
			            	$product = wc_get_product( $product_id );
			            	if ($product) {
					            $thumbnails_ids = $product->get_gallery_image_ids();
				            }

		            	?>
		            	<div class="eltdf-single-thumbnail-holder">
							<?php

							    if ( $small_image_size != 'custom' ) {
								    echo wp_get_attachment_image( $thumbnails_ids[0], $small_image_size );
							    } elseif ( $small_custom_image_width != '' && $small_custom_image_height != '' ) {
								    echo onea_elated_generate_thumbnail( $thumbnails_ids[0], null, $small_custom_image_width, $small_custom_image_height );
							    }
                            ?>
		            	</div>
		            	<div class="eltdf-sp-text-wrapper">
							<?php if (!empty($title)) { ?>
						        <<?php echo esc_attr( $title_tag ); ?> class="eltdf-product-single-title">
				                    <?php echo wp_kses( $title, array( 'br' => true ) ); ?>
			                    </<?php echo esc_attr( $title_tag ); ?>>
			                <?php } ?>
			                <?php if (!empty($price)) { ?>
					            <span class="eltdf-sp-price"><?php echo wp_kses( $price, array( 'del' => true, 'ins' => true, 'span' => array( 'class' => true ) ) ); ?></span>
			                <?php } ?>
			                <?php if ($enable_button === 'yes') { ?>
                                <div class="eltdf-sp-button"><?php echo onea_elated_get_button_html(array('text' => $button_text, 'type' => 'simple', 'link' => get_the_permalink( $product_id ))); ?></div>
			                <?php } ?>
		            	</div>
		            </div>
		        </div>
		    <?php } else { ?>
		        <div class="eltdf-product-single-text eltdf-single-product-position-right">
		            <div class="eltdf-product-single-text-inner">
		            	<?php 
			            	$product = wc_get_product( $product_id );
			            	if ($product) {
			            		$thumbnails_ids = $product->get_gallery_image_ids();
			            	}
		            	?>
		            	<div class="eltdf-single-thumbnail-holder">
							<?php
                                if ( $small_image_size != 'custom' ) {
                                    echo wp_get_attachment_image( $thumbnails_ids[0], $small_image_size );
                                } elseif ( $small_custom_image_width != '' && $small_custom_image_height != '' ) {
                                    echo onea_elated_generate_thumbnail( $thumbnails_ids[0], null, $small_custom_image_width, $small_custom_image_height );
                                }
                            ?>
		            	</div>
		            	<div class="eltdf-sp-text-wrapper">
							<?php if (!empty($title)) { ?>
						        <<?php echo esc_attr( $title_tag ); ?> class="eltdf-product-single-title">
				                    <?php echo wp_kses( $title, array( 'br' => true ) ); ?>
			                    </<?php echo esc_attr( $title_tag ); ?>>
			                <?php } ?>
			                <?php if (!empty($price)) { ?>
					            <span class="eltdf-sp-price"><?php echo wp_kses( $price, array( 'del' => true, 'ins' => true, 'span' => array( 'class' => true ) ) ); ?></span>
			                <?php } ?>
                            <?php if ($enable_button === 'yes') { ?>
                                <div class="eltdf-sp-button"><?php echo onea_elated_get_button_html(array('text' => $button_text, 'type' => 'simple', 'link' => get_the_permalink( $product_id ))); ?></div>
                            <?php } ?>

		            	</div>
		            </div>
		        </div>
		        <div class="eltdf-product-single-image">
		            <?php
		            if ( $featured_image_size != 'custom' ) {
						echo get_the_post_thumbnail($product_id, $featured_image_size);
					} elseif ( $featured_custom_image_width != '' && $featured_custom_image_height != '' ) {
						echo onea_elated_generate_thumbnail( get_post_thumbnail_id( $product_id ), null, $featured_custom_image_width, $featured_custom_image_height );
					}
		            ?>
	            </div>
	        <?php } ?>
            <a itemprop="url" class="eltdf-product-single-link" href="<?php echo esc_url( get_the_permalink( $product_id ) ); ?>"></a>
        <?php } ?>
    </div>
</article>
