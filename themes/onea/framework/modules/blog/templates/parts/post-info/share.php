<?php
$share_type = isset( $share_type ) ? $share_type : 'list';
?>
<?php if ( onea_elated_core_plugin_installed() && onea_elated_options()->getOptionValue( 'enable_social_share' ) === 'yes' && onea_elated_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="eltdf-blog-share">
		<p class="eltdf-social-share-text"><?php _e( 'Share:', 'onea' ); ?></p><?php echo onea_elated_get_social_share_html( array( 'type' => $share_type ) ); ?>
	</div>
<?php } ?>