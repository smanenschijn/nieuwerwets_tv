<?php
return array(
	'title'      => 'Unico Service Setting',
	'id'         => 'unico_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'unico_service' ),
	'sections'   => array(
		array(
			'id'     => 'unico_service_meta_setting',
			'fields' => array(
				array(
                    'id'       => 'service_icon',
                    'type'     => 'select',
                    'title'    => esc_html__('Service Icons', 'unico'),
                    'options'  => get_fontawesome_icons(),
                ),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'unico' ),
				),
			),
		),
	),
);