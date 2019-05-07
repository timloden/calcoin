<?php
// Register your menus
function my_custom_menus() {
    $locations = array(
    	'header-menu' => esc_html__( 'Header Menu', 'caweb-standard' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'caweb-standard' ),
    );
    register_nav_menus( $locations );
 }

// Hook them into the theme-'init' action
add_action( 'init', 'my_custom_menus' );


function find_multisites() {
	if ( is_multisite() ) {
		$subsites = get_sites();
		foreach( $subsites as $subsite ) {
		  $subsite_id = get_object_vars($subsite)["blog_id"];
		  $subsite_name = get_blog_details($subsite_id)->blogname;
		  echo 'Site ID/Name: ' . $subsite_id . ' / ' . $subsite_name . '\n';
		}
	} else {
		echo 'not multisite';
	}
}

add_action( 'init', 'find_multisites' );
