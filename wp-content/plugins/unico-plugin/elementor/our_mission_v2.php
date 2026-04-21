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
class Our_Mission_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_our_mission_v2';
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
		return esc_html__( 'Our Mission V2', 'unico' );
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
			'our_mission_v2',
			[
				'label' => esc_html__( 'Our Mission V2', 'unico' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'unico' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Sub Title', 'unico' ),
				'default'     => __( 'Our Mission', 'unico' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter title', 'unico' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Very High Speedup', 'unico')],
                			['title1' => esc_html__('Build Your Design', 'unico')],
							['title1' => esc_html__('Fully SEO Friendly', 'unico')],
							['title1' => esc_html__('Work All Browsers', 'unico')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon_image',
                    			'label' => __( 'Icon Image', 'unico' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
							],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'unico')
                			],
						],
            	    'title_field' => '{{title1}}',
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
        
        <!-- ============================ Make Collaboration Start ================================== -->
        <section>
            <div class="container">
                
                <div class="row">
                	<?php if(($settings['subtitle']) || ($settings['title'])): ?>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="mt-4">
                            <h6 class="theme-cl"><?php echo wp_kses( $settings['subtitle'], true );?></h6>
                            <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                        </div>	
                    </div>
                    <?php endif; ?>
                    
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="row">
                        	<?php foreach($settings['services'] as $key => $item): ?>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="large-features-2 style-1 shadow-0 border-0" data-aos="fade-left" data-aos-duration="1200">
                                    <?php if($item['icon_image']['id']): ?>
                                    <div class="large-features-2-thumb">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id']));?>" class="img-responsive" alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>" />
                                    </div>
                                    <?php endif; ?>
                                    <div class="large-features-2-detail">
                                        <h4><?php echo wp_kses( $item['title1'], true );?></h4>
                                        <p><?php echo wp_kses( $item['text'], true );?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Make Collaboration End ================================== -->
        
		<?php 
	}

}