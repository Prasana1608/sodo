<?php
/**
 * sodo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sodo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sodo_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sodo, use a find and replace
		* to change 'sodo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sodo', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sodo' ),
		)
	);

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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sodo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
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
add_action( 'after_setup_theme', 'sodo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sodo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sodo_content_width', 640 );
}
add_action( 'after_setup_theme', 'sodo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sodo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sodo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sodo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sodo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sodo_scripts() {
	wp_enqueue_style( 'sodo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sodo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sodo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sodo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
function add_google_fonts() {
	wp_enqueue_style( ' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap', false );}
	add_action( 'wp_enqueue_scripts', 'add_google_fonts' );
	
	function add_custom_sizes() {
		add_image_size( 'thumbnail_large', 2220, 1000,TRUE, array( 'center', 'center' ) );
		add_image_size( 'thumbnail_medium', 1282, 650,TRUE, array( 'center', 'center' ) );
		add_image_size( 'thumbnail_small', 1080, 650,TRUE, array( 'center', 'center' ) );
		add_image_size( 'thumbnail_xsmall', 700, 310,TRUE, array( 'center', 'center' ) );
	}
	add_action('after_setup_theme','add_custom_sizes');

	/****************************************************************************/
/* Image Display */
/****************************************************************************/
add_image_size( 'thumbnail_large', 2220, 1000,TRUE, array( 'center', 'center' ) );	
add_image_size( 'thumbnail_medium', 1282, 650,TRUE, array( 'center', 'center' ) );
add_image_size( 'thumbnail_small', 1080, 650,TRUE, array( 'center', 'center' ) );
add_image_size( 'thumbnail_xsmall', 700, 310,TRUE, array( 'center', 'center' ) );
function my_image_display()
{
if (has_post_thumbnail()) {
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, 'my_image_display');
	// $image_url = $image_url[0];
} else {
	global $post, $posts;
	$image_url = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$image_url = $matches[1][0];
	if (empty($image_url)) {
		$image_url = '';
	}
}
return $image_url;
}

function my_comment_time_ago_function() {
	return sprintf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );
	}
	add_filter( 'get_comment_date', 'my_comment_time_ago_function' );

	function enqueue_my_styles() {

		wp_enqueue_style( 'main', get_template_directory_uri() . './css/main.css');
		wp_enqueue_style( 'media-query', get_template_directory_uri() . '/css/media-query.css');
		// wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/css/swiper.min.css','true');
		// wp_enqueue_style( 'jquery.mobile', 'https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css','true');
	}
	add_action('wp_enqueue_scripts', 'enqueue_my_styles');

	function register_my_menus() {
		register_nav_menus(array(
			'header-menus' => 'header Menus',
			'login-menus' => 'login Menus',
	  ));
	}
	
	add_action('init', 'register_my_menus');

	function enqueue_my_scripts() {
		// wp_enqueue_script( 'touchswipe', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js','true');
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array('jquery'), '1.11.3','true'); // we need the jquery
		// wp_enqueue_script( 'Magnific Popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js','true');
		// wp_enqueue_script( 'main.js', get_template_directory_uri().'/js/main.js','','','true');
	}
	add_action('wp_enqueue_scripts', 'enqueue_my_scripts');