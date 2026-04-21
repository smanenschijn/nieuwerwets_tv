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
class Who_We_Are extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_who_we_are';
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
		return esc_html__( 'Who We Are', 'unico' );
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
			'who_we_are',
			[
				'label' => esc_html__( 'Who We Are', 'unico' ),
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
			'text1',
			[
				'label'       => __( 'Next Description', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'unico' ),
			]
		);
		$this->add_control(
              'social_icon', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'fields' => 
						[
                			[
								'name' => 'icons',
								'label' => esc_html__('Select Icon', 'unico'),
								'label_block' => true,
								'type' => Controls_Manager::SELECT2,
								'options' => get_fontawesome_icons(),
							],
							[
                    			'name' => 'social_link',
								'label' => __( 'Social Url', 'unico' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
						],
                 ]
        );
		$this->add_control(
			'feature_image',
			[
			  'label' => __( 'Feature Image', 'unico' ),
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
        
        <!-- ============================ Who We Are Start ================================== -->
        <section>
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-lg-6 col-md-6">
                        <div class="about-content">
                            <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                            <p><?php echo wp_kses( $settings['text'], $allowed_tags );?> </p>
                            <p><?php echo wp_kses( $settings['text1'], $allowed_tags );?> </p>
                            
                            <ul class="our-team-profile ts-light-bg">
                                <?php foreach($settings['social_icon'] as $key => $item): ?>
                                <li><a href="<?php echo esc_url( $item['social_link']['url'] );?>"><i class="fa <?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i></a></li>
                                <?php endforeach; ?>
                            </ul>
                            
                        </div>
                    </div>
                    <?php if($settings['feature_image']['id']): ?>
                    <div class="col-lg-6 col-md-6">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_image']['id']));?>" class="img-fluid mx-auto" alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>">
                    </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Who We Are End ================================== -->
        
		<?php 
	}

}
