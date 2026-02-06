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

	// Enqueue custom main CSS.
	wp_enqueue_style( 'laytoncorp-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );

	// Enqueue custom main JS.
	wp_enqueue_script( 'laytoncorp-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'laytoncorp_scripts' );

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
			'label' => 'Hero Mode Selector',
			'name' => 'hero_mode',
			'type' => 'radio',
			'choices' => array(
				'image' => 'Image Hero',
				'video' => 'Video Hero',
				'typography' => 'Typography Hero',
				'slideshow' => 'Slideshow Carousel',
				'marquee' => 'Continuous Marquee',
			),
			'default_value' => 'image',
			'layout' => 'horizontal',
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
			'rows' => 3,
		),
		array(
			'key' => 'field_hero_cta_text',
			'label' => 'Primary CTA Text',
			'name' => 'hero_cta_text',
			'type' => 'text',
			'default_value' => 'Get in touch',
		),
		/* Mode A: Image */
		array(
			'key' => 'field_hero_image',
			'label' => 'Hero Image',
			'name' => 'hero_image',
			'type' => 'image',
			'return_format' => 'url',
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_hero_mode',
						'operator' => '==',
						'value' => 'image',
					),
				),
			),
		),
		/* Mode B: Video */
		array(
			'key' => 'field_hero_video_mp4',
			'label' => 'Video File (MP4)',
			'name' => 'hero_video_mp4',
			'type' => 'file',
			'return_format' => 'url',
			'mime_types' => 'mp4',
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_hero_mode',
						'operator' => '==',
						'value' => 'video',
					),
				),
			),
		),
		array(
			'key' => 'field_hero_video_poster',
			'label' => 'Video Poster Image',
			'name' => 'hero_video_poster',
			'type' => 'image',
			'return_format' => 'url',
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_hero_mode',
						'operator' => '==',
						'value' => 'video',
					),
				),
			),
		),
		/* Mode C: Slideshow */
		array(
			'key' => 'field_hero_slides',
			'label' => 'Slides',
			'name' => 'hero_slides',
			'type' => 'repeater',
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_slide_image',
					'label' => 'Slide Image',
					'name' => 'slide_image',
					'type' => 'image',
					'return_format' => 'url',
				),
				array(
					'key' => 'field_slide_caption',
					'label' => 'Caption (Optional)',
					'name' => 'slide_caption',
					'type' => 'text',
				),
			),
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_hero_mode',
						'operator' => '==',
						'value' => 'slideshow',
					),
				),
			),
		),
		/* Mode D: Marquee */
		array(
			'key' => 'field_hero_marquee_images',
			'label' => 'Marquee Images',
			'name' => 'hero_marquee_images',
			'type' => 'repeater',
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_marquee_image',
					'label' => 'Image',
					'name' => 'marquee_image',
					'type' => 'image',
					'return_format' => 'url',
				),
			),
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_hero_mode',
						'operator' => '==',
						'value' => 'marquee',
					),
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
			'key' => 'field_about_heading',
			'label' => 'About Heading',
			'name' => 'about_heading',
			'type' => 'text',
			'default_value' => 'What Laytoncorp does.',
		),
		array(
			'key' => 'field_about_body',
			'label' => 'About Body Text',
			'name' => 'about_body',
			'type' => 'textarea',
			'default_value' => 'Laytoncorp operates at the intersection of materials, manufacturing, and technology. We build, acquire, and scale companies that shape the physical world.',
			'rows' => 4,
		),

		/* TAB: Portfolio */
		array(
			'key' => 'field_tab_portfolio',
			'label' => 'Portfolio',
			'name' => '',
			'type' => 'tab',
		),
		array(
			'key' => 'field_portfolio_brands',
			'label' => 'Portfolio Brands',
			'name' => 'portfolio_brands',
			'type' => 'repeater',
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_brand_name',
					'label' => 'Brand Name',
					'name' => 'brand_name',
					'type' => 'text',
				),
				array(
					'key' => 'field_brand_logo',
					'label' => 'Brand Logo',
					'name' => 'brand_logo',
					'type' => 'image',
					'return_format' => 'url',
				),
				array(
					'key' => 'field_brand_subtitle',
					'label' => 'Subtitle (Optional)',
					'name' => 'brand_subtitle',
					'type' => 'text',
				),
				array(
					'key' => 'field_brand_category',
					'label' => 'Category',
					'name' => 'brand_category',
					'type' => 'select',
					'choices' => array(
						'Consumer' => 'Consumer',
						'Industrial' => 'Industrial',
						'Health' => 'Health',
						'Materials' => 'Materials',
					),
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
			'key' => 'field_capabilities',
			'label' => 'Capabilities List',
			'name' => 'capabilities',
			'type' => 'repeater',
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_capability_label',
					'label' => 'Capability Label',
					'name' => 'capability_label',
					'type' => 'text',
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
			'key' => 'field_contact_heading',
			'label' => 'Contact Heading',
			'name' => 'contact_heading',
			'type' => 'text',
			'default_value' => 'Work with Laytoncorp.',
		),
		array(
			'key' => 'field_contact_button_text',
			'label' => 'Button Label',
			'name' => 'contact_button_text',
			'type' => 'text',
			'default_value' => 'Get in touch',
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
