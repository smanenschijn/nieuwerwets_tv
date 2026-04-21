<?php
/**
 * Footer Template  File
 *
 * @package UNICO
 * @author  Theme Kalia
 * @version 1.0
 */

$options = unico_WSH()->option();

$footer_logo_img = $options->get( 'footer_logo_image' );
$footer_logo_img = unico_set( $footer_logo_img, 'url', UNICO_URI . 'assets/images/logo.png' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>
	
    <!-- ============================== Footer Start ============================ -->
    <footer class="footer-small ft-light">
        <div class="container">
            <?php if($footer_logo_img): ?>
            <div class="footer-content mb-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="text-center">
                            <img src="<?php echo esc_url($footer_logo_img); ?>" class="img-fluid mx-auto" alt="<?php esc_attr_e('Awesome Image', 'unico'); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="ft-copyright">
                <div class="text-center">
                    <p class="mb-0"><?php echo wp_kses( $options->get( 'copyright_text3', '© 2021 All Rights Reserved' ), $allowed_html ); ?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================== Footer End ============================ -->
    