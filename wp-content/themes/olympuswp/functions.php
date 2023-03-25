<?php
/**
 * Olympus functions and definitions
 *
 * @package Olympus
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'OLY_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'OLY_VERSION', '1.1.6' );
}
define( 'OLY_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'OLY_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

if ( ! function_exists( 'olympus_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function olympus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Olympus, use a find and replace
		 * to change 'olympuswp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'olympuswp', OLY_THEME_DIR . 'languages' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5',
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
		add_theme_support( 'woocommerce' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'yoast-seo-breadcrumbs' );
		add_theme_support( 'rank-math-breadcrumbs' );
		add_theme_support( 'lifterlms-sidebars' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo',
			array(
				'height' => 80,
				'width' => 350,
				'flex-width' => true,
				'flex-height' => true,
			)
		);

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'assets/css/admin/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'olympus_setup' );
}

if ( ! function_exists( 'olympus_register_menu' ) ) {
	/**
	 * Register Primary Menu.
	 */
	function olympus_register_menu() {
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary Menu', 'olympuswp' ),
			)
		);
	}
	add_action( 'init', 'olympus_register_menu', 5 );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function olympus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'olympuswp' ),
			'id'            => 'olympus-sidebar',
			'description'   => esc_html__( 'This sidebar will be used as your main sidebar.', 'olympuswp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'olympuswp' ),
			'id'            => 'olympus-footer-1',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'olympuswp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'olympuswp' ),
			'id'            => 'olympus-footer-2',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'olympuswp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'olympuswp' ),
			'id'            => 'olympus-footer-3',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'olympuswp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'olympuswp' ),
			'id'            => 'olympus-footer-4',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'olympuswp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 5', 'olympuswp' ),
			'id'            => 'olympus-footer-5',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'olympuswp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 6', 'olympuswp' ),
			'id'            => 'olympus-footer-6',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'olympuswp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'olympus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function olympus_scripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Main style.css file.
	wp_enqueue_style( 'olympus-style', OLY_THEME_URI . 'assets/css/style' . $suffix . '.css', array(), OLY_VERSION );
	wp_style_add_data( 'olympus-style', 'rtl', 'replace' );

	// Navigation script.
	wp_enqueue_script( 'olympus-navigation', OLY_THEME_URI . 'assets/js/navigation' . $suffix . '.js', array(), OLY_VERSION, true );

	wp_localize_script(
		'olympus-navigation',
		'olyLocalize',
		apply_filters(
			'olympus_localize_js_args',
			array(
				'openSubMenuLabel' => esc_attr__( 'Open Sub-Menu', 'olympuswp' ),
				'closeSubMenuLabel' => esc_attr__( 'Close Sub-Menu', 'olympuswp' ),
			)
		)
	);
	
	// Scroll Top script.
	wp_enqueue_script( 'olympus-scroll-top', OLY_THEME_URI . 'assets/js/scroll-top' . $suffix . '.js', array(), OLY_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'olympus_scripts' );

/**
 * Get all necessary theme files
 */
require OLY_THEME_DIR . 'inc/class-olympus-css.php';
require OLY_THEME_DIR . 'inc/css-output.php';
require OLY_THEME_DIR . 'inc/class-olympus-external-css.php';
require OLY_THEME_DIR . 'inc/class-olympus-theme-update.php';
require OLY_THEME_DIR . 'inc/block-editor.php';
require OLY_THEME_DIR . 'inc/class-olympus-breadcrumb-trail.php';

// Display notices if not white label enabled.
if ( defined( 'OLY_PRO_VERSION' ) && ! oly_is_module_active( 'oly_white_label', 'OLY_WHITE_LABEL' ) ) {
	require OLY_THEME_DIR . 'inc/class-olympus-notices.php';
}

/**
 * Implement site structure.
 */
require OLY_THEME_DIR . 'inc/structure/header.php';
require OLY_THEME_DIR . 'inc/structure/navigation.php';
require OLY_THEME_DIR . 'inc/structure/page-header.php';
require OLY_THEME_DIR . 'inc/structure/footer.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require OLY_THEME_DIR . 'inc/template-functions.php';

/**
 * WooCommerce class.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require OLY_THEME_DIR . 'inc/woocommerce-functions.php';
}

/**
 * Customizer additions.
 */
require_once OLY_THEME_DIR . 'inc/class-olympus-fonts.php';
require OLY_THEME_DIR . 'inc/customizer.php';
require OLY_THEME_DIR . 'inc/sections/typography.php';
require OLY_THEME_DIR . 'inc/class-olympus-webfont-loader.php';
