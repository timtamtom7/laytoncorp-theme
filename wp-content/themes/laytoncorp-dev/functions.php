<?php
/**
 * Laytoncorp functions and definitions
 *
 * @package Laytoncorp
 */

if ( ! function_exists( 'laytoncorp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function laytoncorp_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'laytoncorp' ),
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
endif;
add_action( 'after_setup_theme', 'laytoncorp_setup' );

/**
 * Enqueue scripts and styles.
 */
function laytoncorp_scripts() {
	wp_enqueue_style( 'laytoncorp-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Enqueue Main CSS
    wp_enqueue_style( 'laytoncorp-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.1.0' );

    // Enqueue Main JS
    wp_enqueue_script( 'laytoncorp-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );

    // Enqueue Animations JS if enabled
    if ( get_theme_mod( 'enable_animations', true ) ) {
        wp_enqueue_script( 'laytoncorp-animations', get_template_directory_uri() . '/assets/js/animations.js', array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'laytoncorp_scripts' );


/**
 * Add custom body classes.
 */
function laytoncorp_body_classes( $classes ) {
    if ( get_theme_mod( 'enable_animations', true ) ) {
        $classes[] = 'animations-enabled';
    }
    return $classes;
}
add_filter( 'body_class', 'laytoncorp_body_classes' );


/**
 * ACF Field Registration (if ACF is not active, fallback)
 */
if( function_exists('acf_add_local_field_group') ):
    // (ACF code would go here if we were exporting PHP fields)
endif;

// Helper function to safely get ACF field or fallback
function lc_field( $field_name, $id = false ) {
    if ( function_exists( 'get_field' ) ) {
        return get_field( $field_name, $id );
    }
    return null;
}

/**
 * Customizer Additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-css.php';
