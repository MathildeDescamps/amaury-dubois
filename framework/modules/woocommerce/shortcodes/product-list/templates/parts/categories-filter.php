<?php if($show_category_filter == 'yes'){ ?>
<div class="eltdf-pl-categories">
    <h6 class="eltdf-pl-categories-label"><?php esc_html_e('Categories','onea'); ?></h6>
	<ul>
        <?php

		if ( ! function_exists( 'onea_elated_echo_product_categories' ) ) {

			function onea_elated_echo_product_categories($variable) {

				return $variable;
			}
		}

		print onea_elated_echo_product_categories($categories_filter_list); ?>
    </ul>
</div>
<?php } ?>