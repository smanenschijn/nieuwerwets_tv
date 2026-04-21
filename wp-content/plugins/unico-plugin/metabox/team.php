<?php
return array(
	'title'      => 'Unico Team Setting',
	'id'         => 'unico_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'unico_team' ),
	'sections'   => array(
		array(
			'id'     => 'unico_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'unico' ),
				),
				array(
					'id'    => 'team_url',
					'type'  => 'text',
					'title' => esc_html__( 'Website Link', 'unico' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'unico' ),
				),
			),
		),
	),
);