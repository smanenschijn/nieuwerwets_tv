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
class Advance_Features_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_advance_features_v3';
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
		return esc_html__( 'Advance Features V3', 'unico' );
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
			'advance_features_v3',
			[
				'label' => esc_html__( 'Advance Features V3', 'unico' ),
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
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('CPA Marketing', 'unico')],
                			['title' => esc_html__('Reputation Recover', 'unico')],
							['title' => esc_html__('Keyword Research', 'unico')],
							['title' => esc_html__('Local Search Strategy', 'unico')],
            			],
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
                    			'name' => 'title',
                    			'label' => esc_html__('Icon Image Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'style_two',
                    			'label'   => esc_html__( 'Choose Different Icon Style', 'unico' ),
								'label_block' => true,
								'type'    => Controls_Manager::SELECT,
								'default' => 'one',
								'options' => array(
									'one' => esc_html__( 'Icon Color Style One', 'unico' ),
									'two'  => esc_html__( 'Icon Color Style Two', 'unico' ),
									'three'  => esc_html__( 'Icon Color Style Three', 'unico' ),
									'four'  => esc_html__( 'Icon Color Style Four', 'unico' ),
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
		?>
        
        <!-- ============================ Advance features Start ================================== -->
        <section>
            <div class="container">
            	<?php if(($settings['title']) || ($settings['text'])): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                            <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php foreach($settings['services'] as $key => $item): ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="small-features-box mb-4">
                            <div class="small-features-icon <?php if($item['style_two'] == 'four') echo 'bg-light-info text-info'; elseif($item['style_two'] == 'three') echo 'bg-light-danger text-danger'; elseif($item['style_two'] == 'two') echo 'bg-light-warning text-warning'; else echo 'bg-light-success text-success'; ?>">
                                <i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i>
                            </div>
                            <h4 class="small-features-caption"><?php echo wp_kses( $item['title'], $allowed_tags );?></h4>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Advance Features End ================================== -->
        
		<?php 
	}

}