<?php

/* On theme activation try and import existing theme settings
--------------------------------------------------------------------------------------*/

add_action('after_switch_theme', 'caweb_theme_activate');

function caweb_theme_activate() {

	if(get_option('caweb_theme_activated') != '1' && get_option('caweb_initialized') === '1') {

		$blog_id = get_current_blog_id();

        update_option( 'caweb_theme_activated', '1' );

        $updated = array();

        // look for logo (must be attachment id)
        $logo = get_option('header_ca_branding');

        if ($logo) {

		 	$logo_id = attachment_url_to_postid($logo);

		 	update_option('options_general_settings_organization_logo', $logo_id);

			$updated[] = 'logo - ID: ' . $logo_id;
		 }

		// look for favicon (must be attachment id)
		$favicon = get_option('ca_fav_ico');

		if ($favicon) {
			$favicon_id = attachment_url_to_postid($favicon);

			update_option('options_general_settings_fav_icon', $favicon_id);

			$updated[] = 'favicon: ' . $favicon_id;
		}

		// get color scheme
		$color_scheme = get_option('ca_site_color_scheme');

		if ($color_scheme) {
			update_option('options_general_settings_color_scheme', $color_scheme);
			$updated[] = 'colorscheme: ' . $color_scheme;
		}

		// check if we need to unhide the custom link fields
		$custom_link_1 = get_option('ca_utility_link_1');
		$custom_link_2 = get_option('ca_utility_link_2');
		$custom_link_3 = get_option('ca_utility_link_3');

		if ($custom_link_1 != '') {
			update_option('options_utility_header_use_custom_link_1', 1);
		}

		if ($custom_link_2 != '') {
			update_option('options_utility_header_use_custom_link_2', 1);
		}

		if ($custom_link_3 != '') {
			update_option('options_utility_header_use_custom_link_3', 1);
		}

		// look for all other non image fields
		$fields = array(
			'ca_google_analytic_id' => 'options_google_analytics',
			'ca_google_search_id' => 'options_google_search_engine_id',

			'ca_frontpage_search_enabled' => 'options_general_settings_show_search_on_front_page',
			'ca_google_trans_enabled' => 'options_google_enable_google_translate',
			'ca_contact_us_link' => 'options_utility_header_contact_us_page',
			'ca_geo_locator_enabled' => 'options_utility_header_enable_geo_locator',
			'ca_google_meta_id' => 'options_google_meta_id',
			'ca_custom_css' => 'options_custom_css',
			'ca_social_facebook' => 'options_facebook_url',
			'ca_social_facebook_header' => 'options_facebook_show_in_header',
			'ca_social_facebook_footer' => 'options_facebook_show_in_footer',
			'ca_social_facebook_new_window' => 'options_facebook_open_in_new_tab',
			'ca_social_twitter' => 'options_twitter_url',
			'ca_social_twitter_header' => 'options_twitter_show_in_header',
			'ca_social_twitter_footer' => 'options_twitter_show_in_footer',
			'ca_social_twitter_new_window' => 'options_twitter_open_in_new_tab',
			'ca_social_email' => 'options_share_via_email',
			'ca_social_email_header' => 'options_share_via_email_show_in_header',
			'ca_social_email_footer' => 'options_share_via_email_show_in_footer',
			'ca_social_flickr' => 'options_flickr_url',
			'ca_social_flickr_header' => 'options_flickr_show_in_header',
			'ca_social_flickr_footer' => 'options_flickr_show_in_footer',
			'ca_social_flickr_new_window' => 'options_flickr_open_in_new_tab',
			'ca_social_pinterest' => 'options_pinterest_url',
			'ca_social_pinterest_header' => 'options_pinterest_show_in_header',
			'ca_social_pinterest_footer' => 'options_pinterest_show_in_footer',
			'ca_social_pinterest_new_window' => 'options_pinterest_open_in_new_tab',
			'ca_social_youtube' => 'options_youtube_url',
			'ca_social_youtube_header' => 'options_youtube_show_in_header',
			'ca_social_youtube_footer' => 'options_youtube_show_in_footer',
			'ca_social_youtube_new_window' => 'options_youtube_open_in_new_tab',
			'ca_social_instagram' => 'options_instagram_url',
			'ca_social_instagram_header' => 'options_instagram_show_in_header',
			'ca_social_instagram_footer' => 'options_instagram_show_in_footer',
			'ca_social_instagram_new_window' => 'options_instagram_open_in_new_tab',
			'ca_social_linkedin' => 'options_linkedin_url',
			'ca_social_linkedin_header' => 'options_linkedin_show_in_header',
			'ca_social_linkedin_footer' => 'options_linkedin_show_in_footer',
			'ca_social_linkedin_new_window' => 'options_linkedin_open_in_new_tab',
			'ca_social_rss' => 'options_rss_url',
			'ca_social_rss_header' => 'options_rss_show_in_header',
			'ca_social_rss_footer' => 'options_rss_show_in_footer',
			'ca_social_rss_new_window' => 'options_rss_open_in_new_tab',
			'ca_home_nav_link' => 'options_utility_header_home_link_in_utility_header',
			'ca_utility_link_1' => 'options_utility_header_custom_link_1_custom_link_1_url',
			'ca_utility_link_2' => 'options_utility_header_custom_link_2_custom_link_2_url',
			'ca_utility_link_3' => 'options_utility_header_custom_link_3_custom_link_3_url',
			'ca_utility_link_1_name' => 'options_utility_header_custom_link_1_custom_link_1_text',
			'ca_utility_link_2_name' => 'options_utility_header_custom_link_2_custom_link_2_text',
			'ca_utility_link_3_name' => 'options_utility_header_custom_link_3_custom_link_3_text',
			'ca_utility_link_1_new_window' => 'options_utility_header_custom_link_1_open_custom_link_1_in_new_tab',
			'ca_utility_link_2_new_window' => 'options_utility_header_custom_link_2_open_custom_link_2_in_new_tab',
			'ca_utility_link_3_new_window' => 'options_utility_header_custom_link_3_open_custom_link_3_in_new_tab',
			'ca_google_trans_page' => 'options_google_custom_translate_translate_page_url',
			'ca_google_trans_icon' => 'options_google_custom_translate_translate_icon',
			'ca_google_trans_enabled' => 'options_google_enable_google_translate',

		);

		// get each of the fields and update the values
		foreach ($fields as $field_name => $field_key) {
	    	$value = get_option($field_name);

	      	if ($value != '') {
	        	update_field($field_key, $value, 'options');
	        	$updated[] = $field_name;
	      	}
	    }

	    // get the path to the upload directory.

		$wp_upload_dir = wp_upload_dir();

		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );

	    // get custom css files

	    $css_files = get_option('caweb_external_css');

	    if ($css_files) {

	    	// example url: http://cdtlocal.ca.gov/wp-content/themes/CAWeb/css/external/1/style.css

		    foreach ($css_files as $file) {

		    	$old_css_file = site_url() . '/wp-content/themes/CAWeb/css/external/' . $blog_id . '/' . $file;

		    	$old_css_temp_file = download_url( $old_css_file );

		    	//echo($old_css_temp_file);

		    	if ( !is_wp_error( $old_css_temp_file ) ) {

				    // Array based on $_FILE as seen in PHP file uploads
				    $new_file = array(
				        'name'     => basename($old_css_file), // ex: wp-header-logo.png
				        'type'     => 'text/css',
				        'tmp_name' => $old_css_temp_file,
				        'error'    => 0,
				        'size'     => filesize($old_css_temp_file),
				    );

				    $overrides = array(
				        'test_form' => false,
				        'test_size' => true,
				    );

				    // Move the temporary file into the uploads directory
				    $results = wp_handle_sideload( $new_file, $overrides );

				    if ( !empty( $results['error'] ) ) {
				        // Insert any error handling here
				        echo ('<div class="notice notice-error is-dismissible"><pre> unable to load: ' . $old_css_file . '</pre></div>');
				    } else {

				        $filename  = $results['file']; // Full path to the file
				        $local_url = $results['url'];  // URL to the file in the uploads dir
				        $type      = $results['type']; // MIME type of the file
				        $new_css_filename = $new_file['name'];

				        // Perform any actions here based in the above results
				        $attachment = array(
							'guid'           => $local_url,
							'post_mime_type' => $type,
							'post_title'     => $new_file['name'],
							'post_content'   => '',
							'post_status'    => 'inherit'
						);

						$attach_id = wp_insert_attachment( $attachment, $new_css_filename );

						$attach_data = wp_generate_attachment_metadata( $attach_id, $new_css_filename );

						wp_update_attachment_metadata( $attach_id, $attach_data );

						$new_css_meta = trim($wp_upload_dir['subdir'] . '/' . $new_css_filename, '/');

						update_post_meta( $attach_id, '_wp_attached_file', $new_css_meta );

				        $css_row = array(
							'stylesheets' => $attach_id,
						);

						add_row('upload_css', $css_row, 'options');

						$updated[] = 'external css: ' . $new_css_filename;

				    }

				}

		    }

	    }

	    // get custom js files

	    $js_embed = get_option('ca_custom_js');
	    $js_embed = stripcslashes($js_embed);

	    if ($js_embed) {
	    	update_option('options_custom_javascript', $js_embed);
	    	$updated[] = 'ca_custom_js';
	    }

	    $js_files = get_option('caweb_external_js');

	    if ($js_files) {

	    	// example url: http://cdtlocal.ca.gov/wp-content/themes/CAWeb/js/external/1/test.js

		    foreach ($js_files as $js) {

		    	$old_js_file = site_url() . '/wp-content/themes/CAWeb/js/external/' . $blog_id . '/' . $js;

		    	$old_js_temp_file = download_url( $old_js_file );

		    	//echo($old_css_temp_file);

		    	if ( !is_wp_error( $old_js_temp_file ) ) {

				    // Array based on $_FILE as seen in PHP file uploads
				    $new_js_file = array(
				        'name'     => basename($old_js_file), // ex: wp-header-logo.png
				        'type'     => 'text/css',
				        'tmp_name' => $old_js_temp_file,
				        'error'    => 0,
				        'size'     => filesize($old_js_temp_file),
				    );

				    $overrides = array(
				        'test_form' => false,
				        'test_size' => true,
				    );

				    // Move the temporary file into the uploads directory
				    $js_results = wp_handle_sideload( $new_js_file, $overrides );

				    if ( !empty( $js_results['error'] ) ) {
				        // Insert any error handling here
				        echo ('<div class="notice notice-error is-dismissible"><pre> unable to load: ' . $old_js_file . '</pre></div>');
				    } else {

				        $js_filename  = $js_results['file']; // Full path to the file
				        $js_local_url = $js_results['url'];  // URL to the file in the uploads dir
				        $js_type      = $js_results['type']; // MIME type of the file
				        $new_js_filename = $new_js_file['name'];

				        // Perform any actions here based in the above results
				        $js_attachment = array(
							'guid'           => $js_local_url,
							'post_mime_type' => $js_type,
							'post_title'     => $new_js_file['name'],
							'post_content'   => '',
							'post_status'    => 'inherit'
						);

						$js_attach_id = wp_insert_attachment( $js_attachment, $new_js_filename );

						$js_attach_data = wp_generate_attachment_metadata( $js_attach_id, $new_js_filename );

						wp_update_attachment_metadata( $js_attach_id, $js_attach_data );

						$new_js_meta = trim($wp_upload_dir['subdir'] . '/' . $new_js_filename, '/');

						update_post_meta( $js_attach_id, '_wp_attached_file', $new_js_meta );

				        $js_row = array(
							'javascript_files' => $js_attach_id,
						);

						add_row('upload_javascript', $js_row, 'options');

				        $updated[] = 'external js: ' . $new_js_filename;
				    }

				}

		    }

	    }

	    // get alerts

	    $alerts = get_option('caweb_alerts');

	    if ($alerts) {

	    	foreach ($alerts as $alert => $data) {

	    		$message = stripslashes($data['message']);

	    		if ($data['button'] == 'on') {
	    			$alert_show_button = 1;
	    		} else {
	    			$alert_show_button = 0;
	    		}

	    		if ($data['target'] == '_blank') {
	    			$alert_link_target = 1;
	    		} elseif ($data['target'] == '_self') {
	    			$alert_link_target = 0;
	    		}

	    		if ($data['page_display'] == 'home') {
	    			$display_alert_on = 'home_page';
	    		} elseif ($data['page_display'] == 'all_pages') {
	    			$display_alert_on = 'all_pages';
	    		}

	    		if ($data['icon']) {
	    			$alert_icon = 'ca-gov-icon-' . $data['icon'];
	    		}

	    		$alert_row = array(
					'header' => $data['header'],
					'message' => $message,
					'icon' => $alert_icon,
					'banner_background_color' => $data['color'],
					'display_on' => $display_alert_on,
					'add_read_more_button' => $alert_show_button,
					'button_url' => $data['url'],
					'open_link_in' => $alert_link_target,
				);

				add_row('alert_banners', $alert_row, 'options');

		        $updated[] = 'Alerts: ' . $data['header'];

	    	}

	    }

	    // get header menu

	    $menu_name = get_term(get_nav_menu_locations()['header-menu'], 'nav_menu')->name;
	    $menu = wp_get_nav_menu_object( $menu_name );
	    $menuitems = wp_get_nav_menu_items( $menu->term_id );

	    // get exsisting menu item metadata

		foreach ($menuitems as $item) {
			$icon = get_post_meta( $item->ID, '_caweb_menu_icon', true );
			$unit = get_post_meta( $item->ID, '_caweb_menu_unit_size', true );
			update_field('icon', 'ca-gov-icon-' . $icon, $item->ID);
			update_field('item_size', $unit, $item->ID);
		}

	    // tell us what we updated

	    if ($updated != '') {
	    	echo('<div class="notice notice-success is-dismissible"><p>Migrated the following: </p>');
		    foreach ($updated as $key => $item) {
		    	echo('<li>' . $item . '</li>');
		    }
		    echo('</div>');
	    }

    }

}

/* On theme deactivation clear out the caweb_theme_activated value to reimport
--- REMOVE AFTER TESTING -----
--------------------------------------------------------------------------------------*/

add_action('switch_theme', 'caweb_theme_deactivate');

function caweb_theme_deactivate () {
  update_option( 'caweb_theme_activated', '0' );
}
