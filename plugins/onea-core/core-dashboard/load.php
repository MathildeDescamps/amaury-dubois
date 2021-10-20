<?php
if ( ! function_exists( 'onea_core_dashboard_load_files' ) ) {
	function onea_core_dashboard_load_files() {
		require_once ONEA_CORE_ABS_PATH . '/core-dashboard/core-dashboard.php';
		require_once ONEA_CORE_ABS_PATH . '/core-dashboard/rest/include.php';
		require_once ONEA_CORE_ABS_PATH . '/core-dashboard/registration-rest.php';
		require_once ONEA_CORE_ABS_PATH . '/core-dashboard/sub-pages/sub-page.php';
		require_once ONEA_CORE_ABS_PATH . '/core-dashboard/validation-rest.php';

		foreach (glob(ONEA_CORE_ABS_PATH . '/core-dashboard/sub-pages/*/load.php') as $subpages) {
			include_once $subpages;
		}
	}

	add_action('after_setup_theme', 'onea_core_dashboard_load_files');
}