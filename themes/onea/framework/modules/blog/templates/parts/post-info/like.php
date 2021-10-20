<?php if(onea_elated_core_plugin_installed()) { ?>
    <div class="eltdf-blog-like">
        <?php if( function_exists('onea_elated_get_like') ) onea_elated_get_like(); ?>
    </div>
<?php } ?>