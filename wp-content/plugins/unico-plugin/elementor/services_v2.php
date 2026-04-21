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
class Services_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_Services_V2';
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
		return esc_html__( 'Services V2', 'unico' );
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
			'services_v2',
			[
				'label' => esc_html__( 'Services V2', 'unico' ),
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'unico' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'unico' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'unico' ),
					'title'      => esc_html__( 'Title', 'unico' ),
					'menu_order' => esc_html__( 'Menu Order', 'unico' ),
					'rand'       => esc_html__( 'Random', 'unico' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'unico' ),
					'ASC'  => esc_html__( 'ASC', 'unico' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'unico'),
				  'options' => get_service_categories(),
				  'label_block' => true,
				]
		);
		$this->add_control(
            'style_two',
            [
				'label'   => esc_html__( 'Choose Background Color Style', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Light Background Color', 'unico' ),
					'two'  => esc_html__( 'Dark Background Color', 'unico' )
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
		
        $paged = unico_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-unico' );
		$args = array(
			'post_type'      => 'unico_service',
			'posts_per_page' => unico_set( $settings, 'query_number' ),
			'orderby'        => unico_set( $settings, 'query_orderby' ),
			'order'          => unico_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( unico_set( $settings, 'query_category' ) ) $args['service_cat'] = unico_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- ============================ All Tools Start ================================== -->
        <section class="<?php if($settings['style_two'] == 'two') echo 'bg--dark'; else echo ''; ?>">
            <div class="container">
                <?php if(($settings['title']) || ($settings['text'])): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2 class="font-2 font-normal"><?php echo wp_kses( $settings['title'], true );?></h2>
                            <p><?php echo wp_kses( $settings['text'], true );?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="feature feature-1">
                            <?php the_post_thumbnail('unico_360x240', array('class' => 'img-responsive')); ?>
                            <div class="feature__body boxed boxed--border">
                                <h4><?php the_title();?></h4>
                                <p><?php echo wp_kses(unico_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                <a href="<?php echo (get_post_meta( get_the_id(), 'ext_url', true ));?>" class="read-more"><?php esc_html_e('Read More', 'unico'); ?><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ All Tools End ================================== -->
        
        <?php }
		wp_reset_postdata();
	}

}
