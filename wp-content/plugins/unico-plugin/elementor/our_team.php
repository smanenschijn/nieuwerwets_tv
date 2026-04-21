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
class Our_Team extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_our_team';
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
		return esc_html__( 'Our Team', 'unico' );
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
			'our_team',
			[
				'label' => esc_html__( 'Our Team', 'unico' ),
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
				'default'     => __( 'Our Expert Team', 'unico' ),
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
				'placeholder' => __( 'Enter your title', 'unico' ),
				'default'     => __( '', 'unico' ),
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
				  'label_block' => true,
				  'options' => get_team_categories()
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
					'two'  => esc_html__( 'Dark Background Color', 'unico' ),
					'three'  => esc_html__( 'Light Weight Heading Style', 'unico' )
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
			'post_type'      => 'unico_team',
			'posts_per_page' => unico_set( $settings, 'query_number' ),
			'orderby'        => unico_set( $settings, 'query_orderby' ),
			'order'          => unico_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( unico_set( $settings, 'query_category' ) ) $args['team_cat'] = unico_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <?php if($settings['style_two'] == 'three'): ?>
        <!-- ============================ Our Partner Start ================================== -->
        <section class="gray">
            <div class="container">
            	<?php if($settings['title'] || $settings['text']): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2 class="font-2 font-normal"><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                            <p><?php echo wp_kses($settings['text'], $allowed_tags);?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                        <div class="our-team" data-aos="fade-up" data-aos-duration="1200">
                            <?php the_post_thumbnail('unico_92x92', array('class' => 'img-responsive')); ?>
                            <h4><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'team_link', true));?>"><?php the_title(); ?></a></h4>
                            <span class="designation bg-success"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                            <p><?php echo wp_kses(unico_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                            <?php
								$icons = get_post_meta( get_the_id(), 'social_profile', true );
								if ( ! empty( $icons ) ) :
							?>
                            <ul class="our-team-profile">
                                <?php
								foreach ( $icons as $h_icon ) :
								$header_social_icons = json_decode( urldecode( unico_set( $h_icon, 'data' ) ) );
								if ( unico_set( $header_social_icons, 'enable' ) == '' ) {
									continue;
								}
								$icon_class = explode( '-', unico_set( $header_social_icons, 'icon' ) );
								?>
								<li><a href="<?php echo unico_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo unico_set( $header_social_icons, 'background' ); ?>; color: <?php echo unico_set( $header_social_icons, 'color' ); ?>"><i class="fa <?php echo esc_attr( unico_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
								<?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Our Partner End ================================== -->
        
        <?php elseif($settings['style_two'] == 'two'): ?>
        
        <!-- ============================ Our Partner Start ================================== -->
        <section class="bg--dark">
            <div class="container">
            	<?php if($settings['title'] || $settings['text']): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2 class="font-2 font-normal"><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                            <p><?php echo wp_kses($settings['text'], $allowed_tags);?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                        <div class="our-team" data-aos="fade-up" data-aos-duration="1200">
                            <?php the_post_thumbnail('unico_92x92', array('class' => 'img-responsive')); ?>
                            <h4><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'team_link', true));?>"><?php the_title(); ?></a></h4>
                            <span class="designation bg-success"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                            <p><?php echo wp_kses(unico_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                            <?php
								$icons = get_post_meta( get_the_id(), 'social_profile', true );
								if ( ! empty( $icons ) ) :
							?>
                            <ul class="our-team-profile">
                                <?php
								foreach ( $icons as $h_icon ) :
								$header_social_icons = json_decode( urldecode( unico_set( $h_icon, 'data' ) ) );
								if ( unico_set( $header_social_icons, 'enable' ) == '' ) {
									continue;
								}
								$icon_class = explode( '-', unico_set( $header_social_icons, 'icon' ) );
								?>
								<li><a href="<?php echo unico_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo unico_set( $header_social_icons, 'background' ); ?>; color: <?php echo unico_set( $header_social_icons, 'color' ); ?>"><i class="fa <?php echo esc_attr( unico_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
								<?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Our Partner End ================================== -->
        
		<?php else: ?>
        
        <!-- ============================ Our Partner Start ================================== -->
        <section>
            <div class="container">
            	<?php if($settings['title'] || $settings['text']): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading mx-auto">
                            <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                            <p><?php echo wp_kses($settings['text'], $allowed_tags);?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                        <div class="our-team" data-aos="fade-up" data-aos-duration="1200">
                            <?php the_post_thumbnail('unico_92x92', array('class' => 'img-responsive')); ?>
                            <h4><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'team_link', true));?>"><?php the_title(); ?></a></h4>
                            <span class="designation bg-theme"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                            <p><?php echo wp_kses(unico_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                            <?php
								$icons = get_post_meta( get_the_id(), 'social_profile', true );
								if ( ! empty( $icons ) ) :
							?>
                            <ul class="our-team-profile">
                                <?php
								foreach ( $icons as $h_icon ) :
								$header_social_icons = json_decode( urldecode( unico_set( $h_icon, 'data' ) ) );
								if ( unico_set( $header_social_icons, 'enable' ) == '' ) {
									continue;
								}
								$icon_class = explode( '-', unico_set( $header_social_icons, 'icon' ) );
								?>
								<li><a href="<?php echo unico_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo unico_set( $header_social_icons, 'background' ); ?>; color: <?php echo unico_set( $header_social_icons, 'color' ); ?>"><i class="fa <?php echo esc_attr( unico_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
								<?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Our Partner End ================================== -->
          
        <?php endif; } 
		wp_reset_postdata();
	}

}
