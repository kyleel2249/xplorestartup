<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Matina News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'matina_news_skip_content' ) ) :

    /**
     * Skip to content
     *
     * @since 1.0.0
     */
    function matina_news_skip_content() {
        echo '<a class="skip-link screen-reader-text" href="#content">'. esc_html__( 'Skip to content', 'matina-news' ) .'</a>';
    }

endif;

add_action( 'matina_news_before_header', 'matina_news_skip_content', 10 );

if ( ! function_exists( 'matina_news_top_header' ) ) :

    /**
     * Display top header
     *
     * @since 1.0.0
     */
    function matina_news_top_header() {

        get_template_part( 'template-parts/partials/header/top', 'bar' );
    }

endif;

add_action( 'matina_news_header_section', 'matina_news_top_header', 10 );

if ( ! function_exists( 'matina_news_main_header' ) ) :

    /**
     * Display main header
     *
     * @since 1.0.0
     */
    function matina_news_main_header() {
        $header_layout = get_theme_mod( 'matina_news_header_layout', 'layout-default' );
        switch ( $header_layout ) {
            case 'layout-one':
                get_template_part( 'layouts/header/layout', 'one' );
                break;
            
            default:
                get_template_part( 'layouts/header/layout', 'default' );
                break;
        }
    }

endif;

add_action( 'matina_news_header_section', 'matina_news_main_header', 20 );

if ( ! function_exists( 'matina_news_preloader' ) ) :

    /**
     * Function to manage the preloader.
     *
     * @since 1.0.0
     */
    function matina_news_preloader() {
        $matina_news_preloader_option = get_theme_mod( 'matina_news_preloader_option', true );
        if ( true != $matina_news_preloader_option ) {
            return;
        }

        $matina_news_preloader_style = get_theme_mod( 'matina_news_preloader_style', 'default' );
?>  
        <div id="preloader-background">
            <div class="preloader-wrapper">

                <?php
                    switch ( $matina_news_preloader_style ) {

                        case 'three_bounce':
                        ?>
                            <div class="mt-three-bounce">
                                <div class="mt-child mt-bounce1"></div>
                                <div class="mt-child mt-bounce2"></div>
                                <div class="mt-child mt-bounce3"></div>
                            </div>
                            <?php  
                            break;

                        case 'folding_cube':
                        ?>
                            <div class="mt-folding-cube">
                                <div class="mt-cube1 mt-cube"></div>
                                <div class="mt-cube2 mt-cube"></div>
                                <div class="mt-cube4 mt-cube"></div>
                                <div class="mt-cube3 mt-cube"></div>
                            </div>
                            <?php  
                            break;
                        
                        default:
                        ?>
                            <div class="mt-wave">
                                <div class="mt-rect mt-rect1"></div>
                                <div class="mt-rect mt-rect2"></div>
                                <div class="mt-rect mt-rect3"></div>
                                <div class="mt-rect mt-rect4"></div>
                                <div class="mt-rect mt-rect5"></div>
                            </div>
                            <?php
                            break;
                    }
                ?>
                


            </div><!-- .preloader-wrapper -->
        </div><!-- #preloader-background -->
<?php
    }

endif;

add_action( 'matina_news_before_page', 'matina_news_preloader', 10 );

if ( ! function_exists( 'matina_news_scroll_to_top' ) ) :

    /**
     * Function for scroll to top.
     */
    function matina_news_scroll_to_top() {
        $scroll_top_option = get_theme_mod( 'matina_news_scroll_top_option', true );
        if ( true !== $scroll_top_option ) {
            return;
        }
        $arrow_icon     = get_theme_mod( 'matina_news_scroll_top_arrow', 'fas fa-arrow-up' );
        $label_option   = get_theme_mod( 'matina_news_scroll_top_label_option', false );
        $scroll_label   = get_theme_mod( 'matina_news_scroll_top_label', __( 'Back to Top', 'matina-news' ) );
    ?>
        <div id="matina-news-scroll-to-top" class="mt-scroll scroll-top">
            <?php
                if ( true === $label_option ) {
                    echo '<span class="scroll-label">'. esc_html( $scroll_label ) .'</span>';
                }

                if ( ! empty( $arrow_icon ) ) {
                    echo '<i class="'. esc_attr( $arrow_icon ) .'"></i>';
                }
            ?>
        </div><!-- #matina-news-scroll-to-top -->
<?php
    }

endif;

add_action( 'matina_news_after_colophon', 'matina_news_scroll_to_top', 10 );



if ( ! function_exists( 'matina_news_page_header' ) ) {

    /**
     * function to display header page title
     *
     * @since 1.0.0
     */
    function matina_news_page_header() {

        if ( ! is_front_page() ) {
            get_template_part( '/template-parts/partials/header/pagetitle' );
        }
        
    }
    
}

add_action( 'matina_news_before_content', 'matina_news_page_header', 10 );