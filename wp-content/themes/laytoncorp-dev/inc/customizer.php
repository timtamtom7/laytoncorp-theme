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
		'description' => __( 'Customize the homepage hero section.', 'laytoncorp' ),
	) );

	// 1. Display Mode
	$wp_customize->add_setting( 'hero_display_mode', array(
		'default'           => 'image',
		'sanitize_callback' => 'laytoncorp_sanitize_select',
		'transport'         => 'refresh', 
	) );

	$wp_customize->add_control( 'hero_display_mode', array(
		'label'       => __( 'Display Mode', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_section',
		'type'        => 'select',
		'choices'     => array(
			'image'      => 'Image Hero',
			'video'      => 'Video Hero',
			'typography' => 'Typography Hero',
			'slideshow'  => 'Slideshow Carousel',
			'marquee'    => 'Continuous Marquee',
		),
	) );

    // --- NOTICE CONTROLS (Pseudo-controls to guide the user) ---

    // Slideshow Notice
    $wp_customize->add_setting( 'hero_slideshow_notice', array( 'default' => '', 'sanitize_callback' => '__return_false' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_slideshow_notice', array(
        'label'       => __( 'Manage Slides', 'laytoncorp' ),
        'description' => __( 'To manage slides, please go to the Dashboard > Pages > Home and edit the "Hero Slides" field group.', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_section',
        'type'        => 'hidden', // We use the description, type hidden just hides the input
        'active_callback' => 'laytoncorp_is_slideshow_mode',
    ) ) );

    // Marquee Notice
    $wp_customize->add_setting( 'hero_marquee_notice', array( 'default' => '', 'sanitize_callback' => '__return_false' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_marquee_notice', array(
        'label'       => __( 'Manage Marquee', 'laytoncorp' ),
        'description' => __( 'To manage marquee text/items, please go to the Dashboard > Pages > Home.', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_section',
        'type'        => 'hidden',
        'active_callback' => 'laytoncorp_is_marquee_mode',
    ) ) );


	// 2. Headline
	$wp_customize->add_setting( 'hero_headline', array(
		'default'           => 'Laytoncorp builds what matters.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
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
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'hero_subtext', array(
		'label'       => __( 'Subtext', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_section',
		'type'        => 'textarea',
	) );

	// 4. Hero Image (for Image Mode)
	$wp_customize->add_setting( 'hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_image', array(
		'label'       => __( 'Hero Image', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_section',
		'mime_type'   => 'image',
		'description' => __( 'Used when Display Mode is set to "Image Hero".', 'laytoncorp' ),
        'active_callback' => 'laytoncorp_is_image_mode',
	) ) );

    // 5. Video File (for Video Mode) - UPGRADED to Media Control
    $wp_customize->add_setting( 'hero_video_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_id', array(
        'label'       => __( 'Video File (MP4)', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_section',
        'mime_type'   => 'video',
        'description' => __( 'Upload or select an MP4 video.', 'laytoncorp' ),
        'active_callback' => 'laytoncorp_is_video_mode',
    ) ) );

    // 6. CTA Text
    $wp_customize->add_setting( 'hero_cta_text', array(
        'default'           => 'Get in touch',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'hero_cta_text', array(
        'label'       => __( 'Button Text', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_section',
        'type'        => 'text',
    ) );

    // 7. CTA Link
    $wp_customize->add_setting( 'hero_cta_link', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh', // Link change usually requires refresh or simple logic
    ) );

    $wp_customize->add_control( 'hero_cta_link', array(
        'label'       => __( 'Button Link', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_section',
        'type'        => 'text', // URL input
    ) );

    // --- CONTACT SECTION (Global Data) ---
    $wp_customize->add_section( 'laytoncorp_contact_section', array(
        'title'       => __( 'Contact Info', 'laytoncorp' ),
        'priority'    => 40,
        'description' => __( 'Manage global contact details used in the footer and contact section.', 'laytoncorp' ),
    ) );

    // Email
    $wp_customize->add_setting( 'contact_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'contact_email', array(
        'label'       => __( 'Email Address', 'laytoncorp' ),
        'section'     => 'laytoncorp_contact_section',
        'type'        => 'text',
    ) );

    // Phone
    $wp_customize->add_setting( 'contact_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'contact_phone', array(
        'label'       => __( 'Phone Number', 'laytoncorp' ),
        'section'     => 'laytoncorp_contact_section',
        'type'        => 'text',
    ) );

    // Address
    $wp_customize->add_setting( 'contact_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'contact_address', array(
        'label'       => __( 'Physical Address', 'laytoncorp' ),
        'section'     => 'laytoncorp_contact_section',
        'type'        => 'textarea',
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

/**
 * Active Callbacks
 */
function laytoncorp_is_image_mode( $control ) {
    return 'image' === $control->manager->get_setting( 'hero_display_mode' )->value();
}

function laytoncorp_is_video_mode( $control ) {
    return 'video' === $control->manager->get_setting( 'hero_display_mode' )->value();
}

function laytoncorp_is_slideshow_mode( $control ) {
    return 'slideshow' === $control->manager->get_setting( 'hero_display_mode' )->value();
}

function laytoncorp_is_marquee_mode( $control ) {
    return 'marquee' === $control->manager->get_setting( 'hero_display_mode' )->value();
}
