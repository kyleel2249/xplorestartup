<?php
/**
 * Add Main Area section and it's fields inside Header section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_header_main_area_fields' );

if ( ! function_exists( 'matina_news_register_header_main_area_fields' ) ) :

    /**
     * Register Main Area section's fields.
     */
    function matina_news_register_header_main_area_fields ( $wp_customize ) {

        /**
         * Main Area Section
         *
         * Theme Options > Header > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_header_main_area',
                array(
                    'priority'      => 20,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_header_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Main Area', 'matina-news' )
                )
            )
        );

        /**
         * Heading field for social icons
         *
         * Theme Options > Header > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_main_social_heading',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Heading(
            $wp_customize, 'matina_news_main_social_heading',
                array(
                    'priority'      => 10,
                    'section'       => 'matina_news_section_header_main_area',
                    'settings'      => 'matina_news_main_social_heading',
                    'label'         => __( 'Social Icons', 'matina-news' ),
                )
            )
        );

        /**
         * Toggle option for header social icons
         *
         * Theme Options > Header > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_social_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => false,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_header_social_option',
                array(
                    'priority'      => 30,
                    'section'       => 'matina_news_section_header_main_area',
                    'settings'      => 'matina_news_header_social_option',
                    'label'         => __( 'Enable Social Icons', 'matina-news' )
                )
            )
        );

        /**
         * Text field for social icons section label
         *
         * Theme Options > Header > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_social_label',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => __( 'Follow Us: ', 'matina-news' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control( 'matina_news_header_social_label',
            array(
                'priority'          => 40,
                'section'           => 'matina_news_section_header_main_area',
                'settings'          => 'matina_news_header_social_label',
                'label'             => __( 'Section Label', 'matina-news' ),
                'type'              => 'text',
                'active_callback'   => 'matina_news_cb_enable_header_social',
                'input_attrs'       => array(
                    'placeholder' => __( 'Follow Us:', 'matina-news' )
                )
            )
        );

        /**
         * Heading field for social icons
         *
         * Theme Options > Header > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_main_search_heading',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Heading(
            $wp_customize, 'matina_news_main_search_heading',
                array(
                    'priority'      => 60,
                    'section'       => 'matina_news_section_header_main_area',
                    'settings'      => 'matina_news_main_search_heading',
                    'label'         => __( 'Search Icon', 'matina-news' ),
                )
            )
        );

        /**
         * Toggle option for header search icon
         *
         * Theme Options > Header > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_search_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => true,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_header_search_option',
                array(
                    'priority'      => 70,
                    'section'       => 'matina_news_section_header_main_area',
                    'settings'      => 'matina_news_header_search_option',
                    'label'         => __( 'Enable Search Icon', 'matina-news' )
                )
            )
        );


    } //end function

endif;