<?php
/**
 * Options map file
 */

if ( ! function_exists( 'onea_membership_options_map' ) ) {
	function onea_membership_options_map( $page ) {
		
		if ( onea_membership_theme_installed() ) {
			
			$panel_social_login = onea_elated_add_admin_panel(
				array(
					'page'  => $page,
					'name'  => 'panel_social_login',
					'title' => esc_html__( 'Enable Social Login', 'onea-membership' )
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_social_login',
					'default_value' => 'no',
					'label'         => esc_html__( 'Enable Social Login', 'onea-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login from social networks of your choice', 'onea-membership' ),
					'parent'        => $panel_social_login
				)
			);
			
			$panel_enable_social_login = onea_elated_add_admin_panel(
				array(
					'page'       => $page,
					'name'       => 'panel_enable_social_login',
					'title'      => esc_html__( 'Enable Login via', 'onea-membership' ),
					'dependency' => array(
						'show' => array(
							'enable_social_login' => 'yes'
						)
					)
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_facebook_social_login',
					'default_value' => 'no',
					'label'         => esc_html__( 'Facebook', 'onea-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login via Facebook', 'onea-membership' ),
					'parent'        => $panel_enable_social_login
				)
			);
			
			$enable_facebook_social_login_container = onea_elated_add_admin_container(
				array(
					'name'       => 'enable_facebook_social_login_container',
					'parent'     => $panel_enable_social_login,
					'dependency' => array(
						'show' => array(
							'enable_facebook_social_login' => 'yes'
						)
					)
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'type'          => 'text',
					'name'          => 'enable_facebook_login_fbapp_id',
					'default_value' => '',
					'label'         => esc_html__( 'Facebook App ID', 'onea-membership' ),
					'description'   => esc_html__( 'Copy your application ID form created Facebook Application', 'onea-membership' ),
					'parent'        => $enable_facebook_social_login_container
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_google_social_login',
					'default_value' => 'no',
					'label'         => esc_html__( 'Google+', 'onea-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login via Google+', 'onea-membership' ),
					'parent'        => $panel_enable_social_login
				)
			);
			
			$enable_google_social_login_container = onea_elated_add_admin_container(
				array(
					'name'       => 'enable_google_social_login_container',
					'parent'     => $panel_enable_social_login,
					'dependency' => array(
						'show' => array(
							'enable_google_social_login' => 'yes'
						)
					)
				)
			);
			
			onea_elated_add_admin_field(
				array(
					'type'          => 'text',
					'name'          => 'enable_google_login_client_id',
					'default_value' => '',
					'label'         => esc_html__( 'Client ID', 'onea-membership' ),
					'description'   => esc_html__( 'Copy your Client ID form created Google Application', 'onea-membership' ),
					'parent'        => $enable_google_social_login_container
				)
			);
		}
	}
	
	add_action( 'onea_elated_social_options', 'onea_membership_options_map' );
}
