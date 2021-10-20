<?php

if ( ! function_exists( 'onea_core_add_intro_masonry_shortcodes' ) ) {
	function onea_core_add_intro_masonry_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'OneaCore\CPT\Shortcodes\IntroMasonry\IntroMasonry'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'onea_core_filter_add_vc_shortcode', 'onea_core_add_intro_masonry_shortcodes' );
}

if ( ! function_exists( 'onea_core_set_intro_masonry_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for intro masonry shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function onea_core_set_intro_masonry_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-intro-masonry-gallery';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'onea_core_filter_add_vc_shortcodes_custom_icon_class', 'onea_core_set_intro_masonry_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'onea_core_add_intro_masonry_attachment_custom_field' ) ) {
	function onea_core_add_intro_masonry_attachment_custom_field( $form_fields, $post = null ) {
		if ( wp_attachment_is_image( $post->ID ) ) {
			$field_value = get_post_meta( $post->ID, 'intro_masonry_image_size', true );
			$delay_value =  get_post_meta( $post->ID, 'intro_masonry_image_anim_delay', true );

			$form_fields['intro_masonry_image_size'] = array(
				'input' => 'html',
				'label' => esc_html__( 'Intro Masonry Image Size', 'onea-core' ),
				'helps' => esc_html__( 'Choose image size for Intro Masonry shortcode item', 'onea-core' )
			);
			
			$form_fields['intro_masonry_image_size']['html'] = "<select name='attachments[{$post->ID}][intro_masonry_image_size]'>";
			$form_fields['intro_masonry_image_size']['html'] .= '<option ' . selected( $field_value, '', false ) . ' value="">' . esc_html__( 'Default', 'onea-core' ) . '</option>';
			$form_fields['intro_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'small', false ) . ' value="small">' . esc_html__( 'Small', 'onea-core' ) . '</option>';
			$form_fields['intro_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'large-width', false ) . ' value="large-width">' . esc_html__( 'Large Width', 'onea-core' ) . '</option>';
			$form_fields['intro_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'large-height', false ) . ' value="large-height">' . esc_html__( 'Large Height', 'onea-core' ) . '</option>';
			$form_fields['intro_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'large-width-height', false ) . ' value="large-width-height">' . esc_html__( 'Large Width Height', 'onea-core' ) . '</option>';
			$form_fields['intro_masonry_image_size']['html'] .= '</select>';


            $form_fields['intro_masonry_image_anim_delay'] = array(
                    'input' => 'html',
                    'label' => esc_html__( 'Intro Masonry FadeIn Delay', 'onea-core' ),
                    'helps' => esc_html__( 'How much time in seconds to delay the fadein effect for this image', 'onea-core' )
            );

            $form_fields['intro_masonry_image_anim_delay']['html'] = "<input name='attachments[{$post->ID}][intro_masonry_image_anim_delay]' value='". $delay_value ."' size='5'>";

		}
		
		return $form_fields;
	}
	
	add_filter( 'attachment_fields_to_edit', 'onea_core_add_intro_masonry_attachment_custom_field', 10, 2 );
}

if ( ! function_exists( 'onea_core_save_intro_masonry_attachment_fields' ) ) {
	/**
	 * @param array $post
	 * @param array $attachment
	 *
	 * @return array
	 */
	function onea_core_save_intro_masonry_attachment_fields( $post, $attachment ) {
		
		if ( isset( $attachment['intro_masonry_image_size'] ) ) {
			update_post_meta( $post['ID'], 'intro_masonry_image_size', $attachment['intro_masonry_image_size'] );
		}
        if ( isset( $attachment['intro_masonry_image_anim_delay'] ) ) {
            update_post_meta($post['ID'], 'intro_masonry_image_anim_delay', $attachment['intro_masonry_image_anim_delay']);
        }
		return $post;
	}
	
	add_filter( 'attachment_fields_to_save', 'onea_core_save_intro_masonry_attachment_fields', 10, 2 );
}