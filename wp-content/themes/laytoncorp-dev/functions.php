<?php
/**
 * Laytoncorp Theme Functions
 *
 * @package Laytoncorp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function laytoncorp_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register Navigation Menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'laytoncorp' ),
			'footer'  => esc_html__( 'Footer Menu', 'laytoncorp' ),
		)
	);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'laytoncorp_setup' );

/**
 * Enqueue Scripts and Styles
 */
function laytoncorp_scripts() {
	// Enqueue main stylesheet (style.css).
	wp_enqueue_style( 'laytoncorp-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Enqueue custom main CSS with cache busting.
	$css_file = get_template_directory() . '/assets/css/main.css';
	$css_ver  = file_exists( $css_file ) ? filemtime( $css_file ) : '1.0.0';
	wp_enqueue_style( 'laytoncorp-main', get_template_directory_uri() . '/assets/css/main.css', array(), $css_ver );

	// Enqueue custom main JS with cache busting.
	$js_file = get_template_directory() . '/assets/js/main.js';
	$js_ver  = file_exists( $js_file ) ? filemtime( $js_file ) : '1.0.0';
	wp_enqueue_script( 'laytoncorp-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), $js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'laytoncorp_scripts' );

/**
 * Helper: Safe ACF Field Retrieval
 * 
 * @param string $key     The field name/key.
 * @param mixed  $default The default value if field is empty or ACF is missing.
 * @return mixed Field value or default.
 */
function lc_field($key, $default = '') {
	return function_exists('get_field') ? (get_field($key) ?: $default) : $default;
}

/**
 * Customizer Additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Register ACF Fields Programmatically
 * 
 * Ensures fields are available even if not imported manually.
 * This maps exactly to the "Laytoncorp — Homepage Fields" specification.
 */
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_laytoncorp_homepage',
	'title' => 'Laytoncorp — Homepage Fields',
	'fields' => array(
		/* TAB: Hero */
		array(
			'key' => 'field_tab_hero',
			'label' => 'Hero',
			'name' => '',
			'type' => 'tab',
		),
		array(
			'key' => 'field_hero_mode',
			'label' => 'Hero display mode',
			'name' => 'hero_mode',
			'type' => 'select',
			'choices' => array(
				'image' => 'Image Hero',
				'video' => 'Video Hero',
				'typography' => 'Typography Hero',
				'slideshow' => 'Slideshow Carousel',
				'marquee' => 'Continuous Marquee',
			),
			'default_value' => 'image',
		),
		array(
			'key' => 'field_hero_headline',
			'label' => 'Headline',
			'name' => 'hero_headline',
			'type' => 'text',
			'default_value' => 'Laytoncorp builds what matters.',
		),
		array(
			'key' => 'field_hero_subtext',
			'label' => 'Subtext',
			'name' => 'hero_subtext',
			'type' => 'textarea',
			'default_value' => 'Infrastructure, innovation, and materials for a changing world.',
		),
		array(
			'key' => 'field_hero_image',
			'label' => 'Hero Image (for Image Mode)',
			'name' => 'hero_image',
			'type' => 'image',
			'return_format' => 'url',
		),
		array(
			'key' => 'field_hero_video_mp4',
			'label' => 'Video MP4 URL (for Video Mode)',
			'name' => 'hero_video_mp4',
			'type' => 'url',
		),
		array(
			'key' => 'field_hero_video_poster',
			'label' => 'Video Poster Image',
			'name' => 'hero_video_poster',
			'type' => 'image',
			'return_format' => 'url',
		),
		array(
			'key' => 'field_hero_slides',
			'label' => 'Slides (for Slideshow Mode)',
			'name' => 'hero_slides',
			'type' => 'repeater',
			'sub_fields' => array(
				array(
					'key' => 'field_hero_slide_image',
					'label' => 'Slide Image',
					'name' => 'slide_image',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
		),
        /* TAB: About */
        array(
            'key' => 'field_tab_about',
            'label' => 'About',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_about_headline',
            'label' => 'Headline',
            'name' => 'about_headline',
            'type' => 'text',
            'default_value' => 'Who We Are',
        ),
        array(
            'key' => 'field_about_content',
            'label' => 'Content',
            'name' => 'about_content',
            'type' => 'wysiwyg',
        ),
        array(
            'key' => 'field_about_image',
            'label' => 'Image',
            'name' => 'about_image',
            'type' => 'image',
            'return_format' => 'url',
        ),
        /* TAB: Portfolio */
        array(
            'key' => 'field_tab_portfolio',
            'label' => 'Portfolio',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_portfolio_items',
            'label' => 'Projects',
            'name' => 'portfolio_items',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_portfolio_title',
                    'label' => 'Project Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_portfolio_category',
                    'label' => 'Category',
                    'name' => 'category',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_portfolio_image',
                    'label' => 'Project Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
            ),
        ),
        /* TAB: Capabilities */
        array(
            'key' => 'field_tab_capabilities',
            'label' => 'Capabilities',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_capabilities_list',
            'label' => 'Capabilities List',
            'name' => 'capabilities_list',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_cap_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_cap_desc',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                ),
            ),
        ),
        /* TAB: Contact */
        array(
            'key' => 'field_tab_contact',
            'label' => 'Contact',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_contact_email',
            'label' => 'Email',
            'name' => 'contact_email',
            'type' => 'email',
        ),
        array(
            'key' => 'field_contact_phone',
            'label' => 'Phone',
            'name' => 'contact_phone',
            'type' => 'text',
        ),
        array(
            'key' => 'field_contact_address',
            'label' => 'Address',
            'name' => 'contact_address',
            'type' => 'textarea',
        ),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
));

endif;
