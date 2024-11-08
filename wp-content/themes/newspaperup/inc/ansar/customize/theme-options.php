<?php /*** Option Panel
 *
 * @package Newspaperup
 */

$newspaperup_default = newspaperup_get_default_theme_options();
/**
 * 
 * This class incorporates code from the Kirki Customizer Framework and from a tutorial
 * written by Otto Wood.
 * 
 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
 * is licensed under the terms of the GNU GPL, Version 2 (or later).
 * 
 * @link https://github.com/reduxframework/kirki/
 * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
 */
//========== Add General Options Panel. ===============
Newspaperup_Customizer_Control::add_panel(
	'theme_option_panel',
	array(
		'title' => esc_html__('Theme Options', 'newspaperup'),
        'priority' => 7,
        'capability' => 'edit_theme_options',
	)
);
//Breadcrumb Settings
Newspaperup_Customizer_Control::add_section(
	'newspaperup_breadcrumb_settings',
	array(
		'title' => esc_html__( 'Breadcrumb', 'newspaperup' ),
        'panel' => 'theme_option_panel',
        'capability' => 'edit_theme_options',
	)
);

// Hide/Show
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'breadcrumb_settings',
        'label' => esc_html__('Hide/Show', 'newspaperup'),
		'section'  => 'newspaperup_breadcrumb_settings',
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
//Type Of Bredcrumb 
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'select', 
        'settings'  => 'newspaperup_site_breadcrumb_type',
        'label' => esc_html__('Breadcrumb Type', 'newspaperup'),
		'section'  => 'newspaperup_breadcrumb_settings',
        'default' => 'default',
        'description' => esc_html__( 'If you use other than "default" one you will need to install and activate respective plugins Breadcrumb NavXT, Yoast SEO and Rank Math SEO', 'newspaperup' ),
        'choices'   => array(
            'default' => __( 'Default', 'newspaperup' ),
            'navxt'  => __( 'NavXT', 'newspaperup' ),
            'yoast'  => __( 'Yoast SEO', 'newspaperup' ),
            'rankmath'  => __( 'Rank Math', 'newspaperup' )
        ),
        'sanitize_callback' => 'newspaperup_sanitize_select',
	)
);
// Social Icon Setting
Newspaperup_Customizer_Control::add_section(
	'social_icon_options',
	array(
		'title' => esc_html__( 'Social Icons', 'newspaperup' ), 
        'panel' => 'theme_option_panel',
        'capability' => 'edit_theme_options',
	)
);
//Enable and disable social icon
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'social_icon_header_enable',
        'label' => esc_html__('Hide/Show on Header', 'newspaperup'),
		'section'  => 'social_icon_options',
        'priority' => 103,
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
//Enable and disable social icon
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'footer_social_icon_enable',
        'label' => esc_html__('Hide/Show on Footer', 'newspaperup'),
		'section'  => 'social_icon_options',
        'priority' => 103,
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// Social Icon Repaeter
$wp_customize->add_setting(
    'newspaperup_social_icons',
    array(
        'default'           => newspaperup_get_social_icon_default(),
        'sanitize_callback' => 'newspaperup_repeater_sanitize'
    )
);
$wp_customize->add_control(
    new Newspaperup_Repeater_Control(
        $wp_customize,
        'newspaperup_social_icons',
        array(
            'label'                            => esc_html__( 'Social Icons', 'newspaperup' ),
            'section'                          => 'social_icon_options',
            'priority'                         =>  104,
            'add_field_label'                  => esc_html__( 'Add New Social', 'newspaperup' ),
            'item_name'                        => esc_html__( 'Social', 'newspaperup' ),
            'customizer_repeater_icon_control' => true,
            'customizer_repeater_link_control' => true,
            'customizer_repeater_checkbox_control' => true,
        )
    )
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'pro-text', 
        'settings'  => 'footer_social_icon_pro',
		'section'  => 'social_icon_options',
        'priority' => 153,
        'default' => '',
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// Post Image Section
Newspaperup_Customizer_Control::add_section(
	'post_image_options',
	array(
		'title' => esc_html__( 'Post Image', 'newspaperup' ), 
        'panel' => 'theme_option_panel',
        'capability' => 'edit_theme_options',
	)
);

// Post Image Type
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'select', 
        'settings'  => 'post_image_type',
        'label' => esc_html__('Post Image display type:', 'newspaperup'),
		'section'  => 'post_image_options',
        'default' => 'newspaperup_post_img_hei',
        'choices'   => array(
            'newspaperup_post_img_hei' => esc_html__( 'Fix Height Post Image', 'newspaperup' ),
            'newspaperup_post_img_acc' => esc_html__( 'Auto Height Post Image', 'newspaperup' ),
        ),
        'sanitize_callback' => 'newspaperup_sanitize_select',
	)
);
//404 Page Section
Newspaperup_Customizer_Control::add_section(
	'404_options',
	array(
		'title' => esc_html__( '404 Page', 'newspaperup' ), 
        'panel' => 'theme_option_panel',
        'capability' => 'edit_theme_options',
	)
);
// 404 page title
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'text', 
        'settings'  => 'newspaperup_404_title',
        'label' => esc_html__('Title', 'newspaperup'),
        'default' => esc_html__('Oops! Page not found','newspaperup'),
		'section'  => '404_options',
        'sanitize_callback' => 'sanitize_text_field',
	)
);
// 404 page desc
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'textarea', 
        'settings'  => 'newspaperup_404_desc',
        'label' => esc_html__('Description', 'newspaperup'),
        'default' => esc_html__('We are sorry, but the page you are looking for does not exist.','newspaperup'),
		'section'  => '404_options',
        'sanitize_callback' => 'sanitize_text_field',
	)
);
// 404 page btn title
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'text', 
        'settings'  => 'newspaperup_404_btn_title',
        'label' => esc_html__('Button Title', 'newspaperup'),
        'default' => esc_html__('Go Back','newspaperup'),
		'section'  => '404_options',
        'sanitize_callback' => 'sanitize_text_field',
	)
);
// Blog Page Section.
Newspaperup_Customizer_Control::add_section(
	'site_post_date_author_settings',
	array(
		'title' => esc_html__( 'Blog Page', 'newspaperup' ), 
        'panel' => 'theme_option_panel',
        'capability' => 'edit_theme_options',
	)
);
// blog Page heading
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'newspaperup_blog_page_heading',
        'label' => esc_html__('Blog Post', 'newspaperup'),
		'section'  => 'site_post_date_author_settings',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);                                            
// Settings = Drop Caps
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_drop_caps_enable',
        'label' => esc_html__('Drop Caps (First Big Letter)', 'newspaperup'),
		'section'  => 'site_post_date_author_settings',
        'default' => false,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);

// blog Page category
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_post_category',
        'label' => esc_html__('Category', 'newspaperup'),
		'section'  => 'site_post_date_author_settings',
        'default' => $newspaperup_default['newspaperup_post_category'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// blog Page meta
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_enable_post_meta',
        'label' => esc_html__('Post Meta', 'newspaperup'),
		'section'  => 'site_post_date_author_settings',
        'default' => $newspaperup_default['newspaperup_enable_post_meta'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden', 
        'settings'  => 'newspaperup_post_meta_heading',
        'label' => esc_html__('Post Meta', 'newspaperup'),
		'section'   => 'site_post_date_author_settings',
	)
);        
// Blog Post Meta
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'newspaperup-sortable', 
        'settings'  => 'newspaperup_blog_post_meta',
		'section'  => 'site_post_date_author_settings',
        'default'    => array(
            'author',
            'date',
        ),
        'choices'    => array(
            'author'      => esc_attr__( 'Author', 'newspaperup' ),
            'date'        => esc_attr__( 'Date', 'newspaperup' ),
            'comments'    => esc_attr__( 'Comments', 'newspaperup' ),
        ),
        // 'sanitize_callback' => 'newspaperup_sanitize_alpha_color',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden', 
        'settings'  => 'newspaperup_blog_content_settings',
        'label' => esc_html__('Choose Content Option', 'newspaperup'),
		'section'   => 'site_post_date_author_settings',
	)
); 
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'radio', 
        'settings'  => 'newspaperup_blog_content',
        'default'  => $newspaperup_default['newspaperup_blog_content'],
		'section'  => 'site_post_date_author_settings',
        'choices'   =>  array(
            'excerpt'   => __('Excerpt', 'newspaperup'),
            'content'   => __('Full Content', 'newspaperup'),
        ),
        'sanitize_callback' => 'newspaperup_sanitize_select',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden',
        'settings'  => 'newspaperup_post_pagination_heading',
        'label' => esc_html__('Pagination', 'newspaperup'),
		'section'   => 'site_post_date_author_settings',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'select', 
        'settings'  => 'newspaperup_post_blog_pagination',
		'section'  => 'site_post_date_author_settings',
        'default' => 'number',
        'choices'   => array(
            'next_prev'   => __('Next-Prev', 'newspaperup'),
            'number'   => __('Numbers', 'newspaperup'),
        ),
        'sanitize_callback' => 'newspaperup_sanitize_select',
	)
);
//========== single posts options ===============
// Single Section.
Newspaperup_Customizer_Control::add_section(
	'site_single_posts_settings',
	array(
		'title' => esc_html__( 'Single Page', 'newspaperup' ), 
        'panel' => 'theme_option_panel',
	)
);
// Single Page heading
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'newspaperup_single_page_heading',
        'label' => esc_html__('Single Post', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
// Single Page category
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_single_post_category',
        'label' => esc_html__('Category', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_single_post_category'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// Single Page meta
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_single_post_meta',
        'label' => esc_html__('Post Meta', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_single_post_meta'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// Single Page meta
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_single_post_image',
        'label' => esc_html__('Featured Image', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_single_post_image'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// Single Page social icon
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_blog_post_icon_enable',
        'label' => esc_html__('Hide/Show Sharing Icons', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
// Single Page Post Meta Heading
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden',
        'settings'  => 'single_post_meta_heading',
        'label' => esc_html__('Post Meta', 'newspaperup'),
		'section'   => 'site_single_posts_settings',
	)
);
// Single Page Post Meta
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'newspaperup-sortable', 
        'settings'  => 'single_post_meta',
		'section'  => 'site_single_posts_settings',
        'default'    => array(
            'author',
            'date',
            'comments',
            'tags',
        ),
        'choices'    => array(
            'author'      => esc_attr__( 'Author', 'newspaperup' ),
            'date'        => esc_attr__( 'Date', 'newspaperup' ),
            'comments'    => esc_attr__( 'Comments', 'newspaperup' ),
            'tags'        => esc_attr__( 'Tags', 'newspaperup' ),
        ),
        'unsortable' => array(''),
	)
);
// Single Page Author
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden',
        'settings'  => 'newspaperup_single_post_author_heading',
        'label' => esc_html__('Author', 'newspaperup'),
		'section'   => 'site_single_posts_settings',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_enable_single_admin',
        'label' => esc_html__('Hide/Show', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_enable_single_admin'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
//Related Posts haeding
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden',
        'settings'  => 'newspaperup_single_related_post_heading',
        'label' => esc_html__('Related Posts', 'newspaperup'),
		'section'   => 'site_single_posts_settings',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_enable_single_related',
        'label' => esc_html__('Hide/Show', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_enable_single_related'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
//Related Post title
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'text', 
        'settings'  => 'newspaperup_related_post_title',
        'label' => esc_html__('Title', 'newspaperup'),
        'default' => esc_html__('Related Posts', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'transport'=> 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
	)
);
//Related Post category
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_enable_single_related_category',
        'label' => esc_html__('Category', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_enable_single_related_category'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
//Related Post admin
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_enable_single_related_admin',
        'label' => esc_html__('Author Details', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_enable_single_related_admin'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
); 
//Related Post date
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_enable_single_related_date',
        'label' => esc_html__('Date', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_enable_single_related_date'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'      => 'hidden',
        'settings'  => 'newspaperup_single_post_element_heading',
        'label' => esc_html__('Post Comments', 'newspaperup'),
		'section'   => 'site_single_posts_settings',
	)
);
//Related Post comment
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_enable_single_comments',
        'label' => esc_html__('Hide/Show', 'newspaperup'),
		'section'  => 'site_single_posts_settings',
        'default' => $newspaperup_default['newspaperup_enable_single_comments'],
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
//========== Add Sidebar Option Panel. ===============     
// Sticky Sidebar
Newspaperup_Customizer_Control::add_section(
	'sticky_sidebar',
	array(
		'title' => esc_html__( 'Sticky Sidebar', 'newspaperup' ), 
        'capability' => 'edit_theme_options', 
        'priority' => 9, 
        'panel' => 'theme_option_panel',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'sticky_sidebar_toggle',
        'label' => esc_html__('Sticky Sidebar', 'newspaperup'),
		'section'  => 'sticky_sidebar',
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
//========== Add Theme colors Panel. ===============
Newspaperup_Customizer_Control::add_panel(
	'Theme_colors_panel',
	array(
        'title' => esc_html__('Theme Colors', 'newspaperup'),
        'priority' => 10,
        'capability' => 'edit_theme_options',
	)
);       
//Add Category Color Section 
Newspaperup_Customizer_Control::add_section(
	'newspaperup_cat_color_setting',
	array(
		'title' => esc_html__( 'Category Color', 'newspaperup' ), 
        'panel' => 'Theme_colors_panel',
	)
);
$newspaperupAllCats = get_categories();
if( $newspaperupAllCats ) :
    foreach( $newspaperupAllCats as $singleCat ) :
        // category colors control
        Newspaperup_Customizer_Control::add_field( 
            array(
                'type'     => 'color', 
                'settings'  => 'category_' .absint($singleCat->term_id). '_color',
                'label' => $singleCat->name,
                'section'  => 'newspaperup_cat_color_setting',
                'default' => '',
                'sanitize_callback' => 'newspaperup_sanitize_alpha_color',
            )
        );
    endforeach;
endif;
//Add Site Title/Tagline Color Section
Newspaperup_Customizer_Control::add_section(
	'newspaperup_site_title_color_section',
	array(
		'title' => esc_html__( 'Site Title/Tagline', 'newspaperup' ), 
        'panel' => 'Theme_colors_panel',
	)
);
// Site Title/Tagline Color Heading
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'site_title_tagline_title',
        'label' => esc_html__('Site Title/Tagline', 'newspaperup'),
		'section'  => 'newspaperup_site_title_color_section',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
$wp_customize->remove_control( 'header_textcolor');
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'color-alpha', 
        'settings'  => 'header_text_color',
        'label' => esc_html__('Color', 'newspaperup'),
		'section'  => 'newspaperup_site_title_color_section',
        'default' => '#000',
        'sanitize_callback' => 'newspaperup_sanitize_alpha_color',
	)
);

Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'color-alpha', 
        'settings'  => 'header_text_color_on_hover',
        'label' => esc_html__('Hover Color', 'newspaperup'),
		'section'  => 'newspaperup_site_title_color_section',
        'default' => '',
        'sanitize_callback' => 'newspaperup_sanitize_alpha_color',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'color-alpha', 
        'settings'  => 'header_text_dark_color',
        'label' => esc_html__('Color (Dark Layout)', 'newspaperup'),
		'section'  => 'newspaperup_site_title_color_section',
        'default' => '#fff',
        'sanitize_callback' => 'newspaperup_sanitize_alpha_color',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'color-alpha', 
        'settings'  => 'header_text_dark_color_on_hover',
        'label' => esc_html__('Hover Color (Dark Layout)', 'newspaperup'),
		'section'  => 'newspaperup_site_title_color_section',
        'default' => '',
        'sanitize_callback' => 'newspaperup_sanitize_alpha_color',
	)
);
//Add Theme Mode Section
Newspaperup_Customizer_Control::add_section(
	'newspaperup_skin_section',
	array(
		'title' => esc_html__( 'Theme Mode', 'newspaperup' ), 
        'panel' => 'Theme_colors_panel',
        'priority' => 10,
	)
);
// Theme Mode Heading
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'newspaperup_skin_mode_title',
        'label' => esc_html__('Theme Mode', 'newspaperup'),
		'section'  => 'newspaperup_skin_section',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'radio-image', 
        'settings'  => 'newspaperup_skin_mode',
		'section'  => 'newspaperup_skin_section',
        'default' => 'defaultcolor',
        'choices'   => array(
            'defaultcolor'    => get_template_directory_uri() . '/images/color/white.png',
            'dark' => get_template_directory_uri() . '/images/color/black.png',
        ),
        'sanitize_callback' => 'newspaperup_sanitize_radio',
	)
);

//Scroller Section
Newspaperup_Customizer_Control::add_section(
	'scroller_options',
	array(
		'title' => esc_html__( 'Scroller', 'newspaperup' ), 
        'panel' => 'theme_option_panel',
        'capability' => 'edit_theme_options',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'newspaperup_scroll_to_top_settings',
        'label' => esc_html__('Scroll To Top', 'newspaperup'),
		'section'  => 'scroller_options',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'newspaperup_scrollup_enable',
        'label' => esc_html__('Hide/Show', 'newspaperup'),
		'section'  => 'scroller_options',
        'default' => true,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'radio-image', 
        'settings'  => 'scrollup_layout',
		'section'  => 'scroller_options',
        'default' => 'fa-arrow-up',
        'choices'   => array(
            'fa-angle-up' => get_template_directory_uri() . '/images/fu1.png',
            'fa-angles-up'    => get_template_directory_uri() . '/images/fu2.png',
            'fa-arrow-up'    => get_template_directory_uri() . '/images/fu3.png',
            'fa-up-long'    => get_template_directory_uri() . '/images/fu4.png',
        ),
        'sanitize_callback' => 'newspaperup_sanitize_radio',
	)
);
$font_family = array('Lexend Deca'=> 'Lexend Deca', 'Open Sans'=>'Open Sans', 'Kalam'=>'Kalam', 
'Rokkitt'=>'Rokkitt', 'Jost' => 'Jost', 'Poppins' => 'Poppins', 'Lato' => 'Lato', 'Noto Serif'=>'Noto Serif', 
'Raleway'=>'Raleway', 'Roboto' => 'Roboto');

$font_weight = array('300'=>'300 (Light)','400'=>'400 (Normal)','500'=>'500 (Medium)' ,'600'=>'600 (Semi Bold)',
'700'=>'700 (Bold)','800'=>'800 (Extra Bold)','900'=>'900 (Black)');

Newspaperup_Customizer_Control::add_section(
	'newspaperup_general_typography',
	array(
		'title' => esc_html__( 'Typography', 'newspaperup' ),  
        'priority' => 20,
        'capability' => 'edit_theme_options',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'toggle', 
        'settings'  => 'enable_newspaperup_typo',
        'label' => esc_html__('Typography', 'newspaperup'),
		'section'  => 'newspaperup_general_typography',
        'default' => false,
        'sanitize_callback' => 'newspaperup_sanitize_checkbox',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'heading_typo_title',
        'label' => esc_html__('Heading', 'newspaperup'),
		'section'  => 'newspaperup_general_typography', 
        'sanitize_callback' => 'newspaperup_sanitize_text',  
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'select', 
        'settings'  => 'heading_fontfamily',
        'label' => esc_html__('Font Family', 'newspaperup'),
		'section'  => 'newspaperup_general_typography',
        'default' => $newspaperup_default['heading_fontfamily'],
        'choices'   => $font_family ,
        'sanitize_callback' => 'newspaperup_sanitize_select',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'select', 
        'settings'  => 'heading_fontweight',
        'label' => esc_html__('Font Weight', 'newspaperup'),
		'section'  => 'newspaperup_general_typography',
        'default' => $newspaperup_default['heading_fontweight'],
        'choices'   => $font_weight ,
        'sanitize_callback' => 'newspaperup_sanitize_select',
	)
);

// Menu Typo
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'newspaperup_menu_font',
        'label' => esc_html__('Menu Font', 'newspaperup'),
		'section'  => 'newspaperup_general_typography',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'select', 
        'settings'  => 'newspaperup_menu_fontfamily',
        'label' => esc_html__('Font Family', 'newspaperup'),
		'section'  => 'newspaperup_general_typography',
        'default' => $newspaperup_default['newspaperup_menu_fontfamily'],
        'choices'   => $font_family ,
        'sanitize_callback' => 'newspaperup_sanitize_select',
	)
);

// if ( ! function_exists( 'newspaperup_sanitize_select' ) ) :
//     /**
//      * Sanitize select.
//      *
//      * @since 1.0.0
//      *
//      * @param mixed                $input The value to sanitize.
//      * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
//      * @return mixed Sanitized value.
//      */
//     function newspaperup_sanitize_select( $input, $setting ) {

//         // Ensure input is a slug.
//         $input = sanitize_key( $input );

//         // Get list of choices from the control associated with the setting.
//         $choices = $setting->manager->get_control( $setting->id )->choices;

//         // If the input is a valid key, return it; otherwise, return the default.
//         return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

//     }

// endif;

function newspaperup_template_page_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}

function newspaperup_header_info_sanitize_text( $input ) {
                    
    return wp_kses_post( force_balance_tags( $input ) );

}
    
if ( ! function_exists( 'newspaperup_sanitize_text_content' ) ) :
    /**
     * Sanitize text content.
     *
     * @since 1.0.0
     *
     * @param string               $input Content to be sanitized.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return string Sanitized content.
     */
    function newspaperup_sanitize_text_content( $input, $setting ) {

        return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

    }
endif;
    
function newspaperup_header_sanitize_checkbox( $input ) {
    // Boolean check 
    return ( ( isset( $input ) && true == $input ) ? true : false );
        
}
