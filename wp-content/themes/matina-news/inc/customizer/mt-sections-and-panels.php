<?php
/**
 * Matina Theme Section Groups and Panel.
 *
 * @package Matina News
 */

add_action ( 'customize_register', 'matina_news_customizer_register_sections_and_panels' );

if ( ! function_exists ( 'matina_news_customizer_register_sections_and_panels' ) ) :
    
    /**
     * Register customizer panels, section groups and sections.
     */
    function matina_news_customizer_register_sections_and_panels ( $wp_customize ) {

        /**
         * Theme Option Panel
         *
         * Appearance > Customize > Theme Options
         *
         * @since 1.0.0
         */
        $wp_customize->add_panel( 'matina_news_theme_options_panel',
            array(
                'priority'       => 5,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Theme Options', 'matina-news' )
            )
        );

        /**
         * General Section Group
         *
         * Theme Options > General
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section (
            $wp_customize, 'matina_news_general_group',
                array(
                    'priority'          => 10,
                    'panel'             => 'matina_news_theme_options_panel',
                    'capability'        => 'edit_theme_options',
                    'theme_supports'    => '',
                    'title'             => __( 'General', 'matina-news' )
                )
            )
        );

        /**
         * Header Section Group
         *
         * Theme Options > Header
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section (
            $wp_customize, 'matina_news_header_group',
                array(
                    'priority'          => 20,
                    'panel'             => 'matina_news_theme_options_panel',
                    'capability'        => 'edit_theme_options',
                    'theme_supports'    => '',
                    'title'             => __( 'Header', 'matina-news' )
                )
            )
        );

        /**
         * Homepage Section Group
         *
         * Theme Options > Homepage
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section (
            $wp_customize, 'matina_news_homepage_group',
                array(
                    'priority'          => 30,
                    'panel'             => 'matina_news_theme_options_panel',
                    'capability'        => 'edit_theme_options',
                    'theme_supports'    => '',
                    'title'             => __( 'Homepage', 'matina-news' )
                )
            )
        );

        /**
         * Blog Section Group
         *
         * Theme Options > Blog
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section (
            $wp_customize, 'matina_news_blog_group',
                array(
                    'priority'      => 40,
                    'panel'         => 'matina_news_theme_options_panel',
                    'capability'    => 'edit_theme_options',
                    'theme_supports' => '',
                    'title'         => esc_html__( 'Blog', 'matina-news' )
                )
            )
        );

        /**
         * Footer Section Group
         *
         * Theme Options > Footer
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section (
            $wp_customize, 'matina_news_footer_group',
                array(
                    'priority'      => 100,
                    'panel'         => 'matina_news_theme_options_panel',
                    'capability'    => 'edit_theme_options',
                    'theme_supports' => '',
                    'title'         => esc_html__( 'Footer', 'matina-news' )
                )
            )
        );

    } //end function

endif;