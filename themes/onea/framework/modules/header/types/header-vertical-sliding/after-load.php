<?php

if ( ! function_exists( 'onea_elated_disable_behaviors_for_header_vertical_sliding' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function onea_elated_disable_behaviors_for_header_vertical_sliding( $allow_behavior ) {
		return false;
	}
	
	if ( onea_elated_check_is_header_type_enabled( 'header-vertical-sliding', onea_elated_get_page_id() ) ) {
		add_filter( 'onea_elated_filter_allow_sticky_header_behavior', 'onea_elated_disable_behaviors_for_header_vertical_sliding' );
		add_filter( 'onea_elated_filter_allow_content_boxed_layout', 'onea_elated_disable_behaviors_for_header_vertical_sliding' );
	}
}