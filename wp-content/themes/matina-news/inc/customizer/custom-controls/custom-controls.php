<?php
/**
 * Define path for required files for Custom Control
 * 
 * @package Matina News
*/

if ( ! function_exists( 'matina_news_register_custom_controls' ) ) :
    
    /**
     * Register Custom Controls
     * 
     * @since 1.0.0
    */
    function matina_news_register_custom_controls( $wp_customize ) {
        
        // Load our custom control.
        require_once get_template_directory() . '/inc/customizer/custom-controls/toggle/class-toggle-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/repeater/class-repeater-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/radio-image/class-radio-image-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/color-alpha/class-color-alpha-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/range/class-range-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/buttonset/class-buttonset-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/heading/class-heading-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/typography/class-typography-control.php';
        require_once get_template_directory() . '/inc/customizer/custom-controls/radio-icons/class-radio-icons-control.php';
        
        // Register the control type.
        $wp_customize->register_control_type( 'Matina_News_Control_Toggle' );
        $wp_customize->register_control_type( 'Matina_News_Control_Radio_Image' );
        $wp_customize->register_control_type( 'Matina_News_Control_Color' );
        $wp_customize->register_control_type( 'Matina_News_Control_Range' );
        $wp_customize->register_control_type( 'Matina_News_Control_Buttonset' );
        $wp_customize->register_control_type( 'Matina_News_Control_Heading' );

        $wp_customize->register_control_type( 'Matina_News_Control_Typography' );
        $wp_customize->register_control_type( 'Matina_News_Control_Radio_Icons' );
    }

endif;

add_action( 'customize_register', 'matina_news_register_custom_controls' );

// Load theme upsell section
require_once get_template_directory() . '/inc/customizer/custom-controls/theme-upsell/class-theme-upsell-section.php';