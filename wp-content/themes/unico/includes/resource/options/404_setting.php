<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'unico' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'unico' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'unico' ),
				'e' => esc_html__( 'Elementor', 'unico' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'unico' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'unico' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'unico' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'unico' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'unico' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'unico' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'unico' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'unico' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404-page_title',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Title', 'unico' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'unico' ),
		),
		array(
			'id'    => '404-page-text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'unico' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'unico' ),
		),
		array(
			'id'    => '404-page_formid',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Form Url', 'unico' ),
			'desc'  => esc_html__( 'Enter MailChimp Form Url that you want to show', 'unico' ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);