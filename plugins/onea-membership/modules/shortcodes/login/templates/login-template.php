<div class="eltdf-social-login-holder">
    <div class="eltdf-social-login-holder-inner">
        <form method="post" class="eltdf-login-form">
            <?php
            $redirect = '';
            if ( isset( $_GET['redirect_uri'] ) ) {
                $redirect = $_GET['redirect_uri'];
            } ?>
            <fieldset>
                <div>
                    <input type="text" name="user_login_name" id="user_login_name" placeholder="<?php esc_attr_e( 'User Name', 'onea-membership' ) ?>" value="" required pattern=".{3,}" title="<?php esc_attr_e( 'Three or more characters', 'onea-membership' ); ?>"/>
                </div>
                <div>
                    <input type="password" name="user_login_password" id="user_login_password" placeholder="<?php esc_attr_e( 'Password', 'onea-membership' ) ?>" value="" required/>
                </div>
                <div class="eltdf-lost-pass-remember-holder clearfix">
                    <span class="eltdf-login-remember">
                        <input name="rememberme" value="forever" id="rememberme" type="checkbox"/>
                        <label for="rememberme" class="eltdf-checbox-label"><?php esc_html_e( 'Remember me', 'onea-membership' ) ?></label>
                    </span>
                </div>
                <input type="hidden" name="redirect" id="redirect" value="<?php echo esc_url( $redirect ); ?>">
                <div class="eltdf-login-button-holder">
                    <a href="<?php echo wp_lostpassword_url(); ?>" class="eltdf-login-action-btn" data-el="#eltdf-reset-pass-content" data-title="<?php esc_attr_e( 'Lost Password?', 'onea-membership' ); ?>"><?php esc_html_e( 'Lost Your password?', 'onea-membership' ); ?></a>
                    <?php
                    if ( onea_membership_theme_installed() ) {
                        echo onea_elated_get_button_html( array(
                            'html_type' => 'button',
                            'text'      => esc_html__( 'Login', 'onea-membership' ),
                            'type'      => 'solid',
                            'size'      => 'small'
                        ) );
                    } else {
                        echo '<button type="submit">' . esc_html__( 'Login', 'onea-membership' ) . '</button>';
                    }
                    ?>
                    <?php wp_nonce_field( 'eltdf-ajax-login-nonce', 'eltdf-login-security' ); ?>
                </div>
            </fieldset>
        </form>
    </div>
    <?php
    if(onea_membership_theme_installed()) {
        //if social login enabled add social networks login
        $social_login_enabled = onea_elated_options()->getOptionValue('enable_social_login') == 'yes' ? true : false;
        if($social_login_enabled) { ?>
            <div class="eltdf-login-form-social-login">
                <div class="eltdf-login-social-title">
                    <?php esc_html_e('Connect with Social Networks', 'onea-membership'); ?>
                </div>
                <div class="eltdf-login-social-networks">
                    <?php do_action('onea_membership_social_network_login'); ?>
                </div>
            </div>
        <?php }
    }
    do_action( 'onea_membership_action_login_ajax_response' );
    ?>
</div>