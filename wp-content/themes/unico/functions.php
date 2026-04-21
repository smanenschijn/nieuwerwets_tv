<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'unico_setup_theme' );
add_action( 'after_setup_theme', 'unico_load_default_hooks' );


function unico_setup_theme() {

	load_theme_textdomain( 'unico', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'unico_60x60', 60, 60, true ); //'unico_60x60 Testimonials V1'
	add_image_size( 'unico_85x85', 85, 85, true ); //'unico_85x85 Our Benifits'
	add_image_size( 'unico_360x205', 360, 205, true ); //'unico_360x205 Latest News'
	add_image_size( 'unico_150x150', 150, 150, true ); //'unico_150x150 our_work_flow_v2'
	add_image_size( 'unico_92x92', 92, 92, true ); //'unico_92x92 Our Team'
	add_image_size( 'unico_100x100', 100, 100, true ); //'unico_100x100 Why Choose Us'
	add_image_size( 'unico_360x210', 360, 210, true ); //'unico_360x210 What We Do'
	add_image_size( 'unico_360x240', 360, 240, true ); //'unico_360x240 Services V2'
	add_image_size( 'unico_1170x450', 1170, 450, true ); //'unico_1170x450 Blog Classic'
	add_image_size( 'unico_350x350', 350, 350, true ); //'unico_350x350 Shop 2 Column'
	add_image_size( 'unico_350x245', 350, 245, true ); //'unico_350x245 Shop 3 Column'
	
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'unico' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'unico_admin_init', 2000000 );
}

/**
 * [unico_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function unico_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [unico_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function unico_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'unico' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'unico' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'unico' ),
		'before_widget' => '<div id="%1$s" class="widget side-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="side-widget-header border-0"><h4>',
		'after_title'   => '</h4></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'unico'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'unico'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Shop Widget', 'unico'),
		'id' => 'shop-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Shop Area.', 'unico'),
		'before_widget'=>'<div id="%1$s" class="shop-widget widget side-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<div class="side-widget-header border-0"><h4>',
		'after_title' => '</h4></div>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'unico' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'unico' ),
	  'before_widget'=>'<div id="%1$s" class="widget side-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="side-widget-header border-0"><h4>',
	  'after_title' => '</h4></div>'
	));
	if ( ! is_object( unico_WSH() ) ) {
		return;
	}

	$sidebars = unico_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( unico_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget sidebar-widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar-title"><h2>',
			'after_title'   => '</h2></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'unico_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function unico_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'unico' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'unico' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'unico' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'unico' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'unico' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'unico' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'unico' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'unico' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'unico' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'unico_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function unico_enqueue_scripts() {
	
    //styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'animation', get_template_directory_uri() . '/assets/css/animation.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'light-box', get_template_directory_uri() . '/assets/css/light-box.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl-carousel.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl-theme.css' );
	wp_enqueue_style( 'slick-slider', get_template_directory_uri() . '/assets/css/slick-slider.css' );
	wp_enqueue_style( 'prism', get_template_directory_uri() . '/assets/css/prism.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
	wp_enqueue_style( 'themify-icon', get_template_directory_uri() . '/assets/css/themify-icon.css' );
	wp_enqueue_style( 'iconfont', get_template_directory_uri() . '/assets/css/iconfont.css' );
	wp_enqueue_style( 'unico-main', get_stylesheet_uri() );
	wp_enqueue_style( 'unico-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'unico-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'unico-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'unico-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
		
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'aos', get_template_directory_uri().'/assets/js/aos.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'perfect-scrollbar', get_template_directory_uri().'/assets/js/perfect-scrollbar.jquery.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-rating', get_template_directory_uri().'/assets/js/jquery-rating.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'slick', get_template_directory_uri().'/assets/js/slick.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'slider-bg', get_template_directory_uri().'/assets/js/slider-bg.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'lightbox', get_template_directory_uri().'/assets/js/lightbox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'tweenmax', get_template_directory_uri().'/assets/js/TweenMax.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri().'/assets/js/imagesloaded.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'unico-main-script', get_template_directory_uri().'/assets/js/custom.js', array(), false, true );
	
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'unico_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function unico_fonts_url() {
	
	$fonts_url = '';

		$font_families['Montserrat']      = 'Montserrat:300,400,500,600,700,800';
		$font_families['Poppins']      = 'Poppins:300,400,500,600,700,800';
		$font_families['Crimson+Text']      = 'Crimson+Text:400,400i,600,600i';
		$font_families['Charm']      = 'Charm:400,700';
		$font_families['Muli']      = 'Muli:300,400,600,700';

		$font_families = apply_filters( 'UNICO/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function unico_theme_styles() {
    wp_enqueue_style( 'unico-theme-fonts', unico_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'unico_theme_styles' );
add_action( 'admin_enqueue_scripts', 'unico_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) unico_set function

/**
 * [unico_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'unico_set' ) ) {
	function unico_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) unico_add_editor_styles function

function unico_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'unico_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = unico_WSH()->option(); 
if( unico_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

// 4) unico_related_products_limit function 

function unico_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'unico_related_products_args', 20 );
  function unico_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}

/*---------- More functions ends ----------*/