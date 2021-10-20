<?php if(comments_open()) { ?>
	<div class="eltdf-post-info-comments-holder">
		<a itemprop="url" class="eltdf-post-info-comments" href="<?php comments_link(); ?>">
			<?php comments_number('0 ' . esc_html__('Comments','onea'), '1 '.esc_html__('Comment','onea'), '% '.esc_html__('Comments','onea') ); ?>
		</a>
	</div>
<?php } ?>