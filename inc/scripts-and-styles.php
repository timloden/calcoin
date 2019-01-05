<?php

// Remove style.css from wp_head so we can make overwrites
remove_action('wp_head', 'wp_print_styles');

/**
 * Enqueue styles.
 *
 * @example wp_enqueue_style($handle, $src, $deps, $ver, $media);
 */
function caweb_styles() {
	wp_enqueue_style( 'global-styles', get_template_directory_uri() . '/styles/cagov.core.min.css', [], '5.5.0', 'all' );

	//wp_enqueue_style( 'mono-theme', get_template_directory_uri() . '/styles/colorscheme-mono.min.css', [], '5.5.0', 'all' );
	wp_enqueue_style( 'oceanside-theme', get_template_directory_uri() . '/styles/colorscheme-oceanside.min.css', [], '5.5.0', 'all' );
	//wp_enqueue_style( 'eureka-theme', get_template_directory_uri() . '/styles/colorscheme-eureka.min.css', [], '5.5.0', 'all' );
	//wp_enqueue_style( 'orangecounty-styles', get_template_directory_uri() . '/styles/colorscheme-orangecounty.min.css', [], '5.5.0', 'all' );
	//wp_enqueue_style( 'pasarobles-styles', get_template_directory_uri() . '/styles/colorscheme-pasarobles.min.css', [], '5.5.0', 'all' );
	//wp_enqueue_style( 'sacramento-styles', get_template_directory_uri() . '/styles/colorscheme-sacramento.min.css', [], '5.5.0', 'all' );
	//wp_enqueue_style( 'santabarbara-styles', get_template_directory_uri() . '/styles/colorscheme-santabarbara.min.css', [], '5.5.0', 'all' );
	//wp_enqueue_style( 'sierra-styles', get_template_directory_uri() . '/styles/colorscheme-sierra.min.css', [], '5.5.0', 'all' );
	//wp_enqueue_style( 'trinity-styles', get_template_directory_uri() . '/styles/colorscheme-trinity.min.css', [], '5.5.0', 'all' );

	wp_enqueue_style( 'caweb-standard', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'caweb_styles', 99 );

/**
 * Enqueue scripts.
 *
 * @example wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
 */
function caweb_scripts() {

	// The main app scripts.
	wp_enqueue_script( 'cagov-core', get_template_directory_uri() . '/js/cagov.core.min.js', ['jquery'], '5.5.0', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-3.6.0.min.js', ['jquery'], '3.6.0', true );
	wp_enqueue_script( 'search', get_template_directory_uri() . '/js/search.js', [], '1.0.0', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', [], '1.0.0', true );
	
}

add_action( 'wp_enqueue_scripts', 'caweb_scripts' );