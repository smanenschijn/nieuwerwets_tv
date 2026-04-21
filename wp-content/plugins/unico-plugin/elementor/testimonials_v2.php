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
class Testimonials_v2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'unico_testimonials_v2';
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
        return esc_html__( 'Testimonials V2', 'unico' );
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
            'testimonials_v2',
            [
                'label' => esc_html__( 'Testimonials V2', 'unico' ),
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
                'default' => 25,
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
                'default' => 6,
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
                'default' => 'ASC',
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
			  'label_block' => true,
			  'options' => get_testimonials_categories()
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
					'one' => esc_html__( 'White Background Color', 'unico' ),
					'two'  => esc_html__( 'Gray Background Color', 'unico' )
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
            'post_type'      => 'unico_testimonials',
            'posts_per_page' => unico_set( $settings, 'query_number' ),
            'orderby'        => unico_set( $settings, 'query_orderby' ),
            'order'          => unico_set( $settings, 'query_order' ),
            'paged'         => $paged
        );

        if( unico_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = unico_set( $settings, 'query_category' );
        $query = new \WP_Query( $args );

        if ( $query->have_posts() ) { ?>
		
        <!-- ============================ Testimonial Start ================================== -->
        <section class="<?php if($settings['style_two'] == 'two') echo 'gray'; else echo ''; ?>">
            <div class="container">
            	<?php if(($settings['title']) || ($settings['text'])): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2 <?php if($settings['style_two'] == 'two') echo 'class="font-2 font-normal"'; else echo ''; ?>><?php echo wp_kses( $settings['title'], true );?></h2>
                            <p><?php echo wp_kses( $settings['text'], true );?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                
                    <div class="owl-carousel" id="testimonials-two">
                        <?php $count = 1; while ( $query->have_posts() ) : $query->the_post(); ?>
                        <!-- Single Testimonials -->
                        <div class="item">
                            <div class="testimonial-wrap style-2">
                                <div class="client-thumb-box">
                                    <div class="client-thumb-content">
                                        <div class="client-thumb">
                                            <?php the_post_thumbnail('unico_60x60', array('class' => 'img-responsive img-circle')); ?>
                                        </div>
                                        <h5 class="mb-0"><?php the_title(); ?></h5>
                                        <span><?php echo (get_post_meta( get_the_id(), 'test_designation', true ));?></span>
                                        
                                        <div class="rating">
                                            <?php
											$ratting = get_post_meta( get_the_id(), 'testimonial_rating', true ); 
											for ($x = 1; $x <= 5; $x++) {
												if($x <= $ratting) echo '<span class="fa fa-star"></span>'; else echo '<span class="fa fa-star-o"></span>'; 
												}
											?>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <p><?php echo wp_kses(unico_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                                
                            </div>
                        </div>
                        <?php $count++; endwhile; ?>
                    </div>

                </div>
            
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Testimonial End ================================== -->
        
        <?php }

        wp_reset_postdata();
    }
}
