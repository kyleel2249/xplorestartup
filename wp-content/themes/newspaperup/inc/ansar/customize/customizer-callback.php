<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Newspaperup
 */

/*select page for Featured slider*/
if (!function_exists('newspaperup_main_banner_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function newspaperup_main_banner_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_banner_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;
if (!function_exists('newspaperup_menu_subscriber_section_status')) :

    function newspaperup_menu_subscriber_section_status($control)
    {
        if ($control->manager->get_setting('newspaperup_menu_subscriber')->value() == true) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('newspaperup_blog_content_status')) :

    function newspaperup_blog_content_status($control)
    {
        if ($control->manager->get_setting('newspaperup_blog_content')->value() == 'excerpt') {
            return true;
        } else {
            return false;
        }

    }

endif;