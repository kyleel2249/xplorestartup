<?php
/**
 * Add Style section and it's fields inside Footer section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_footer_style_fields' );

if ( ! function_exists( 'matina_news_register_footer_style_fields' ) ) :

    /**
     * Register Style section's fields.
     */
    function matina_news_register_footer_style_fields ( $wp_customize ) {

        /**
         * Main Area Section
         *
         * Theme Options > Footer > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_footer_style',
                array(
                    'priority'      => 10,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_footer_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Style', 'matina-news' )
                )
            )
        );

        /**
         * Radio image field for footer section layout.
         *
         * Theme Options > Footer > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_footer_section_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'layout-default',
                'sanitize_callback' => 'matina_news_sanitize_select',
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Radio_Image(
            $wp_customize, 'matina_news_footer_section_layout',
                array(
                    'priority'          => 10,
                    'section'           => 'matina_news_section_footer_style',
                    'settings'          => 'matina_news_footer_section_layout',
                    'label'             => __( 'Footer Layout', 'matina-news' ),
                    'description'       => __( 'Choose layout from available options.', 'matina-news' ),
                    'choices'           => matina_news_footer_layout_choices()
                )
            )
        );

        /**
         * Select field for footer background type
         *
         * Theme Options > Footer > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_footer_background_type',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'none',
                'sanitize_callback' => 'matina_news_sanitize_select'
            )
        );
        
        $wp_customize->add_control( 'matina_news_footer_background_type',
            array(
                'priority'          => 20,
                'section'           => 'matina_news_section_footer_style',
                'settings'          => 'matina_news_footer_background_type',
                'label'             => __( 'Background Type', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_background_type_choices()
            )
        );

        /**
         * Color option for footer background
         *
         * Theme Options > Footer > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_footer_background_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#333333',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new matina_news_Control_Color(
            $wp_customize, 'matina_news_footer_background_color',
                array(
                    'priority'          => 30,
                    'section'           => 'matina_news_section_footer_style',
                    'settings'          => 'matina_news_footer_background_color',
                    'label'             => __( 'Background Color', 'matina-news' ),
                    'active_callback'   => 'matina_news_cb_has_select_footer_bg_color'
                )
            )
        );

        /**
         * Color option for Footer text color
         *
         * Theme Options > Footer > Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_footer_text_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => '#a1a1a1',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_footer_text_color',
                array(
                    'priority'          => 40,
                    'section'           => 'matina_news_section_footer_style',
                    'settings'          => 'matina_news_footer_text_color',
                    'label'             => __( 'Text Color', 'matina-news' ),
                    'active_callback'   => 'matina_news_cb_has_select_footer_bg_color'
                )
            )
        );

    } // end function

endif;