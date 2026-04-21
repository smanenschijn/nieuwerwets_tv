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
class Video_2_Column extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_video_2_column';
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
		return esc_html__( 'Video 2 Column', 'unico' );
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
			'video_2_column',
			[
				'label' => esc_html__( 'Video 2 Column', 'unico' ),
			]
		);
		$this->add_control(
              'video', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[ ],
            		'fields' => 
						[
                			[
								'name' => 'video_image',
								'label' => __( 'Video Image Url', 'unico' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
							],
							[
                    			'name' => 'video_link',
								'label' => __( 'Video Url', 'unico' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
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
			'video_link2',
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
			'video_link3',
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
		?>
        
        <!-- ============================ Video Element ================================== -->
        <section>
            <div class="container">
                <div class="row">
                    <?php foreach($settings['video'] as $key => $item): ?>
                    <div class="col-md-6 col-lg-6 mb-5">
                        <div class="imagebg height-60 border--radius border--round box-shadow" data-overlay="3">
                            <?php if($item['video_image']['id']): ?>
                            <div class="bg-img-holder" style="background: url(<?php echo esc_url(wp_get_attachment_url($item['video_image']['id']));?>); opacity: 1;">
                                <img alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>" src="<?php echo esc_url(wp_get_attachment_url($item['video_image']['id']));?>">
                            </div>
                            <?php endif; ?>
                            <?php if($item['video_link']['url']): ?>
                            <div class="container pos-vertical-center">
                                <div class="row text-center justify-content-center">
                                    <div class="video-block">
                                        <div class="video-play-icon modal-trigger">
                                            <a href="<?php echo esc_url( $item['video_link']['url'] );?>" class="lightbox-image"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <?php if($settings['video_link2']['url']): ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="btn-wrap mt-4">
                            <a href="<?php echo esc_url( $settings['video_link3']['url'] );?>"  class="btn-trans-video ml-2 lightbox-image"><i class="ti-control-play"></i><?php echo wp_kses( $settings['video_title'], true );?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($settings['video_link3']['url']): ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="text-video text-center">
                            <div class="ply-btn">
                                <a href="<?php echo esc_url( $settings['video_link3']['url'] );?>" class="big-video-button lightbox-image">
                                    <i class="ti-control-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
		<?php 
	}

}