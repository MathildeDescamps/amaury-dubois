<?php

if ( ! function_exists( 'onea_elated_register_widgets' ) ) {
	function onea_elated_register_widgets() {
		$widgets = apply_filters( 'onea_elated_filter_register_widgets', $widgets = array() );

		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}

	add_action( 'widgets_init', 'onea_elated_register_widgets' );
}