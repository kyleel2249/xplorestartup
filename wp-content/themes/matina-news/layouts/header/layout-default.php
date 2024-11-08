<?php
/**
 * Template for header layout default
 *
 * @package Matina News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$social_icon_option = get_theme_mod( 'matina_news_header_social_option', true );

$layout_class = 'header--layout-default';
?>

<header id="masthead" class="<?php echo esc_attr( matina_news_header_classes( $layout_class ) ); ?>">
    <div class="header-elements-wrapper">
        <div class="header-logo-wrapper mt-clearfix">
            <div class="mt-container">
                <?php
                    // site logo
                    get_template_part( 'template-parts/partials/header/logo' );

                    // header ads area
                    get_template_part( 'template-parts/partials/header/ads' );
                ?>
            </div>
        </div><!-- .header-logo-wrapper -->

        <div id="header-sticky" class="header-menu-icons-wrapper sticky-elements mt-clearfix">
            <div class="mt-container">
                <?php
                    // primary menu
                    get_template_part( 'template-parts/partials/header/menu' );
                ?>
                <div class="mt-social-search-wrapper">
                    <?php
                        if ( true === $social_icon_option ) {
                    ?>
                            <div class="header-social-wrapper">
                                <?php
                                    $social_label = get_theme_mod( 'matina_news_header_social_label', __( 'Follow Us: ', 'matina-news' ) );
                                    if ( ! empty( $social_label ) ) {
                                        echo '<span class="social-label">'. esc_html( $social_label ) .'</span>';
                                    }
                                    
                                    // social icons
                                    matina_news_social_icons( 'hide-title' );
                                ?>
                            </div><!-- .header-social-wrapper -->
                    <?php
                        }

                        // search form
                        get_template_part( 'template-parts/partials/header/search' );
                    ?>
                </div><!-- .mt-social-search-wrapper -->
            </div><!-- .mt-container -->
        </div><!-- .header-menu-icons-wrapper -->
    </div><!-- .header-elements-wrapper -->
    <?php
        if ( has_header_image() ) {
            echo '<div class="overlay-header-media"></div>';
        }
    ?>
</header><!-- #masthead -->