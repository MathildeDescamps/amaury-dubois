<?php

if ( ! function_exists( 'onea_membership_get_dashboard_page_url' ) ) {
	/**
	 * Function that returns dashboard page url
	 *
	 * @return string
	 */
	function onea_membership_get_dashboard_page_url() {
		$url   = '';
		$pages = get_all_page_ids();
		
		foreach ( $pages as $page ) {
			if ( get_post_status( $page ) == 'publish' && get_page_template_slug( $page ) == 'user-dashboard.php' ) {
				$url = esc_url( get_the_permalink( $page ) );
				break;
			}
		}

		return $url;
	}
}

if ( ! function_exists( 'onea_membership_get_my_account_page_url' ) ) {
	/**
	 * Function that returns my account page url
	 *
	 * @return string
	 */
	function onea_membership_get_my_account_page_url() {
		$url = '';

		if ( onea_membership_theme_installed() && onea_elated_is_woocommerce_installed() ) {
			$my_account_page_id = get_option( 'woocommerce_myaccount_page_id' );

			if ( isset( $my_account_page_id ) && ! empty( $my_account_page_id ) ) {
				$url = esc_url( get_permalink( $my_account_page_id ) );
			} else {
				$url = onea_membership_get_dashboard_page_url();
			}
		}
		
		return $url;
	}
}

if ( ! function_exists( 'onea_membership_get_redirect_url' ) ) {
	/**
	 * Function that returns my account page url
	 *
	 * @return string
	 */
	function onea_membership_get_redirect_url() {

		$url = onea_membership_get_dashboard_page_url();

		if ( $url == '' && onea_elated_is_woocommerce_installed() ) {
			$my_account_page_id = get_option( 'woocommerce_myaccount_page_id' );

			if ( isset( $my_account_page_id ) && ! empty( $my_account_page_id ) ) {
				$url = esc_url( get_permalink( $my_account_page_id ) );
			}
		}

		return $url;
	}
}

if ( ! function_exists( 'onea_membership_get_dashboard_template_part' ) ) {
	/**
	 * Loads Dashboard template part.
	 *
	 * @param $template
	 * @param string $slug
	 * @param array $params
	 *
	 * @return string
	 */
	function onea_membership_get_dashboard_template_part( $template, $slug = '', $params = array() ) {
		//HTML Content from template
		$html = '';

		$theme_template_path  = get_template_directory() . '/onea-membership/dashboard/page-templates/template-parts';
		$plugin_template_path = ONEA_MEMBERSHIP_ABS_PATH . '/dashboard/page-templates/template-parts';

		if ( $slug !== '' ) {
			$template = "{$template}-{$slug}.php";
		} else {
			$template = "{$template}.php";
		}

		if ( file_exists( $theme_template_path . '/' . $template ) ) {
			$temp_path = $theme_template_path . '/' . $template;
		} else {
			$temp_path = $plugin_template_path . '/' . $template;
		}
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		if ( $temp_path ) {
			ob_start();
			include( $temp_path );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'onea_membership_get_dashboard_pages' ) ) {
	/**
	 * Loads dashboard page content based on user action
	 *
	 * @return string
	 */
	function onea_membership_get_dashboard_pages() {

		$action = 'profile';
		$page   = '';
		if ( isset( $_GET['user-action'] ) ) {
			$action = $_GET['user-action'];
		}

		//Template params
		$params  = array();
		$user_id = get_current_user_id();
		if ( $action == 'profile' || $action == 'edit-profile' ) {
			$params['first_name']  = get_the_author_meta( 'first_name', $user_id );
			$params['last_name']   = get_the_author_meta( 'last_name', $user_id );
			$params['email']       = get_the_author_meta( 'user_email', $user_id );
			$params['website']     = get_the_author_meta( 'user_url', $user_id );
			$params['description'] = get_the_author_meta( 'description', $user_id );
			$profile_image         = get_user_meta( $user_id, 'social_profile_image', true );
			if ( $profile_image == '' ) {
				$profile_image = get_avatar( $user_id, 96 );
			} else {
				$profile_image = '<img src="' . esc_url( $profile_image ) . '">';
			}
			$params['profile_image'] = $profile_image;
		}

		if( $action == 'profile' ) {
            $page = onea_membership_get_dashboard_template_part( 'profile', '', $params );
        } else if( $action == 'edit-profile' ) {
            $page = onea_membership_get_dashboard_template_part( 'edit-profile', '', $params );
        }

        $page = apply_filters( 'onea_membership_dashboard_pages', $page, $action );

		//Include template part
		if ( $page != '' ) {
			$html = $page;
		} else {
			$html = onea_membership_get_dashboard_template_part( 'profile', '', $params );
		}

		return $html;
	}
}

if ( ! function_exists( 'onea_membership_get_dashboard_navigation_items' ) ) {
	/**
	 * Function that returns dashboard navigation items
	 *
	 * @return array|mixed|void
	 */
	function onea_membership_get_dashboard_navigation_items() {

		$dashboard_url = onea_membership_get_dashboard_page_url();
		$account_url   = onea_membership_get_my_account_page_url();
		
		$items = array(
			'account'      => array(
				'url'           => esc_url($account_url),
				'text'          => esc_html__( 'Account', 'onea-membership'),
				'user_action'   => 'my_account',
                'icon'          => '<i class="fa fa-shopping-bag" aria-hidden="true"></i>'
			),
			'profile'      => array(
				'url'           => esc_url(add_query_arg( array( 'user-action' => 'profile' ), $dashboard_url)),
				'text'          => esc_html__( 'Profile', 'onea-membership'),
				'user_action'   => 'profile',
                'icon'          => '<i class="fa fa-user" aria-hidden="true"></i>'
			),
			'edit-profile' => array(
				'url'           => esc_url(add_query_arg( array( 'user-action' => 'edit-profile' ), $dashboard_url)),
				'text'          => esc_html__( 'Edit Profile', 'onea-membership'),
				'user_action'   => 'edit-profile',
                'icon'          => '<i class="fa fa-cog" aria-hidden="true"></i>'
			)
		);
		
		$items = apply_filters('onea_membership_dashboard_navigation_pages', $items, $dashboard_url);

		return $items;
	}
}

if ( ! function_exists( 'onea_membership_get_woo_membership_profile_key' ) ) {
	function onea_membership_get_woo_membership_profile_key() {
		return apply_filters( 'onea_membership_dashboard_profile_key', $profile_key = 'onea_membership_profile' );
	}
}

if ( ! function_exists( 'onea_membership_get_woo_membership_profile_value' ) ) {
	function onea_membership_get_woo_membership_profile_value() {
		$profile_value = esc_html__( 'Membership Profile', 'onea-membership' );

		return apply_filters( 'onea_membership_dashboard_profile_value', $profile_value );
	}
}

if ( ! function_exists( 'onea_membership_extend_woo_navigation' ) ) {
	function onea_membership_extend_woo_navigation( $navigation ) {
		$navigation_new = array();

		if ( onea_membership_get_dashboard_page_url() !== '' ) {
			$navigation_new[ onea_membership_get_woo_membership_profile_key() ] = onea_membership_get_woo_membership_profile_value();
		}

		return array_merge( $navigation_new, $navigation );
	}

	add_filter( 'woocommerce_account_menu_items', 'onea_membership_extend_woo_navigation' );
}

if ( ! function_exists( 'onea_membership_set_woo_navigation_membership_profile' ) ) {
	function onea_membership_set_woo_navigation_membership_profile( $url, $endpoint ) {
		if ( $endpoint == onea_membership_get_woo_membership_profile_key() ) {
			return onea_membership_get_dashboard_page_url();
		} else {
			return $url;
		}
	}

	add_filter( 'woocommerce_get_endpoint_url', 'onea_membership_set_woo_navigation_membership_profile', 10, 2 );
}

if ( ! function_exists( 'onea_membership_update_user_profile' ) ) {
	function onea_membership_update_user_profile() {

		if ( empty( $_POST ) || ! isset( $_POST ) ) {
			onea_membership_ajax_response( 'error', esc_html__( 'All fields are empty', 'onea-membership' ) );
		} else {
			$dashboard_url = onea_membership_get_dashboard_page_url();
			parse_str( $_POST['data'], $update_data );

			$user_id = get_current_user_id();

			$nonce_name = 'eltdf_validate_'.$update_data['eltdf_form_name'].'_'.$user_id;
			$nonce_value = 'eltdf_nonce_'.$update_data['eltdf_form_name'].'_'.$user_id;

			//Check nonce
			if ( wp_verify_nonce( $update_data[$nonce_value], $nonce_name ) ) {
				if ( $user_id ) {

					//Update password
					if ( ! empty( $update_data['password'] ) ) {
						if ( $update_data['password'] === $update_data['password2'] ) {
							wp_update_user( array(
								'ID'        => $user_id,
								'user_pass' => esc_attr( $update_data['password'] )
							) );
						} else {
							onea_membership_ajax_response( 'error', esc_html__( 'Passwords don\'t match', 'onea-membership' ) );
						}
					}

					//Update email
					if ( ! empty( $update_data['email'] ) && filter_var( $update_data['email'], FILTER_VALIDATE_EMAIL ) ) {
						wp_update_user( array( 'ID' => $user_id, 'user_email' => esc_attr( $update_data['email'] ) ) );
					} else {
						onea_membership_ajax_response( 'error', esc_html__( 'Error. Please insert valid email', 'onea-membership' ) );
					}

					//Update Website
					wp_update_user( array( 'ID' => $user_id, 'user_url' => esc_url( $update_data['url'] ) ) );

					//Update user meta
					update_user_meta( $user_id, 'first_name', $update_data['first_name'] );
					update_user_meta( $user_id, 'last_name', $update_data['last_name'] );
					update_user_meta( $user_id, 'description', $update_data['description'] );

					do_action('onea_membership_action_additional_profile_fields_update', $update_data, $_FILES, $user_id);

					onea_membership_ajax_response( 'success', esc_html__( 'Your profile is updated', 'onea-membership' ), $dashboard_url );

				} else {
					onea_membership_ajax_response( 'error', esc_html__( 'You are unauthorized to perform this action.', 'onea-membership' ) );
				}

			} else {
				onea_membership_ajax_response( 'error', esc_html__( 'Error.', 'onea-membership' ) );
			}
		}
	}

	add_action( 'wp_ajax_onea_membership_update_user_profile', 'onea_membership_update_user_profile' );
}