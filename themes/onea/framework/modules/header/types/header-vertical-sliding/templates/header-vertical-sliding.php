<?php do_action('onea_elated_action_before_page_header'); ?>
<aside class="eltdf-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
    <div class="eltdf-vertical-menu-area-inner">
        <div class="eltdf-vertical-area-background"></div>
        <div class="eltdf-vertical-menu-nav-holder-outer">
            <div class="eltdf-vertical-menu-nav-holder">
                <div class="eltdf-vertical-menu-holder-nav-inner">
                    <?php onea_elated_get_header_vertical_sliding_main_menu(); ?>
                </div>
            </div>
        </div>
        <?php if(!$hide_logo) {
            onea_elated_get_logo();
        } ?>
        <div class="eltdf-vertical-menu-holder">
            <div class="eltdf-vertical-menu-table">
                <div class="eltdf-vertical-menu-table-cell">
                    <div class="eltdf-vertical-menu-opener">
                        <a href="#" <?php onea_elated_class_attribute( $vertical_sliding_icon_class ); ?>>
                            <span class="eltdf-vertical-sliding-close-icon">
								<?php echo onea_elated_get_icon_sources_html( 'vertical_sliding', true ); ?>
                            </span>
                            <span class="eltdf-vertical-sliding-opener-icon">
								<?php echo onea_elated_get_icon_sources_html( 'vertical_sliding' ); ?>
                            </span>
                        </a>
                    </div>
                    <div class="eltdf-vertical-area-widget-holder">
                        <?php onea_elated_get_header_widget_area_one(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

<?php do_action('onea_elated_action_after_page_header'); ?>
