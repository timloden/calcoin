<?php

/* 1. Customize ACF path
--------------------------------------------------------------------------------------*/
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf/';
    // return
    return $path;

}

/* 2. Customize ACF dir
--------------------------------------------------------------------------------------*/
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';

    // return
    return $dir;

}

/* 3. Hide ACF field group menu item
--------------------------------------------------------------------------------------*/
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );


/* ACF Google maps key
--------------------------------------------------------------------------------------*/
//DEV KEY - AIzaSyBHMxEO9Xi1gnDzjxhhqo4CA8Nczf9EZS4

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyBHMxEO9Xi1gnDzjxhhqo4CA8Nczf9EZS4';

	return $api;

}


/* CAWeb Options page
--------------------------------------------------------------------------------------*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> '',
		'menu_title'	=> 'CAWeb Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'icon_url'		=> get_stylesheet_directory_uri() . '/assets/img/caweb_logo.png',
		'position' 		=> 2,
		'redirect'		=> false,
		'update_button' => __('Save Settings', 'acf'),
		'updated_message'	=> __("Settings Saved", 'acf'),
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Multisite Google Analytics',
		'menu_title'	=> 'Multisite GA',
		'menu_slug' 	=> 'caweb-multisite-ga',
		'parent_slug'   => 'site-options',
		'capability'    => 'activate_plugins',
		'redirect'		=> false,
		'update_button' => __('Save Settings', 'acf'),
		'updated_message'	=> __("Settings Saved", 'acf'),
	));


	acf_add_options_page(array(
		'page_title' 	=> 'Sidebar Visibility',
		'menu_title'	=> 'Sidebars',
		'menu_slug' 	=> 'caweb-sidebars',
		'parent_slug'   => 'themes.php',
		'capability'    => 'edit_posts',
		'redirect'		=> false,
		'update_button' => __('Save Settings', 'acf'),
		'updated_message'	=> __("Settings Saved", 'acf'),
	));


	function remove_admin_submenus() {

		remove_submenu_page( 'themes.php', 'nav-menus.php' ); // Remove Menus
		remove_submenu_page( 'themes.php', 'theme-editor.php' ); // Remove theme editor


		if ( !is_super_admin() ) {
			remove_submenu_page('site-options', 'caweb-multisite-ga');
			remove_menu_page( 'et_divi_options' );
			remove_submenu_page( 'plugins.php', 'plugin-editor.php' ); // Remove plugin editor


			// Hide Javascript field from
			?>
				<style type="text/css">
					.toplevel_page_site-options [data-key="field_5cd0aad132fb2"], .toplevel_page_site-options [data-name="upload_javascript"], .toplevel_page_site-options [data-name="custom_javascript"] {
						display: none !important;
					}
				</style>
			<?php
		}

		if ( !is_multisite() ) {
			remove_submenu_page('caweb-options', 'caweb-multisite-ga');

		}
	}

	add_action( 'admin_init', 'remove_admin_submenus' );

	function add_submenu_item() {
		 add_submenu_page('site-options', 'Navigation', 'Navigation', 'edit_posts', 'nav-menus.php');
	}
	add_action( 'admin_init', 'add_submenu_item' );
}
