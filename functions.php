<?php
/**
 * CAWeb Standard functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CAWeb_Standard
 */

if ( ! function_exists( 'caweb_standard_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function caweb_standard_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CAWeb Standard, use a find and replace
		 * to change 'caweb-standard' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'caweb-standard', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'caweb_standard_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function caweb_standard_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'caweb-standard' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'caweb-standard' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'caweb_standard_widgets_init' );

/**
 * Autoload functions.
 */
function caweb_autoload() {
	$function_path = pathinfo( __FILE__ );

	foreach ( glob( $function_path['dirname'] . '/inc/*.php' ) as $file ) {
		require_once $file;
	}
}

add_action( 'after_setup_theme', 'caweb_autoload' );



/**
 * Include ACF addons
 */

include_once('acf-addons/acf-fonticonpicker/acf-fonticonpicker.php');
include_once('acf-addons/acf-code-field/acf-code-field.php');

/**
 *	This will hide the Divi "Project" post type.
 *	Thanks to georgiee (https://gist.github.com/EngageWP/062edef103469b1177bc#gistcomment-1801080) for his improved solution.
 */
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}

/* Add PDF meta data
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_pdf_meta_upon_image_upload' );

function my_set_pdf_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is a pdf, else do nothing

	if ( get_post_mime_type( $post_ID ) == 'application/pdf' ) {

		include 'lib/pdfparser/vendor/autoload.php';
    	$parser = new \Smalot\PdfParser\Parser();

		try {
        	$pdf = $parser->parseFile( wp_get_attachment_url( $post_ID ) );
    		$text = $pdf->getText();
	    } catch (\Exception $e) {
	    	$text = '';
	    }

		add_post_meta( $post_ID, 'pdf_content', $text );

	}
}

/* Add Editable field to PDF
--------------------------------------------------------------------------------------*/
function my_add_attachment_pdf_field( $form_fields, $post ) {
	if ( get_post_mime_type( $post ) == 'application/pdf' ) {
	    $field_value = get_post_meta( $post->ID, 'pdf_content', true );
	    $form_fields['pdf_content'] = array(
	        'value' => $field_value ? $field_value : '',
	        'label' => __( 'PDF Content' ),
	        'input' => 'html',
	        'html'  => '<textarea name="attachments[' . $post->ID .'][pdf_content]" id="attachments[' . $post->ID .'][pdf_content]" style="height: 300px;" class="widefat">' . $field_value . '</textarea>',
	        'helps' => __( 'Searchable conent of the PDF' )
	    );
	    return $form_fields;
	}
}
add_filter( 'attachment_fields_to_edit', 'my_add_attachment_pdf_field', 10, 2 );

/* Save edits from PDF field
--------------------------------------------------------------------------------------*/
function add_image_attachment_fields_to_save( $post, $attachment ) {
	if ( isset( $attachment['pdf_content'] ) )
		update_post_meta( $post['ID'], 'pdf_content', esc_attr($attachment['pdf_content']) );

	return $post;
}
add_filter("attachment_fields_to_save", "add_image_attachment_fields_to_save", null , 2);
