<?php
/**
 * Matina News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Matina News
 */

if ( ! defined( 'matina_news_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$matina_news_blog_theme_info = wp_get_theme();
	define( 'matina_news_VERSION', $matina_news_blog_theme_info->get( 'Version' ) );
}
if ( ! function_exists( 'matina_news_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function matina_news_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Matina News, use a find and replace
		 * to change 'matina-news' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'matina-news', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Let gutenberg editor block define width of the block. 
		 */
		add_theme_support( 'align-wide' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'matina_news_top_menu' 		=> esc_html__( 'Top Menu', 'matina-news' ),
				'matina_news_primary_menu' 	=> esc_html__( 'Primary Menu', 'matina-news' ),
				'matina_news_footer_menu' 	=> esc_html__( 'Footer Menu', 'matina-news' ),
			)
		);

		/**
		 * Enable support for post formats
		 *
		 * @link https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'gallery',
			'quote',
			'audio',
			'video'
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'matina_news_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
	     * Restoring the classic Widgets Editor
	     * 
	     * @since 1.0.6
	     */
	    $matina_news_widget_editor_option = get_theme_mod( 'matina_news_widget_editor_option', false );
		if ( false === $matina_news_widget_editor_option ) {
			remove_theme_support( 'widgets-block-editor' );
		}
	}
	
endif;
add_action( 'after_setup_theme', 'matina_news_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function matina_news_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'matina_news_content_width', 640 );
}
add_action( 'after_setup_theme', 'matina_news_content_width', 0 );

if ( ! function_exists( 'matina_news_theme_version_info' ) ) :

	/**
	 * Set the theme version, based on theme stylesheet.
	 *
	 * @global string $matina_news_theme_version
	 */
	function matina_news_theme_version_info() {
		$matina_news_theme_info = wp_get_theme();
		$GLOBALS['matina_news_theme_version'] = $matina_news_theme_info->get( 'Version' );
	}

endif;
add_action( 'after_setup_theme', 'matina_news_theme_version_info', 5 );

/**
 * Dynamic style file include
 */
require get_template_directory() . '/inc/dynamic-styles.php';

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
require get_template_directory() . '/inc/matina-news-hooks.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Functions which enhance the theme's widget.
 */
require get_template_directory() . '/inc/widgets/widgets-functions.php';

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
 * Load required metabox
 */
require get_template_directory() . '/inc/metaboxes/mt-metabox.php';

/**
* Load theme dashboard
*/
require get_template_directory() . '/inc/admin/class-matina-news-admin.php';
require get_template_directory() . '/inc/admin/class-matina-news-notice.php';
require get_template_directory() . '/inc/admin/class-matina-news-dashboard.php';

