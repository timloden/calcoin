<?php 
// Register your menus
function my_custom_menus() {
    $locations = array(
    	'Header' => esc_html__( 'Header', 'caweb-standard' ),
		'Footer' => esc_html__( 'Footer', 'caweb-standard' ),
    );
    register_nav_menus( $locations );
 }

// Hook them into the theme-'init' action
add_action( 'init', 'my_custom_menus' );