<?php
/**
 * Add Colors section and it's fields inside General section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_colors_fields' );

if ( ! function_exists( 'matina_news_register_colors_fields' ) ) :

    /**
     * Register Colors section's fields.
     */
    function matina_news_register_colors_fields ( $wp_customize ) {

        /**
         * Colors Section
         *
         * Theme Options > General > Colors
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'colors',
                array(
                    'priority'      => 30,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_general_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Colors', 'matina-news' )
                )
            )
        );

        /**
         * Alpha Color option for primary theme color
         *
         * Theme Options > General > Colors
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_primary_theme_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#0A71C0',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_primary_theme_color',
                array(
                    'priority'          => 50,
                    'section'           => 'colors',
                    'settings'          => 'matina_news_primary_theme_color',
                    'label'             => __( 'Primary Theme Color', 'matina-news' )
                )
            )
        );

        /**
         * Alpha Color option for text color
         *
         * Theme Options > General > Colors
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_body_text_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#3d3d3d',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_body_text_color',
                array(
                    'priority'          => 60,
                    'section'           => 'colors',
                    'settings'          => 'matina_news_body_text_color',
                    'label'             => __( 'Text Color', 'matina-news' )
                )
            )
        );

        /**
         * Alpha Color option for link color
         *
         * Theme Options > General > Colors
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_link_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#0A71C0',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_link_color',
                array(
                    'priority'          => 70,
                    'section'           => 'colors',
                    'settings'          => 'matina_news_link_color',
                    'label'             => __( 'Link Color', 'matina-news' )
                )
            )
        );

        /**
         * Alpha Color option for link hover color
         *
         * Theme Options > General > Colors
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_link_hover_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#8e4d48',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_link_hover_color',
                array(
                    'priority'          => 80,
                    'section'           => 'colors',
                    'settings'          => 'matina_news_link_hover_color',
                    'label'             => __( 'Link Hover Color', 'matina-news' )
                )
            )
        );

    }

endif;