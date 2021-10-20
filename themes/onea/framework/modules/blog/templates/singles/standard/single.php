<?php

onea_elated_get_single_post_format_html( $blog_single_type );

do_action( 'onea_elated_action_after_article_content' );

onea_elated_get_module_template_part( 'templates/parts/single/author-info', 'blog' );

onea_elated_get_module_template_part( 'templates/parts/single/single-navigation', 'blog' );

onea_elated_get_module_template_part( 'templates/parts/single/related-posts', 'blog', '', $single_info_params );

onea_elated_get_module_template_part( 'templates/parts/single/comments', 'blog' );