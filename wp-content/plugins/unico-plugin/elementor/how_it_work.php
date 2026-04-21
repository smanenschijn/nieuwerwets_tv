<?php

namespace UNICOPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class How_It_Work extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_how_it_work';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'How It Work', 'unico' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'unico' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'how_it_work',
			[
				'label' => esc_html__( 'How It Work', 'unico' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
			  'label' => __( 'BG Image', 'unico' ),
			  'type' => Controls_Manager::MEDIA,
			  'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'unico' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'unico' ),
			]
		);
		$this->add_control(
			'video_link',
				[
				  'label' => __( 'Video Url', 'unico' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			  ]
		);
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>
        
        <!-- ============================ Video Section ================================== -->
        <section id="video-features">

            <div class="container-page padd-80 video-bloc" <?php if($settings['bg_image']['id']): ?>style="background: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>);"><?php endif; ?>
                <div class="container">
                    <?php if(($settings['title']) || ($settings['text'])): ?>
                    <div class="row">
                        <div class="col text-center">
                            <div class="sec-heading mx-auto">
                                <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                                <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($settings['video_link']['url']): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-video text-center">
                                <div class="ply-btn">
                                    <a href="<?php echo esc_url( $settings['video_link']['url'] );?>" class="big-video-button lightbox-image">
                                        <i class="ti-control-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Video Section ================================== -->
                
		<?php 
	}

}
