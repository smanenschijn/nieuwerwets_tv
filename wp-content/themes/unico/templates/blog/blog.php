<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage UNICO
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Unico_Resizer' ) ) {
	$img_obj = new Unico_Resizer();
} else {
	$img_obj = array();
}
global $post;
$options = unico_WSH()->option();
?>
<div <?php post_class(); ?>>
	
    <div class="blog-detail-wrap pt-bottom">
        <?php if( has_post_thumbnail() ):?>
        <!-- Featured Image -->
        <figure class="img-holder">
            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('unico_1170x450', array('class' => 'img-responsive')); ?></a>
            <?php if($options->get( 'blog_post_date' ) ):?>
            <div class="blog-post-date theme-bg">
               <?php echo get_the_date(); ?>
            </div>
            <?php endif; ?>
        </figure>
        <?php endif;?>
        <!-- Blog Content -->
        <div class="full blog-content">
            <?php if(($options->get( 'blog_post_author' ) ) || ($options->get( 'blog_post_comment' ) )):?>
            <div class="post-meta"><?php if($options->get( 'blog_post_author' )): ?><?php esc_html_e('By:', 'unico'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>" class="author theme-cl"><?php the_author(); ?></a> |<?php endif; ?> <?php comments_number( wp_kses(__('0 Comments' , 'unico'), true), wp_kses(__('1 Comment' , 'unico'), true), wp_kses(__('% Comments' , 'unico'), true)); ?> </div>
            <?php endif;?>
            
            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><h3><?php the_title(); ?></h3></a>
            
            <div class="blog-text">
                <?php the_excerpt(); ?>
            </div>
            
            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="btn btn-cta"><?php esc_html_e('Read More', 'unico'); ?></a>
        </div>
    
    </div>

</div>