<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'unico' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'unico' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'unico' ),
				'e' => esc_html__( 'Elementor', 'unico' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'unico' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'unico' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'unico' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'unico' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style 4', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
			    ),
				'header_v5'  => array(
				    'alt' => esc_html__( 'Header Style 5', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
			    ),
				'header_v6'  => array(
				    'alt' => esc_html__( 'Header Style 6', 'unico' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header6.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v2',
	    ),
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'unico' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
		array(
		    'id'       => 'show_btn_v1',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'unico' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'unico' ),
			'default'  => 'true',
		    'required' => array( 'header_style_settings', '=', 'header_v1' ),
	    ),
		array(
		    'id'       => 'btn_title_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'unico' ),
		    'required' => array( 'show_btn_v1', '=', true ),
	    ),
		array(
		    'id'       => 'btn_link_v1',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'unico' ),
		    'required' => array( 'show_btn_v1', '=', true ),
	    ),
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'unico' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		array(
		    'id'       => 'show_btn_v2',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'unico' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'unico' ),
			'default'  => 'true',
		    'required' => array( 'header_style_settings', '=', 'header_v2' ),
	    ),
		array(
		    'id'       => 'btn_title_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'unico' ),
		    'required' => array( 'show_btn_v2', '=', true ),
	    ),
		array(
		    'id'       => 'btn_link_v2',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'unico' ),
		    'required' => array( 'show_btn_v2', '=', true ),
	    ),
		/***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'unico' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		array(
		    'id'       => 'show_btn_v3',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'unico' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'unico' ),
			'default'  => 'true',
		    'required' => array( 'header_style_settings', '=', 'header_v3' ),
	    ),
		array(
		    'id'       => 'btn_title_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'unico' ),
		    'required' => array( 'show_btn_v3', '=', true ),
	    ),
		array(
		    'id'       => 'btn_link_v3',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'unico' ),
		    'required' => array( 'show_btn_v3', '=', true ),
	    ),
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Four Settings', 'unico' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
		array(
		    'id'       => 'show_btn_v4',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'unico' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'unico' ),
			'default'  => 'true',
		    'required' => array( 'header_style_settings', '=', 'header_v4' ),
	    ),
		array(
		    'id'       => 'btn_title_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'unico' ),
		    'required' => array( 'show_btn_v4', '=', true ),
	    ),
		array(
		    'id'       => 'btn_link_v4',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'unico' ),
		    'required' => array( 'show_btn_v4', '=', true ),
	    ),
		/***********************************************************************
								Header Version 5 Start
		************************************************************************/
		array(
			'id'       => 'header_v5_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Five Settings', 'unico' ),
			'required' => array( 'header_style_settings', '=', 'header_v5' ),
		),
		array(
		    'id'       => 'show_btn_v5',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'unico' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'unico' ),
			'default'  => 'true',
		    'required' => array( 'header_style_settings', '=', 'header_v5' ),
	    ),
		array(
		    'id'       => 'btn_title_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'unico' ),
		    'required' => array( 'show_btn_v5', '=', true ),
	    ),
		array(
		    'id'       => 'btn_link_v5',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'unico' ),
		    'required' => array( 'show_btn_v5', '=', true ),
	    ),
		/***********************************************************************
								Header Version 6 Start
		************************************************************************/
		array(
			'id'       => 'header_v6_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Six Settings', 'unico' ),
			'required' => array( 'header_style_settings', '=', 'header_v6' ),
		),
		array(
		    'id'       => 'show_btn_v6',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Button', 'unico' ),
		    'desc'     => esc_html__( 'Enable/Disable Button.', 'unico' ),
			'default'  => 'true',
		    'required' => array( 'header_style_settings', '=', 'header_v6' ),
	    ),
		array(
		    'id'       => 'btn_title_v6',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Title', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Title', 'unico' ),
		    'required' => array( 'show_btn_v6', '=', true ),
	    ),
		array(
		    'id'       => 'btn_link_v6',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Button Link', 'unico' ),
		    'desc'     => esc_html__( 'Enter The Button Link', 'unico' ),
		    'required' => array( 'show_btn_v6', '=', true ),
	    ),
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
