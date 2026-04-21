<?php namespace UNICOPLUGIN\Element;

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
class Our_Work_Flow extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'unico_our_work_flow';
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
        return esc_html__( 'Our Work Flow', 'unico' );
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
            'our_work_flow',
            [
                'label' => esc_html__( 'Our Work Flow', 'unico' ),
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
				'placeholder' => __( 'Enter The Title', 'unico' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Description', 'unico' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Product Development', 'unico')],
                			['title1' => esc_html__('Marketing Planning', 'unico')],
							['title1' => esc_html__('24x7 Online Support', 'unico')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'alphabet_letter',
                    			'label' => esc_html__('Alphabet Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::SELECT2,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Description', 'unico'),
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
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
		
        <!-- ============================ What We Do Start ================================== -->
        <section>
            <div class="container">
            	<?php if(($settings['title']) || ($settings['text'])): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                            <p><?php echo wp_kses( $settings['text'], true );?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php $count = 1; foreach($settings['services'] as $key => $item): ?>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="large-hover-features-box <?php if($count == 2) echo 'active'; ?>" data-aos="fade-down" data-aos-duration="1200">
                            <div class="large-hover-features-box-item">
                                <span class="step"><?php echo wp_kses( $item['alphabet_letter'], true ); ?></span>
                                <div class="large-hover-features-box-icon icon-center"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']) ); ?>"></i></div>
                                <div class="large-hover-features-box-content">
                                    <h4><?php echo wp_kses( $item['title1'], true ); ?></h4>
                                    <p><?php echo wp_kses( $item['text1'], true ); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++; endforeach; ?>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ What We Do End ================================== -->
        
        <?php
    }
}
