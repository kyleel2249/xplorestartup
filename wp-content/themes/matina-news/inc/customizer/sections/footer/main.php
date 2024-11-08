<?php
/**
 * Add Main Area section and it's fields inside Footer section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_footer_main_fields' );

if ( ! function_exists( 'matina_news_register_footer_main_fields' ) ) :

    /**
     * Register Main Area section's fields.
     */
    function matina_news_register_footer_main_fields ( $wp_customize ) {

        /**
         * Main Area Section
         *
         * Theme Options > Footer > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_footer_main',
                array(
                    'priority'      => 20,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_footer_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Main Area', 'matina-news' )
                )
            )
        );

        /**
         * Toggle option for widget area
         *
         * Theme Options > Footer > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_footer_widget_area_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => false,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_footer_widget_area_option',
                array(
                    'priority'      => 10,
                    'section'       => 'matina_news_section_footer_main',
                    'settings'      => 'matina_news_footer_widget_area_option',
                    'label'         => __( 'Enable Widget Area', 'matina-news' )
                )
            )
        );

        /**
         * Radio image field for footer widget area.
         *
         * Theme Options > Footer > Main Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_footer_widget_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'four-columns',
                'sanitize_callback' => 'matina_news_sanitize_select',
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Radio_Image(
            $wp_customize, 'matina_news_footer_widget_layout',
                array(
                    'priority'          => 20,
                    'section'           => 'matina_news_section_footer_main',
                    'settings'          => 'matina_news_footer_widget_layout',
                    'label'             => __( 'Widget Area Layout', 'matina-news' ),
                    'description'       => __( 'Choose layout from available options.', 'matina-news' ),
                    'choices'           => matina_news_footer_widget_layout_choices(),
                    'active_callback'   => 'matina_news_cb_has_enable_footer_widget'
                )
            )
        );

    } // end function

endif;