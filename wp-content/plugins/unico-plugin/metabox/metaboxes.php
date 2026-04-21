<?php
if ( ! function_exists( "unico_add_metaboxes" ) ) {
	function unico_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'event.php'
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( UNICOPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/unico_options/boxes", "unico_add_metaboxes" );
}

