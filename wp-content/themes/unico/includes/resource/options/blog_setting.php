<?php

return array(
	'title'  => esc_html__( 'Blog Page Settings', 'unico' ),
	'id'     => 'blog_setting',
	'desc'   => '',
	'icon'   => 'el el-indent-left',
	'fields' => array(
		array(
			'id'      => 'blog_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Blog Source Type', 'unico' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'unico' ),
				'e' => esc_html__( 'Elementor', 'unico' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'blog_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'unico' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'blog_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'blog_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Blog Default', 'unico' ),
			'indent'   => true,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'blog_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'unico' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'unico' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'unico' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'unico' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'unico' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'unico' ),
			'default'  => '',
			'required' => array( 'blog_page_banner', '=', true ),
		),

		array(
			'id'       => 'blog_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'unico' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'unico' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'unico' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'unico' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'unico' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'blog_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'unico' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'unico' ),
			'required' => array(
				array( 'blog_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => unico_get_sidebars(),
		),
		array(
			'id'      => 'blog_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Date', 'unico' ),
			'desc'    => esc_html__( 'Enable to show post data on posts listing', 'unico' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'unico' ),
			'desc'    => esc_html__( 'Enable to show author on posts listing', 'unico' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_post_comment',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'unico' ),
			'desc'    => esc_html__( 'Enable to show Comment on posts listing', 'unico' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
	),
);





