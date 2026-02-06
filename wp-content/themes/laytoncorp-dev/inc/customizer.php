<?php
/**
 * Laytoncorp Theme Customizer
 *
 * @package Laytoncorp
 */

function laytoncorp_customize_register( $wp_customize ) {
	// Add Hero Section
	$wp_customize->add_section( 'laytoncorp_hero_section', array(
		'title'       => __( 'Hero Section', 'laytoncorp' ),
		'priority'    => 30,
		'description' => __( 'Customize the homepage hero section. Note: Complex modes like Slideshow/Marquee still require configuration in the Dashboard.', 'laytoncorp' ),
	) );

	// 1. Display Mode
	$wp_customize->add_setting( 'hero_display_mode', array(
		'default'           => 'image',
		'sanitize_callback' => 'laytoncorp_sanitize_select',
		'transport'         => 'refresh', // Refresh needed to switch DOM structure
	) );

	$wp_customize->add_control( 'hero_display_mode', array(
		'label'       => __( 'Display Mode', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_section',
		'type'        => 'select',
		'choices'     => array(
			'image'      => 'Image Hero',
			'video'      => 'Video Hero',
			'typography' => 'Typography Hero',
			'slideshow'  => 'Slideshow Carousel (Edit content in Dashboard)',
			'marquee'    => 'Continuous Marquee (Edit content in Dashboard)',
		),
	) );

	// 2. Headline
	$wp_customize->add_setting( 'hero_headline', array(
		'default'           => 'Laytoncorp builds what matters.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage', // Live preview!
	) );

	$wp_customize->add_control( 'hero_headline', array(
		'label'       => __( 'Headline (Large)', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_section',
		'type'        => 'text',
	) );

	// 3. Subtext
	$wp_customize->add_setting( 'hero_subtext', array(
		'default'           => 'Infrastructure, innovation, and materials for a changing world.',
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'postMessage', // Live preview!
	) );

	$wp_customize->add_control( 'hero_subtext', array(
		'label'       => __( 'Subtext', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_section',
		'type'        => 'textarea',
	) );

	// 4. Hero Image (for Image Mode)
	$wp_customize->add_setting( 'hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'absint', // Returns attachment ID
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_image', array(
		'label'       => __( 'Hero Image', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_section',
		'mime_type'   => 'image',
		'description' => __( 'Used when Display Mode is set to "Image Hero".', 'laytoncorp' ),
	) ) );

    // 5. Video URL (for Video Mode)
    $wp_customize->add_setting( 'hero_video_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'hero_video_url', array(
        'label'       => __( 'Video URL (MP4)', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_section',
        'type'        => 'url',
        'description' => __( 'Direct link to .mp4 file. Used when Display Mode is set to "Video Hero".', 'laytoncorp' ),
    ) );

}
add_action( 'customize_register', 'laytoncorp_customize_register' );

/**
 * Sanitize Select Helper
 */
function laytoncorp_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Live Preview JS
 */
function laytoncorp_customize_preview_js() {
	wp_enqueue_script( 'laytoncorp-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview', 'jquery' ), '1.0', true );
}
add_action( 'customize_preview_init', 'laytoncorp_customize_preview_js' );
