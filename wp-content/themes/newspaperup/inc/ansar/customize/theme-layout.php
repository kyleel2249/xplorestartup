<?php /*** Option Panel
 *
 * @package newspaperup
 */


$newspaperup_default = newspaperup_get_default_theme_options();
/*theme option panel info*/

//Theme Layout
Newspaperup_Customizer_Control::add_panel(
	'themes_layout',
	array(
		'title' => esc_html__( 'Theme Layout', 'newspaperup' ), 
        'priority' => 12,
        'capability' => 'edit_theme_options',
	)
);
//Sidebar Layout
Newspaperup_Customizer_Control::add_section(
	'newspaperup_theme_sidebar_setting',
	array(
		'title' => esc_html__( 'Sidebar', 'newspaperup' ), 
        'priority' => 11,
        'panel' => 'themes_layout',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings'  => 'newspaperup_archive_sidebar_width_heading',
        'label' => esc_html__('Archive Pages', 'newspaperup'),
		'section'  => 'newspaperup_theme_sidebar_setting',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
// Sidebar Width 
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'number', 
        'settings'  => 'newspaperup_archive_page_sidebar_width',
        'label' => esc_html__('Sidebar Width', 'newspaperup'),
		'section'  => 'newspaperup_theme_sidebar_setting',
        'sanitize_callback' => 'absint',
        'default' => '33',
        'input_attrs' => array(
            'min' => 10,
            'max' => 90,
            'step' => 1,
        )
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'radio-image', 
        'settings'  => 'newspaperup_archive_page_layout',
		'section'  => 'newspaperup_theme_sidebar_setting',
        'transport'         => 'postMessage',
        'default' => $newspaperup_default['newspaperup_archive_page_layout'],
        'choices'   => array(
            'align-content-left' => get_template_directory_uri() . '/images/left-sidebar.png',  
            'full-width-content'    => get_template_directory_uri() . '/images/full-content.png',
            'align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
        ),
        'sanitize_callback' => 'newspaperup_sanitize_radio',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings' => 'newspaperup_pro_single_page_heading',
        'label' => esc_html__('Single Page', 'newspaperup'),
		'section'  => 'newspaperup_theme_sidebar_setting',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'radio-image', 
        'settings'  => 'newspaperup_single_page_layout',
		'section'  => 'newspaperup_theme_sidebar_setting',
        'transport'         => 'postMessage',
        'default' => 'single-align-content-right',
        'choices'   => array(
            'single-align-content-left' => get_template_directory_uri() . '/images/left-sidebar.png',
            'single-full-width-content'    => get_template_directory_uri() . '/images/full-content.png',
            'single-align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
        ),
        'sanitize_callback' => 'newspaperup_sanitize_radio',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden',
        'settings' => 'newspaperup_page_heading',
        'label' => esc_html__('Pages', 'newspaperup'),
		'section'  => 'newspaperup_theme_sidebar_setting',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'radio-image', 
        'settings'  => 'newspaperup_page_layout',
		'section'  => 'newspaperup_theme_sidebar_setting',
		'transport'  => 'postMessage',
        'default' => 'page-align-content-right',
        'choices'   => array(
            'page-align-content-left' => get_template_directory_uri() . '/images/left-sidebar.png',
            'page-full-width-content'    => get_template_directory_uri() . '/images/full-content.png',
            'page-align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
        ),
        'sanitize_callback' => 'newspaperup_sanitize_radio',
	)
);
// Blog Layout Setting
Newspaperup_Customizer_Control::add_section(
	'blog_layout_section',
	array(
		'title' => esc_html__( 'Blog', 'newspaperup' ),
        'capability' => 'edit_theme_options',
        'panel' => 'themes_layout',
	)
);
Newspaperup_Customizer_Control::add_field(
	array(
		'type'     => 'hidden', 
        'settings' => 'blog_layout_title_settings',
        'label' => esc_html__('Blog', 'newspaperup'),
		'section'  => 'blog_layout_section',
        'sanitize_callback' => 'newspaperup_sanitize_text',
	)
);
Newspaperup_Customizer_Control::add_field( 
	array(
		'type'     => 'radio-image', 
        'settings'  => 'blog_post_layout',
		'section'  => 'blog_layout_section',
        'default' => 'list-layout',
        'choices'   => array(
            'list-layout' => get_template_directory_uri() . '/images/blog/list-layout.png',
            'grid-layout'    => get_template_directory_uri() . '/images/blog/grid-layout.png',
        ),
        'sanitize_callback' => 'newspaperup_sanitize_radio',
	)
);