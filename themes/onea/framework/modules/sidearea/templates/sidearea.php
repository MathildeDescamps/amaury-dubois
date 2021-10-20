<section class="eltdf-side-menu">
	<a <?php onea_elated_class_attribute( $close_icon_classes ); ?> href="#">
		<?php echo onea_elated_get_icon_sources_html( 'side_area', true ); ?>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>