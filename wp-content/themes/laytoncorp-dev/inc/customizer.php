<?php
/**
 * Laytoncorp Theme Customizer
 *
 * @package Laytoncorp
 */

function laytoncorp_customize_register( $wp_customize ) {

    // --- PANELS (Organization) ---
    // Note: Panels group sections. We can use existing ones or create new ones.
    // For now, we will keep Sections as top level for simplicity unless it gets too crowded.

    // --- HERO SECTION ---
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

    // Partial for Hero Headline
    $wp_customize->selective_refresh->add_partial( 'hero_headline', array(
        'selector'        => '.hero-title',
        'render_callback' => function() { return get_theme_mod( 'hero_headline' ); },
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

    // Partial for Hero Subtext
    $wp_customize->selective_refresh->add_partial( 'hero_subtext', array(
        'selector'        => '.hero-subtitle',
        'render_callback' => function() { return get_theme_mod( 'hero_subtext' ); },
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

    // 5. Video File (for Video Mode)
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

    // Partial for CTA Text
    $wp_customize->selective_refresh->add_partial( 'hero_cta_text', array(
        'selector'        => '.hero-content .btn',
        'render_callback' => function() { return get_theme_mod( 'hero_cta_text' ); },
    ) );

    // 7. CTA Link
    $wp_customize->add_setting( 'hero_cta_link', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh', // Link change usually requires refresh
    ) );

    $wp_customize->add_control( 'hero_cta_link', array(
        'label'       => __( 'Button Link', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_section',
        'type'        => 'text', // URL input
    ) );

    // --- THEME COLORS (New) ---
    $wp_customize->add_section( 'laytoncorp_colors_section', array(
        'title'       => __( 'Theme Colors', 'laytoncorp' ),
        'priority'    => 35,
        'description' => __( 'Customize the global color palette.', 'laytoncorp' ),
    ) );

    // Background Color
    $wp_customize->add_setting( 'color_bg', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_bg', array(
        'label'   => __( 'Background Color', 'laytoncorp' ),
        'section' => 'laytoncorp_colors_section',
    ) ) );

    // Text Color
    $wp_customize->add_setting( 'color_text', array(
        'default'           => '#1a1a1a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_text', array(
        'label'   => __( 'Text Color', 'laytoncorp' ),
        'section' => 'laytoncorp_colors_section',
    ) ) );

    // Accent Color
    $wp_customize->add_setting( 'color_accent', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_accent', array(
        'label'   => __( 'Accent Color (Buttons/Links)', 'laytoncorp' ),
        'section' => 'laytoncorp_colors_section',
    ) ) );


    // --- CONTACT SECTION (Global Data) ---
    $wp_customize->add_section( 'laytoncorp_contact_section', array(
        'title'       => __( 'Contact Info', 'laytoncorp' ),
        'priority'    => 40,
        'description' => __( 'Manage global contact details used in the footer and contact section.', 'laytoncorp' ),
    ) );

    // Contact Heading
    $wp_customize->add_setting( 'contact_heading', array(
        'default'           => 'Work with Laytoncorp.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'contact_heading', array(
        'label'       => __( 'Section Heading', 'laytoncorp' ),
        'section'     => 'laytoncorp_contact_section',
        'type'        => 'text',
    ) );
    
    // Partial for Contact Heading
    $wp_customize->selective_refresh->add_partial( 'contact_heading', array(
        'selector'        => '.contact-headline',
        'render_callback' => function() { return get_theme_mod( 'contact_heading' ); },
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

    // Partial for Email (Footer)
    $wp_customize->selective_refresh->add_partial( 'contact_email', array(
        'selector'        => '.footer-contact .contact-email', 
        'render_callback' => function() { return get_theme_mod( 'contact_email' ); },
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
    
    // Partial for Phone
    $wp_customize->selective_refresh->add_partial( 'contact_phone', array(
        'selector'        => '.footer-contact .contact-phone',
        'render_callback' => function() { return get_theme_mod( 'contact_phone' ); },
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

    // Partial for Address
    $wp_customize->selective_refresh->add_partial( 'contact_address', array(
        'selector'        => '.contact-address',
        'render_callback' => function() { return get_theme_mod( 'contact_address' ); },
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
 * Generate Dynamic CSS
 */
function laytoncorp_customizer_css() {
    $bg_color = get_theme_mod( 'color_bg', '#ffffff' );
    $text_color = get_theme_mod( 'color_text', '#1a1a1a' );
    $accent_color = get_theme_mod( 'color_accent', '#000000' );

    $custom_css = "
        :root {
            --color-bg: {$bg_color};
            --color-text: {$text_color};
            --color-accent: {$accent_color};
        }
    ";
    wp_add_inline_style( 'laytoncorp-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'laytoncorp_customizer_css' );


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
