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

	if ( is_page_template( 'page-send.php' ) ) {
		
		//wp_enqueue_script( 'qr-scanner', get_template_directory_uri() . '', [], '0.0.0', true );
		
		//wp_enqueue_script( 'jquery-3', 'https://code.jquery.com/jquery-3.3.1.min.js', [], '0.0.0', true );
		
		//wp_enqueue_script( 'instascan-adapter', get_template_directory_uri() . '/assets/js/vendor/lib/qr-scanner.min.js', [], '0.0.0', true );
		//wp_enqueue_script( 'qrcodescanner', get_template_directory_uri() . '/assets/js/vendor/lib/qr-scanner-worker.min.js', [], '0.0.0', true );
	 	//wp_enqueue_script( 'instascan', get_template_directory_uri() . '/assets/js/vendor/lib/QrCodeHtmlScanner/external/instascan.js', ['jquery'], '0.0.0', true );
	 	
	 	//wp_enqueue_script( 'instacam-combined', get_template_directory_uri() . '/assets/js/vendor/lib/jsqrcode-combined.min.js', ['jquery'], '0.0.0', false );
	}

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
