<aside class="eltdf-sidebar">
	<?php
		$eltdf_sidebar = onea_elated_get_sidebar();
		
		if ( is_active_sidebar( $eltdf_sidebar ) ) {
			dynamic_sidebar( $eltdf_sidebar );
		}
	?>
</aside>