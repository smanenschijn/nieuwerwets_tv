<?php
/**
 * Blog Post Main File.
 *
 * @package UNICO
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \UNICO\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
$options = unico_WSH()->option();

do_action( 'unico_banner', $data );

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?> 

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
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="thm-unit-test">    
                        
                	<article class="blog-news big-detail-wrap">
                        <div class="blog-detail-wrap">
                        	
                            <?php if( has_post_thumbnail() ):?>
                            <!-- Featured Image -->
                            <figure class="img-holder">
                                <?php the_post_thumbnail('unico_1170x450', array('class' => 'img-responsive')); ?>
                                <?php if($options->get( 'single_post_date' ) ):?>
                                <div class="blog-post-date theme-bg">
                                   <?php echo get_the_date(); ?>
                                </div>
                                <?php endif;?>
                            </figure>
                            <?php endif;?>
                            
                            <!-- Blog Content -->
                            <div class="full blog-content">
                                <?php if(($options->get( 'single_post_author' ) ) || ($options->get( 'single_post_comment' ) )):?>
                                <div class="post-meta"><?php if($options->get( 'single_post_author' )): ?><?php esc_html_e('By:', 'unico'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>" class="author theme-cl"><?php the_author(); ?></a> |<?php endif; ?> <?php comments_number( wp_kses(__('0 Comments' , 'unico'), true), wp_kses(__('1 Comment' , 'unico'), true), wp_kses(__('% Comments' , 'unico'), true)); ?> </div>
                                <?php endif;?>
                                
                                <div class="blog-text">
                                    
                                    <div class="text m-b0">
										<?php the_content(); ?>
                                        <div class="clearfix"></div>
                                        <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'unico'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                    </div>
                                    <?php if(has_tag()):?>
                                	<div class="post-meta"><span class="category pot-tags"><?php the_tags('', ' ', '');?></span></div>
                                    <?php endif; ?>
                                </div>
                                <?php if(function_exists('unico_share_us')):?>
                                <!-- Blog Share Option -->
                                <div class="no-mrg">
                                    <?php echo wp_kses(unico_share_us(get_the_id(),$post->post_name ), true);?>
                                </div>
                                <?php endif; ?>
                                
                            </div>
                            <!-- Blog Content -->
                            
                        </div>
                    </article>
                      
                    <!--End Single blog Post-->
                    <?php comments_template(); ?>
                    
				</div>
				<?php endwhile; ?>
                
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
