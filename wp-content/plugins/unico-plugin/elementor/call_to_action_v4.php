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
class Call_To_Action_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_call_to_action_v4';
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
		return esc_html__( 'Call To Action V4', 'unico' );
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
			'call_to_action_v4',
			[
				'label' => esc_html__( 'Call To Action V4', 'unico' ),
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
				'default'     => __( 'Purchase Now!', 'unico' ),
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
            'style_two',
            [
				'label'   => esc_html__( 'Choose Different Style', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose Style One', 'unico' ),
					'two'  => esc_html__( 'Choose Style Two', 'unico' )
				),
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
        
        <?php if($settings['style_two'] == 'two') :?>
        
        <!-- ============================ Short Desc Company ================================== -->
        <section class="pt-0">
            <div class="container">
                <div class="row justify-content-md-center">
                    
                    <div class="col-lg-10 col-md-10">
                        <div class="text-center">
                            <h2 class="font-2 font-normal"><?php echo wp_kses( $settings['title'], true );?></h2>
                            <p class="lead-i"><?php echo wp_kses( $settings['text'], true );?></p>
                            <?php if($settings['btn_link']['url']): ?><a href="<?php echo esc_url( $settings['btn_link']['url'] );?>" class="read-more"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?><i class="ti-arrow-right"></i></a><?php endif; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- ============================ Sort Desc End ================================== -->
        
        <?php else: ?>
        
        <!-- ============================ Tagline & Purchage section ============================ -->
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10">
                    
                        <div class=" text-center" data-aos="fade-up" data-aos-duration="1200">
                            <h2 class="font-2 font-normal"><?php echo wp_kses( $settings['title'], true );?></h2>
                            <p class="lead"><?php echo wp_kses( $settings['text'], true );?></p>
                            <?php if($settings['btn_link']['url']): ?>
                            <a class="btn btn-primary border--radius mt-4" href="<?php echo esc_url( $settings['btn_link']['url'] );?>">
                                <span class="btn__text"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?></span>
                            </a>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Tagline & Purchage section ============================ -->
        
		<?php  endif; 
	}

}
