<?php
return array(
	'title'      => 'Unico Setting',
	'id'         => 'unico_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'unico_project', 'product' ),
	'sections'   => array(
		require_once UNICOPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once UNICOPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once UNICOPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once UNICOPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);