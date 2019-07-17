<?php

/* Remove style.css from wp_head so we can make overwrites
--------------------------------------------------------------------------------------*/

remove_action('wp_head', 'wp_print_styles');


/* Enqueue styles
--------------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'caweb_styles', 99 );

function caweb_styles() {
	wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap', [], '0.0.0' );

	wp_enqueue_style( 'calcoin', get_stylesheet_uri(), [], '0.0.0' );
}


/* Enqueue scripts
--------------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'caweb_scripts' );

function caweb_scripts() {

	wp_enqueue_script( 'vendor-scripts', get_template_directory_uri() . '/assets/js/vendor.min.js', ['jquery'], '0.0.0', false );

	wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/custom.min.js', ['jquery'], '0.0.0', false );

}


add_filter( 'body_class', 'custom_class' );

function custom_class( $classes ) {
    if ( !is_front_page() ) {
        $classes[] = 'app';
    }
    return $classes;
}
