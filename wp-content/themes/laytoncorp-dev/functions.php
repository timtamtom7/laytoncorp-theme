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
