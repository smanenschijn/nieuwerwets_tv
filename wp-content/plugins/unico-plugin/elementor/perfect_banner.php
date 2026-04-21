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
class Perfect_Banner extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_perfect_banner';
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
		return esc_html__( 'Perfect Banner', 'unico' );
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
			'perfect_banner',
			[
				'label' => esc_html__( 'Perfect Banner', 'unico' ),
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
			'btn_title',
			[
				'label'       => __( 'Button Title', 'unico' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'unico' ),
				'default'     => __( 'Find Out More', 'unico' ),
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
		$this->add_control(
			'video_title',
			[
				'label'       => __( 'Video Title', 'unico' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Video Title', 'unico' ),
				'default'     => __( 'Watch Video', 'unico' ),
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
			'graph_image',
				[
				  'label' => __( 'Graph Image', 'unico' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
        
        <!-- ============================ Landing Five Start ================================== -->
        <section class="cover height-100 hero imagebg text-center" <?php if($settings['bg_image']['id']): ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id']));?>),linear-gradient(44deg,#003b77 0%,#06498e 100%)!important;"<?php endif; ?>>
            <div class="style-devider"></div>
            <div class="container pos-vertical-center">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-10">
                        <h1 class="mb-2 font-2 font-normal">
                            <?php echo wp_kses( $settings['title'], $allowed_tags );?>
                        </h1>
                        <p class="lead"><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                        <?php if(($settings['btn_link']['url']) || ($settings['video_link']['url'])): ?>
                        <div class="btn-wrap mt-4 light-vid">
                            <?php if($settings['btn_link']['url']): ?><a href="<?php echo esc_url( $settings['btn_link']['url'] );?>" class="btn btn-primary btn-rounded btn-lg"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?></a><?php endif; ?>
                            <?php if($settings['video_link']['url']): ?><a href="<?php echo esc_url( $settings['video_link']['url'] );?>" class="btn-trans-video ml-2 lightbox-image"><i class="ti-control-play"></i><?php echo wp_kses( $settings['video_title'], $allowed_tags );?></a><?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!--end of row-->
                
                <div class="ht-50"></div>
            </div>
            <!--end of container-->
        </section>
        <?php if($settings['graph_image']['id']): ?>
        <section class="pt-0 overlay-lg-top text-center">
            <div class="container">
                <img src="<?php echo esc_url(wp_get_attachment_url($settings['graph_image']['id']));?>" class="img-fluid mx-auto box-shadow" alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>">
            </div>
        </section>
        <?php endif; ?>
        <div class="clearfix"></div>
        <!-- ============================ Landing Five End ================================== -->
          
		<?php 
	}

}
