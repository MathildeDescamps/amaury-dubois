<?php
extract($this_object->getBannerParams($params));
?>
<article class="eltdf-item-space eltdf-smg-stack-slider-holder <?php echo esc_attr( $this_object->getItemClasses() ) ?>">
    <div class="eltdf-smg-content">
        <div class="eltdf-smg-item-outer">
            <div class="eltdf-smg-item-inner">
                <div class="eltdf-smg-item-content">
					<?php
					if ( is_array( $banners ) && count( $banners ) > 0 ) { ?>
                        <div class="images eltdf-smg-banner eltdf-stack-slider">
							<?php foreach ( $banners as $key => $banner ) { ?>

                                <div class="item eltdf-stack-slide">
                                    <div class="eltdf-smg-banner-image-holder">
										<?php echo onea_elated_generate_thumbnail( null, $banner['image'], $image_size['width'], $image_size['height'] ); ?>
                                    </div>
                                    <div class="eltdf-info-box-data-hidden">
                                        <<?php echo esc_html($banner['title_tag']) ?> class="eltdf-smg-banner-title"><?php echo esc_attr( $banner['title'] ) ?></<?php echo esc_html($banner['title_tag']) ?>>
                                        <?php echo onea_elated_get_button_html( array(
                                                'text'   => $banner['button_text'],
                                                'link'   => $banner['button_link'],
                                                'target' => $banner['button_target'],
                                                'type'   => 'simple',
                                        ) ); ?>
                                    </div>
                                </div>

							<?php } ?>

                            <div class="eltdf-smg-banner-overlay-holder">
                                <div class="eltdf-smg-banner-text-holder">
                                    <div class="eltdf-smg-banner-text-inner"></div>
                                </div>
                            </div>

                            <div class="eltdf-slider-nav">
                                <div class="eltdf-prev">
                                    <span class="eltdf-prev-icon ion-ios-arrow-back"></span>
                                </div>
                                <div class="eltdf-next">
                                    <span class="eltdf-next-icon ion-ios-arrow-forward"></span>
                                </div>
                            </div>
                        </div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</article>
