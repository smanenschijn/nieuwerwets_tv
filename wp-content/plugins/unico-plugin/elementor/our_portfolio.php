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
class Our_Portfolio extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_our_portfolio';
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
		return esc_html__( 'Our Portfolio', 'unico' );
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
			'our_portfolio',
			[
				'label' => esc_html__( 'Our Portfolio', 'unico' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter title', 'unico' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'unico' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Text', 'unico' ),
			]
		);
		$this->add_control(
			'number',
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'unico' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'unico' ),
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
		
		$paged = get_query_var('paged');
		$paged = unico_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-fixkar' );
		$args = array(
			'post_type'      => 'unico_project',
			'posts_per_page' => unico_set( $settings, 'number' ),
			'orderby'        => unico_set( $settings, 'query_orderby' ),
			'order'          => unico_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",unico_set( $settings, 'cat_exclude' ));
		if(unico_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 port-item <?php echo esc_attr($term_slug); ?>">
                <div class="portfolio-wrap portfolio-inner">
                    <?php the_post_thumbnail('unico_360x225'); ?>
                    <div class="label">
                        <div class="label-text">
                            <a href="<?php echo esc_url($post_thumbnail_url);?>" data-fancybox="gallery" class="text-title"><?php the_title(); ?></a>
                            <span class="lead-i"><?php echo implode( ', ', (array)$term_list );?></span>
                        </div>
                        <div class="label-bg"></div>
                    </div>
                    <div class="zoom">
                        <a href="<?php echo esc_url($post_thumbnail_url);?>" data-fancybox="gallery" data-caption="">
                            <i class="ti-zoom-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('project_cat')); ?>
            
            <!-- ============================== Portfolio Start ============================ -->
			<section class="<?php if($settings['style_two'] == 'two') echo 'gray'; else echo ''; ?>" id="portfolio">
				<div class="container">
					<?php if(($settings['title']) || ($settings['text'])): ?>
					<div class="row">
						<div class="col text-center">
							<div class="sec-heading mx-auto">
								<h2><?php echo wp_kses( $settings['title'], true );?></h2>
                            	<p><?php echo wp_kses( $settings['text'], true );?></p>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="row">
				
						<div class="col-lg-12 col-md-12 col-xs-12">
							<div class="portfolio-sort">
								<ul class="sorting clearfix center-grid">
									<li class="sort-btn active" data-filter="*"><?php esc_attr_e('All', 'unico');?></li>
									<?php foreach( $fliteration as $t ): ?>
                                    <li class="sort-btn" data-role="button" data-filter=".<?php echo esc_attr(unico_set( $t, 'slug' )); ?>"><?php echo unico_set( $t, 'name'); ?></li>
                                    <?php endforeach;?>
                                </ul>
							</div>
					
							<div class="row portfolio-gallary">
								<?php echo wp_kses($data_posts, true); ?>							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================== Portfolio End ========================== -->
            
    	<?php }
	}

}
