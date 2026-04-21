<?php

namespace UNICOPLUGIN\Element;
    

class Elementor {
	static $widgets = array(
		//Startup Page
		'banner_v1',
		'services_v1',
		'funfacts',
		'market_analysis',
		'why_choose_us',
		'video_section',
		'pricing_plan',
		'our_clients',
		//Business Page
		'banner_v2',
		'our_work_flow',
		'market_analysis_v2',
		'our_features',
		'why_choose_us_v2',
		'testimonials_v1',
		//Agency Page
		'banner_v3',
		'our_partnership',
		'our_developer',
		'our_benifits',
		'call_to_action',
		'latest_news',
		//SEO / SMO Page
		'banner_v4',
		'our_work_flow_v2',
		'seo_report',
		'our_clients_v2',
		'seo_services',
		'video_section_v2',
		'pricing_plan_v2',
		'get_started',
		//Smart Homepages Landing Page
		'our_mission',
		'our_team',
		'video_section_v3',
		'call_to_action_v2',
		//Smart Homepages Digital Marketing
		'our_mission_v2',
		'why_choose_us_v3',
		'testimonials_v2',
		//Smart Homepages Software & App
		'our_mission_v3',
		'our_portfolio',
		'collaboration_work',
		'how_it_work',
		//Smart Homepages Corporate
		'corporate_banner',
		'advance_features',
		//Standard Homepages Digital Studio
		'digital_studio_banner',
		'our_blazing_value',
		'our_features_v2',
		//Standard Homepages Creative Designer
		'creative_banner',
		'why_choose_services',
		'why_people_love',
		//Standard Homepages Business & Corporate
		'business_slider',
		'what_we_do',
		'advance_features_v2',
		'why_people_love_v2',
		'advance_features_v3',
		//Standard Homepages Landing Page One
		'banner_v5',
		'call_to_action_v3',
		'call_to_action_v4',
		//Extra Landing Pages Landing Page Two
		'video_banner',
		'services_v2',
		'call_to_action_v5',
		//Extra Landing Pages Landing Page Three
		'video_banner_v2',
		//Extra Landing Pages Landing Page Four
		'working_banner',
		'about_us',
		'seo_report_v2',
		//Extra Landing Pages Landing Page Five
		'perfect_banner',
		'our_features_v3',
		//Inner Pages
		'who_we_are',
		'funfacts_v2',
		'our_team_v2',
		'our_team_v3',
		'web_development',
		'related_services',
		'contact_us_v1',
		'contact_us_v2',
		'blog_grid_view',
		'blog_2_column',
		'shop_2_column',
		'shop_3_column',
		'shop_with_sidebar',
		'funfacts_v3',
		'list_style',
		'our_tabs',
		'video_2_column',
		
		
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = UNICOPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\UNICOPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'unico',
			[
				'title' => esc_html__( 'Unico', 'unico' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'unico' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();