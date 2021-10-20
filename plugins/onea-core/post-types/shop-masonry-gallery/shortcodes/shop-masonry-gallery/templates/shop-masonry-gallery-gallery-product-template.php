<?php
extract($this_object->getGalleryParams($params));
?>
<article class="eltdf-item-space <?php echo esc_attr( $this_object->getItemClasses() ) ?>">
    <div class="eltdf-smg-content">
        <a class="eltdf-smg-item-link" itemprop="url" href="<?php echo get_the_permalink($product_id); ?>" title="<?php the_title_attribute(); ?>"></a>
        <?php print $thumbnails_html; ?>
        <div class="eltdf-smg-item-outer">
            <div class="eltdf-smg-item-inner">
                <div class="eltdf-smg-item-content">
                    <?php print $price_html ?>
                    <?php print $title_html ?>
                    <?php print $button_html ?>
                </div>
            </div>
        </div>
    </div>
</article>
