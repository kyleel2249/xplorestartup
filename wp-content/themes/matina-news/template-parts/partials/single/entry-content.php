<?php
/**
 * Partial template for single post entry content.
 * 
 * @package Matina News
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * matina_news_before_single_entry_content hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_before_single_entry_content' );
?>

<div class="entry-content single-entry-summary mt-clearfix" <?php matina_news_schema_markup( 'entry_content' ); ?>>
    <?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'matina-news' ),
            'after'  => '</div>',
        ) );
    ?>
</div><!-- .single-entry-summary -->

<?php
/**
 * matina_news_after_single_entry_content hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_after_single_entry_content' );