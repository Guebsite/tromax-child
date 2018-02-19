<?php
/**
 * tromax functions and definitions
 *
 * @package tromax
 */



if ( ! function_exists( 'tromax_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tromax_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tromax, use a find and replace
	 * to change 'tromax' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tromax', get_template_directory() . '/languages' );

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	 global $content_width;
	 if ( ! isset( $content_width ) ) {
		$content_width = 767; /* pixels */
	 }
	 
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 *
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tromax' ),
		'top' => __( 'Top Menu', 'tromax' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'gallery', 'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tromax_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	add_image_size('tromax-sq-thumb', 600,600, true );
	add_image_size('tromax-thumb', 540,450, true );
	add_image_size('tromax-pop-thumb',542, 340, true );
	
	//Declare woocommerce support
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-lightbox' );
	
}
endif; // tromax_setup
add_action( 'after_setup_theme', 'tromax_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tromax_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tromax' ),
		'id'            => 'tromax-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'tromax' ), 
		'id'            => 'tromax-footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'tromax' ), 
		'id'            => 'tromax-footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'tromax' ), 
		'id'            => 'tromax-footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'tromax' ), 
		'id'            => 'tromax-footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title title-font">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tromax_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tromax_scripts() {
	wp_enqueue_style( 'tromax-style', get_stylesheet_uri() );
	
	wp_enqueue_style('tromax-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('tromax_title_font', 'Open Sans') )).':100,300,400,700' );
	
	if (get_theme_mod('tromax_title_font') != get_theme_mod('tromax_body_font') ) :
		wp_enqueue_style('tromax-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", esc_html(get_theme_mod('tromax_body_font', 'Open Sans') )).':100,300,400,700' );
	endif;
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'hover-css', get_template_directory_uri() . '/assets/css/hover.min.css' );

	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css' );
		
	wp_enqueue_style( 'tromax-main-theme-style', get_template_directory_uri() . '/assets/css/'.get_theme_mod('tromax_skin', 'default').'.css' );

	wp_enqueue_script( 'tromax-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'tromax-externaljs', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'tromax-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'tromax-custom-js', get_template_directory_uri() . '/js/custom.js', array('tromax-externaljs') );
}
add_action( 'wp_enqueue_scripts', 'tromax_scripts' );

/* Function to Check if Logo is set */
function tromax_logo() {	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

function tromax_has_logo() {
	if (function_exists( 'has_custom_logo')) {
		if ( has_custom_logo() ) {
			return true;
		}
	} else {
		return false;
	}
}

/**
 * Include the Custom Functions of the Theme.
 */
require get_template_directory() . '/framework/theme-functions.php';

/**
 * Implement the Custom CSS Mods.
 */
require get_template_directory() . '/inc/css-mods.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
