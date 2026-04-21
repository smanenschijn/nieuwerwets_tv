<?php
/**
 * Archive Main File.
 *
 * @package UNICO
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \UNICO\Includes\Classes\Common::instance()->data( 'category' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <?php if ( class_exists( '\Elementor\Plugin' )):?>
		<?php do_action( 'unico_banner', $data );?>
    <?php else:?>
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="page-title-wrap pt-img-wrap" style="background:url(<?php echo esc_url( $data->get( 'banner' ) ); ?>) no-repeat;">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="pt-caption text-center mt-5">
                    <h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
                    <ul class="bread-crumb clearfix">
						<?php echo unico_the_breadcrumb(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- ============================ Hero Banner End ================================== -->
    <?php endif;?>
    
    <!--Start blog area-->
    <!-- ============================ Blog Grid Start ================================== -->
    <section>
        <div class="container">
            <div class="row clearfix">
                <?php
					if ( $data->get( 'layout' ) == 'left' ) {
						do_action( 'unico_sidebar', $data );
					}
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?>">
                    <div class="blog-news big-detail-wrap">
                        <div class="thm-unit-test">
                        
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                unico_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>
                        
                        </div>
                        
                        <!--Pagination-->
                        <div class="pagination-wrapper bs-example text-center">
                            <?php unico_the_pagination( $wp_query->max_num_pages );?>
                        </div>
                	</div>    
                </div>
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'unico_sidebar', $data );
                    }
                ?>
            </div>
        </div>
    </section> 
    <!--End blog area--> 
	<?php
}
get_footer();
