<?php
/**
 * Add Single Pages section and it's fields inside Blog section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_single_pages_fields' );

if ( ! function_exists( 'matina_news_register_single_pages_fields' ) ) :

    /**
     * Register Single Pages section's fields.
     */
    function matina_news_register_single_pages_fields ( $wp_customize ) {

        /**
         * Single Pages Section
         *
         * Theme Options > Blog > Single Pages
         *
         * @since 1.0.5
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_single_pages',
                array(
                    'priority'      => 30,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_blog_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Single Pages', 'matina-news' )
                )
            )
        );

        /**
         * Heading field for Single Pages Layout
         *
         * Theme Options > Blog > Single Pages
         *
         * @since 1.0.5
         */
        $wp_customize->add_setting( 'matina_news_single_page_layout_heading',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Heading(
            $wp_customize, 'matina_news_single_page_layout_heading',
                array(
                    'priority'      => 10,
                    'section'       => 'matina_news_section_single_pages',
                    'settings'      => 'matina_news_single_page_layout_heading',
                    'label'         => __( 'Layouts', 'matina-news' ),
                )
            )
        );

        /**
         * Radio image field for single pages sidebar
         *
         * Theme Options > Blog > Single Pages
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_single_pages_sidebar_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'right-sidebar',
                'sanitize_callback' => 'matina_news_sanitize_select',
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Radio_Image(
            $wp_customize, 'matina_news_single_pages_sidebar_layout',
                array(
                    'priority'      => 20,
                    'section'       => 'matina_news_section_single_pages',
                    'settings'      => 'matina_news_single_pages_sidebar_layout',
                    'label'         => __( 'Sidebar Layout', 'matina-news' ),
                    'description'   => __( 'Choose from available layouts', 'matina-news' ),
                    'choices'       => matina_news_sidebar_layout_choices()
                )
            )
        );

    }

endif;