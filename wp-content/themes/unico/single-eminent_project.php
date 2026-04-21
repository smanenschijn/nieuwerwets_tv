<?php get_header(); 
$data    = \UNICO\Includes\Classes\Common::instance()->data( 'single-unico_project' )->get();
do_action( 'unico_banner', $data );
$allowed_tags = wp_kses_allowed_html('post');

?>

<?php while( have_posts() ) : the_post(); 
	$project_image = get_post_meta(get_the_id(), 'project_image', true);
?>

<!--  Project Detail -->
<section class="project-detail">
    <div class="auto-container">
        <?php if($project_image['url']): ?>
        <div class="image-box">
            <figure><a href="<?php echo esc_url($project_image['url']);?>" class="lightbox-image"> <img src="<?php echo esc_url($project_image['url']);?>" alt="<?php esc_html_e('Awesome Image', 'gymexpert'); ?>"></a></figure>
        </div>
		<?php endif; ?>
        <div class="lower-content">
            <div class="title-box clearfix">
                <h2><?php the_title(); ?></h2>
                <ul class="info">
                    <li><h4><?php esc_html_e('Date', 'unico'); ?></h4><span><?php echo (get_post_meta( get_the_id(), 'project_date', true ));?></span></li>
                    <li><h4><?php esc_html_e('Client Name', 'unico'); ?></h4><span><?php echo (get_post_meta( get_the_id(), 'client_name', true ));?></span></li>
                    <li><h4><?php esc_html_e('Project Type', 'unico'); ?></h4><span><?php echo (get_post_meta( get_the_id(), 'project_type', true ));?></span></li>
                </ul>
            </div>
		</div>
        
		<?php the_content(); ?>
        
        <div class="load-more-option">
            <ul class="clearfix">
                <?php global $post; $prev_post = get_previous_post();
                    if (!empty($prev_post)):
                ?>
                <li class="prev pull-right"><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php esc_html_e('Next', 'unico'); ?><span class="fa fa-angle-double-right"></span></a></li>
                <?php endif; ?>
                
                <?php global $post; $next_post = get_next_post();
                    if (!empty($next_post)):
                ?>
                <li class="next pull-left"><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><span class="fa fa-angle-double-left"></span><?php esc_html_e('Prev', 'unico'); ?></a></li>
            	<?php endif; ?>
            </ul>
        </div>
    </div>
</section>
<!-- End Project Detail -->

<?php endwhile; ?>

<?php get_footer(); ?>