<?php
/**
 * Add Social Icons section and it's fields inside General section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_social_icons_fields' );

if ( ! function_exists( 'matina_news_register_social_icons_fields' ) ) :

    /**
     * Register social icons section's fields.
     */
    function matina_news_register_social_icons_fields ( $wp_customize ) {

        /**
         * Social Icons Section
         *
         * Theme Options > General > Social Icons
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_social_icons',
                array(
                    'priority'      => 50,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_general_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Social Icons', 'matina-news' )
                )
            )
        );
        
        /**
         * Repeater field for Social Icons
         *
         * Theme Options > General > Social Icons
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_social_media',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => array(
                    array(
                        'mt_item_icon'      => '',
                        'mt_item_link'      => '',
                        'mt_item_title'     => '',
                        'mt_item_checkbox'  => ''
                    )
                ),
                'sanitize_callback' => 'matina_news_sanitize_repeater'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Repeater(
            $wp_customize, 
            'matina_news_social_media',
                array(
                    'priority'                      => 20,
                    'section'                       => 'matina_news_section_social_icons',
                    'settings'                      => 'matina_news_social_media',
                    'label'                         => __( 'Social Icons', 'matina-news' ),
                    'matina_news_box_label_text'         => __( 'Social Icon','matina-news' ),
                    'matina_news_box_add_control_text'   => __( 'Add New Icon','matina-news' )
                ),
                array(
                    'mt_item_icon' => array(
                        'type'        => 'social_icon',
                        'label'       => __( 'Icon', 'matina-news' ),
                        'description' => __( 'Choose required icon from available list.', 'matina-news' )
                    ),
                    'mt_item_link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Icon Link', 'matina-news' ),
                        'description' => __( 'Add social icon link.', 'matina-news' )
                    ),
                    'mt_item_title' => array(
                        'type'        => 'text',
                        'label'       => __( 'Icon Title', 'matina-news' ),
                        'description' => __( 'Add social icon title.', 'matina-news' )
                    ),
                    'mt_item_checkbox' => array(
                        'type'        => 'checkbox',
                        'label'       => __( 'Checked to open link on new tab.', 'matina-news' )
                    )
                )
            )
        );

    }

endif;