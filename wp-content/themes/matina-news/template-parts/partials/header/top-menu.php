<?php
/**
 * Top bar Menu
 *
 * @package Matina News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Hook: matina_news_before_topbar_menu
 *
 * @since 1.0.0
 */
do_action( 'matina_news_before_topbar_menu' );

?>

<nav id="top-navigation" class="top-bar-navigation mt-clearfix">
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'matina_news_top_menu',
            'menu_id'           => 'topbar-menu',
            'depth'             => 1,
            'fallback_cb'       => false
        ) );
    ?>
</nav><!-- #top-navigation -->

<?php
/**
 * Hook: matina_news_after_topbar_menu
 *
 * @since 1.0.0
 */
do_action( 'matina_news_after_topbar_menu' );