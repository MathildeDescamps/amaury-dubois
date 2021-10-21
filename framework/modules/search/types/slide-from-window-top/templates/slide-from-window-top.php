<?php ?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="eltdf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="eltdf-grid">
	<?php } ?>
		<div class="eltdf-search-form-inner">
			<span <?php onea_elated_class_attribute( $search_submit_icon_class ); ?>>
	            <?php echo onea_elated_get_icon_sources_html( 'search', false, array( 'search' => 'yes' ) ); ?>
			</span>
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'onea' ); ?>" name="s" class="eltdf-swt-search-field" autocomplete="off"/>
			<a <?php onea_elated_class_attribute( $search_close_icon_class ); ?> href="#">
				<?php echo onea_elated_get_icon_sources_html( 'search', true, array( 'search' => 'yes' ) ); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
	</div>
	<?php } ?>
</form>