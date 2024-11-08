<?php
/**
 * Partial template for archive posts entry footer.
 * 
 * @package Matina News
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * matina_news_before_archive_entry_footer hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_before_archive_entry_footer' );
?>
<footer class="entry-footer">
    <?php
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'matina-news' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="edit-link">',
            '</span>'
        );
    ?>
</footer><!-- .entry-footer -->
<?php
/**
 * matina_news_after_archive_entry_footer hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_after_archive_entry_footer' );