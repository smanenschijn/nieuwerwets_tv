<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'unico' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'unico' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'unico' ),
				'e' => esc_html__( 'Elementor', 'unico' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'unico' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'unico' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'unico' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'unico' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			    ),
			    'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
			    ),
				'footer_v5'  => array(
				    'alt' => esc_html__( 'Footer Style 5', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer5.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_v4',
	    ),
		
		array(
			'id'      => 'signup_form',
			'type'    => 'textarea',
			'title'   => __( 'Signup Form', 'unico' ),
			'desc'    => esc_html__( 'Enter the Embed Code From Contact Form 7', 'unico' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'       => 'footer_bg_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer BG Image', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'unico' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'       => 'footer_bg_image2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer BG Image', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'copyright_text2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'unico' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'       => 'footer_logo_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'copyright_text3',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'unico' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'copyright_text_v4',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'unico' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		/***********************************************************************
								Footer Version 5 Start
		************************************************************************/
		array(
			'id'       => 'footer_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Five Settings', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'       => 'footer_bg_image3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer BG Image', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'      => 'copyright_text5',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'unico' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'unico' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v5' ),
		),
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
