<div class="eltdf-portfolio-list-holder eltdf-grid-list eltdf-grid-masonry-list eltdf-disable-bottom-space <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<?php echo onea_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/filter', '', $params); ?>
	<div class="eltdf-pl-inner eltdf-outer-space eltdf-masonry-list-wrapper clearfix">
		<div class="eltdf-masonry-grid-sizer"></div>
		<div class="eltdf-masonry-grid-gutter"></div>
		<?php 
			if($query_results->have_posts()):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					echo onea_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'portfolio-item', $item_type, $params);
				endwhile;
			else:
				echo onea_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/posts-not-found');
			endif;
		
			wp_reset_postdata();
		?>
	</div>
	
	<?php echo onea_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'pagination/'.$pagination_type, '', $params, $additional_params); ?>
</div>