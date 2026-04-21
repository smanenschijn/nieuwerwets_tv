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
class Video_Section extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_video_section';
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
		return esc_html__( 'Video Section', 'unico' );
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
			'video_section',
			[
				'label' => esc_html__( 'Video Section', 'unico' ),
			]
		);
		$this->add_control(
			'bg_image_v1',
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
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'unico' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'unico' ),
				'default'     => __( 'View The Demos', 'unico' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'unico' ),
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
        
        <!-- ============================ Video Start ================================== -->
        <section class="cover height-80 imagebg text-center" data-overlay="5">
            <?php if($settings['bg_image_v1']['id']): ?>
            <div class="bg-img-holder" style="background: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image_v1']['id']));?>); opacity: 1;">
                <img alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>" src="<?php echo esc_url(wp_get_attachment_url($settings['bg_image_v1']['id']));?>">
            </div>
            <?php endif; ?>
            <div class="container pos-vertical-center">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 ">
                        <h1 class="mb-4">
                            <?php echo wp_kses( $settings['title'], $allowed_tags );?>
                        </h1>
                        <?php if($settings['video_link']['url']): ?>
                        <div class="video-block">
                            <div class="video-play-icon modal-trigger">
                                <a href="<?php echo esc_url( $settings['video_link']['url'] );?>" class="lightbox-image"><i class="fa fa-play" aria-hidden="true"></i></a>
                            </div>
                         </div>
                         <?php endif; ?>
                         <?php if($settings['btn_link']['url']): ?>
                         <a class="btn btn-primary border--radius mt-2" href="<?php echo esc_url( $settings['btn_link']['url'] );?>">
                            <span class="btn__text">
                                <?php echo wp_kses( $settings['btn_title'], true);?>
                            </span>
                         </a>
                        <?php endif; ?>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!-- ============================ Video End ================================== -->
        
		<?php 
	}

}
