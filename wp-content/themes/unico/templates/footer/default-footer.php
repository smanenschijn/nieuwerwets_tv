<?php
/**
 * Footer Template  File
 *
 * @package UNICO
 * @author  Theme Kalia
 * @version 1.0
 */

$options = unico_WSH()->option();

$footer_bg = $options->get( 'footer_bg_image' );
$footer_bg = unico_set( $footer_bg, 'url', UNICO_URI . 'assets/images/app1.png' );

$allowed_html = wp_kses_allowed_html( 'post' );

?>
	
    <!-- ============================ Footer Start ================================== -->
    <footer class="bg-cover skin-dark-footer" style="background:#0d1527 <?php if($footer_bg): ?>url(<?php echo esc_url($footer_bg); ?>) no-repeat"<?php endif; ?>>
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
                        <p class="mb-0"><?php echo wp_kses( $options->get( 'copyright_text', '© 2021 All Rights Reserved' ), $allowed_html ); ?></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->
	