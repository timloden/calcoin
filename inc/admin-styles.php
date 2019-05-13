<?php

/* Stylesheets to hide certain fields in ACF and custom builder modules and menu items
--------------------------------------------------------------------------------------*/

add_action('admin_head', 'acf_styles');

function acf_styles() {
  echo '<style>
	.menu-item-depth-0 [data-name="item_size"], .menu-item-depth-0 [data-name="description"] {
		display: none;
	}

	.menu-item-depth-0 .menu-layout-image {
		width: 100%;

	}

	.menu-item-depth-1 [data-name="menu_layout"], .menu-item-depth-1 [data-name="sub_link_size"] {
		display: none;
	}

	.menu-item-depth-1 .menu-layout-image {
		display: none;
	}

	li.cacm_profile_banner:before, li.cacm_card:before, li.cacm_panel:before, li.cacm_content_slider:before, li.cacm_gallery:before, li.cacm_media_slider:before, li.cacm_figure_with_caption:before, li.cacm_featured_narrative:before, li.cacm_blockquote:before, li.cacm_testimonial:before, li.cacm_accordion:before, li.cacm_accordion_list:before {
		font-family: "CaGov"!important;
		content: "\e658"!important;
	}

	.wp-admin #wpadminbar #wp-admin-bar-site-name>.ab-item:before {
		content: "\e600";
		font-family: "CaGov" !important;
	}

	// .et-db #et-boc .et-fb-modules-list li[class*="et_fb_"] {
	//     display: none;
	// }


  </style>';
}


/* Add icon fonts to admin area
--------------------------------------------------------------------------------------*/

add_action( 'admin_enqueue_scripts', 'load_admin_style' );

function load_admin_style() {
	wp_enqueue_style( 'admin_fonts_css', get_template_directory_uri() . '/assets/scss/cagov/cagov.font-only.css', false, '1.0.0' );
}


/* Change logo to caweb and check if there is a custom logo
--------------------------------------------------------------------------------------*/

add_action( 'login_enqueue_scripts', 'custom_login_logo' );

function custom_login_logo() {
	$general_settings = get_field('general_settings', 'option');
	$logo = $general_settings['organization_logo'];
	?>

	<style type="text/css">
		#login h1 a, .login h1 a, body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/login-logo.png) !important;
			height: 80px;
			width: 100%;
			background-size: auto;
			background-repeat: no-repeat;
			background-size: contain;
			padding-bottom: 0;
		}

		.login #nav {
			font-weight: bold;
		}

		.login #nav, .login #backtoblog {
			text-align: center;
		}

		<?php if ($logo): ?>
			#login h1 a, .login h1 a, body.login div#login h1 a {
				background-image: url(<?php echo($logo['url']); ?>) !important;
			}
		<?php endif; ?>

	</style>
<?php }


/* Change "Logged in as" text
--------------------------------------------------------------------------------------*/

add_filter( 'admin_bar_menu', 'replace_wordpress_howdy', 25 );

function replace_wordpress_howdy( $wp_admin_bar ) {
	$my_account = $wp_admin_bar->get_node('my-account');
	$newtext = str_replace( 'Howdy,', 'Logged in as: ', $my_account->title );
	$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtext,
	) );
}


/* Remove admin bar items
--------------------------------------------------------------------------------------*/

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'comments' );
}

