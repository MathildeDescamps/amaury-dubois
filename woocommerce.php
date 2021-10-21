<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$eltdf_sidebar_layout  = onea_elated_sidebar_layout();
$eltdf_grid_space_meta = onea_elated_options()->getOptionValue( 'woo_list_grid_space' );
$eltdf_holder_classes  = ! empty( $eltdf_grid_space_meta ) ? 'eltdf-grid-' . $eltdf_grid_space_meta . '-gutter' : '';

get_header();
onea_elated_get_title();
get_template_part( 'slider' );
do_action('onea_elated_action_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="eltdf-container">
		<div class="theme-description">
			<p>Description à afficher dynamiquement avec une variable comme $theme_description par exemple.</p>
			<button>Voir plus</button>
		</div>
		<div class="eltdf-container-inner clearfix">
			<div class="eltdf-grid-row <?php echo esc_attr( $eltdf_holder_classes ); ?>">
				<div <?php echo onea_elated_get_content_sidebar_class(); ?>>
					<?php onea_elated_woocommerce_content(); ?>
				</div>
				<?php if ( $eltdf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo onea_elated_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
			<?php onea_elated_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>