<?php
/**
 * Footer Main File.
 *
 * @package UNICO
 * @author  Theme Kalia
 * @version 1.0
 */
global $wp_query;
$options = unico_WSH()->option();
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

<div class="clearfix"></div>

	<?php unico_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>
	<!-- Modal -->
    <div class="modal fade" id="getstarted" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="registermodal">
              <div class="modal-header theme-header" style="background:url(<?php echo esc_url( get_template_directory_uri(). '/assets/images/modal-bg.png' )?>);">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php esc_html_e( 'Sign Up', 'unico' );?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              	<?php echo do_shortcode( $options->get( 'signup_form' ) );?>
              </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
</div>
<!--End pagewrapper-->

<?php wp_footer(); ?>

</body>
</html>
