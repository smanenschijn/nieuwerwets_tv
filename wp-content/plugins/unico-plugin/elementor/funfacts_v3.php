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
class Funfacts_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'unico_funfacts_v3';
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
        return esc_html__( 'Funfacts V3', 'unico' );
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
            'funfacts_v3',
            [
                'label' => esc_html__( 'Funfacts V3', 'unico' ),
            ]
        );
		$this->add_control(
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Year Successfull', 'unico')],
                			['title' => esc_html__('Total Employee', 'unico')],
							['title' => esc_html__('Winning Award', 'unico')],
							['title' => esc_html__('Deam Branches', 'unico')]
            			],
            		'fields' => 
						[
							[
                    			'name' => 'counter_value',
                    			'label' => esc_html__('Counter Value', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'style_two',
                    			'label'   => esc_html__( 'Choose Background Color Style', 'unico' ),
								'label_block' => true,
								'type'    => Controls_Manager::SELECT,
								'default' => 'one',
								'options' => array(
									'one' => esc_html__( 'Without Background Color', 'unico' ),
									'two'  => esc_html__( 'White Background Color', 'unico' )
								),
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
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
		
        <!-- ============================ Counter Element ================================== -->
        <section>
            <div class="container">
                <div class="row">
                	<?php foreach($settings['funfact'] as $key => $item): ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 mt-4">
                        <div class="count-box text-center <?php if($item['style_two'] == 'two') echo 'style-2'; else echo ''; ?>">
                            <h2 class="count"><?php echo wp_kses( $item['counter_value'], true ); ?></h2>
                            <h5><?php echo wp_kses( $item['title'], true ); ?></h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
        </section>
        <!-- ============================ Counter Element End ================================== -->
        
        <?php
    }
}
