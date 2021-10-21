<?php

if ( ! function_exists( 'onea_elated_register_footer_sidebar' ) ) {
	function onea_elated_register_footer_sidebar() {
		
		$show_footer_top    = onea_elated_options()->getOptionValue( 'show_footer_top' ) !== 'yes' ? false : true;
		$show_footer_bottom = onea_elated_options()->getOptionValue( 'show_footer_bottom' ) !== 'yes' ? false : true;
		
		if ( $show_footer_top ) {
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_1',
					'name'          => esc_html__( 'Footer Top Column 1', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the first column of top footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-1 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_2',
					'name'          => esc_html__( 'Footer Top Column 2', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the second column of top footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-2 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_3',
					'name'          => esc_html__( 'Footer Top Column 3', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the third column of top footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-3 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_4',
					'name'          => esc_html__( 'Footer Top Column 4', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-4 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);

			register_sidebar(
				array(
					'id'            => 'footer_top_column_5',
					'name'          => esc_html__( 'Footer Top Column 5', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-5 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);

			register_sidebar(
				array(
					'id'            => 'footer_top_column_6',
					'name'          => esc_html__( 'Footer Top Column 6', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-column-6 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);
		}
		
		if ( $show_footer_bottom ) {
			
			register_sidebar(
				array(
					'id'            => 'footer_bottom_column_1',
					'name'          => esc_html__( 'Footer Bottom Column 1', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the first column of bottom footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-column-1 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_bottom_column_2',
					'name'          => esc_html__( 'Footer Bottom Column 2', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the second column of bottom footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-column-2 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_bottom_column_3',
					'name'          => esc_html__( 'Footer Bottom Column 3', 'onea' ),
					'description'   => esc_html__( 'Widgets added here will appear in the third column of bottom footer area', 'onea' ),
					'before_widget' => '<div id="%1$s" class="widget eltdf-footer-bottom-column-3 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
					'after_title'   => '</h5></div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'onea_elated_register_footer_sidebar' );
}

if ( ! function_exists( 'onea_elated_get_footer' ) ) {
	/**
	 * Loads footer HTML
	 */
	function onea_elated_get_footer() {
		$parameters          = array();
		$page_id             = onea_elated_get_page_id();
		$disable_footer_meta = get_post_meta( $page_id, 'eltdf_disable_footer_meta', true );
        $uncovering_footer_meta = onea_elated_get_meta_field_intersect( 'uncovering_footer', $page_id );
        $uncovering_footer      = $uncovering_footer_meta === 'yes' ? 'eltdf-footer-uncover' : '';
		$dark_text_footer_meta = onea_elated_get_meta_field_intersect( 'dark_text_footer', $page_id );
		$dark_text_footer      = $dark_text_footer_meta === 'yes' ? 'eltdf-footer-dark-text' : '';
		
		$parameters['display_footer']        = $disable_footer_meta === 'yes' ? false : true;
		$parameters['display_footer_top']    = onea_elated_show_footer_top();
		$parameters['display_footer_bottom'] = onea_elated_show_footer_bottom();
        $parameters['holder_classes']        = $uncovering_footer .' '. $dark_text_footer;
		
		onea_elated_get_module_template_part( 'templates/footer', 'footer', '', $parameters );
	}
	
	add_action( 'onea_elated_get_footer_template', 'onea_elated_get_footer' );
}

if ( ! function_exists( 'onea_elated_show_footer_top' ) ) {
	/**
	 * Check footer top showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function onea_elated_show_footer_top() {
		$footer_top_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = ( onea_elated_get_meta_field_intersect( 'show_footer_top' ) === 'yes' ) ? true : false;
		
		//check footer columns.If they are empty, disable footer top
		$columns_flag = false;
		for ( $i = 1; $i <= 4; $i ++ ) {
			$footer_columns_id = 'footer_top_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_top_flag = true;
		}
		
		return $footer_top_flag;
	}
}

if ( ! function_exists( 'onea_elated_show_footer_bottom' ) ) {
	/**
	 * Check footer bottom showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function onea_elated_show_footer_bottom() {
		$footer_bottom_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = ( onea_elated_get_meta_field_intersect( 'show_footer_bottom' ) === 'yes' ) ? true : false;
		
		//check footer columns.If they are empty, disable footer bottom
		$columns_flag = false;
		for ( $i = 1; $i <= 3; $i ++ ) {
			$footer_columns_id = 'footer_bottom_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_bottom_flag = true;
		}
		
		return $footer_bottom_flag;
	}
}

if ( ! function_exists( 'onea_elated_get_footer_top' ) ) {
	/**
	 * Return footer top HTML
	 */
	function onea_elated_get_footer_top() {
		$parameters = array();

		//get number of top footer columns
		$parameters['footer_top_columns'] = explode(' ', onea_elated_options()->getOptionValue( 'footer_top_columns' ));
		
		//get footer top grid/full width class
		$parameters['footer_top_grid_class'] = onea_elated_get_meta_field_intersect('footer_in_grid') === 'yes' ? 'eltdf-grid' : 'eltdf-full-width';
		
		//get footer top other classes
		$footer_top_classes = array();
		
		//footer alignment
		$footer_top_alignment = onea_elated_options()->getOptionValue( 'footer_top_columns_alignment' );
		$footer_top_classes[] = ! empty( $footer_top_alignment ) ? 'eltdf-footer-top-alignment-' . esc_attr( $footer_top_alignment ) : '';
		
		$footer_top_classes = apply_filters( 'onea_elated_filter_footer_top_classes', $footer_top_classes );
		
		$parameters['footer_top_classes'] = implode( ' ', $footer_top_classes );
		
		onea_elated_get_module_template_part( 'templates/parts/footer-top', 'footer', '', $parameters );
	}
}

if ( ! function_exists( 'onea_elated_get_footer_bottom' ) ) {
	/**
	 * Return footer bottom HTML
	 */
	function onea_elated_get_footer_bottom() {
		$parameters = array();

		//get number of bottom footer columns
		$parameters['footer_bottom_columns'] = explode(' ', onea_elated_options()->getOptionValue( 'footer_bottom_columns' ));
		
		//get footer top grid/full width class
		$parameters['footer_bottom_grid_class'] = onea_elated_get_meta_field_intersect('footer_in_grid') === 'yes' ? 'eltdf-grid' : 'eltdf-full-width';
		
		//get footer top other classes
		$footer_bottom_classes = array();
		$footer_bottom_classes = apply_filters( 'onea_elated_filter_footer_bottom_classes', $footer_bottom_classes );
		
		$parameters['footer_bottom_classes'] = implode( ' ', $footer_bottom_classes );
		
		onea_elated_get_module_template_part( 'templates/parts/footer-bottom', 'footer', '', $parameters );
	}
}

if ( ! function_exists( 'onea_elated_footer_holder_style' ) ) {
	/**
	 * Function that return container style
	 */
	function onea_elated_footer_holder_style( $style ) {
		$current_style = '';
		$page_id       = onea_elated_get_page_id();
		$class_prefix  = onea_elated_get_unique_page_class( $page_id, true );
		
		/***** footer top style - begin *****/
		
		$footer_top_styles   = array();
		$footer_top_selector = $class_prefix . ' .eltdf-page-footer .eltdf-footer-top-holder';
		
		$footer_top_background_color = get_post_meta( $page_id, 'eltdf_footer_top_background_color_meta', true );
		$footer_top_border_color     = get_post_meta( $page_id, 'eltdf_footer_top_border_color_meta', true );
		$footer_top_border_width     = get_post_meta( $page_id, 'eltdf_footer_top_border_width_meta', true );
		
		if ( ! empty( $footer_top_background_color ) ) {
			$footer_top_styles['background-color'] = $footer_top_background_color;
		}
		
		if ( ! empty( $footer_top_border_color ) ) {
			$footer_top_styles['border-color'] = $footer_top_border_color;
			
			if ( $footer_top_border_width === '' ) {
				$footer_top_styles['border-width'] = '1px';
			}
		}
		
		if ( $footer_top_border_width !== '' ) {
			$footer_top_styles['border-width'] = onea_elated_filter_px( $footer_top_border_width ) . 'px';
		}
		
		if ( ! empty( $footer_top_styles ) ) {
			$current_style .= onea_elated_dynamic_css( $footer_top_selector, $footer_top_styles );
		}
		
		/***** footer top style - end *****/
		
		/***** footer bottom style - begin *****/
		
		$footer_bottom_styles   = array();
		$footer_bottom_selector = $class_prefix . ' .eltdf-page-footer .eltdf-footer-bottom-holder';
		
		$footer_bottom_background_color = get_post_meta( $page_id, 'eltdf_footer_bottom_background_color_meta', true );
		$footer_bottom_border_color     = get_post_meta( $page_id, 'eltdf_footer_bottom_border_color_meta', true );
		$footer_bottom_border_width     = get_post_meta( $page_id, 'eltdf_footer_bottom_border_width_meta', true );
		
		if ( ! empty( $footer_bottom_background_color ) ) {
			$footer_bottom_styles['background-color'] = $footer_bottom_background_color;
		}
		
		if ( ! empty( $footer_bottom_border_color ) ) {
			$footer_bottom_styles['border-color'] = $footer_bottom_border_color;
			
			if ( $footer_bottom_border_width === '' ) {
				$footer_bottom_styles['border-width'] = '1px';
			}
		}
		
		if ( $footer_bottom_border_width !== '' ) {
			$footer_bottom_styles['border-width'] = onea_elated_filter_px( $footer_bottom_border_width ) . 'px';
		}
		
		if ( ! empty( $footer_bottom_styles ) ) {
			$current_style .= onea_elated_dynamic_css( $footer_bottom_selector, $footer_bottom_styles );
		}
		
		/***** footer bottom style - end *****/
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'onea_elated_filter_add_page_custom_style', 'onea_elated_footer_holder_style' );
}