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
class List_Style extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'unico_list_style';
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
        return esc_html__( 'List Style', 'unico' );
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
            'list_style',
            [
                'label' => esc_html__( 'List Style', 'unico' ),
            ]
        );
		$this->add_control(
              'list_view', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['features_list' => esc_html__('Enter Features List', 'unico')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'features_list',
                    			'label' => esc_html__('Feature List', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'style_two',
                    			'label'   => esc_html__( 'Choose List Style', 'unico' ),
								'label_block' => true,
								'type'    => Controls_Manager::SELECT,
								'default' => 'one',
								'options' => array(
									'one' => esc_html__( 'List Style One', 'unico' ),
									'two'  => esc_html__( 'List Style Two', 'unico' ),
									'three'  => esc_html__( 'List Style Three', 'unico' ),
								),
                			],
						],
            	    'title_field' => '{{features_list}}',
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
		
        <!-- ============================ List Style Element ================================== -->
        <section>
            <div class="container">
                <div class="row">
                    <?php foreach($settings['list_view'] as $key => $item): ?>
                    <div class="col-lg-4 col-md-4">
                        <?php $features_list = $item['features_list'];
						    if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
                        <ul class="<?php if($item['style_two'] == 'three') echo 'simple-list'; elseif($item['style_two'] == 'two') echo 'list-style style-2'; else echo 'list-style style-1'; ?>">
                            <?php foreach($features_list as $features): ?>
							<li><?php echo wp_kses($features, true); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <?php endforeach; ?>
                                        
                </div>
            </div>
        </section>
        <!-- ============================ List Style Element End ================================== -->
        
        <?php
    }
}
