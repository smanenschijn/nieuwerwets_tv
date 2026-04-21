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
class Blog_2_Column extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_blog_2_column';
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
		return esc_html__( 'Blog 2 Column', 'unico' );
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
			'blog_2_column',
			[
				'label' => esc_html__( 'Blog 2 Column', 'unico' ),
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
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'unico' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'unico' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'unico'),
				  'label_block' => true,
				  'options' => get_blog_categories()
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
		
        $paged = get_query_var('paged');
		$paged = unico_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-unico' );
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => unico_set( $settings, 'query_number' ),
			'orderby'        => unico_set( $settings, 'query_orderby' ),
			'order'          => unico_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( unico_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = unico_set( $settings, 'query_exclude' );
		}
		if( unico_set( $settings, 'query_category' ) ) $args['category_name'] = unico_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- ============================ Blog Grid Start ================================== -->
        <section>
            <div class="container">
                
                <div class="row">
					<?php 
						while ( $query->have_posts() ) : $query->the_post(); 
					?>
                    <!-- Single Blog Grid -->
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-grid-wrap mb-4">
                            <div class="blog-grid-thumb">
                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('unico_560x300', array('class' => 'img-responsive')); ?></a>
                                <div class="bg-cat-info">
                                    <h6><?php the_category(' '); ?></h6>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            </div>
                            <div class="blog-grid-content">
                                <h4 class="cnt-gb-title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
                                <p><?php echo wp_kses(unico_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                            </div>
                            <div class="blog-grid-meta">
                                <div class="gb-info-author">
                                    <p><strong><?php esc_html_e('By', 'unico'); ?> </strong><?php the_author(); ?></p>
                                </div>
                                <div class="gb-info-cmt">
                                    <ul>
                                        <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0' , 'unico'), true), wp_kses(__('1' , 'unico'), true), wp_kses(__('%' , 'unico'), true)); ?><i class="fa fa-comment theme-cl"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="bs-example">
                            <?php unico_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="ti-arrow-right"></i> ', 'prev_text' => '<i class="ti-arrow-left"></i>')); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Blog Grid End ================================== -->
              
        <?php }
		wp_reset_postdata();
	}

}
