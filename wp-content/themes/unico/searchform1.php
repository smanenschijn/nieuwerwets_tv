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

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <div class="form-group">
        <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search here', 'unico' ); ?>" required >
        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
    </div>
</form>
