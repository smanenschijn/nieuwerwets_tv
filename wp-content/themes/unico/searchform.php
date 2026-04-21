<?php
/**
 * Search Form template
 *
 * @package UNICO
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="side-widget-body p-t-10">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <div class="input-group">
            <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search...', 'unico' ); ?>">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><?php esc_html_e('Go', 'unico'); ?></button>
            </span>
        </div>
    </form>
</div>