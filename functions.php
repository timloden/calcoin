<?php

/* Standard underscores functions
--------------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'caweb_standard_setup' );

if ( ! function_exists( 'caweb_standard_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function caweb_standard_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CAWeb Standard, use a find and replace
		 * to change 'caweb-standard' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'caweb-standard', get_template_directory() . '/languages' );

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
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;

/* Autoload function files
--------------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'caweb_autoload' );

function caweb_autoload() {
	$function_path = pathinfo( __FILE__ );

	foreach ( glob( $function_path['dirname'] . '/inc/*.php' ) as $file ) {
		require_once $file;
	}
}


/* Remove admin bar for non admins
--------------------------------------------------------------------------------------*/

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

