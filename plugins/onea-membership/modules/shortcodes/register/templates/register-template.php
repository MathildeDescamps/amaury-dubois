<div class="eltdf-social-register-holder">
	<form method="post" class="eltdf-register-form">
		<fieldset>
			<div>
				<input type="text" name="user_register_name" id="user_register_name" placeholder="<?php esc_attr_e( 'User Name', 'onea-membership' ) ?>" value="" required
				       pattern=".{3,}" title="<?php esc_attr_e( 'Three or more characters', 'onea-membership' ); ?>"/>
			</div>
			<div>
				<input type="email" name="user_register_email" id="user_register_email" placeholder="<?php esc_attr_e( 'Email', 'onea-membership' ) ?>" value="" required />
			</div>
            <div>
                <input type="password" name="user_register_password" id="user_register_password" placeholder="<?php esc_attr_e('Password','onea-membership') ?>" value="" required />
            </div>
            <div>
                <input type="password" name="user_register_confirm_password" id="user_register_confirm_password" placeholder="<?php esc_attr_e('Repeat Password','onea-membership') ?>" value="" required />
            </div>
            <?php do_action('onea_membership_additional_registration_field'); ?>
			<div class="eltdf-register-button-holder">
				<?php
				if ( onea_membership_theme_installed() ) {
					echo onea_elated_get_button_html( array(
						'html_type' => 'button',
						'text'      => esc_html__( 'Register', 'onea-membership' ),
						'type'      => 'solid',
						'size'      => 'small'
					) );
				} else {
					echo '<button type="submit">' . esc_html__( 'Register', 'onea-membership' ) . '</button>';
				}
				wp_nonce_field( 'eltdf-ajax-register-nonce', 'eltdf-register-security' ); ?>
			</div>
		</fieldset>
	</form>
	<?php do_action( 'onea_membership_action_login_ajax_response' ); ?>
</div>