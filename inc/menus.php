<?php

/* Register menus
--------------------------------------------------------------------------------------*/

add_action( 'init', 'my_custom_menus' );

function my_custom_menus() {
    $locations = array(
    	'header-menu' => esc_html__( 'Header Menu', 'caweb-standard' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'caweb-standard' ),
    );
    register_nav_menus( $locations );
 }
