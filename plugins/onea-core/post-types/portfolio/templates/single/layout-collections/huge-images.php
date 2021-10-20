<div class="eltdf-grid-row">
    <div class="eltdf-grid-col-9">
        <div class="eltdf-ps-image-holder">
            <div class="eltdf-ps-image-inner">
                <?php
                $media = onea_core_get_portfolio_single_media();
                
                if(is_array($media) && count($media)) : ?>
                    <?php foreach($media as $single_media) : ?>
                        <div class="eltdf-ps-image">
                            <?php onea_core_get_portfolio_single_media_html($single_media); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="eltdf-grid-col-3">
        <div class="eltdf-ps-info-holder eltdf-ps-info-sticky-holder">
            <?php
            //get portfolio content section
            onea_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout);
            
            //get portfolio custom fields section
            onea_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);

			//get portfolio date section
			onea_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
            
            //get portfolio categories section
            onea_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
            
            //get portfolio tags section
            onea_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);
            
            //get portfolio share section
            onea_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
            ?>
        </div>
    </div>
</div>