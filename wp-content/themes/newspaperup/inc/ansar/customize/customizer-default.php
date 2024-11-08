<?php
/**
 * Default theme options.
 *
 * @package Newspaperup
 */

if (!function_exists('newspaperup_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function newspaperup_get_default_theme_options() {

    $defaults = array();
    
    // Header top bar section
    $defaults['brk_news_enable'] = true;
    $defaults['breaking_news_title'] = __('Breaking','newspaperup');
    
    // Header options section
    $defaults['banner_ad_image'] = '';
    $defaults['banner_ad_url'] = '#';
    $defaults['banner_open_on_new_tab'] = true;

    // Frontpage Section.
    $defaults['show_main_banner_section'] = 1;
    $defaults['select_slider_news_category'] = 0;

    $defaults['select_trending_news_category'] = 0;

    $defaults['select_editor_news_category'] = 0;

    $defaults['newspaperup_main_banner_section_background_image']= '';
    $defaults['remove_header_image_overlay'] = 0;
    
    // Blog Post Options
    $defaults['newspaperup_post_category'] = true;
    $defaults['newspaperup_enable_post_meta'] = true;
    $defaults['newspaperup_blog_content'] = 'excerpt';

    // Single Post Options
    $defaults['newspaperup_single_post_category'] = true;
    $defaults['newspaperup_single_post_meta'] = true;
    $defaults['newspaperup_single_post_image'] = true;
    $defaults['newspaperup_enable_single_admin'] = true;
    $defaults['newspaperup_enable_single_related'] = true;
    $defaults['newspaperup_enable_single_comments'] = true;
    $defaults['newspaperup_single_post_image'] = true;
    $defaults['newspaperup_enable_single_related_category'] = true;
    $defaults['newspaperup_enable_single_related_admin'] = true;
    $defaults['newspaperup_enable_single_related_date'] = true;
    
    //layout options
    $defaults['newspaperup_archive_page_layout'] = 'align-content-right';
    $defaults['global_hide_post_date_author_in_list'] = 1;
    $defaults['global_widget_excerpt_setting'] = 'trimmed-content';
    $defaults['global_date_display_setting'] = 'theme-date';

    // filter.
    $defaults = apply_filters('newspaperup_filter_default_theme_options', $defaults);

    // You Missed Section.
    $defaults['you_missed_enable'] = true;
    $defaults['you_missed_title'] = __('You Missed', 'newspaperup');

    $defaults['newspaperup_footer_bg_img'] = '';

    // Copyright.
    $defaults['newspaperup_footer_copyright'] = __('Copyright &copy; All rights reserved','newspaperup');
    
    // Footer
    $defaults['newspaperup_footer_copy_bg'] = '';
    $defaults['newspaperup_footer_copy_text'] = '';
    
    // Typography Section.
    // Body
    $defaults['heading_fontfamily'] = 'Lexend Deca';
    $defaults['heading_fontweight'] =  '700';

    // Meus
    $defaults['newspaperup_menu_fontfamily'] = 'Lexend Deca';

    // Body Background Color
    $defaults['body_background_color'] = '#fff';

	return $defaults;
}
endif;