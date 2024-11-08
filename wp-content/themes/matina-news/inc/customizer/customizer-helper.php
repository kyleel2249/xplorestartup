<?php
/**
 * Customizer helper where define functions related to customizer panel, sections and settings.
 * 
 * @package Matina News
 */

if ( ! function_exists( 'matina_news_site_layout_choices' ) ) :

    /**
     * function to return choices of site layout.
     *
     * @since 1.0.0
     */
    function matina_news_site_layout_choices() {

        $site_layouts = apply_filters( 'matina_news_site_layout_choices',
            array(
                'full-width'    => array(
                    'title'     => __( 'Fullwidth', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/full-width.png'
                ),
                'boxed-layout'  => array(
                    'title'     => __( 'Boxed', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/boxed-layout.png'
                )
            )
        );

        return $site_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_date_format_choices' ) ) :

    /**
     * function to return choices of date format.
     *
     * @since 1.0.0
     */
    function matina_news_date_format_choices() {

        $date_format = apply_filters( 'matina_news_date_format_choices',
            array(
                'default'       => __( 'Default', 'matina-news' ),
                'format-1'      => __( 'Format 1', 'matina-news' ),
                'format-2'     => __( 'Format 2', 'matina-news' )
            )
        );

        return $date_format;

    }

endif;

if ( ! function_exists( 'matina_news_search_style_choices' ) ) :

    /**
     * function to return choices of search form style.
     *
     * @since 1.0.0
     */
    function matina_news_search_style_choices() {

        $search_style = apply_filters( 'matina_news_search_style_choices',
            array(
                'drop-down'     => __( 'Drop Down', 'matina-news' ),
                'at-footer'     => __( 'At Footer', 'matina-news' ),
                'overlay'       => __( 'Overlay', 'matina-news' )
            )
        );

        return $search_style;

    }

endif;

if ( ! function_exists( 'matina_news_header_active_menu_item_style_choices' ) ) :

    /**
     * function to return choices of active menu item style.
     *
     * @since 1.0.0
     */
    function matina_news_header_active_menu_item_style_choices() {

        $current_menu_item_style = apply_filters( 'matina_news_header_active_menu_item_style_choices',
            array(
                'none'          => __( 'None', 'matina-news' ),
                'underline'     => __( 'Underline', 'matina-news' ),
                'left-border'   => __( 'Left Border', 'matina-news' ),
                'right-border'  => __( 'Right Border', 'matina-news' )
            )
        );

        return $current_menu_item_style;

    }

endif;

if ( ! function_exists( 'matina_news_header_layout_choices' ) ) :

    /**
     * function to return choices of header layout.
     *
     * @since 1.0.0
     */
    function matina_news_header_layout_choices() {

        $header_layouts = apply_filters( 'matina_news_header_layout_choices',
            array(
                'layout-default'    => array(
                    'title'     => __( 'Layout Default', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/header-layout-default.png'
                ),
                'layout-one'  => array(
                    'title'     => __( 'Layout One', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/header-layout-one.png'
                )
            )
        );

        return $header_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_bg_image_position_choices' ) ) :

    /**
     * function to return choices of background image position.
     *
     * @since 1.0.0
     */
    function matina_news_bg_image_position_choices() {

        $bg_image_position = apply_filters( 'matina_news_bg_image_position_choices',
            array(
                'initial'           => __( 'Default', 'matina-news' ),
                'top left'          => __( 'Top Left', 'matina-news' ),
                'top center'        => __( 'Top Center', 'matina-news' ),
                'top right'         => __( 'Top Right', 'matina-news' ),
                'center left'       => __( 'Center Left', 'matina-news' ),
                'center center'     => __( 'Center Center', 'matina-news' ),
                'center right'      => __( 'Center Right', 'matina-news' ),
                'bottom left'       => __( 'Bottom Left', 'matina-news' ),
                'bottom center'     => __( 'Bottom Center', 'matina-news' ),
                'bottom right'      => __( 'Bottom Right', 'matina-news' ),
            )
        );

        return $bg_image_position;

    }

endif;

if ( ! function_exists( 'matina_news_bg_image_attachment_choices' ) ) :

    /**
     * function to return choices of background image attachment.
     *
     * @since 1.0.0
     */
    function matina_news_bg_image_attachment_choices() {

        $bg_image_attachment = apply_filters( 'matina_news_bg_image_attachment_choices',
            array(
                'initial'   => __( 'Default', 'matina-news' ),
                'scroll'    => __( 'Scroll', 'matina-news' ),
                'fixed'     => __( 'Fixed', 'matina-news' )
            )
        );

        return $bg_image_attachment;

    }

endif;

if ( ! function_exists( 'matina_news_bg_image_repeat_choices' ) ) :

    /**
     * function to return choices of background image repeat.
     *
     * @since 1.0.0
     */
    function matina_news_bg_image_repeat_choices() {

        $bg_image_repeat = apply_filters( 'matina_news_bg_image_repeat_choices',
            array(
                'initial'   => __( 'Default', 'matina-news' ),
                'no-repeat' => __( 'No-repeat', 'matina-news' ),
                'repeat'    => __( 'Repeat', 'matina-news' ),
                'repeat-x'  => __( 'Repeat-x', 'matina-news' ),
                'repeat-y'  => __( 'Repeat-y', 'matina-news' ),
            )
        );

        return $bg_image_repeat;

    }

endif;

if ( ! function_exists( 'matina_news_bg_image_size_choices' ) ) :

    /**
     * function to return choices of background image size.
     *
     * @since 1.0.0
     */
    function matina_news_bg_image_size_choices() {

        $bg_image_size = apply_filters( 'matina_news_bg_image_size_choices',
            array(
                'initial'   => __( 'Default', 'matina-news' ),
                'auto'      => __( 'Auto', 'matina-news' ),
                'cover'     => __( 'Cover', 'matina-news' ),
                'contain'   => __( 'Contain', 'matina-news' ),
            )
        );

        return $bg_image_size;

    }

endif;

if ( ! function_exists( 'matina_news_default_categories_choices' ) ) :

    /**
     * function to return choices of default categories.
     *
     * @return array()
     * @since 1.0.0
     */
    function matina_news_default_categories_choices() {
        $get_categories     = get_categories();
        $categories_lists   = array();
        foreach( $get_categories as $category ) {
            $categories_lists[esc_attr( $category->term_id )] = esc_html( $category->name ). ' ('. absint( $category->count ) .')';
        }
        return $categories_lists;
    }

endif;

if ( ! function_exists( 'matina_news_sidebar_layout_choices' ) ) :

    /**
     * function to return choices of archive sidebar layout.
     *
     * @since 1.0.0
     */
    function matina_news_sidebar_layout_choices() {

        $sidebar_layouts = apply_filters( 'matina_news_sidebar_layout_choices',
            array(
                'right-sidebar'    => array(
                    'title'     => __( 'Right Sidebar', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/right-sidebar.png'
                ),
                'left-sidebar'  => array(
                    'title'     => __( 'Left Sidebar', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/left-sidebar.png'
                ),
                'no-sidebar'  => array(
                    'title'     => __( 'No Sidebar', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar.png'
                ),
                'no-sidebar-center'  => array(
                    'title'     => __( 'No Sidebar Center', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar-center.png'
                )
            )
        );

        return $sidebar_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_archive_style_choices' ) ) :

    /**
     * function to return choices of archive style.
     *
     * @since 1.0.0
     */
    function matina_news_archive_style_choices() {

        $archive_style = apply_filters( 'matina_news_archive_style_choices',
            array(
                'masonry' => __( 'Masonry Style', 'matina-news' ),
                'grid'    => __( 'Grid Style', 'matina-news' ),
            )
        );

        return $archive_style;

    }

endif;

if ( ! function_exists( 'matina_news_archive_layout_choices' ) ) :

    /**
     * function to return choices of archive layout.
     *
     * @since 1.0.0
     */
    function matina_news_archive_layout_choices() {

        $archive_layouts = apply_filters( 'matina_news_archive_layout_choices',
            array(
                'layout-default'    => array(
                    'title'     => __( 'Layout Default', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/archive-layout-default.png'
                ),
                'layout-one'  => array(
                    'title'     => __( 'Layout One', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/archive-layout-one.png'
                )
            )
        );

        return $archive_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_heading_tag_choices' ) ) :

    /**
     * function to return choices of heading tag.
     *
     * @since 1.0.0
     */
    function matina_news_heading_tag_choices() {

        $heading_tag = apply_filters( 'matina_news_heading_tag_choices',
            array(
                'h1'    => __( 'H1', 'matina-news' ),
                'h2'    => __( 'H2', 'matina-news' ),
                'h3'    => __( 'H3', 'matina-news' ),
                'h4'    => __( 'H4', 'matina-news' ),
                'h5'    => __( 'H5', 'matina-news' ),
                'h6'    => __( 'H6', 'matina-news' ),
                'div'   => __( 'div', 'matina-news' ),
                'span'  => __( 'span', 'matina-news' ),
                'p'     => __( 'p', 'matina-news' )
            )
        );

        return $heading_tag;

    }

endif;

if ( ! function_exists( 'matina_news_page_title_style_choices' ) ) :

    /**
     * function to return choices of page title style.
     *
     * @since 1.0.0
     */
    function matina_news_page_title_style_choices() {

        $title_style = apply_filters( 'matina_news_page_title_style_choices',
            array(
                'default'           => __( 'Default', 'matina-news' ),
                'centered'          => __( 'Centered', 'matina-news' ),
                'background-color'  => __( 'Background Color', 'matina-news' ),
                'hidden'            => __( 'Hidden', 'matina-news' )
            )
        );

        return $title_style;

    }

endif;

if ( ! function_exists( 'matina_news_post_content_type_choices' ) ) :

    /**
     * function to return choices of post content.
     *
     * @since 1.0.0
     */
    function matina_news_post_content_type_choices() {

        $post_content_type = apply_filters( 'matina_news_post_content_type_choices',
            array(
                'full-content'  => __( 'Full Content', 'matina-news' ),
                'excerpt'       => __( 'Excerpt', 'matina-news' )
            )
        );

        return $post_content_type;

    }

endif;

if ( ! function_exists( 'matina_news_archive_pagination_choices' ) ) :

    /**
     * function to return choices of archive pagination.
     *
     * @since 1.0.0
     */
    function matina_news_archive_pagination_choices() {

        $pagination_type = apply_filters( 'matina_news_archive_pagination_choices',
            array(
                'default'   => __( 'Default', 'matina-news' ),
                'numeric'   => __( 'Numeric', 'matina-news' )
            )
        );

        return $pagination_type;

    }

endif;

if ( ! function_exists( 'matina_news_single_posts_layout_choices' ) ) :

    /**
     * function to return choices of single post layout.
     *
     * @since 1.0.0
     */
    function matina_news_single_posts_layout_choices() {

        $single_post_layouts = apply_filters( 'matina_news_single_posts_layout_choices',
            array(
                'layout-default'    => array(
                    'title'     => __( 'Layout Default', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/single-post-layout-default.png'
                ),
                'layout-one'  => array(
                    'title'     => __( 'Layout One', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/single-post-layout-one.png'
                )
            )
        );

        return $single_post_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_sidebar_order_choices' ) ) :

    /**
     * function to return choices of sidebar order style.
     *
     * @since 1.0.0
     */
    function matina_news_sidebar_order_choices() {

        $sidebar_order = apply_filters( 'matina_news_sidebar_order_choices',
            array(
                'content-sidebar'   => __( 'Content / Sidebar', 'matina-news' ),
                'sidebar-content'   => __( 'Sidebar / Content', 'matina-news' )
            )
        );

        return $sidebar_order;

    }

endif;

if ( ! function_exists( 'matina_news_single_posts_taxonomy_choices' ) ) :

    /**
     * function to return choices of single posts taxonomy.
     *
     * @since 1.0.0
     */
    function matina_news_single_posts_taxonomy_choices() {

        $single_posts_taxonomy = apply_filters( 'matina_news_single_posts_taxonomy_choices',
            array(
                'category'  => __( 'Category', 'matina-news' ),
                'post_tag'  => __( 'Tag', 'matina-news' )
            )
        );

        return $single_posts_taxonomy;

    }

endif;

if ( ! function_exists( 'matina_news_404_page_layout_choices' ) ) :

    /**
     * function to return choices of 404 page layout.
     *
     * @since 1.0.0
     */
    function matina_news_404_page_layout_choices() {

        $error_page_layouts = apply_filters( 'matina_news_404_page_layout_choices',
            array(
                'layout-default'    => array(
                    'title'     => __( 'Layout Default', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/404-layout-default.png'
                ),
                'layout-one'  => array(
                    'title'     => __( 'Layout One', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/404-layout-one.png'
                )
            )
        );

        return $error_page_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_footer_widget_layout_choices' ) ) :

    /**
     * function to return choices of footer widget area layout.
     *
     * @since 1.0.0
     */
    function matina_news_footer_widget_layout_choices() {

        $footer_widget_layouts = apply_filters( 'matina_news_footer_widget_layout_choices', array(
                'one-column'    => array(
                    'title'     => __( 'One Column', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/one-column.png'
                ),
                'two-columns'  => array(
                    'title'     => __( 'Two Columns', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/two-column.png'
                ),
                'three-columns'  => array(
                    'title'     => __( 'Three Columns', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/three-column.png'
                ),
                'four-columns'  => array(
                    'title'     => __( 'Four Columns', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/four-column.png'
                )
            )
        );

        return $footer_widget_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_footer_layout_choices' ) ) :

    /**
     * function to return choices of footer area layout.
     *
     * @since 1.0.0
     */
    function matina_news_footer_layout_choices() {

        $footer_layouts = apply_filters( 'matina_news_footer_layout_choices',
            array(
                'layout-default'    => array(
                    'title'     => __( 'Layout Default', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-layout-default.png'
                ),
                'layout-one'        => array(
                    'title'     => __( 'Layout One', 'matina-news' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-layout-one.png'
                )
            )
        );

        return $footer_layouts;

    }

endif;

if ( ! function_exists( 'matina_news_preloader_style_choices' ) ) :

    /**
     * function to return choices of preloader style.
     *
     * @since 1.0.0
     */
    function matina_news_preloader_style_choices() {

        $preloader_style = apply_filters( 'matina_news_preloader_style_choices',
            array(
                'three_bounce'      => __( '3 Bounce', 'matina-news' ),
                'wave'              => __( 'Wave', 'matina-news' ),
                'folding_cube'      => __( 'Folding Cube', 'matina-news' )
            )
        );

        return $preloader_style;

    }

endif;

if ( ! function_exists( 'matina_news_scroll_top_arrow_choices' ) ) :

    /**
     * function to return choices of scroll top arrow.
     *
     * @since 1.0.0
     */
    function matina_news_scroll_top_arrow_choices() {

        $scroll_top_arrows = apply_filters( 'matina_news_scroll_top_arrow_choices',
            array(
                'fas fa-chevron-up'             => 'fas fa-chevron-up',
                'fas fa-angle-double-up'        => 'fas fa-angle-double-up',
                'fas fa-arrow-up'               => 'fas fa-arrow-up',
            )
        );

        return $scroll_top_arrows;

    }

endif;

if ( ! function_exists( 'matina_news_font_transform_choices' ) ) :

    /**
     * function to return choices of font transform.
     *
     * @since 1.0.0
     */
    function matina_news_font_transform_choices() {

        $font_transform = apply_filters( 'matina_news_font_transform_choices',
            array(
                'none'          => __( 'None', 'matina-news' ),
                'uppercase'     => __( 'Uppercase', 'matina-news' ),
                'lowercase'     => __( 'Lowercase', 'matina-news' ),
                'capitalize'    => __( 'Capitalize', 'matina-news' )
            )
        );

        return $font_transform;

    }

endif;

if ( ! function_exists( 'matina_news_font_decoration_choices' ) ) :

    /**
     * function to return choices of font decoration.
     *
     * @since 1.0.0
     */
    function matina_news_font_decoration_choices() {

        $font_decoration = apply_filters( 'matina_news_font_decoration_choices',
            array(
                'none'          => __( 'None', 'matina-news' ),
                'underline'     => __( 'Underline', 'matina-news' ),
                'line-through'  => __( 'Line-through', 'matina-news' ),
                'overline'      => __( 'Overline', 'matina-news' )
            )
        );

        return $font_decoration;

    }

endif;

if ( ! function_exists( 'matina_news_background_type_choices' ) ) :

    /**
     * function to return choices of background type.
     *
     * @since 1.0.0
     */
    function matina_news_background_type_choices() {

        $background_type = apply_filters( 'matina_news_background_type_choices',
            array(
                'none'      => __( 'None', 'matina-news' ),
                'bg_color'  => __( 'Color', 'matina-news' )
            )
        );

        return $background_type;

    }

endif;

if ( ! function_exists( 'matina_news_image_hover_style_choices' ) ) :

    /**
     * function to return choices of image hover type.
     *
     * @since 1.0.0
     */
    function matina_news_image_hover_style_choices() {

        $image_hover_type = apply_filters( 'matina_news_image_hover_style_choices',
            array(
                'zoomin'        => __( 'Zoom In', 'matina-news' ),
                'shine'         => __( 'Shine', 'matina-news' ),
                'opacity'       => __( 'Opacity', 'matina-news' )
            )
        );

        return $image_hover_type;

    }

endif;

if ( ! function_exists( 'matina_news_page_title_bg_title_align_choices' ) ) :

    /**
     * function to return choices of page title bg title align.
     *
     * @since 1.0.0
     */
    function matina_news_page_title_bg_title_align_choices() {

        $page_title_align = apply_filters( 'matina_news_page_title_bg_title_align_choices', array(
                'left'      => __( 'Left', 'matina-news' ),
                'center'    => __( 'Center', 'matina-news' ),
                'right'     => __( 'Right', 'matina-news' )
            )
        );

        return $page_title_align;

    }

endif;
