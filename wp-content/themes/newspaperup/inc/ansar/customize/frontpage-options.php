<?php
$newspaperup_default = newspaperup_get_default_theme_options(); 
/**
 * Frontpage options section
 *
 * @package Newspaperup
 */

// Main banner Slider Section.
Newspaperup_Customizer_Control::add_section(
	'frontpage_main_banner_section_settings',
	array(
		'title' => esc_html__( 'Featured Slider', 'newspaperup' ),  
        'priority' => 15,
        'capability' => 'edit_theme_options',
	)
);

// Featured Slider Tab
$wp_customize->add_setting(
    'slider_tabs',
    array(
        'default'           => '',
        'capability' => 'edit_theme_options', 
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( new Custom_Tab_Control ( $wp_customize,'slider_tabs',
    array(
        'label'                 => '',
        'type' => 'custom-tab-control',
        'priority' => 1,
        'section'               => 'frontpage_main_banner_section_settings',
        'controls_general'      => json_encode( array( 
            '#customize-control- ',
            '#customize-control-show_main_banner_section', 
            '#customize-control- ', 
            '#customize-control-', 
            '#customize-control- ', 
            '#customize-control-newspaperup_main_banner_section_background_image',
            '#customize-control- ',
            '#customize-control- ', 
            '#customize-control-main_slider_section_title', 
            '#customize-control-select_slider_news_category',
            '#customize-control- ',  
            '#customize-control- ',  
            '#customize-control- ',  
            '#customize-control-main_trending_post_section_title', 
            '#customize-control- ', 
            '#customize-control- ', 
            '#customize-control-select_trending_news_category',
            '#customize-control-main_editor_post_section_title', 
            '#customize-control-select_editor_news_category',
            '#customize-control- ',
        ) ),
        'controls_design'       => json_encode( array(  
            '#customize-control-main_slider_section_title', 
            '#customize-control- ',
            '#customize-control- ', 
            '#customize-control- ', 
            '#customize-control-newspaperup_slider_title_font_size',
            '#customize-control- ',
            '#customize-control- ',
            '#customize-control-slider_meta_enable',
            '#customize-control-tren_edit_section_title',
            '#customize-control-newspaperup_tren_edit_title_font_size',
        ) ),
    )
));
//Slider Section title 
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden', 
        'settings'  => 'main_slider_section_title',
        'label' => esc_html__('Featured Slider', 'newspaperup'),
		'section'   => 'frontpage_main_banner_section_settings',
	)
);
// Setting - show_main_banner_section.
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'show_main_banner_section',
        'label' => esc_html__('Hide/Show', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// Setting newspaperup_main_banner_section_background_image.
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'cropped_image', 
        'settings'  => 'newspaperup_main_banner_section_background_image',
        'label' => esc_html__('Background image', 'newspaperup'),
        'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'newspaperup'), 1200, 720),
		'section'  => 'frontpage_main_banner_section_settings',
        'default' => '',
        'width' => 1200,
        'height' => 720,
        'flex_width' => true,
        'flex_height' => true,
        'sanitize_callback' => 'absint', 
        'active_callback' => 'newspaperup_main_banner_section_status'
	)
);
// Setting - drop down category for slider.
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'taxonomies', 
        'settings'  => 'select_slider_news_category',
        'label' => esc_html__('Select Category', 'newspaperup'),
        'description' => esc_html__('Posts to be shown on banner slider section', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'taxonomy' => 'category', 
        'default' => $newspaperup_default['select_slider_news_category'],
        'sanitize_callback' => 'absint', 
        'active_callback' => 'newspaperup_main_banner_section_status'
	)
);
//Trending Post Section title
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden',
        'settings'  => 'main_trending_post_section_title',
        'label' => esc_html__('Trending Post Section', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'sanitize_callback' => 'newspaperup_sanitize_text',
        'active_callback' => 'newspaperup_main_banner_section_status',
	)
);
// Setting - drop down category for slider.
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'taxonomies', 
        'settings'  => 'select_trending_news_category',
        'label' => esc_html__('Select Category', 'newspaperup'),
        'description' => esc_html__('Posts to be shown on trending slider section', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'taxonomy' => 'category', 
        'default' => $newspaperup_default['select_trending_news_category'],
        'sanitize_callback' => 'absint', 
        'active_callback' => 'newspaperup_main_banner_section_status'
	)
);
//Editor Post Section
//Trending Post Section title
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden',
        'settings'  => 'main_editor_post_section_title',
        'label' => esc_html__('Editor Post Section', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'sanitize_callback' => 'newspaperup_sanitize_text',
        'active_callback' => 'newspaperup_main_banner_section_status',
	)
);
// Setting - drop down category for slider.
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'taxonomies', 
        'settings'  => 'select_editor_news_category',
        'label' => esc_html__('Select Category', 'newspaperup'),
        'description' => esc_html__('Posts to be shown on editor slider section', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'taxonomy' => 'category', 
        'default' => $newspaperup_default['select_editor_news_category'],
        'sanitize_callback' => 'absint', 
        'active_callback' => 'newspaperup_main_banner_section_status'
	)
);
// STYLE
// Slider Title Font Size
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'newspaperup-range', 
        'settings'  => 'newspaperup_slider_title_font_size',
        'label' => esc_html__('Title Font Size', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'transport'   => 'postMessage',
        'media_query'   => true,
        'input_attr'    => array(
            'mobile'  => array(
                'min'           => 0,
                'max'           => 300,
                'step'          => 1,
                'default_value' => 24,
            ),
            'tablet'  => array(
                'min'           => 0,
                'max'           => 300,
                'step'          => 1,
                'default_value' => 32,
            ),
            'desktop' => array(
                'min'           => 0,
                'max'           => 300,
                'step'          => 1,
                'default_value' => 38,
            ),
        ),
        // 'active_callback' => 'newspaperup_main_banner_section_status',
    ),
);
// Hide / Show Author,Date,Comment
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'slider_meta_enable',
        'label' => esc_html__('Hide/Show Meta', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
        // 'active_callback' => 'newspaperup_main_banner_section_status',
	)
);
//Trending/Editor Section title
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'tren_edit_section_title',
        'label' => esc_html__('Trending/Editor Post Section', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'sanitize_callback' => 'newspaperup_sanitize_text',
        // 'active_callback' => 'newspaperup_main_banner_section_status',
	)
); 
// Trending/Editor Title Font Size
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'newspaperup-range', 
        'settings'  => 'newspaperup_tren_edit_title_font_size',
        'label' => esc_html__('Title Font Size', 'newspaperup'),
		'section'  => 'frontpage_main_banner_section_settings',
        'transport'   => 'postMessage',
        'media_query'   => true,
        'input_attr'    => array(
            'mobile'  => array(
                'min'           => 0,
                'max'           => 300,
                'step'          => 1,
                'default_value' => 16,
            ),
            'tablet'  => array(
                'min'           => 0,
                'max'           => 300,
                'step'          => 1,
                'default_value' => 20,
            ),
            'desktop' => array(
                'min'           => 0,
                'max'           => 300,
                'step'          => 1,
                'default_value' => 22,
            ),
        ),
        // 'active_callback' => 'newspaperup_main_banner_section_status',
    ),
);