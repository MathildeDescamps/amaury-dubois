<?php
$current_user    = wp_get_current_user();
$name            = $current_user->display_name;
$current_user_id = $current_user->ID;
$membership_page_url = onea_membership_get_dashboard_page_url();
?>
<div class="eltdf-logged-in-user">
    <div class="eltdf-logged-in-user-inner">
        <span>
            <?php if ( onea_membership_theme_installed() ) {
                $profile_image = get_user_meta( $current_user_id, 'social_profile_image', true );
                if ( $profile_image == '' ) {
                    $profile_image = get_avatar( $current_user_id, 28 );
                } else {
                    $profile_image = '<img src="' . esc_url( $profile_image ) . '" />';
                }
                echo onea_membership_kses_img( $profile_image );
            } ?>
            <span class="eltdf-logged-in-user-name"><?php echo esc_html( $name ); ?></span>
            <?php if ( onea_membership_theme_installed() ) {
                echo onea_elated_icon_collections()->renderIcon( 'arrow_triangle-down', 'font_elegant' );
            } ?>
        </span>
    </div>
</div>
<ul class="eltdf-login-dropdown">
	<?php
	$nav_items = onea_membership_get_dashboard_navigation_items();
    $logout_url = $membership_page_url !== '' ? $membership_page_url : home_url( '/' );
	foreach ( $nav_items as $nav_item ) { ?>
		<li>
			<a href="<?php echo esc_url($nav_item['url']); ?>">
                <span>
				    <?php echo esc_attr($nav_item['text']); ?>
                </span>
			</a>
		</li>
	<?php } ?>
	<li>
		<a href="<?php echo wp_logout_url( $logout_url ); ?>">
			<?php esc_html_e( 'Log Out', 'onea-membership' ); ?>
		</a>
	</li>
</ul>