<?php
/**
 * Default Template Main File.
 *
 * @package UNICO
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
$data  = \UNICO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
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
                        
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'unico' ),
                            'after'  => '</div>',
        
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                    </div>
            	</div>
            </div>
            <?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'unico_sidebar', $data );
				}
            ?>
        
        </div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>
