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
class Pricing_Plan extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_pricing_plan';
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
		return esc_html__( 'Pricing Plan', 'unico' );
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
			'pricing_plan',
			[
				'label' => esc_html__( 'Pricing Plan', 'unico' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'unico' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter title', 'unico' ),
				'default'     => __( 'Our Best Pricing Plan', 'unico' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Desriptiom', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Desriptiom', 'unico' ),
			]
		);
		$this->add_control(
              'pricing_table', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['plan_title' => esc_html__('Basic', 'unico')],
                			['plan_title' => esc_html__('Standard', 'unico')],
                			['plan_title' => esc_html__('Ultimate', 'unico')]
            			],
            		'fields' => 
						[
							[
                    			'name' => 'plan_title',
                    			'label' => esc_html__('Plan Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'currency_symbol',
                    			'label' => esc_html__('Currency Symbol', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'price',
                    			'label' => esc_html__('Price', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'duration',
                    			'label' => esc_html__('Duration', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'features_list',
                    			'label' => esc_html__('Feature List', 'unico'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Get Started', 'unico')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'Button Url', 'unico' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                    			'name' => 'style_two',
                    			'label'   => esc_html__( 'Choose Popular Table', 'unico' ),
								'label_block' => true,
								'type'    => Controls_Manager::SELECT,
								'default' => 'one',
								'options' => array(
									'one' => esc_html__( 'Disable Feature Table', 'unico' ),
									'two'  => esc_html__( 'Enable Feature Table', 'unico' ),
								),
                			],
            			],
            	    'title_field' => '{{plan_title}}',
                 ]
        );
		$this->add_control(
            'heading_style',
            [
				'label'   => esc_html__( 'Choose Heading Style', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Bold Heading Color', 'unico' ),
					'two'  => esc_html__( 'Normal Heading Color', 'unico' )
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
        
        <!-- ============================ Our Prices Start ================================== -->
        <section>
            <div class="container">
            	<?php if(($settings['title']) || ($settings['text'])): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2 <?php if($settings['heading_style'] == 'two') echo 'class="font-2 font-normal"'; else echo ''; ?>><?php echo wp_kses( $settings['title'], true );?></h2>
                            <p><?php echo wp_kses( $settings['text'], true );?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php foreach($settings['pricing_table'] as $key => $item):?>
                    <div class="col-lg-4 col-md-4">
                        <div class="pricing-wrap pricing-1 <?php if($item['style_two'] == 'two') echo 'featured-price'; else echo '' ; ?> mb-4">
                            
                            <div class="pricing-header">
                                <div class="package-type">
                                    <p><?php echo wp_kses($item['plan_title'], true);?></p>
                                </div>
                                <div class="package-price">
                                    <h2><sup><?php echo wp_kses($item['currency_symbol'], true);?></sup><?php echo wp_kses($item['price'], true);?><sub>/<?php echo wp_kses($item['duration'], true);?></sub></h2>
                                </div>
                            </div>
                            <?php $features_list = $item['features_list'];
							    if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
                            <div class="pricing-detail">
                                <ul>
									<?php foreach($features_list as $features): ?>
                                    <?php echo wp_kses($features, true); ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php } ?>
                            <?php if($item['btn_link']['url']): ?>
                            <div class="buy-now">
                                <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="buy-btn"><?php echo wp_kses($item['btn_title'], true);?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Our Prices End ================================== -->
        
		<?php 
	}

}
