<?php
/**
 * Add Site Identity section and it's fields inside Header section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_header_site_identity_fields' );

if ( ! function_exists( 'matina_news_register_header_site_identity_fields' ) ) :

    /**
     * Register Site Identity section's fields.
     */
    function matina_news_register_header_site_identity_fields ( $wp_customize ) {

        /**
         * Placed Site identity section into Header Group
         *
         * Theme Options > Header > Site Identity
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'title_tagline',
                array(
                    'priority'      => 10,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_header_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Site Identity', 'matina-news' )
                )
            )
        );

        /**
         * Heading field for site logo
         *
         * Theme Options > Header > Site Identity
         */
        $wp_customize->add_setting( 'matina_news_site_logo_heading',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Heading(
            $wp_customize, 'matina_news_site_logo_heading',
                array(
                    'priority'      => 5,
                    'section'       => 'title_tagline',
                    'settings'      => 'matina_news_site_logo_heading',
                    'label'         => __( 'Site Logo', 'matina-news' ),
                )
            )
        );

        /**
         * Heading field for site title
         *
         * Theme Options > Header > Site Identity
         */
        $wp_customize->add_setting( 'matina_news_site_title_heading',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Heading(
            $wp_customize, 'matina_news_site_title_heading',
                array(
                    'priority'      => 9,
                    'section'       => 'title_tagline',
                    'settings'      => 'matina_news_site_title_heading',
                    'label'         => __( 'Site Title', 'matina-news' ),
                )
            )
        );

        /**
         * Heading field for site icon
         *
         * Theme Options > Header > Site Identity
         */
        $wp_customize->add_setting( 'matina_news_site_icon_heading',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Heading(
            $wp_customize, 'matina_news_site_icon_heading',
                array(
                    'priority'      => 50,
                    'section'       => 'title_tagline',
                    'settings'      => 'matina_news_site_icon_heading',
                    'label'         => __( 'Site Icon', 'matina-news' ),
                )
            )
        );

    } //end function

endif;