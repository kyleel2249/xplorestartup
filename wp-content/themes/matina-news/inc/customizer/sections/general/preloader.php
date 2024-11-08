<?php
/**
 * Add Preloader section and it's fields inside General section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_preloader_fields' );

if ( ! function_exists( 'matina_news_register_preloader_fields' ) ) :

    /**
     * Register Preloader section's fields.
     */
    function matina_news_register_preloader_fields ( $wp_customize ) {

        /**
         * Preloader Section
         *
         * Theme Options > General > Preloader
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_preloader',
                array(
                    'priority'      => 20,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_general_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Preloader', 'matina-news' )
                )
            )
        );

        /**
         * Toggle option for preloader.
         *
         * Theme Options > General > Preloader
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_preloader_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => true,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_preloader_option',
                array(
                    'priority'      => 10,
                    'section'       => 'matina_news_section_preloader',
                    'settings'      => 'matina_news_preloader_option',
                    'label'         => __( 'Enable Preloader', 'matina-news' )
                )
            )
        );

        /**
         * Select field for preloader styles
         *
         * Theme Options > General > Preloader
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_preloader_style',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'wave',
                'sanitize_callback' => 'matina_news_sanitize_select'
            )
        );
        
        $wp_customize->add_control( 'matina_news_preloader_style',
            array(
                'priority'          => 20,
                'section'           => 'matina_news_section_preloader',
                'settings'          => 'matina_news_preloader_style',
                'label'             => __( 'Preloader Style', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_preloader_style_choices(),
                'active_callback'   => 'matina_news_cb_has_enable_preloader',
            )
        );

    }

endif;