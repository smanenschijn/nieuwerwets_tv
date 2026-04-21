<?php
/**
 * Footer Template  File
 *
 * @package UNICO
 * @author  Theme Kalia
 * @version 1.0
 */

$options = unico_WSH()->option();

$footer_bg2 = $options->get( 'footer_bg_image2' );
$footer_bg2 = unico_set( $footer_bg2, 'url', UNICO_URI . 'assets/images/footer.png' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>
	
    <!-- ============================ Footer Start ================================== -->
    <footer class="bg-cover skin-dark-footer" style="background:#072544 url(<?php echo esc_url($footer_bg2); ?>) no-repeat">
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ):?>
        <div>
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-lg-12 col-md-12 text-center">
                        <p class="mb-0"><?php echo wp_kses( $options->get( 'copyright_text2', '© 2021 All Rights Reserved' ), $allowed_html ); ?></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->
    