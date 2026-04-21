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
class Why_Choose_Us_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_why_choose_us_v3';
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
		return esc_html__( 'Why Choose Us V3', 'unico' );
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
			'why_choose_us_v3',
			[
				'label' => esc_html__( 'Why Choose Us V3', 'unico' ),
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
			'features_list',
			[
				'label'       => __( 'Feature List', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Feature List', 'unico' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('CPA Marketing', 'unico')],
                			['title1' => esc_html__('Reputation Recover', 'unico')],
							['title1' => esc_html__('Local Search Strategy', 'unico')]
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
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'unico'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'unico')
                			],
							[
                    			'name' => 'style_two',
                    			'label'   => esc_html__( 'Choose Different Icon Color Style', 'unico' ),
								'label_block' => true,
								'type'    => Controls_Manager::SELECT,
								'default' => 'one',
								'options' => array(
									'one' => esc_html__( 'Icon Color Style One', 'unico' ),
									'two'  => esc_html__( 'Icon Color Style Two', 'unico' ),
									'three'  => esc_html__( 'Icon Color Style Three', 'unico' ),
									'Four'  => esc_html__( 'Icon Color Style Four', 'unico' ),
								),
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
        
        <!-- ============================ Service list Start ================================== -->
        <section>
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2 class="mb-3"><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                        <p class="m-a20 f-w6 navy"><?php echo wp_kses( $settings['text'], $allowed_tags );?> </p>
                        <?php $features_list = $settings['features_list'];
                            if(!empty($features_list)){
                            $features_list = explode("\n", ($features_list)); 
                        ?>
                        <ul class="list-style style-2">
                        <?php foreach($features_list as $features): ?>
                            <li><?php echo wp_kses($features, true); ?></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php } ?>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row align-items-center">
                            
                            <div class="col-lg-6 col-md-12 col-sm-12">
                            	<?php $count = 0; foreach($settings['services'] as $key => $item): ?>
                                <?php if(($count%2) == 0 && $count != 0):?>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <?php endif; ?>
                                <div class="small-features-box mb-4" data-aos="fade-up" data-aos-duration="1200">
                                    <div class="small-features-icon <?php if($item['style_two'] == 'four') echo 'bg-light-info text-info'; elseif($item['style_two'] == 'three') echo 'bg-light-danger text-danger'; elseif($item['style_two'] == 'two') echo 'bg-light-warning text-warning'; else echo 'bg-light-success text-success'; ?>">
                                        <i class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></i>
                                    </div>
                                    <h4 class="small-features-caption"><?php echo wp_kses( $item['title1'], true );?></h4>
                                </div>
                                <?php $count++; endforeach; ?>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Service list End ================================== -->
        
		<?php 
	}

}
