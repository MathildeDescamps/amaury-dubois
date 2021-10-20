<?php
get_header();
if ( onea_membership_theme_installed() ) {
	onea_elated_get_title();
} else { ?>
	<div class="eltdf-membership-title">
		<?php the_title( '<h1>', '</h1>' ); ?>
	</div>
<?php }
do_action('onea_elated_before_main_content');
?>
	<div class="eltdf-container">
		<?php do_action( 'onea_elated_after_container_open' ); ?>
		<div class="eltdf-container-inner clearfix">
            <div class="eltdf-membership-main-wrapper clearfix">
                <?php if ( is_user_logged_in() ) { ?>
                    <div class="eltdf-membership-dashboard-nav-holder clearfix">
                        <?php
                        //Include dashboard navigation
                        echo onea_membership_get_dashboard_template_part( 'navigation' );
                        ?>
                    </div>
                    <div class="eltdf-membership-dashboard-content-holder">
                        <?php echo onea_membership_get_dashboard_pages(); ?>
                    </div>
                <?php } else { ?>
                    <div class="eltdf-login-register-content eltdf-user-not-logged-in">
                        <ul>
                            <li>
                                <a href="#eltdf-login-content"><?php esc_html_e( 'Login', 'onea-membership' ); ?></a>
                            </li>
                            <li>
                                <a href="#eltdf-register-content"><?php esc_html_e( 'Register', 'onea-membership' ); ?></a>
                            </li>
                            <li>
                                <a href="#eltdf-reset-pass-content"><?php esc_html_e( 'Reset Password', 'onea-membership' ); ?></a>
                            </li>
                        </ul>
                        <div class="eltdf-login-content-inner" id="eltdf-login-content">
                            <div
                                class="eltdf-wp-login-holder"><?php echo onea_membership_execute_shortcode( 'eltdf_user_login', array() ); ?>
                            </div>
                        </div>
                        <div class="eltdf-register-content-inner" id="eltdf-register-content">
                            <div
                                class="eltdf-wp-register-holder"><?php echo onea_membership_execute_shortcode( 'eltdf_user_register', array() ) ?>
                            </div>
                        </div>
                        <div class="eltdf-reset-pass-content-inner" id="eltdf-reset-pass-content">
                            <div
                                class="eltdf-wp-reset-pass-holder"><?php echo onea_membership_execute_shortcode( 'eltdf_user_reset_password', array() ) ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
		</div>
		<?php do_action( 'onea_elated_before_container_close' ); ?>
	</div>
<?php get_footer(); ?>