<?php if ( ! onea_elated_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="eltdf-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'onea' ),
				'custom_class' => 'eltdf-blog-list-button'
			);
			
			echo onea_elated_return_button_html( $button_params );
		?>
	</div>
<?php } ?>