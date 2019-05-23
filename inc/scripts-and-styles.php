<?php

/* Remove style.css from wp_head so we can make overwrites
--------------------------------------------------------------------------------------*/

remove_action('wp_head', 'wp_print_styles');


/* Enqueue styles
--------------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'caweb_styles', 99 );

function caweb_styles() {
	wp_enqueue_style( 'ccalcoin', get_stylesheet_uri(), [], '0.0.0' );
}


/* Enqueue scripts
--------------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'caweb_scripts' );

function caweb_scripts() {

	wp_enqueue_script( 'vendor-scripts', get_template_directory_uri() . '/assets/js/vendor.min.js', ['jquery'], '0.0.0', true );

	wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/custom.min.js', ['jquery'], '0.0.0', true );

}
