<?php 
// This theme uses wp_nav_menu() in two location.
register_nav_menus( array(
	'Header' => esc_html__( 'Header', 'caweb-standard' ),
	'Footer' => esc_html__( 'Footer', 'caweb-standard' ),
) );