<?php
/**
 * Laytoncorp Theme Customizer
 *
 * @package Laytoncorp
 */

function laytoncorp_customize_register( $wp_customize ) {

    // --- PANEL: GLOBAL DESIGN ---
    $wp_customize->add_panel( 'laytoncorp_design_panel', array(
        'title'       => __( 'Global Design', 'laytoncorp' ),
        'priority'    => 10,
        'description' => __( 'Control the look and feel of your site.', 'laytoncorp' ),
    ) );

    // Section: Colors
    $wp_customize->add_section( 'laytoncorp_colors_section', array(
        'title'    => __( 'Colors', 'laytoncorp' ),
        'panel'    => 'laytoncorp_design_panel',
        'priority' => 10,
    ) );

    // Background Color
    $wp_customize->add_setting( 'color_bg', array(
        'default'           => '#0a0a0a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_bg', array(
        'label'    => __( 'Background Color', 'laytoncorp' ),
        'section'  => 'laytoncorp_colors_section',
    ) ) );

    // Text Color
    $wp_customize->add_setting( 'color_text', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_text', array(
        'label'    => __( 'Text Color', 'laytoncorp' ),
        'section'  => 'laytoncorp_colors_section',
    ) ) );

    // Accent Color
    $wp_customize->add_setting( 'color_accent', array(
        'default'           => '#3b82f6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_accent', array(
        'label'    => __( 'Accent Color', 'laytoncorp' ),
        'section'  => 'laytoncorp_colors_section',
    ) ) );


    // Section: Buttons
    $wp_customize->add_section( 'laytoncorp_buttons_section', array(
        'title'    => __( 'Buttons', 'laytoncorp' ),
        'panel'    => 'laytoncorp_design_panel',
        'priority' => 20,
    ) );

    // Button Background
    $wp_customize->add_setting( 'btn_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_bg_color', array(
        'label'    => __( 'Button Background', 'laytoncorp' ),
        'section'  => 'laytoncorp_buttons_section',
    ) ) );

    // Button Text Color
    $wp_customize->add_setting( 'btn_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_text_color', array(
        'label'    => __( 'Button Text Color', 'laytoncorp' ),
        'section'  => 'laytoncorp_buttons_section',
    ) ) );

    // Button Radius
    $wp_customize->add_setting( 'btn_radius', array( 'default' => '0', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_radius', array(
        'label' => 'Corner Radius (px)',
        'section' => 'laytoncorp_buttons_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 0, 'max' => 50 ),
    ) );

    // Button Padding Y
    $wp_customize->add_setting( 'btn_padding_y', array( 'default' => '12', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_padding_y', array(
        'label' => 'Vertical Padding (px)',
        'section' => 'laytoncorp_buttons_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 4, 'max' => 40 ),
    ) );

    // Button Padding X
    $wp_customize->add_setting( 'btn_padding_x', array( 'default' => '32', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_padding_x', array(
        'label' => 'Horizontal Padding (px)',
        'section' => 'laytoncorp_buttons_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 8, 'max' => 80 ),
    ) );

    // Button Transform
    $wp_customize->add_setting( 'btn_transform', array( 'default' => 'uppercase', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'btn_transform', array(
        'label' => 'Text Style',
        'section' => 'laytoncorp_buttons_section',
        'type' => 'select',
        'choices' => array( 'none' => 'Normal', 'uppercase' => 'Uppercase', 'lowercase' => 'Lowercase', 'capitalize' => 'Capitalize' ),
    ) );


    // Section: Typography (New)
    $wp_customize->add_section( 'laytoncorp_typography_section', array(
        'title'    => __( 'Typography', 'laytoncorp' ),
        'panel'    => 'laytoncorp_design_panel',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'body_font_size', array( 'default' => '16', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'body_font_size', array(
        'label' => 'Base Font Size (px)',
        'section' => 'laytoncorp_typography_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 12, 'max' => 24 ),
    ) );

    $wp_customize->add_setting( 'h1_font_size', array( 'default' => '4', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'h1_font_size', array(
        'label' => 'H1 Scale (em)',
        'section' => 'laytoncorp_typography_section',
        'type' => 'number',
        'input_attrs' => array( 'min' => 1, 'max' => 10, 'step' => 0.1 ),
    ) );

    $wp_customize->add_setting( 'h2_font_size', array( 'default' => '3', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'h2_font_size', array(
        'label' => 'H2 Scale (em)',
        'section' => 'laytoncorp_typography_section',
        'type' => 'number',
        'input_attrs' => array( 'min' => 1, 'max' => 8, 'step' => 0.1 ),
    ) );

    $wp_customize->add_setting( 'h3_font_size', array( 'default' => '2', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'h3_font_size', array(
        'label' => 'H3 Scale (em)',
        'section' => 'laytoncorp_typography_section',
        'type' => 'number',
        'input_attrs' => array( 'min' => 1, 'max' => 6, 'step' => 0.1 ),
    ) );

    $wp_customize->add_setting( 'heading_font_weight', array( 'default' => '700', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'heading_font_weight', array(
        'label' => 'Heading Weight',
        'section' => 'laytoncorp_typography_section',
        'type' => 'select',
        'choices' => array( '400' => 'Regular', '500' => 'Medium', '600' => 'SemiBold', '700' => 'Bold', '900' => 'Black' ),
    ) );

    // Section: Cards (New)
    $wp_customize->add_section( 'laytoncorp_cards_section', array(
        'title'    => __( 'Cards & Surfaces', 'laytoncorp' ),
        'panel'    => 'laytoncorp_design_panel',
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'card_bg_color', array( 'default' => '#1a1a1a', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'card_bg_color', array(
        'label'    => 'Card Background',
        'section'  => 'laytoncorp_cards_section',
    ) ) );

    $wp_customize->add_setting( 'card_radius', array( 'default' => '0', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'card_radius', array(
        'label' => 'Card Radius (px)',
        'section' => 'laytoncorp_cards_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 0, 'max' => 40 ),
    ) );

    $wp_customize->add_setting( 'card_padding', array( 'default' => '24', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'card_padding', array(
        'label' => 'Card Padding (px)',
        'section' => 'laytoncorp_cards_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 0, 'max' => 60 ),
    ) );


    // Section: Layout (New)
    $wp_customize->add_section( 'laytoncorp_layout_section', array(
        'title'    => __( 'Layout & Spacing', 'laytoncorp' ),
        'panel'    => 'laytoncorp_design_panel',
        'priority' => 50,
    ) );

    $wp_customize->add_setting( 'container_width', array( 'default' => '1280', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'container_width', array(
        'label' => 'Max Container Width (px)',
        'section' => 'laytoncorp_layout_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 1000, 'max' => 1920, 'step' => 10 ),
    ) );

    $wp_customize->add_setting( 'section_spacing', array( 'default' => '96', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'section_spacing', array(
        'label' => 'Section Spacing (px)',
        'section' => 'laytoncorp_layout_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 40, 'max' => 200, 'step' => 8 ),
    ) );


    // --- PANEL: HERO SECTION ---
    $wp_customize->add_panel( 'laytoncorp_hero_panel', array(
        'title'       => __( 'Hero Section', 'laytoncorp' ),
        'priority'    => 20,
    ) );

    // Section: Hero Content
    $wp_customize->add_section( 'laytoncorp_hero_content', array(
        'title'       => __( 'Content', 'laytoncorp' ),
        'panel'       => 'laytoncorp_hero_panel',
        'priority'    => 10,
    ) );

    // Hero Mode
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

    // Video Poster
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

    // Video Loop
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

    // Video Muted
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


    // Section: Hero Layout & Style
    $wp_customize->add_section( 'laytoncorp_hero_style', array(
        'title'       => __( 'Layout & Style', 'laytoncorp' ),
        'panel'       => 'laytoncorp_hero_panel',
        'priority'    => 20,
    ) );

    // Overlay Opacity
    $wp_customize->add_setting( 'hero_overlay_opacity', array(
        'default'           => '0.3',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_overlay_opacity', array(
        'label'       => __( 'Overlay Opacity', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 0, 'max' => 1, 'step' => 0.1 ),
    ) );

    // Alignment
    $wp_customize->add_setting( 'hero_alignment', array(
        'default'           => 'center',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_alignment', array(
        'label'       => __( 'Content Alignment', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_style',
        'type'        => 'select',
        'choices'     => array( 'left' => 'Left', 'center' => 'Center', 'right' => 'Right' ),
    ) );

    // Title Size
    $wp_customize->add_setting( 'hero_title_size', array(
        'default'           => '4',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_title_size', array(
        'label'       => __( 'Title Size (rem)', 'laytoncorp' ),
        'section'     => 'laytoncorp_hero_style',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 2, 'max' => 8, 'step' => 0.25 ),
    ) );


    // --- PANEL: HEADER & FOOTER ---
    $wp_customize->add_panel( 'laytoncorp_hf_panel', array(
        'title'       => __( 'Header & Footer', 'laytoncorp' ),
        'priority'    => 30,
    ) );

    // Section: Header
    $wp_customize->add_section( 'laytoncorp_header_section', array(
        'title'    => __( 'Header', 'laytoncorp' ),
        'panel'    => 'laytoncorp_hf_panel',
    ) );

    $wp_customize->add_setting( 'header_height', array( 'default' => '80', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'header_height', array(
        'label' => 'Height (px)',
        'section' => 'laytoncorp_header_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 50, 'max' => 150 ),
    ) );

    $wp_customize->add_setting( 'header_bg_scrolled', array( 'default' => 'rgba(10,10,10,0.95)', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'header_bg_scrolled', array(
        'label' => 'Scrolled Background',
        'section' => 'laytoncorp_header_section',
        'type' => 'text',
        'description' => 'CSS color value (e.g. rgba(0,0,0,0.9))',
    ) );

    $wp_customize->add_setting( 'header_logo_width', array( 'default' => '150', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'header_logo_width', array(
        'label' => 'Logo Width (px)',
        'section' => 'laytoncorp_header_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 50, 'max' => 300 ),
    ) );

    $wp_customize->add_setting( 'header_menu_gap', array( 'default' => '32', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'header_menu_gap', array(
        'label' => 'Menu Item Spacing (px)',
        'section' => 'laytoncorp_header_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 10, 'max' => 60 ),
    ) );


    // Section: Footer
    $wp_customize->add_section( 'laytoncorp_footer_section', array(
        'title'    => __( 'Footer', 'laytoncorp' ),
        'panel'    => 'laytoncorp_hf_panel',
    ) );

    $wp_customize->add_setting( 'footer_padding_y', array( 'default' => '64', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'footer_padding_y', array(
        'label' => 'Vertical Padding (px)',
        'section' => 'laytoncorp_footer_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 20, 'max' => 120 ),
    ) );

    $wp_customize->add_setting( 'footer_bg_color', array( 'default' => '#000000', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
        'label'    => 'Footer Background',
        'section'  => 'laytoncorp_footer_section',
    ) ) );

    $wp_customize->add_setting( 'footer_text_color', array( 'default' => '#888888', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
        'label'    => 'Footer Text Color',
        'section'  => 'laytoncorp_footer_section',
    ) ) );


    // --- PANEL: SECTIONS (Features, Portfolio, Contact) ---
    $wp_customize->add_panel( 'laytoncorp_sections_panel', array(
        'title'       => __( 'Page Sections', 'laytoncorp' ),
        'priority'    => 40,
    ) );


    // --- FEATURES SECTION (New) ---
    $wp_customize->add_section( 'laytoncorp_features_section', array(
        'title'    => __( 'Features (Capabilities)', 'laytoncorp' ),
        'panel'    => 'laytoncorp_design_panel', // Moving to Design Panel for centralized access
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'features_title', array( 'default' => 'Capabilities', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'features_title', array(
        'label' => 'Section Title',
        'section' => 'laytoncorp_features_section',
        'type' => 'text',
    ) );

    for ( $i = 1; $i <= 4; $i++ ) {
        // Title
        $wp_customize->add_setting( "feature_{$i}_title", array( 'default' => "Feature {$i}", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "feature_{$i}_title", array(
            'label' => "Feature {$i} Title",
            'section' => 'laytoncorp_features_section',
            'type' => 'text',
        ) );
        $wp_customize->selective_refresh->add_partial( "feature_{$i}_title", array( 
            'selector' => ".feature-card-{$i} .feature-title", 
            'render_callback' => function() use ($i){ return get_theme_mod("feature_{$i}_title"); } 
        ) );

        // Text
        $wp_customize->add_setting( "feature_{$i}_text", array( 'default' => "Description for feature {$i}.", 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "feature_{$i}_text", array(
            'label' => "Feature {$i} Text",
            'section' => 'laytoncorp_features_section',
            'type' => 'textarea',
        ) );
        $wp_customize->selective_refresh->add_partial( "feature_{$i}_text", array( 
            'selector' => ".feature-card-{$i} .feature-text", 
            'render_callback' => function() use ($i){ return get_theme_mod("feature_{$i}_text"); } 
        ) );

        // Image
        $wp_customize->add_setting( "feature_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, "feature_{$i}_image", array(
            'label' => "Feature {$i} Image",
            'section' => 'laytoncorp_features_section',
            'mime_type' => 'image',
        ) ) );
        // We use a partial for the whole card content or just the image wrapper to handle the image update
        $wp_customize->selective_refresh->add_partial( "feature_{$i}_image_partial", array( 
            'settings' => array("feature_{$i}_image"),
            'selector' => ".feature-card-{$i} .feature-image-wrapper",
            'render_callback' => function() use ($i) {
                $img_id = get_theme_mod("feature_{$i}_image");
                if ( $img_id ) {
                    echo wp_get_attachment_image( $img_id, 'medium', false, array( 'class' => 'feature-img' ) );
                }
            }
        ) );
    }

    // --- PORTFOLIO SECTION (New) ---
    $wp_customize->add_section( 'laytoncorp_portfolio_section', array(
        'title'    => __( 'Portfolio Grid', 'laytoncorp' ),
        'panel'    => 'laytoncorp_sections_panel',
    ) );

    $wp_customize->add_setting( 'portfolio_title', array( 'default' => 'Portfolio', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'portfolio_title', array(
        'label'   => 'Section Title',
        'section' => 'laytoncorp_portfolio_section',
        'type'    => 'text',
    ) );
    $wp_customize->selective_refresh->add_partial( 'portfolio_title', array( 'selector' => '#portfolio .section-title', 'render_callback' => function(){ return get_theme_mod('portfolio_title'); } ) );

    $wp_customize->add_setting( 'portfolio_columns', array( 'default' => '3', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'portfolio_columns', array(
        'label'   => 'Grid Columns',
        'section' => 'laytoncorp_portfolio_section',
        'type'    => 'select',
        'choices' => array( '2' => '2 Columns', '3' => '3 Columns', '4' => '4 Columns' ),
    ) );

    $wp_customize->add_setting( 'portfolio_gap', array( 'default' => '24', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'portfolio_gap', array(
        'label' => 'Grid Gap (px)',
        'section' => 'laytoncorp_portfolio_section',
        'type' => 'range',
        'input_attrs' => array( 'min' => 0, 'max' => 60 ),
    ) );


    // Section: Contact
    $wp_customize->add_section( 'laytoncorp_contact_section', array(
        'title'       => __( 'Contact Section', 'laytoncorp' ),
        'panel'       => 'laytoncorp_sections_panel',
    ) );

    $wp_customize->add_setting( 'contact_heading', array(
        'default'           => 'Work with Laytoncorp.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'contact_heading', array(
        'label'       => __( 'Heading', 'laytoncorp' ),
        'section'     => 'laytoncorp_contact_section',
        'type'        => 'text',
    ) );
    $wp_customize->selective_refresh->add_partial( 'contact_heading', array(
        'selector'        => '.contact-headline',
        'render_callback' => function() { return get_theme_mod( 'contact_heading' ); },
    ) );

    $wp_customize->add_setting( 'contact_email', array(
        'default'           => 'hello@laytoncorp.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'contact_email', array(
        'label'       => __( 'Email Address', 'laytoncorp' ),
        'section'     => 'laytoncorp_contact_section',
        'type'        => 'text',
    ) );


    // --- PANEL: ABOUT SECTION ---
    $wp_customize->add_section( 'laytoncorp_about_section', array(
        'title'    => __( 'About Section', 'laytoncorp' ),
        'panel'    => 'laytoncorp_sections_panel',
    ) );
    
    $wp_customize->add_setting( 'about_heading', array( 'default' => 'What Laytoncorp does.', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'about_heading', array(
        'label'   => 'Heading',
        'section' => 'laytoncorp_about_section',
        'type'    => 'text',
    ) );
    $wp_customize->selective_refresh->add_partial( 'about_heading', array( 'selector' => '.about-headline', 'render_callback' => function(){ return get_theme_mod('about_heading'); } ) );

    $wp_customize->add_setting( 'about_body', array( 'default' => 'Laytoncorp operates at the intersection of materials...', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'about_body', array(
        'label'   => 'Body Text',
        'section' => 'laytoncorp_about_section',
        'type'    => 'textarea',
    ) );
    $wp_customize->selective_refresh->add_partial( 'about_body', array( 'selector' => '.about-text', 'render_callback' => function(){ return get_theme_mod('about_body'); } ) );

}
add_action( 'customize_register', 'laytoncorp_customize_register' );


/**
 * Dynamic CSS Output
 */
function laytoncorp_customizer_css() {
    $bg_color = get_theme_mod( 'color_bg', '#0a0a0a' );
    $text_color = get_theme_mod( 'color_text', '#ffffff' );
    $accent_color = get_theme_mod( 'color_accent', '#3b82f6' );

    $btn_bg = get_theme_mod( 'btn_bg_color', '#ffffff' );
    $btn_text = get_theme_mod( 'btn_text_color', '#000000' );
    $btn_radius = get_theme_mod( 'btn_radius', '0' );
    $btn_pad_y = get_theme_mod( 'btn_padding_y', '12' );
    $btn_pad_x = get_theme_mod( 'btn_padding_x', '32' );
    $btn_transform = get_theme_mod( 'btn_transform', 'uppercase' );

    $base_font_size = get_theme_mod( 'body_font_size', '16' );
    $h1_size = get_theme_mod( 'h1_font_size', '4' );
    $h2_size = get_theme_mod( 'h2_font_size', '3' );
    $h3_size = get_theme_mod( 'h3_font_size', '2' );
    $heading_weight = get_theme_mod( 'heading_font_weight', '700' );

    $card_bg = get_theme_mod( 'card_bg_color', '#1a1a1a' );
    $card_radius = get_theme_mod( 'card_radius', '0' );
    $card_padding = get_theme_mod( 'card_padding', '24' );
    
    $portfolio_gap = get_theme_mod( 'portfolio_gap', '24' );
    // Convert column count to percentage/fr logic in CSS or just grid-template-columns
    $portfolio_cols = get_theme_mod( 'portfolio_columns', '3' );

    $header_height = get_theme_mod( 'header_height', '80' );
    $header_bg_scrolled = get_theme_mod( 'header_bg_scrolled', 'rgba(10,10,10,0.95)' );
    $header_logo_width = get_theme_mod( 'header_logo_width', '150' );
    $header_menu_gap = get_theme_mod( 'header_menu_gap', '32' );

    $footer_pad_y = get_theme_mod( 'footer_padding_y', '64' );
    $footer_bg = get_theme_mod( 'footer_bg_color', '#000000' );
    $footer_text = get_theme_mod( 'footer_text_color', '#888888' );

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

            --card-bg: {$card_bg};
            --card-radius: {$card_radius}px;
            --card-padding: {$card_padding}px;
            --grid-gap: {$portfolio_gap}px;

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

        /* Portfolio Grid Override */
        .portfolio-grid {
            grid-template-columns: repeat({$portfolio_cols}, 1fr);
            gap: var(--grid-gap);
        }
        @media (max-width: 768px) {
            .portfolio-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 480px) {
            .portfolio-grid {
                grid-template-columns: 1fr;
            }
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
    wp_add_inline_style( 'laytoncorp-main', $custom_css );
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

// Checkbox Sanitization
function laytoncorp_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

// Select Sanitization
function laytoncorp_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
