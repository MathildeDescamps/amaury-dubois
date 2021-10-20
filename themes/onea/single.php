<?php
get_header();
onea_elated_get_title();
get_template_part( 'slider' );
do_action('onea_elated_action_before_main_content');

if ( have_posts() ) : while ( have_posts() ) : the_post();
	//Get blog single type and load proper helper
	onea_elated_include_blog_helper_functions( 'singles', 'standard' );
	
	//Action added for applying module specific filters that couldn't be applied on init
	do_action( 'onea_elated_action_blog_single_loaded' );
	
	//Get classes for holder and holder inner
	$eltdf_holder_params = onea_elated_get_holder_params_blog();
	?>
	
	<div class="<?php echo esc_attr( $eltdf_holder_params['holder'] ); ?>">
		<?php do_action( 'onea_elated_action_after_container_open' ); ?>
		
		<div class="<?php echo esc_attr( $eltdf_holder_params['inner'] ); ?>">
			<?php onea_elated_get_blog_single( 'standard' ); ?>
		</div>
		
		<?php do_action( 'onea_elated_action_before_container_close' ); ?>
	</div>
<?php endwhile; endif;

get_footer(); ?>