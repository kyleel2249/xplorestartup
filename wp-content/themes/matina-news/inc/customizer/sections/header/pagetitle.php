<?php
/**
 * Add Page Title section and it's fields inside Header section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_header_page_title_fields' );

if ( ! function_exists( 'matina_news_register_header_page_title_fields' ) ) :

    /**
     * Register Page Title section's fields.
     */
    function matina_news_register_header_page_title_fields ( $wp_customize ) {

        /**
         * Page Title Section
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_header_page_title',
                array(
                    'priority'      => 35,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_header_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Page Title', 'matina-news' )
                )
            )
        );

        /**
         * Select field for page title heading tag
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_page_title_heading_tag',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'h1',
                'sanitize_callback' => 'matina_news_sanitize_select'
            )
        );
        
        $wp_customize->add_control( 'matina_news_page_title_heading_tag',
            array(
                'priority'          => 10,
                'section'           => 'matina_news_section_header_page_title',
                'settings'          => 'matina_news_page_title_heading_tag',
                'label'             => __( 'Heading Tag', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_heading_tag_choices()
            )
        );

        /**
         * Select field for page title style
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_page_title_style',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'default',
                'sanitize_callback' => 'matina_news_sanitize_select'
            )
        );
        
        $wp_customize->add_control( 'matina_news_page_title_style',
            array(
                'priority'          => 20,
                'section'           => 'matina_news_section_header_page_title',
                'settings'          => 'matina_news_page_title_style',
                'label'             => __( 'Page Title Style', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_page_title_style_choices()
            )
        );

        /**
         * Buttonset option for page title over background.
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_page_title_bg_title_align',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'center',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Buttonset(
            $wp_customize, 'matina_news_page_title_bg_title_align',
                array(
                    'priority'      => 30,
                    'section'       => 'matina_news_section_header_page_title',
                    'settings'      => 'matina_news_page_title_bg_title_align',
                    'label'         => __( 'Page Title Position', 'matina-news' ),
                    'choices'       => matina_news_page_title_bg_title_align_choices(),
                    'active_callback'   => 'matina_news_cb_has_page_title_background_color',
                )
            )
        );

        /**
         * Color option for page title background
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_page_title_bg_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#3d3d3d',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color',
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_page_title_bg_color',
                array(
                    'priority'          => 40,
                    'section'           => 'matina_news_section_header_page_title',
                    'settings'          => 'matina_news_page_title_bg_color',
                    'label'             => __( 'Background Color', 'matina-news' ),
                    'active_callback'   => 'matina_news_cb_has_page_title_background_color',
                )
            )
        );

        /**
         * Color option for page title text color
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_page_title_bg_text_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#3d3d3d',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color',
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_page_title_bg_text_color',
                array(
                    'priority'          => 50,
                    'section'           => 'matina_news_section_header_page_title',
                    'settings'          => 'matina_news_page_title_bg_text_color',
                    'label'             => __( 'Text Color', 'matina-news' ),
                    'active_callback'   => 'matina_news_cb_has_page_title_background_color',
                )
            )
        );

        /**
         * Heading field for breadcrumb
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_page_title_breadcrumb_heading',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Heading(
            $wp_customize, 'matina_news_page_title_breadcrumb_heading',
                array(
                    'priority'      => 90,
                    'section'       => 'matina_news_section_header_page_title',
                    'settings'      => 'matina_news_page_title_breadcrumb_heading',
                    'label'         => __( 'Breadcrumbs', 'matina-news' ),
                )
            )
        );

        /**
         * Toggle option for breadcrumb.
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_breadcrumbs',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => true,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_breadcrumbs',
                array(
                    'priority'      => 100,
                    'section'       => 'matina_news_section_header_page_title',
                    'settings'      => 'matina_news_breadcrumbs',
                    'label'         => __( 'Enable Breadcrumb', 'matina-news' )
                )
            )
        );

        /**
         * Text field for breadcrumb home label
         *
         * Theme Options > Header > Page Title
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_breadcrumbs_home_lable',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => __( 'Home', 'matina-news' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control( 'matina_news_breadcrumbs_home_lable',
            array(
                'priority'          => 120,
                'section'           => 'matina_news_section_header_page_title',
                'settings'          => 'matina_news_breadcrumbs_home_lable',
                'label'             => __( 'Translation for Home', 'matina-news' ),
                'type'              => 'text',
                'active_callback'   => 'matina_news_cb_has_breadcrumb'
            )
        );

    }

endif;
