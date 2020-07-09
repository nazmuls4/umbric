<?php
/**
 * Umbric functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Umbric
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'umbric_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function umbric_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Umbric, use a find and replace
		 * to change 'umbric' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'umbric', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'umbric' ),
				'footer-menu' => esc_html__( 'Footer menu', 'umbric' ),
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
				'umbric_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'umbric_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function umbric_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'umbric_content_width', 640 );
}
add_action( 'after_setup_theme', 'umbric_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function umbric_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'umbric' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'umbric' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'umbric' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'umbric' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-3"><div class="footer-widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'umbric_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function umbric_scripts() {




	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(),'4.1.3' );  
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(),'4.7.0' );  
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css', array(),'1.0' );  
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(),'1.0' );  
	wp_enqueue_style( 'umbric-style', get_stylesheet_uri(), array(), _S_VERSION );  

	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/vendor/popper.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '4.1.3', true );
	wp_enqueue_script( 'umbric-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'umbric_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}





/**
 * Bootstrap Nav Walker
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Metabox and theme option
 */
require get_template_directory() . '/inc/metabox-with-theme-options.php';
