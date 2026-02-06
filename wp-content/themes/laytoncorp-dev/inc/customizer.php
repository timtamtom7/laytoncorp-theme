<?php
/**
 * Laytoncorp Theme Customizer
 *
 * @package Laytoncorp
 */

function laytoncorp_customize_register( $wp_customize ) {

    // --- PANELS ---
    // Organize sections into collapsible panels for a cleaner UI
    
    // Panel: Global Design (Colors, Typography, Buttons)
    $wp_customize->add_panel( 'laytoncorp_design_panel', array(
        'title'       => __( 'Global Design', 'laytoncorp' ),
        'priority'    => 20,
        'description' => __( 'Manage global styles: Colors, Typography, Buttons.', 'laytoncorp' ),
    ) );

    // Panel: Hero Section (Content, Layout)
    $wp_customize->add_panel( 'laytoncorp_hero_panel', array(
        'title'       => __( 'Hero Section', 'laytoncorp' ),
        'priority'    => 30,
        'description' => __( 'Manage Homepage Hero content and layout.', 'laytoncorp' ),
    ) );

    // --- PANEL: HEADER ---
    $wp_customize->add_panel( 'laytoncorp_header_panel', array(
        'title'       => __( 'Header & Navigation', 'laytoncorp' ),
        'priority'    => 25,
    ) );

    $wp_customize->add_section( 'laytoncorp_header_style', array(
        'title'       => __( 'Header Style', 'laytoncorp' ),
        'panel'       => 'laytoncorp_header_panel',
    ) );

    // Header Height
    $wp_customize->add_setting( 'header_height', array( 'default' => '80', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'header_height', array(
        'label'       => __( 'Header Height (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_header_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 50, 'max' => 150, 'step' => 1 ),
    ) );

    // Header Background (Scrolled)
    $wp_customize->add_setting( 'header_bg_scrolled', array( 'default' => 'rgba(255, 255, 255, 0.98)', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_scrolled', array(
        'label'       => __( 'Scrolled Background', 'laytoncorp' ),
        'section'     => 'laytoncorp_header_style',
    ) ) );

    // Logo Width
    $wp_customize->add_setting( 'header_logo_width', array( 'default' => '150', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'header_logo_width', array(
        'label'       => __( 'Logo Width (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_header_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 50, 'max' => 300, 'step' => 5 ),
    ) );

    // Menu Item Spacing
    $wp_customize->add_setting( 'header_menu_gap', array( 'default' => '32', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'header_menu_gap', array(
        'label'       => __( 'Menu Item Spacing (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_header_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 10, 'max' => 60, 'step' => 1 ),
    ) );


    // --- PANEL: FOOTER ---
    $wp_customize->add_panel( 'laytoncorp_footer_panel', array(
        'title'       => __( 'Footer', 'laytoncorp' ),
        'priority'    => 50,
    ) );

    $wp_customize->add_section( 'laytoncorp_footer_style', array(
        'title'       => __( 'Footer Style', 'laytoncorp' ),
        'panel'       => 'laytoncorp_footer_panel',
    ) );

    // Footer Padding
    $wp_customize->add_setting( 'footer_padding_y', array( 'default' => '96', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'footer_padding_y', array(
        'label'       => __( 'Vertical Padding (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_footer_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 40, 'max' => 200, 'step' => 8 ),
    ) );

    // Footer Background
    $wp_customize->add_setting( 'footer_bg_color', array( 'default' => '#111111', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
        'label'       => __( 'Background Color', 'laytoncorp' ),
        'section'     => 'laytoncorp_footer_style',
    ) ) );

    // Footer Text Color
    $wp_customize->add_setting( 'footer_text_color', array( 'default' => '#ffffff', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
        'label'       => __( 'Text Color', 'laytoncorp' ),
        'section'     => 'laytoncorp_footer_style',
    ) ) );


    // --- SECTION: GLOBAL COLORS (moved to Design Panel) ---
    $wp_customize->add_section( 'laytoncorp_colors_section', array(
        'title'       => __( 'Colors', 'laytoncorp' ),
        'panel'       => 'laytoncorp_design_panel',
        'priority'    => 10,
    ) );

    // Background Color
    $wp_customize->add_setting( 'color_bg', array( 'default' => '#ffffff', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_bg', array( 'label' => __( 'Background Color', 'laytoncorp' ), 'section' => 'laytoncorp_colors_section' ) ) );

    // Text Color
    $wp_customize->add_setting( 'color_text', array( 'default' => '#1a1a1a', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_text', array( 'label' => __( 'Text Color', 'laytoncorp' ), 'section' => 'laytoncorp_colors_section' ) ) );

    // Accent Color
    $wp_customize->add_setting( 'color_accent', array( 'default' => '#000000', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_accent', array( 'label' => __( 'Accent Color', 'laytoncorp' ), 'section' => 'laytoncorp_colors_section' ) ) );


    // --- SECTION: GLOBAL BUTTONS (New) ---
    $wp_customize->add_section( 'laytoncorp_buttons_section', array(
        'title'       => __( 'Buttons', 'laytoncorp' ),
        'panel'       => 'laytoncorp_design_panel',
        'priority'    => 20,
    ) );

    // Button Background
    $wp_customize->add_setting( 'btn_bg_color', array( 'default' => '#000000', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_bg_color', array( 'label' => __( 'Background Color', 'laytoncorp' ), 'section' => 'laytoncorp_buttons_section' ) ) );

    // Button Text Color
    $wp_customize->add_setting( 'btn_text_color', array( 'default' => '#ffffff', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_text_color', array( 'label' => __( 'Text Color', 'laytoncorp' ), 'section' => 'laytoncorp_buttons_section' ) ) );

    // Button Radius
    $wp_customize->add_setting( 'btn_radius', array( 'default' => '0', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_radius', array(
        'label'       => __( 'Corner Radius (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_buttons_section',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 0, 'max' => 50, 'step' => 1 ),
    ) );

    // Button Padding (Vertical)
    $wp_customize->add_setting( 'btn_padding_y', array( 'default' => '16', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_padding_y', array(
        'label'       => __( 'Vertical Padding (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_buttons_section',
        'type'        => 'number',
    ) );

    // Button Padding (Horizontal)
    $wp_customize->add_setting( 'btn_padding_x', array( 'default' => '32', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_padding_x', array(
        'label'       => __( 'Horizontal Padding (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_buttons_section',
        'type'        => 'number',
    ) );

    // Button Text Transform
    $wp_customize->add_setting( 'btn_transform', array( 'default' => 'uppercase', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_transform', array(
        'label'       => __( 'Text Style', 'laytoncorp' ),
        'section'     => 'laytoncorp_buttons_section',
        'type'        => 'select',
        'choices'     => array( 'uppercase' => 'Uppercase', 'capitalize' => 'Capitalize', 'none' => 'Normal' ),
    ) );


    // --- SECTION: TYPOGRAPHY (New) ---
    $wp_customize->add_section( 'laytoncorp_typography_section', array(
        'title'       => __( 'Typography', 'laytoncorp' ),
        'panel'       => 'laytoncorp_design_panel',
        'priority'    => 30,
    ) );

    // Base Font Size
    $wp_customize->add_setting( 'body_font_size', array( 'default' => '16', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'body_font_size', array(
        'label'       => __( 'Base Font Size (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_typography_section',
        'type'        => 'number',
    ) );

    // H1 Size
    $wp_customize->add_setting( 'h1_font_size', array( 'default' => '2.5', 'sanitize_callback' => 'laytoncorp_sanitize_float', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'h1_font_size', array(
        'label'       => __( 'H1 Size (em)', 'laytoncorp' ),
        'section'     => 'laytoncorp_typography_section',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 1.5, 'max' => 5, 'step' => 0.1 ),
    ) );

    // H2 Size
    $wp_customize->add_setting( 'h2_font_size', array( 'default' => '2', 'sanitize_callback' => 'laytoncorp_sanitize_float', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'h2_font_size', array(
        'label'       => __( 'H2 Size (em)', 'laytoncorp' ),
        'section'     => 'laytoncorp_typography_section',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 1, 'max' => 4, 'step' => 0.1 ),
    ) );

    // H3 Size
    $wp_customize->add_setting( 'h3_font_size', array( 'default' => '1.75', 'sanitize_callback' => 'laytoncorp_sanitize_float', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'h3_font_size', array(
        'label'       => __( 'H3 Size (em)', 'laytoncorp' ),
        'section'     => 'laytoncorp_typography_section',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 1, 'max' => 3, 'step' => 0.1 ),
    ) );

    // Heading Weight
    $wp_customize->add_setting( 'heading_font_weight', array( 'default' => '600', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'heading_font_weight', array(
        'label'       => __( 'Heading Font Weight', 'laytoncorp' ),
        'section'     => 'laytoncorp_typography_section',
        'type'        => 'select',
        'choices'     => array( '400' => 'Regular', '500' => 'Medium', '600' => 'SemiBold', '700' => 'Bold', '800' => 'ExtraBold' ),
    ) );


    // --- SECTION: LAYOUT & SPACING (New) ---
    $wp_customize->add_section( 'laytoncorp_layout_section', array(
        'title'       => __( 'Layout & Spacing', 'laytoncorp' ),
        'panel'       => 'laytoncorp_design_panel',
        'priority'    => 40,
    ) );

    // Container Width
    $wp_customize->add_setting( 'container_width', array( 'default' => '1280', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'container_width', array(
        'label'       => __( 'Container Width (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_layout_section',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 1000, 'max' => 1920, 'step' => 10 ),
    ) );

    // Global Section Spacing
    $wp_customize->add_setting( 'section_spacing', array( 'default' => '96', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'section_spacing', array(
        'label'       => __( 'Section Spacing (px)', 'laytoncorp' ),
        'section'     => 'laytoncorp_layout_section',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 40, 'max' => 200, 'step' => 8 ),
    ) );


    // --- SECTION: HERO CONTENT (Moved to Hero Panel) ---
	$wp_customize->add_section( 'laytoncorp_hero_content', array(
		'title'       => __( 'Content & Media', 'laytoncorp' ),
        'panel'       => 'laytoncorp_hero_panel',
		'priority'    => 10,
	) );

	// Display Mode
	$wp_customize->add_setting( 'hero_display_mode', array(
		'default'           => 'image',
		'sanitize_callback' => 'laytoncorp_sanitize_select',
		'transport'         => 'refresh', 
	) );
	$wp_customize->add_control( 'hero_display_mode', array(
		'label'       => __( 'Display Mode', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_content',
		'type'        => 'select',
		'choices'     => array(
			'image'      => 'Image Hero',
			'video'      => 'Video Hero',
			'typography' => 'Typography Hero',
			'slideshow'  => 'Slideshow Carousel',
			'marquee'    => 'Continuous Marquee',
		),
	) );

    // Notices (Slideshow/Marquee)
    $wp_customize->add_setting( 'hero_slideshow_notice', array( 'default' => '', 'sanitize_callback' => '__return_false' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_slideshow_notice', array(
        'label'       => __( 'Manage Slides', 'laytoncorp' ),
        'description' => __( 'To manage slides, please go to the Dashboard > Pages > Home and edit the "Hero Slides" field group.', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'type'        => 'hidden',
        'active_callback' => 'laytoncorp_is_slideshow_mode',
    ) ) );

    $wp_customize->add_setting( 'hero_marquee_notice', array( 'default' => '', 'sanitize_callback' => '__return_false' ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero_marquee_notice', array(
        'label'       => __( 'Manage Marquee', 'laytoncorp' ),
        'description' => __( 'To manage marquee text/items, please go to the Dashboard > Pages > Home.', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'type'        => 'hidden',
        'active_callback' => 'laytoncorp_is_marquee_mode',
    ) ) );

	// Headline
	$wp_customize->add_setting( 'hero_headline', array(
		'default'           => 'Laytoncorp builds what matters.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'hero_headline', array(
		'label'       => __( 'Headline (Large)', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_content',
		'type'        => 'text',
	) );
    $wp_customize->selective_refresh->add_partial( 'hero_headline', array(
        'selector'        => '.hero-title',
        'render_callback' => function() { return get_theme_mod( 'hero_headline' ); },
    ) );

	// Subtext
	$wp_customize->add_setting( 'hero_subtext', array(
		'default'           => 'Infrastructure, innovation, and materials for a changing world.',
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'hero_subtext', array(
		'label'       => __( 'Subtext', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_content',
		'type'        => 'textarea',
	) );
    $wp_customize->selective_refresh->add_partial( 'hero_subtext', array(
        'selector'        => '.hero-subtitle',
        'render_callback' => function() { return get_theme_mod( 'hero_subtext' ); },
    ) );

	// Hero Image
	$wp_customize->add_setting( 'hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_image', array(
		'label'       => __( 'Hero Image', 'laytoncorp' ),
		'section'     => 'laytoncorp_hero_content',
		'mime_type'   => 'image',
		'description' => __( 'Used when Display Mode is set to "Image Hero".', 'laytoncorp' ),
        'active_callback' => 'laytoncorp_is_image_mode',
	) ) );

    // Video File
    $wp_customize->add_setting( 'hero_video_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_id', array(
        'label'       => __( 'Video File (MP4)', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'mime_type'   => 'video',
        'description' => __( 'Upload or select an MP4 video.', 'laytoncorp' ),
        'active_callback' => 'laytoncorp_is_video_mode',
    ) ) );

    // Video Poster (New)
    $wp_customize->add_setting( 'hero_video_poster', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'hero_video_poster', array(
        'label'       => __( 'Video Poster (Mobile)', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'mime_type'   => 'image',
        'description' => __( 'Image shown on mobile or while video loads.', 'laytoncorp' ),
        'active_callback' => 'laytoncorp_is_video_mode',
    ) ) );

    // Video Loop (New)
    $wp_customize->add_setting( 'hero_video_loop', array(
        'default'           => true,
        'sanitize_callback' => 'laytoncorp_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_video_loop', array(
        'label'       => __( 'Loop Video', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'type'        => 'checkbox',
        'active_callback' => 'laytoncorp_is_video_mode',
    ) );

    // Video Muted (New)
    $wp_customize->add_setting( 'hero_video_muted', array(
        'default'           => true,
        'sanitize_callback' => 'laytoncorp_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_video_muted', array(
        'label'       => __( 'Mute Video', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'type'        => 'checkbox',
        'description' => __( 'Video must be muted to autoplay on most browsers.', 'laytoncorp' ),
        'active_callback' => 'laytoncorp_is_video_mode',
    ) );

    // CTA Text
    $wp_customize->add_setting( 'hero_cta_text', array(
        'default'           => 'Get in touch',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_cta_text', array(
        'label'       => __( 'Button Text', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'type'        => 'text',
    ) );
    $wp_customize->selective_refresh->add_partial( 'hero_cta_text', array(
        'selector'        => '.hero-content .btn',
        'render_callback' => function() { return get_theme_mod( 'hero_cta_text' ); },
    ) );

    // CTA Link
    $wp_customize->add_setting( 'hero_cta_link', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_cta_link', array(
        'label'       => __( 'Button Link', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_content',
        'type'        => 'text',
    ) );


    // --- SECTION: HERO LAYOUT & STYLE (New) ---
    $wp_customize->add_section( 'laytoncorp_hero_style', array(
        'title'       => __( 'Layout & Style', 'laytoncorp' ),
        'panel'       => 'laytoncorp_hero_panel',
        'priority'    => 20,
    ) );

    // Overlay Opacity
    $wp_customize->add_setting( 'hero_overlay_opacity', array( 'default' => '0.3', 'sanitize_callback' => 'laytoncorp_sanitize_float', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'hero_overlay_opacity', array(
        'label'       => __( 'Overlay Opacity', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 0, 'max' => 1, 'step' => 0.1 ),
    ) );

    // Content Alignment
    $wp_customize->add_setting( 'hero_alignment', array( 'default' => 'center', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'hero_alignment', array(
        'label'       => __( 'Text Alignment', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_style',
        'type'        => 'select',
        'choices'     => array( 'left' => 'Left', 'center' => 'Center', 'right' => 'Right' ),
    ) );

    // Headline Size
    $wp_customize->add_setting( 'hero_title_size', array( 'default' => '4', 'sanitize_callback' => 'laytoncorp_sanitize_float', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'hero_title_size', array(
        'label'       => __( 'Headline Size (rem)', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 2, 'max' => 8, 'step' => 0.1 ),
    ) );


    // --- CONTACT SECTION ---
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
    $wp_customize->selective_refresh->add_partial( 'contact_address', array(
        'selector'        => '.contact-address',
        'render_callback' => function() { return get_theme_mod( 'contact_address' ); },
    ) );

}
add_action( 'customize_register', 'laytoncorp_customize_register' );

/**
 * Sanitize Helpers
 */
function laytoncorp_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function laytoncorp_sanitize_float( $input ) {
    return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
}

function laytoncorp_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
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
    // Colors
    $bg_color = get_theme_mod( 'color_bg', '#ffffff' );
    $text_color = get_theme_mod( 'color_text', '#1a1a1a' );
    $accent_color = get_theme_mod( 'color_accent', '#000000' );

    // Buttons
    $btn_bg = get_theme_mod( 'btn_bg_color', '#000000' );
    $btn_text = get_theme_mod( 'btn_text_color', '#ffffff' );
    $btn_radius = get_theme_mod( 'btn_radius', '0' );
    $btn_pad_y = get_theme_mod( 'btn_padding_y', '16' );
    $btn_pad_x = get_theme_mod( 'btn_padding_x', '32' );
    $btn_transform = get_theme_mod( 'btn_transform', 'uppercase' );

    // Typography
    $base_font_size = get_theme_mod( 'body_font_size', '16' );
    $h1_size = get_theme_mod( 'h1_font_size', '2.5' );
    $h2_size = get_theme_mod( 'h2_font_size', '2' );
    $h3_size = get_theme_mod( 'h3_font_size', '1.75' );
    $heading_weight = get_theme_mod( 'heading_font_weight', '600' );

    // Header
    $header_height = get_theme_mod( 'header_height', '80' );
    $header_bg_scrolled = get_theme_mod( 'header_bg_scrolled', 'rgba(255, 255, 255, 0.98)' );
    $header_logo_width = get_theme_mod( 'header_logo_width', '150' );
    $header_menu_gap = get_theme_mod( 'header_menu_gap', '32' );

    // Footer
    $footer_pad_y = get_theme_mod( 'footer_padding_y', '96' );
    $footer_bg = get_theme_mod( 'footer_bg_color', '#111111' );
    $footer_text = get_theme_mod( 'footer_text_color', '#ffffff' );

    // Layout
    $container_width = get_theme_mod( 'container_width', '1280' );
    $section_spacing = get_theme_mod( 'section_spacing', '96' );

    // Hero Style
    $hero_opacity = get_theme_mod( 'hero_overlay_opacity', '0.3' );
    $hero_align = get_theme_mod( 'hero_alignment', 'center' );
    $hero_title_size = get_theme_mod( 'hero_title_size', '4' );

    $custom_css = "
        :root {
            --color-bg: {$bg_color};
            --color-text: {$text_color};
            --color-accent: {$accent_color};
            
            --btn-bg: {$btn_bg};
            --btn-text: {$btn_text};
            --btn-radius: {$btn_radius}px;
            --btn-pad-y: {$btn_pad_y}px;
            --btn-pad-x: {$btn_pad_x}px;
            --btn-transform: {$btn_transform};
            
            --font-size-base: {$base_font_size}px;
            --h1-size: {$h1_size}em;
            --h2-size: {$h2_size}em;
            --h3-size: {$h3_size}em;
            --heading-weight: {$heading_weight};

            --header-height: {$header_height}px;
            --header-bg-scrolled: {$header_bg_scrolled};
            --header-logo-width: {$header_logo_width}px;
            --header-menu-gap: {$header_menu_gap}px;

            --footer-pad-y: {$footer_pad_y}px;
            --footer-bg: {$footer_bg};
            --footer-text: {$footer_text};

            --container-width: {$container_width}px;
            --section-spacing: {$section_spacing}px;

            --hero-overlay: rgba(0,0,0, {$hero_opacity});
            --hero-align: {$hero_align};
            --hero-title-size: {$hero_title_size}rem;
        }

        /* Typography */
        html { font-size: var(--font-size-base); }
        h1 { font-size: var(--h1-size); font-weight: var(--heading-weight); }
        h2 { font-size: var(--h2-size); font-weight: var(--heading-weight); }
        h3 { font-size: var(--h3-size); font-weight: var(--heading-weight); }

        /* Header */
        .site-header { padding: calc((var(--header-height) - 24px) / 2) 0; }
        .site-header.is-scrolled { background-color: var(--header-bg-scrolled); }
        .site-logo { font-size: calc(var(--header-logo-width) / 10); /* Approx proxy */ } 
        /* Ideally logo would be an image, but for text we scale it */
        .nav-menu { gap: var(--header-menu-gap); }

        /* Footer */
        .site-footer { 
            padding-top: var(--footer-pad-y); 
            padding-bottom: var(--footer-pad-y);
            background-color: var(--footer-bg);
            color: var(--footer-text);
        }
        .site-footer a { color: var(--footer-text); opacity: 0.7; }
        .site-footer a:hover { opacity: 1; }

        /* Layout */
        .container { max-width: var(--container-width); }
        section { margin-bottom: var(--section-spacing); }

        /* Apply Button Styles */
        .btn {
            background-color: var(--btn-bg);
            color: var(--btn-text);
            border-radius: var(--btn-radius);
            padding: var(--btn-pad-y) var(--btn-pad-x);
            text-transform: var(--btn-transform);
            border: 1px solid var(--btn-bg);
        }
        
        /* Apply Hero Styles */
        .hero-overlay {
            background-color: var(--hero-overlay);
        }
        .hero-content {
            text-align: var(--hero-align);
            align-items: " . ($hero_align === 'left' ? 'flex-start' : ($hero_align === 'right' ? 'flex-end' : 'center')) . ";
        }
        .hero-title {
            font-size: clamp(2rem, 5vw, var(--hero-title-size));
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
