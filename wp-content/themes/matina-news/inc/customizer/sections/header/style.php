<?php
/**
 * Add Style section and it's fields inside Header section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_header_style_fields' );

if ( ! function_exists( 'matina_news_register_header_style_fields' ) ) :

    /**
     * Register Style section's fields.
     */
    function matina_news_register_header_style_fields ( $wp_customize ) {

        /**
         * Style Section
         *
         * Theme Options > Header > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_header_style',
                array(
                    'priority'      => 30,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_header_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Style', 'matina-news' )
                )
            )
        );

        /**
         * Radio image field for header layout
         *
         * Theme Options > Header > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'layout-default',
                'sanitize_callback' => 'matina_news_sanitize_select',
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Radio_Image(
            $wp_customize, 'matina_news_header_layout',
                array(
                    'priority'      => 10,
                    'section'       => 'matina_news_section_header_style',
                    'settings'      => 'matina_news_header_layout',
                    'label'         => __( 'Header Layout', 'matina-news' ),
                    'description'   => __( 'Choose from available layouts', 'matina-news' ),
                    'choices'       => matina_news_header_layout_choices()
                )
            )
        );

        /**
         * Color option for header background
         *
         * Theme Options > Header > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_background_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#ffffff',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_header_background_color',
                array(
                    'priority'          => 40,
                    'section'           => 'matina_news_section_header_style',
                    'settings'          => 'matina_news_header_background_color',
                    'label'             => __( 'Header Background Color', 'matina-news' )
                )
            )
        );

        /**
         * Color option for header text color
         *
         * Theme Options > Header > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_text_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#ffffff',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_header_text_color',
                array(
                    'priority'          => 50,
                    'section'           => 'matina_news_section_header_style',
                    'settings'          => 'matina_news_header_text_color',
                    'label'             => __( 'Header Text Color', 'matina-news' )
                )
            )
        );

        /**
         * Toggle option for sticky header
         *
         * Theme Options > Header > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_sticky_header_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => true,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_sticky_header_option',
                array(
                    'priority'      => 60,
                    'section'       => 'matina_news_section_header_style',
                    'settings'      => 'matina_news_sticky_header_option',
                    'label'         => __( 'Enable sticky header', 'matina-news' )
                )
            )
        );

    } // end function

endif;