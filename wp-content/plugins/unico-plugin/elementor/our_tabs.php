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
class Our_Tabs extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'unico_our_tabs';
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
        return esc_html__( 'Our Tabs', 'unico' );
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
            'our_tabs',
            [
                'label' => esc_html__( 'Our Tabs', 'unico' ),
            ]
        );
		$this->add_control(
              'tab_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['btn_title' => esc_html__('Home', 'unico')],
                			['btn_title' => esc_html__('Profile', 'unico')],
							['btn_title' => esc_html__('Contact', 'unico')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Tab Button Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Description', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'unico')
                			],
						],
            	    'title_field' => '{{btn_title}}',
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
		
        <!-- ============================ Counter Start ================================== -->
        <section class="pt-0 mt-0">
            <div class="container">
            	<div class="row mt-4">
					
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="custom-tab style-1">
                            <ul class="nav nav-tabs" role="tablist">
                                <?php foreach($settings['tab_info'] as $key => $item): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($key == 1) echo 'active';?>" data-toggle="tab" href="#home<?php echo esc_attr($key);?>" role="tab"><?php echo wp_kses( $item['btn_title'], true );?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tab-content">
                                <?php foreach($settings['tab_info'] as $key => $item): ?>
                                <div class="tab-pane fade <?php if($key == 1) echo 'show active';?>" id="home<?php echo esc_attr($key);?>">
                                    <p><?php echo wp_kses( $item['text'], true );?></p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Counter End ================================== -->
        
        <?php
    }
}
