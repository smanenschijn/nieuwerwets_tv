<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="side-widget-body p-t-10">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <div class="input-group">
            <input type="hidden" name="post_type[]" value="product">
            <input type="text" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="form-control" placeholder="<?php esc_attr_e( 'Enter Keyword', 'unico' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary"><?php esc_html_e('Go', 'unico'); ?></button>
            </span>
        </div>
    </form>
</div>