<?php
get_header();
onea_elated_get_title();
do_action( 'onea_elated_action_before_main_content' ); ?>
<div class="eltdf-container eltdf-default-page-template">
	<?php do_action( 'onea_elated_action_after_container_open' ); ?>
	<div class="eltdf-container-inner clearfix">
		<?php
			$onea_taxonomy_id   = get_queried_object_id();
			$onea_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$onea_taxonomy      = ! empty( $onea_taxonomy_id ) ? get_term_by( 'id', $onea_taxonomy_id, $onea_taxonomy_type ) : '';
			$onea_taxonomy_slug = ! empty( $onea_taxonomy ) ? $onea_taxonomy->slug : '';
			$onea_taxonomy_name = ! empty( $onea_taxonomy ) ? $onea_taxonomy->taxonomy : '';
			
			onea_core_get_archive_portfolio_list( $onea_taxonomy_slug, $onea_taxonomy_name );
		?>
	</div>
	<?php do_action( 'onea_elated_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
