<?php
/**
 * Add Post Featured Image Section and it's fields inside General section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_general_featured_image_fields' );

if ( ! function_exists( 'matina_news_register_general_featured_image_fields' ) ) :

    /**
     * Register Post Featured Image section's fields.
     */
    function matina_news_register_general_featured_image_fields ( $wp_customize ) {

        /**
         * Post Featured Image Section
         *
         * Theme Options > General > Post Featured Image
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_featured_image',
                array(
                    'priority'      => 40,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_general_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Post Featured Image', 'matina-news' )
                )
            )
        );

        /**
         * Toggle option for featured image permalink.
         *
         * Theme Options > General > Post Featured Image
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_image_permalink_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => true,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_image_permalink_option',
                array(
                    'priority'      => 30,
                    'section'       => 'matina_news_section_featured_image',
                    'settings'      => 'matina_news_image_permalink_option',
                    'label'         => __( 'Enable post permailnk for featured image.', 'matina-news' )
                )
            )
        );

        /**
         * Toggle option for image hover option.
         *
         * Theme Options > General > Post Featured Image
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_image_hover_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => true,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_image_hover_option',
                array(
                    'priority'          => 40,
                    'section'           => 'matina_news_section_featured_image',
                    'settings'          => 'matina_news_image_hover_option',
                    'label'             => __( 'Enable image hover option.', 'matina-news' ),
                    'active_callback'   => 'matina_news_cb_has_enable_image_permalink_option',
                )
            )
        );

        /**
         * Select field for image hover styles
         *
         * Theme Options > General > Post Featured Image
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_image_hover_style',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'zoomin',
                'sanitize_callback' => 'matina_news_sanitize_select'
            )
        );
        
        $wp_customize->add_control( 'matina_news_image_hover_style',
            array(
                'priority'          => 50,
                'section'           => 'matina_news_section_featured_image',
                'settings'          => 'matina_news_image_hover_style',
                'label'             => __( 'Image Hover Style', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_image_hover_style_choices(),
                'active_callback'   => 'matina_news_cb_has_enable_image_hover_option',
            )
        );

    }

endif;