<?php
/**
 * Add Bottom Area section and it's fields inside Footer section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_footer_bottom_fields' );

if ( ! function_exists( 'matina_news_register_footer_bottom_fields' ) ) :

    /**
     * Register Bottom Area section's fields.
     */
    function matina_news_register_footer_bottom_fields ( $wp_customize ) {

        /**
         * Bottom Area Section
         *
         * Theme Options > Footer > Bottom Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_footer_bottom',
                array(
                    'priority'      => 30,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_footer_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Bottom Area', 'matina-news' )
                )
            )
        );

        /**
         * Toggle option for footer social icons
         *
         * Theme Options > Footer > Bottom Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_footer_social_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => false,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_footer_social_option',
                array(
                    'priority'      => 40,
                    'section'       => 'matina_news_section_footer_bottom',
                    'settings'      => 'matina_news_footer_social_option',
                    'label'         => __( 'Enable Social Icons', 'matina-news' )
                )
            )
        );

        /**
         * Textarea field for copyright
         *
         * Theme Options > Footer > Bottom Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_copyright_text',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => __( 'copyright 2020. All Rights Reserved.', 'matina-news' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
                
            )
        );
        
        $wp_customize->add_control( 'matina_news_copyright_text',
            array(
                'priority'      => 50,
                'section'       => 'matina_news_section_footer_bottom',
                'settings'      => 'matina_news_copyright_text',
                'label'         => __( 'Copyright Text', 'matina-news' ),
                'type'          => 'text',
                'input_attrs'   => array(
                    'placeholder' => __( 'copyright text', 'matina-news' )
                )
            )
        );

    }

endif;