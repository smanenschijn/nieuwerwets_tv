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
class Business_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_business_slider';
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
		return esc_html__( 'Business Slider', 'unico' );
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
			'business_slider',
			[
				'label' => esc_html__( 'Business Slider', 'unico' ),
			]
		);
		$this->add_control(
              'slider', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Love With London', 'unico')],
                			['title' => esc_html__('Truth Builds Trust', 'unico')],
							['title' => esc_html__('Moving Business Forward', 'unico')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'slide_image',
                    			'label' => __( 'Slide Image', 'unico' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
							],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'unico'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'unico'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'External Url', 'unico' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                    			'name' => 'btn_title2',
                    			'label' => esc_html__('Button Title V2', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'btn_link2',
								'label' => __( 'External Url V2', 'unico' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
            	    'title_field' => '{{title}}',
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
        
        <!-- ============================ Hero Slider Banner  Start================================== -->
        <div class="ct-header ct-header--slider ct-slick-custom-dots text-center overlap-bg" id="home">
            <div class="ct-slick-homepage" data-arrows="true" data-autoplay="true">
                <?php foreach($settings['slider'] as $key => $item): ?>
                <div class="ct-header slick-slide-animate tablex item" <?php if($item['slide_image']['id']): ?>data-background="<?php echo esc_url(wp_get_attachment_url($item['slide_image']['id']));?>"<?php endif; ?>>
                    <div class="ct-u-display-tablex">
                        <div class="inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 slider-inner">
                                        <h1 class="big"><?php echo wp_kses( $item['title'], true );?></h1>
                                        <p><?php echo wp_kses( $item['text'], true );?></p>
                                        <?php if(($item['btn_link']['url']) || ($item['btn_link2']['url'])): ?>
                                        <div class="btn-sec">
                                            <?php if($item['btn_link']['url']): ?><a href="<?php echo esc_url( $item['btn_link']['url'] );?>" class="btn-lg btn-primary btn-rounded"><?php echo wp_kses( $item['btn_title'], $allowed_tags );?></a><?php endif; ?>
                                            <?php if($item['btn_link2']['url']): ?><a href="<?php echo esc_url( $item['btn_link2']['url'] );?>" class="btn-video"><i class="fa fa-play"></i> <?php echo wp_kses( $item['btn_title2'], $allowed_tags );?></a><?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><!-- .ct-slick-homepage -->
        </div>
        <div class="clearfix"></div>  
        <!-- ============================ Hero Slider Banner End ================================== -->
        
		<?php 
	}

}