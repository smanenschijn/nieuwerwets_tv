<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Unico
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to <a href="%s">Homepage</a>', 'unico'), esc_html(home_url('/')));

$error_page_img    = $options->get( 'error_page_image' );
$error_page_img    = unico_set( $error_page_img, 'url', UNICO_URI . 'assets/images/resource/404.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
<?php get_header();

$data = \UNICO\Includes\Classes\Common::instance()->data( '404' )->get();

do_action( 'unico_banner', $data );

$options = unico_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>   
    
    
    <!-- ============================ Typography Element ================================== -->
    <section class="error-page text-center">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-md-12">
                
                    <h2><?php echo wp_kses( $options->get( '404-page_title' ), $allowed_html ) ? wp_kses( $options->get( '404-page_title' ), $allowed_html ) : esc_html_e( '404', 'unico' ); ?></h2>
                    <p class="lead-i"><?php echo wp_kses( $options->get('404-page-text'), $allowed_html ) ? wp_kses($options->get('404-page-text' ), $allowed_html ) : $text; ?></p>
                    <div class="sidebar mr-auto mx-510 mt-4">
                        <div class="sidebar default-sidebar">
                        <?php get_template_part('searchform'); ?>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </section>
    <!-- ============================ Typography Element End ================================== -->
         
<?php
}
get_footer(); ?>
