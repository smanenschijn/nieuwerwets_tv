<?php
/**
 * Comments Main File.
 *
 * @package UNICO
 * @author  Theme Kalia
 * @version 1.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>

<?php if ( have_comments() ) : ?>
	
<div class="comment-wrap comments-area post-comments" id="comments">
    <div class="comment-detail">
        <div class="comment-detail-title">
            <h4>
                <?php $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    /* translators: %s: post title */
                    printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'unico' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Reply to &ldquo;%2$s&rdquo;',
                            '%1$s Replies to &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'unico'
                        ),
                        number_format_i18n( $comments_number ),
                        get_the_title()
                    );
                } ?>
            </h4>
        </div>
    
        <div id="singlecomment-detail" class="comment-detail-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'div',
                    'short_ping'  => true,
                    'avatar_size' => 75,
                    'callback'    => 'unico_list_comments',
                ) );
            ?>
        </div>	
        
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading">
                <?php esc_html_e( 'Comment navigation', 'unico' ); ?>
            </h1>
            <div class="nav-previous">
                <?php previous_comments_link( esc_html__( '&larr; Older Comments', 'unico' ) ); ?>
            </div>
            <div class="nav-next">
                <?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'unico' ) ); ?>
            </div>
        </nav><!-- .comment-navigation -->
        <?php endif; ?>
        
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments">
            <?php esc_html_e( 'Comments are closed.', 'unico' ); ?>
        </p>
        <?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php unico_comment_form(); ?>