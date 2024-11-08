<?php
/**
 * Describe child theme functions
 *
 * @package Matina Newspaper
 */

if ( ! defined( 'MATINA_NEWSPAPER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$matina_newspaper_theme_info = wp_get_theme();
	define( 'MATINA_NEWSPAPER_VERSION', $matina_newspaper_theme_info->get( 'Version' ) );
}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed the theme customizer
 */
if ( ! function_exists( 'matina_newspaper_customize_register' ) ) :

    function matina_newspaper_customize_register( $wp_customize ) {

        global $wp_customize;

        /**
         * Matina Newspaper Default Primary Color.
         *
         * @since 1.0.0
         */
        $wp_customize->get_setting( 'matina_news_primary_theme_color' )->default = '#009688';
    }

endif;

add_action( 'customize_register', 'matina_newspaper_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Matina Newspaper Fonts
 */
if ( ! function_exists( 'matina_newspaper_fonts_url' ) ) :

    /**
     * Register Google fonts
     *
     * @return string Google fonts URL for the theme.
     */
    function matina_newspaper_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Raleway, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'matina-newspaper' ) ) {
            $font_families[] = 'Raleway:700,900';
        }

         /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'matina-newspaper' ) ) {
            $font_families[] = 'Roboto:400,600,700';
        }

        if ( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

                 /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Be Vietnam Pro: on or off', 'matina-newspaper' ) ) {
            $font_families[] = 'Be Vietnam Pro:400,600,700';
        }

        if ( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

endif;

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'matina_newspaper_scripts', 99 );

function matina_newspaper_scripts() {

    wp_enqueue_style( 'matina-newspaper-google-font', matina_newspaper_fonts_url(), array(), null );

    wp_dequeue_style( 'matina-news-style' );

    wp_dequeue_style( 'matina-news-responsive-style' );

    wp_enqueue_style( 'matina-news-parent-style', get_template_directory_uri() . '/style.css', array(), MATINA_NEWSPAPER_VERSION );

    wp_enqueue_style( 'matina-news-parent-responsive', get_template_directory_uri() . '/assets/css/mt-responsive.css', array(), MATINA_NEWSPAPER_VERSION );

    wp_enqueue_style( 'matina-newspaper-style', get_stylesheet_uri(), array(), MATINA_NEWSPAPER_VERSION );
}

if ( ! function_exists( 'matina_newspaper_general_css' ) ) :

    function matina_newspaper_general_css( $output_css ) {

        $theme_color                    = get_theme_mod( 'matina_news_primary_theme_color', '#009688' );
        $text_color                     = get_theme_mod( 'matina_news_body_text_color', '#3d3d3d' );
        $link_color                     = get_theme_mod( 'matina_news_link_color', '#009688' );
        $link_hover_color               = get_theme_mod( 'matina_news_link_hover_color', '#007f72' );
        $header_image_overlay_color     = get_theme_mod( 'matina_news_header_image_overlay_color' );
        $header_background_color        = get_theme_mod( 'matina_news_header_background_color', '#ffffff' );
        $header_text_color              = get_theme_mod( 'matina_news_header_text_color', '#ffffff' );
        $footer_bg_image_overlay_color  = get_theme_mod( 'matina_news_footer_background_image_overlay_color' );
        $footer_background_color        = get_theme_mod( 'matina_news_footer_background_color', '#333333' );
        $footer_text_color              = get_theme_mod( 'matina_news_footer_text_color', '#a1a1a1' );
        $footer_bg_type                 = get_theme_mod( 'matina_news_footer_background_type', 'bg_image' );

        $top_header_text_color = get_theme_mod( 'matina_news_top_header_text_color', '#ccc' );

        $main_container_width   = get_theme_mod( 'matina_news_main_container_width', 1300 );
        $main_content_width     = get_theme_mod( 'matina_news_main_content_width', 70 );
        $sidebar_width          = get_theme_mod( 'matina_news_sidebar_width', 27 );

        $page_title_bg_title_align     = get_theme_mod( 'matina_news_page_title_bg_title_align', 'center' );

        $bg_text_color  = get_theme_mod( 'matina_news_page_title_bg_text_color', '#3d3d3d' );

        //define variable for custom css
        $custom_css = '';

        $custom_css .= "a,a:hover,#site-navigation #primary-menu li .sub-menu li:hover>a, #site-navigation #primary-menu li .children li:hover>a,.search--at-footer .search-form-wrap .search-form .search-submit:hover,.archive article .cat-links,.archive article .cat-links a,.archive--layout-default .post .cat-links,.archive--layout-default article .cat-links a,.archive article .entry-title a:hover,.archive--layout-default article .entry-title a:hover,.archive--layout-one article .entry-title a:hover,.archive--layout-default article .entry-readmore a:hover,.archive--layout-one article .cat-links a,.archive--layout-one .entry-readmore .mt-button:hover,.single--layout-one article .cat-links a,.single--layout-one .entry-tags .tags-links a:hover,.entry-author-box .post-author-info .author-name a:hover,.single-post-navigation .nav-links a span.title,.single-post-navigation .nav-links a:hover span.post-title:hover,.related-posts--layout-default .related-post .post-content-wrapper .related-post-title a:hover,.related-posts--layout-one .related-post .post-content-wrapper .related-post-title a:hover,.widget-area ul li a:hover,.widget-area .tagcloud a:hover,#masthead .matina-news-social-icons-wrapper .single-icon a:hover,.widget.matina_news_latest_posts .posts-wrapper .single-post-wrap .post-content-wrap .post-title a:hover,.widget-area .widget_categories ul li.cat-item:before,.widget-area ul li:hover >a,.widget-area ul li:hover:before, .navigation .nav-links a.page-numbers:hover,.posts-navigation .nav-links a:hover,.matina_news_author_info .matina-news-social-icons-wrapper .single-icon:hover a, #masthead.has-header-media #site-navigation #primary-menu li a:hover, .cv-block-grid--layout-one .cv-read-more a, .cv-post-title a:hover,.cv-block-list--layout-one .cv-read-more  a:hover,.cv-block-list--layout-one .cv-post-cat a, .default-page-header .breadcrumbs ul li:after, .mt-page-header .breadcrumbs ul li a:hover, .mt-page-header .breadcrumbs ul li:after, .mt-page-header .woocommerce-breadcrumbs .woocommerce-breadcrumbs-wrapper a:hover, .woocommerce ul.products li.product .button.add_to_cart_button,.woocommerce ul.products li.product .button.product_type_grouped,.woocommerce ul.products li.product .button.product_type_external, ul.products li.product .woocommerce-loop-product__title:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce .woocommerce-info a,.woocommerce-info::before, .search .entry-title a:hover,.search .entry-readmore a:hover,.search article .cat-links a,.footer-bottom-wrapper .site-info a, #site-navigation #primary-menu li .children li:hover>a, .site-branding .site-title a:hover, #site-navigation ul li:hover > a,#site-navigation ul li.current-menu-item > a,#site-navigation ul li.current-menu-ancestor > a,#site-navigation ul li.current_page_ancestor > a,#site-navigation ul li.current_page_item > a,#site-navigation ul li.current-post-parent > a,#site-navigation ul li.focus>a,a, .archive--layout-default article .entry-readmore a:hover
        { color: ". esc_attr( $theme_color ) ."}\n";


        $custom_css .= ".widget-area .search-form .search-submit,.archive--layout-default article .entry-readmore a:after,.single-post .comments-area .comment-list .comment .reply a:hover,.single--layout-default article .cat-links a, .entry-author-box.author-box--layout-default .article-author-avatar .avatar-wrap:after,.related-posts-wrapper .related-section-title:after,#matina-news-scroll-to-top:hover, .navigation .nav-links span.current,.edit-link a,.search .no-results .search-form .search-submit, .archive .no-results .search-form .search-submit, .post-format-media.post-format-media--quote:before{ background: ". esc_attr( $theme_color ) ."}\n";

        $custom_css .= ".woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt[disabled]:disabled,.woocommerce #respond input#submit.alt[disabled]:disabled:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt[disabled]:disabled,.woocommerce a.button.alt[disabled]:disabled:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt[disabled]:disabled,.woocommerce button.button.alt[disabled]:disabled:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt[disabled]:disabled,.woocommerce input.button.alt[disabled]:disabled:hover,.woocommerce ul.products li.product .onsale,.woocommerce span.onsale,.woocommerce ul.products li.product .button.add_to_cart_button:hover,.woocommerce ul.products li.product .button.product_type_grouped:hover,.woocommerce ul.products li.product .button.product_type_external:hover,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.added_to_cart.wc-forward,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-noreviews,p.no-comments,#masthead.header--layout-default #header-sticky,#masthead.header--layout-default #site-navigation ul li .sub-menu,#masthead.header--layout-default #site-navigation ul li .children,.widget.widget_tag_cloud a:hover{ background: ". esc_attr( $theme_color ) ."}\n";

        $custom_css .= "@media(max-width:990px) {#masthead.header--layout-default .primary-menu-wrap { background: ". esc_attr( $theme_color ) ." }}\n";

        $custom_css .= "body, p { color: ". esc_attr( $text_color ) ." }\n";

        $custom_css .= "a { color: ". esc_attr( $link_color ) ."}\n";

        $custom_css .= "a:hover { color: ". esc_attr( $link_hover_color ) ."}\n";

        $custom_css .= "a { border-color: ". esc_attr( $link_color ) ."}\n";

        $custom_css .= ".single--layout-one .entry-tags .tags-links a:hover,.widget-area .tagcloud a:hover,.widget-area .search-form .search-submit,.home .navigation .nav-links span.current,.archive .navigation .nav-links span.current,.navigation .nav-links a.page-numbers:hover,.matina_news_author_info .matina-news-social-icons-wrapper .single-icon:hover,.search .no-results .search-form .search-submit,.entry-author-box.author-box--layout-default .article-author-avatar .avatar-wrap,.woocommerce ul.products li.product .button.add_to_cart_button:hover,.woocommerce ul.products li.product .button.product_type_grouped:hover,.woocommerce ul.products li.product .button.product_type_external:hover,.woocommerce ul.products li.product .button.add_to_cart_button,.woocommerce ul.products li.product .button.product_type_grouped,.woocommerce ul.products li.product .button.product_type_external,.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.archive .no-results .search-form .search-submit,.widget.widget_tag_cloud a:hover{ border-color: ". esc_attr( $theme_color) ."}\n";

        $custom_css .= ".woocommerce .woocommerce-info, .woocommerce .woocommerce-message{ border-top-color: ". esc_attr( $theme_color) ."}\n";

        $custom_css .= "#colophon .widget-area .widget-title:after,.posts-navigation .nav-links a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs::before{ border-bottom-color: ". esc_attr( $theme_color) ."}\n";

        $custom_css .= "#masthead.header--layout-one #site-navigation #primary-menu li .sub-menu li:hover,#masthead.header--layout-one #site-navigation #primary-menu li .children li:hover,#masthead.header--layout-one #site-navigation #primary-menu li .sub-menu li.focus,#masthead.header--layout-one #site-navigation #primary-menu li .children li.focus ,.entry-author-box.author-box--layout-one, #masthead.header--layout-one #site-navigation #primary-menu li .children li:hover{ border-left-color: ". esc_attr( $theme_color ) ."}\n";

        $custom_css .= " #site-navigation #primary-menu li .sub-menu li:hover{ border-right-color: ". esc_attr( $theme_color ) ."}\n";

        // Header media overlay color
        if ( ! empty( $header_image_overlay_color ) && 'rgba(0,0,0,0.3)' != $header_image_overlay_color ) {
            $custom_css .= "#masthead.has-header-media .overlay-header-media{background-color:". esc_attr( $header_image_overlay_color ) ."}";
        }

        // Header background color
        if ( ! empty( $header_background_color ) && '#ffffff' != $header_background_color ) {
            $custom_css .= "#masthead,#site-navigation ul li .sub-menu, #site-navigation ul li .children,.is-sticky #masthead.header--layout-default, #masthead.header--layout-one .is-sticky #header-sticky,#masthead.header--layout-one .is-sticky #header-sticky::before, #masthead.header--layout-one .is-sticky #header-sticky::after{background-color:". esc_attr( $header_background_color ) ."}";
        }

        // Header text color
        if ( ! empty( $header_text_color ) && '#3d3d3d' != $header_text_color ) {
            $custom_css .= "#masthead, #site-navigation ul li a, #masthead .matina-news-social-icons-wrapper .single-icon a, .header-search-wrapper .search-icon a,.menu-toggle a{color:". esc_attr( $header_text_color ) ."}";
        }

        // Footer background image overlay
        if ( ! empty( $footer_bg_image_overlay_color ) && 'rgba(0,0,0,0.3)' != $footer_bg_image_overlay_color ) {
            $custom_css .= "#colophon.has-bg-image .overlay-footer-image{background-color:". esc_attr( $footer_bg_image_overlay_color ) ."}";
        }

        // Footer background color
        if ( ! empty( $footer_background_color ) && 'bg_color' === $footer_bg_type ) {
            $custom_css .= "#colophon{background-color:". esc_attr( $footer_background_color ) ."}";
        }

        // Footer text color
        if ( ! empty( $footer_text_color ) && 'bg_color' === $footer_bg_type ) {
            $custom_css .= "#colophon .widget-area ul li a, #colophon .widget-area ul li, #colophon .widget-area .tagcloud a, #colophon .widget.matina_news_latest_posts .posts-wrapper .single-post-wrap .post-content-wrap .post-title a, #colophon .widget-area .widget_categories ul li.cat-item::before,#colophon #footer-menu li a,.footer-social-icons .matina-news-social-icons-wrapper .single-icon a,#colophon #bottom-area .site-info{color:". esc_attr( $footer_text_color ) ."}";
        }

        // top header element color
        if ( ! empty( $top_header_text_color ) ) {
            $custom_css .= '#mt-topbar .topbar-elements-wrapper, #mt-topbar #topbar-menu li a{color:'. esc_attr( $top_header_text_color ) .'}';
        }

        // container width
        if ( ! empty( $main_container_width ) ) {
            $output_css .= '.mt-container{width:'. absint( $main_container_width ) .'px}';
        }

        // main content width (in %)
        if ( ! empty( $main_content_width ) ) {
            $output_css .= '#primary{width:'. absint( $main_content_width ) .'% !important}';
        }

        // sidebar content width (in %)
        if ( ! empty( $sidebar_width ) ) {
            $output_css .= '#secondary{width:'. absint( $sidebar_width ) .'% !important}';
        }

        //page title align while background image active
        if ( ! empty( $page_title_bg_title_align ) ) {
            $custom_css .= '.background-color-page-header .inner-page-header{text-align: '. esc_attr( $page_title_bg_title_align ) .'}';
        }

        // page title background text color
        if ( ! empty( $bg_text_color ) ) {
            $custom_css .= '.mt-page-header .page-title{color:'. esc_attr( $bg_text_color ) .'}';
        }

        if ( ! empty( $custom_css ) ) {
            $output_css .= $custom_css;
        }

        return $output_css;

    }

endif;

add_filter( 'matina_news_head_css', 'matina_newspaper_general_css', 999 );