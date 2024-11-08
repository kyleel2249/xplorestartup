<?php
/**
 * Partial template for single post entry category.
 * 
 * @package Matina News
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// return if post are not from default post type.
if ( 'post' != get_post_type() ) {
    return;
}

/**
 * matina_news_before_single_entry_category hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_before_single_entry_category' );

/* translators: used between list items, there is a space after the comma */
$categories_list = get_the_category_list();
if ( $categories_list ) {
?>
    <span class="cat-links"><?php echo wp_kses_post( $categories_list ); ?></span>
<?php
}

/**
 * matina_news_after_single_entry_category hook
 *
 * @since 1.0.0
 */
do_action( 'matina_news_after_single_entry_category' );