<?php
/**
 * Partial template for page title.
 * 
 * @package Matina News
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// page title style
$matina_news_page_title_style = get_theme_mod( 'matina_news_page_title_style', 'default' );
if ( 'hidden' == $matina_news_page_title_style ) {
    return;
}

// get page title
$get_page_title = matina_news_get_the_title();

// checked page header title option in single post page
$matina_news_single_page_title_option = get_theme_mod( 'matina_news_single_post_enable_page_header', false );
if ( is_single() && false === $matina_news_single_page_title_option ) {
    return;
}

$matina_news_page_title_style = get_theme_mod( 'matina_news_page_title_style', 'default' );
$style_class = $matina_news_page_title_style.'-page-header';

$heading_tag = get_theme_mod( 'matina_news_page_title_heading_tag', 'h1' );

/**
 * matina_news_before_page_header hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_before_page_header' );

?>
<header class="mt-page-header <?php echo esc_attr( $style_class ); ?>">
    <div class="mt-container inner-page-header mt-clearfix">
        <<?php echo esc_attr( $heading_tag ); ?> class="page-title" <?php matina_news_schema_markup( 'headline' ); ?>><?php echo wp_kses_post( $get_page_title ); ?></<?php echo esc_attr( $heading_tag ); ?>>
        <?php matina_news_breadcrumb_content(); ?>
    </div><!-- .inner-page-header -->
</header>
<?php
/**
 * matina_news_after_page_header hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_after_page_header' );
