<?php $media_present = !empty(get_post_meta(get_the_ID(), 'eltdf_blog_list_featured_image_meta', true)) || !empty(get_post_meta( get_the_ID(), 'eltdf_post_gallery_images_meta', true )) || has_post_thumbnail(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
			<?php if ($media_present) : ?>
				<?php onea_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
			<?php endif; ?>
            <?php onea_elated_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-info-top">
					<?php if ($media_present) : else : ?>
						<?php onea_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
					<?php endif; ?>
					<?php onea_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php onea_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php
                    if(onea_elated_options()->getOptionValue('show_tags_area_blog') === 'yes') {
                            onea_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
                    } ?>
					<?php onea_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php onea_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php onea_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('onea_elated_action_single_link_pages'); ?>
                </div>
                <div class="eltdf-post-info-bottom clearfix">
                    <div class="eltdf-post-info-bottom-left">
						<?php onea_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                    </div>
                    <div class="eltdf-post-info-bottom-right">
                        <?php onea_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>