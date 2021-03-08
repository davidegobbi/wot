<?php
/**
* WOT functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package WOT
*/

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wot_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function wot_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WOT, use a find and replace
		* to change 'wot' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'wot', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'wot_setup' );

/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*/
function wot_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wot_content_width', 640 );
}
add_action( 'after_setup_theme', 'wot_content_width', 0 );


/**
* Enqueue scripts and styles.
*/
function wot_scripts() {
	wp_enqueue_style( 'wot-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wot-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wot_scripts' );

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Functions which enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Load Jetpack compatibility file.
*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
* Register Custom Navigation Walker
*/
function register_navwalker(){
	require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/*
Menu and Sidebar
*/
require get_template_directory() . '/inc/register-nav.php';
require get_template_directory() . '/inc/register-sidebar.php';


/*
Comments
*/
require get_template_directory() . '/inc/comments.php';


/*
Post Navigation
*/
require get_template_directory() . '/inc/post-navigation.php';

/* js scripts */
function wot_enqueue_postnavigation_script() {
	wp_enqueue_script( 'wot-postnavigation', get_template_directory_uri() . '/js/navigation-post.min.js', array(), _S_VERSION, true );
}
add_action('wp_enqueue_scripts','wot_enqueue_postnavigation_script');


/*
WooCommerce
*/
/* functions */
require get_template_directory() . '/inc/woocommerce.php';
add_action( 'wp_enqueue_wc_scripts', 'wot_enqueue_style' );

/* js scripts */
function wot_enqueue_woocommmerce_script() {
	wp_enqueue_script( 'wot-woocommerce', get_template_directory_uri() . '/js/woocommerce.min.js', array(), _S_VERSION, true );
}
add_action('wp_enqueue_scripts','wot_enqueue_woocommmerce_script');


/*
WOS assets
*/
require get_template_directory() . '/inc/wos-assets.php';


/*
User documentation
*/
require get_template_directory() . '/inc/user-doc.php';


/*
Custom fields
*/
require get_template_directory() . '/custom-fields/custom-fields.php';
