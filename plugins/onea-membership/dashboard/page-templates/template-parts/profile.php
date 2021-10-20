<div class="eltdf-membership-dashboard-page">
	<div class="eltdf-membership-dashboard-page-content">
		<div class="eltdf-profile-image">
            <?php echo onea_membership_kses_img( $profile_image ); ?>
        </div>
		<p>
			<span><?php esc_html_e( 'First Name', 'onea-membership' ); ?>:</span>
			<?php echo esc_attr($first_name); ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Last Name', 'onea-membership' ); ?>:</span>
			<?php echo esc_attr($last_name); ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Email', 'onea-membership' ); ?>:</span>
			<?php echo esc_attr($email); ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Desription', 'onea-membership' ); ?>:</span>
			<?php echo esc_attr($description); ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Website', 'onea-membership' ); ?>:</span>
			<a href="<?php echo esc_url( $website ); ?>" target="_blank"><?php echo esc_attr($website); ?></a>
		</p>
        <?php do_action('onea_membership_action_dashboard_additional_user_fields');?>
	</div>
</div>
