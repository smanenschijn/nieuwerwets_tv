<?php
return array(
	'title'      => 'Unico Project Setting',
	'id'         => 'unico_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'unico_project' ),
	'sections'   => array(
		array(
			'id'     => 'unico_projects_meta_setting',
			'fields' => array(
				
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'unico' ),
				),
				array(
					'id'    => 'dimension',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Extra height', 'unico' ),
					'options'  => array(
						'normal_width' => esc_html__( 'Normal Width', 'unico' ),
						'medium_width' => esc_html__( 'Medium Width', 'unico' ),
						'extra_width' => esc_html__( 'Large Width', 'unico' ),
					),
					'default'  => 'normal_width',
				),
			),
		),
	),
);