<?php
$eltdf_search_holder_params = onea_elated_get_holder_params_search();
?>
<?php get_header(); ?>
<?php onea_elated_get_title(); ?>
<?php do_action('onea_elated_action_before_main_content'); ?>
	<div class="<?php echo esc_attr( $eltdf_search_holder_params['holder'] ); ?>">
		<?php do_action( 'onea_elated_action_after_container_open' ); ?>
		<div class="<?php echo esc_attr( $eltdf_search_holder_params['inner'] ); ?>">
			<?php onea_elated_get_search_page(); ?>
		</div>
		<?php do_action( 'onea_elated_action_before_container_close' ); ?>
	</div>
<?php get_footer(); ?>