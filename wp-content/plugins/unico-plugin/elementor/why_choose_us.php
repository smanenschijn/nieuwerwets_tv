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
class Why_Choose_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'unico_why_choose_us';
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
		return esc_html__( 'Why Choose Us', 'unico' );
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
			'why_choose_us',
			[
				'label' => esc_html__( 'Why Choose Us', 'unico' ),
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
			'feature_image',
			[
				'label' => __( 'Feature Image', 'unico' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
            'style_two',
            [
				'label'   => esc_html__( 'Choose Different Style', 'unico' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Image Left Align Style', 'unico' ),
					'two'  => esc_html__( 'Image Right Align Style', 'unico' )
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
        
        <?php if($settings['style_two'] == 'two') :?>
        
        <!-- ============================ What We Do & Who We Are Start ================================== -->
        <section class="p-0">
            <div class="container-fluid p-0">
                <div class="row">
                    <?php if($settings['feature_image']['id']): ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 p-0 image-block">
                        <div class="image-block-holder">
                            <div class="image-block-holder-img" style="background: url(<?php echo esc_url(wp_get_attachment_url($settings['feature_image']['id']));?>);opacity: 1;">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_image']['id']));?>" class="img-responsive img-holder" alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>"/>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                        <div class="image-block-content bg-theme inverse-color">
                            <h2 class="mb-3"><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                            <p class="m-a20 f-w6 navy"><?php echo wp_kses( $settings['text'], $allowed_tags );?> </p>
                            <?php $features_list = $settings['features_list'];
								if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
							<ul class="simple-list">
							<?php foreach($features_list as $features): ?>
								<li><?php echo wp_kses($features, true); ?></li>
							<?php endforeach; ?>
							</ul>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>	
        </section>
        <div class="clearfix"></div>
        <!-- ============================ What We Do & Who We Are End ======================= -->
        
        <?php else: ?>
        
        <!-- ============================ Service list Start ================================== -->
        <section>
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                        <p class="m-a20 f-w6 navy"><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                        <?php $features_list = $settings['features_list'];
							if(!empty($features_list)){
							$features_list = explode("\n", ($features_list)); 
						?>
                        <ul class="list-style style-1">
						<?php foreach($features_list as $features): ?>
                            <li><?php echo wp_kses($features, true); ?></li>
                        <?php endforeach; ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <?php if($settings['feature_image']['id']): ?>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['feature_image']['id']));?>" class="img-fluid mx-auto" alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>" data-aos="fade-right" data-aos-duration="1200">
                    </div>
                    <?php endif; ?>
                </div>
            
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- ============================ Service list End ================================== -->
        <?php endif; ?>
        
		<?php 
	}

}
