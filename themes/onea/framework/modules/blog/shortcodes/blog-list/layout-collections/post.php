<?php $media_present = !empty(get_post_meta(get_the_ID(), 'eltdf_blog_list_featured_image_meta', true)) || !empty(get_post_meta( get_the_ID(), 'eltdf_post_gallery_images_meta', true )) || has_post_thumbnail();
?>

<li class="eltdf-bl-item eltdf-item-space">
	<div class="eltdf-bli-inner <?php echo get_post_format() ?>">
		<div class="eltdf-post-heading">
			<?php if ($media_present) : ?>
				<?php onea_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params); ?>
			<?php endif; ?>
			<?php if ( $post_info_image == 'yes' ) {
				onea_elated_get_module_template_part('templates/parts/media', 'blog', get_post_format(), $params);;
			} ?>
		</div>
		<div class="eltdf-bli-content">
			<?php if ($post_info_section == 'yes') { ?>
				<div class="eltdf-bli-info">
					<?php
					if ($media_present) : else :
						if ( $post_info_date == 'yes' ) {
							onea_elated_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
						}
					endif;
					if ( $post_info_author == 'yes' ) {
						onea_elated_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
					}
					if ( $post_info_category == 'yes' ) {
						onea_elated_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
					}
					if(onea_elated_options()->getOptionValue('show_tags_area_blog') === 'yes') {
						onea_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $params);
					}
					if ( $post_info_comments == 'yes' ) {
						onea_elated_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
					}
					?>
				</div>
			<?php } ?>

			<?php onea_elated_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>

			<?php  if ( $post_info_excerpt == 'yes' ) { ?>
				<div class="eltdf-bli-excerpt">
					<?php onea_elated_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
				</div>
				<div class="eltdf-post-info-bottom clearfix">
					<div class="eltdf-post-info-bottom-left">
						<?php  if ( $post_info_excerpt == 'yes' ) { ?>
							<?php onea_elated_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
						<?php } ?>
					</div>
					<div class="eltdf-post-info-bottom-right">
						<?php  if ( $post_info_share == 'yes' ) { ?>
							<?php onea_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $params); ?>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</li>