<?php

if ( ! function_exists( 'onea_elated_disable_behaviors_for_header_bottom' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function onea_elated_disable_behaviors_for_header_bottom( $allow_behavior ) {
		return false;
	}
	
	if ( onea_elated_check_is_header_type_enabled( 'header-bottom', onea_elated_get_page_id() ) ) {
		add_filter( 'onea_elated_filter_allow_sticky_header_behavior', 'onea_elated_disable_behaviors_for_header_bottom' );
		add_filter( 'onea_elated_filter_allow_content_boxed_layout', 'onea_elated_disable_behaviors_for_header_bottom' );

        remove_action('onea_elated_action_after_wrapper_inner', 'onea_elated_get_header');
        add_action('onea_elated_action_before_main_content', 'onea_elated_get_header');
	}
}