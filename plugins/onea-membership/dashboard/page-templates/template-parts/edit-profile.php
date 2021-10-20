<?php 

if ( !function_exists('onea_membership_dashboard_edit_profile_fields') ) {
	function onea_membership_dashboard_edit_profile_fields($params){

		extract($params);

		$edit_profile = onea_elated_add_dashboard_fields(array(
			'name' => 'edit_profile',
		));

		$edit_profile_form = onea_elated_add_dashboard_form(array(
			'name' => 'edit_profile_form',
			'form_id'   => 'eltdf-membership-update-profile-form',
			'form_action' => 'onea_membership_update_user_profile',
			'parent' => $edit_profile,
			'button_label' => esc_html__('Update Profile','onea-membership'),
			'button_args' => array(
				'data-updating-text' => esc_html__('Updating Profile', 'onea-membership'),
				'data-updated-text' => esc_html__('Profile Updated', 'onea-membership'),
			)
		));

		$edit_profile_name_group = onea_elated_add_dashboard_group(array(
			'name' => 'edit_profile_name_group',
			'parent' => $edit_profile_form,
		));

		onea_elated_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'first_name',
			'label' => esc_html__('First Name','onea-membership'),
			'parent' => $edit_profile_name_group,
			'value' => $first_name
		));
		
		onea_elated_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'last_name',
			'label' => esc_html__('Last Name','onea-membership'),
			'parent' => $edit_profile_name_group,
			'value' => $last_name
		));

		onea_elated_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'email',
			'label' => esc_html__('Email','onea-membership'),
			'parent' => $edit_profile_form,
			'value' => $email,
			'args' => array(
				'input_type' => 'email'
			)
		));

		onea_elated_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'url',
			'label' => esc_html__('Website','onea-membership'),
			'parent' => $edit_profile_form,
			'value' => $website
		));

		onea_elated_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'description',
			'label' => esc_html__('Description','onea-membership'),
			'parent' => $edit_profile_form,
			'value' => $description
		));

		onea_elated_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'password',
			'label' => esc_html__('Password','onea-membership'),
			'parent' => $edit_profile_form,
			'args' => array(
				'input_type' => 'password'
			)
		));

		onea_elated_add_dashboard_field(array(
			'type' => 'text',
			'name' => 'password2',
			'label' => esc_html__('Repeat Password','onea-membership'),
			'parent' => $edit_profile_form,
			'args' => array(
				'input_type' => 'password'
			)
		));

		do_action('onea_membership_action_additional_edit_profile_fields', $edit_profile_form);

		$edit_profile->render();
	}
}
?>

<div class="eltdf-membership-dashboard-page">
	<div>
		<?php onea_membership_dashboard_edit_profile_fields($params); ?>
		<?php do_action( 'onea_membership_action_login_ajax_response' ); ?>
	</div>
</div>