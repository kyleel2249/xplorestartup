<?php
/**
 * Header Logo
 *
 * @package Matina News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="site-branding" <?php matina_news_schema_markup( 'logo' ); ?>>
    <?php
        if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {

            the_custom_logo();
        }
    ?>
    <?php
        if ( is_front_page() || is_home() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
    endif;?>
    <?php
            $matina_news_description = get_bloginfo( 'description', 'display' );
            if ( $matina_news_description || is_customize_preview() ) {
    ?>
                <span class="site-description"><?php echo $matina_news_description; ?></span>
    <?php
            }
    ?>
</div><!-- .site-branding -->