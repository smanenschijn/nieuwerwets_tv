<?php
/**
 * Theme config file.
 *
 * @package UNICO
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['unico_main_header'][] 	= array( 'unico_preloader', 98 );
$config['default']['unico_main_header'][] 	= array( 'unico_main_header_area', 99 );

$config['default']['unico_main_footer'][] 	= array( 'unico_preloader', 98 );
$config['default']['unico_main_footer'][] 	= array( 'unico_main_footer_area', 99 );

$config['default']['unico_sidebar'][] 	    = array( 'unico_sidebar', 99 );

$config['default']['unico_banner'][] 	    = array( 'unico_banner', 99 );


return $config;
