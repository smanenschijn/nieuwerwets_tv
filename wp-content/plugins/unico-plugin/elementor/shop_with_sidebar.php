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
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Shop_With_Sidebar extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_shop_with_sidebar';
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
		return esc_html__( 'Shop With Sidebar', 'unico' );
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
			'shop_with_sidebar',
			[
				'label' => esc_html__( 'Shop With Sidebar', 'unico' ),
			]
		);
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => unico_get_sidebars(),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'unico' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'unico' ),
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
				  'options' => get_product_categories(),
				  'label_block' => true,
				]
		);
		$this->add_control(
            'style_two',
            [
				'label'   => esc_html__( 'Choose Sidebar Style', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Left Sidebar Style', 'unico' ),
					'two'  => esc_html__( 'Right Sidebar Style', 'unico' ),
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
		
        $paged = get_query_var('paged');
		$paged = unico_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-unico' );
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => unico_set( $settings, 'query_number' ),
			'orderby'        => unico_set( $settings, 'query_orderby' ),
			'order'          => unico_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( unico_set( $settings, 'query_category' ) ) $args['product_cat'] = unico_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <?php if($settings['style_two'] == 'two') :?>
        
        <!-- ============================ Who We Are Start ================================== -->
        <section>
            <div class="container">
                <?php if($settings['title']): ?>
                <!-- Title & Breadcrumbs-->
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading dark mx-auto">
                            <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                        </div>
                    </div>
                </div>
                <!-- Title & Breadcrumbs End -->
                <?php endif; ?>
                
                <!-- All Product List -->
                <div class="row">
                    <!-- All Product -->
                    <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                        <div class="row">
                        	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <!-- Single Product -->
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <div class="product-wrap">
                                    <div class="product-caption">
                                        <div class="product-caption-info">
                                      
                                            <div class="product-caption-thumb">
                                                <div class="product-caption-content">
													<?php the_post_thumbnail('unico_350x245', array('class' =>'img-fluid mx-auto')); ?>
                                                </div>
                                                
                                                <div class="uc_product_details">
                                                    <h4><?php the_title();?></h4>
                                                    <span class="uc_price"><?php woocommerce_template_loop_price();?></span>
                                                    
                                                    <div class="uc_view_cart">
                                                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('Add To Cart', 'unico'); ?></a>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
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
                	<!-- All Product List End -->
					
					<?php if( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                    <!-- Sidebar -->
                    <div class="col-lg-4 col-md-12 col-sm-12 mb-4 hidden-sm">
                    	<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                    </div>
                    <?php endif; ?>
                    
           		</div>  
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Who We Are End ================================== -->
        
        <?php else: ?>
        
        <!-- ============================ Who We Are Start ================================== -->
        <section>
            <div class="container">
                <?php if($settings['title']): ?>
                <!-- Title & Breadcrumbs-->
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading dark mx-auto">
                            <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                        </div>
                    </div>
                </div>
                <!-- Title & Breadcrumbs End -->
                <?php endif; ?>
                
                <!-- All Product List -->
                <div class="row">
                    <?php if( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                    <!-- Sidebar -->
                    <div class="col-lg-4 col-md-12 col-sm-12 mb-4 hidden-sm">
                    	<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                    </div>
                    <?php endif; ?>
                    <!-- All Product -->
                    <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                        <div class="row">
                        	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <!-- Single Product -->
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                <div class="product-wrap">
                                    <div class="product-caption">
                                        <div class="product-caption-info">
                                      
                                            <div class="product-caption-thumb">
                                                <div class="product-caption-content">
                                                	<?php the_post_thumbnail('unico_350x245', array('class' =>'img-fluid mx-auto')); ?>
                                                </div>
                                                
                                                <div class="uc_product_details">
                                                    <h4><?php the_title();?></h4>
                                                    <span class="uc_price"><?php woocommerce_template_loop_price();?></span>
                                                    
                                                    <div class="uc_view_cart">
                                                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('Add To Cart', 'unico'); ?></a>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
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
                	<!-- All Product List End -->
                
            	</div>
        	</div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Who We Are End ================================== -->
        
        <?php endif; }
		wp_reset_postdata();
	}

}