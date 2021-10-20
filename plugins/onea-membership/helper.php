<?php
/**
 * Plugin functions
 */

if ( ! function_exists( 'onea_membership_version_class' ) ) {
	/**
	 * Adds plugin version class to body
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function onea_membership_version_class( $classes ) {
		$classes[] = 'eltdf-social-login-' . ONEA_MEMBERSHIP_VERSION;
		
		return $classes;
	}
	
	add_filter( 'body_class', 'onea_membership_version_class' );
}

if ( ! function_exists( 'onea_membership_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function onea_membership_theme_installed() {
		return defined( 'ELATED_ROOT' );
	}
}

if ( ! function_exists( 'onea_membership_core_plugin_installed()' ) ) {
	function onea_membership_core_plugin_installed() {
		return defined( 'onea_CORE_VERSION' );
	}
}


if ( ! function_exists( 'onea_membership_get_module_template_part' ) ) {
	/**
	 * Loads Shortcode template part.
	 *
	 * @param        $module
	 * @param        $submodule
	 * @param        $template
	 * @param string $slug
	 * @param array  $params
	 *
	 * @see onea_elated_get_template_part()
	 * @return string
	 */
	function onea_membership_get_module_template_part( $module, $submodule, $template, $slug = '', $params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = ONEA_MEMBERSHIP_ABS_PATH . '/modules/' . $module . '/' . $submodule . '/templates';
		
		$temp = $template_path . '/' . $template;
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$template = '';
		
		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";
				
				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}
		
		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'onea_membership_ajax_response' ) ) {
	/**
	 * Ajax response for login and register forms
	 *
	 * @param $status
	 * @param string $message
	 * @param string $redirect
	 * @param null $data
	 */
	function onea_membership_ajax_response( $status, $message = '', $redirect = '', $data = null ) {
		$response = array(
			'status'   => $status,
			'message'  => $message,
			'redirect' => $redirect,
			'data'     => $data
		);
		
		$response = json_encode( $response );
		
		exit( $response );
	}
}

if ( ! function_exists( 'onea_membership_ajax_response_message_holder' ) ) {
	/**
	 * Template for ajax response
	 */
	function onea_membership_ajax_response_message_holder() {
		
		$html = '<div class="eltdf-membership-response-holder clearfix"></div>';
		$html .= '<script type="text/template" class="eltdf-membership-response-template">
					<div class="eltdf-membership-response <%= messageClass %> ">
						<div class="eltdf-membership-response-message">
							<p><%= message %></p>
						</div>
					</div>
				</script>';

		print $html;
	}
	
	add_action( 'onea_membership_action_login_ajax_response', 'onea_membership_ajax_response_message_holder' );
	
}

if ( ! function_exists( 'onea_membership_execute_shortcode' ) ) {
	/**
	 * @param $shortcode_tag - shortcode base
	 * @param $atts - shortcode attributes
	 * @param null $content - shortcode content
	 *
	 * @return mixed|string
	 */
	function onea_membership_execute_shortcode( $shortcode_tag, $atts, $content = null ) {
		global $shortcode_tags;
		
		if ( ! isset( $shortcode_tags[ $shortcode_tag ] ) ) {
			return;
		}

		if ( is_array( $shortcode_tags[ $shortcode_tag ] ) ) {
			$shortcode_array = $shortcode_tags[ $shortcode_tag ];
			
			return call_user_func( array(
				$shortcode_array[0],
				$shortcode_array[1]
			), $atts, $content, $shortcode_tag );
		}
		
		return call_user_func( $shortcode_tags[ $shortcode_tag ], $atts, $content, $shortcode_tag );
	}
}

if ( ! function_exists( 'onea_membership_kses_img' ) ) {
	/**
	 * Function that does escaping of img html.
	 * It uses wp_kses function with predefined attributes array.
	 * Should be used for escaping img tags in html.
	 * Defines onea_elated_kses_img_atts filter that can be used for changing allowed html attributes
	 *
	 * @see wp_kses()
	 *
	 * @param $content string string to escape
	 *
	 * @return string escaped output
	 */
	function onea_membership_kses_img( $content ) {
		$img_atts = apply_filters( 'onea_membership_filter_kses_img_atts', array(
			'src'    => true,
			'alt'    => true,
			'height' => true,
			'width'  => true,
			'class'  => true,
			'id'     => true,
			'title'  => true
		) );
		
		return wp_kses( $content, array(
			'img' => $img_atts
		) );
	}
}


if ( ! function_exists( 'onea_membership_dashboard_menu_svg_icons' ) ) {
	function onea_membership_dashboard_menu_svg_icons( $menu_item ) {
		$html = '<span class="eltdf-custom-svg-icon">';
		
		switch ( $menu_item ) {
			case 'account':
				$html .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40.726px" height="40.717px" viewBox="0 0 40.726 40.717" enable-background="new 0 0 40.726 40.717" xml:space="preserve"><g><path stroke-width="1.5" stroke-miterlimit="10" d="M39.476,20.359 c0,10.554-8.556,19.108-19.116,19.108c-10.555,0-19.11-8.555-19.11-19.108C1.25,9.805,9.805,1.25,20.36,1.25 C30.92,1.25,39.476,9.805,39.476,20.359z"/><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d=" M16.287,14.221c0,0,5.234,0.738,6.869-3.26c0,0,1.751,3.234,4.311,3.234"/><g><g><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M16.408,23.975c0.002,0.963,0,3.037,0,3.037s0.219,1.298-7.481,3.257"/></g><g><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M24.319,23.975c-0.003,0.963,0,3.037,0,3.037s-0.218,1.298,7.481,3.257"/><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M22.749,24.451c1.043-0.25,1.577-0.717,1.577-0.717c1.767-1.255,2.862-5.189,3.192-7.946c0.486-4.061-0.055-8.919-7.134-9.08 h-0.042c-7.078,0.161-7.62,5.019-7.132,9.08c0.329,2.756,1.425,6.691,3.191,7.946c0,0,0.534,0.467,1.577,0.717"/></g></g></g></svg>';
				break;
			
		}
		
		$html .= '</span>';
		
		return apply_filters( 'onea_membership_filter_dashboard_menu_svg_icon', $html, $menu_item );
	}
}