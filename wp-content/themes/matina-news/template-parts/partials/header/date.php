<?php
/**
 * Top bar Current Date
 *
 * @package Matina News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$date_option = get_theme_mod( 'matina_news_top_header_date_option', true );

// return if hide topbar date
if ( false === $date_option ) {
    return;
}
$date_format    = get_option( 'date_format' );
$date_format    = apply_filters( 'matina_news_top_header_date_format', $date_format );
$datetime       = date_i18n( $date_format, current_time( 'timestamp' ) );

/**
 * Hook: matina_news_before_topbar_date
 *
 * @since 1.0.0
 */
do_action( 'matina_news_before_topbar_date' );
?>

<div class="top-date-wrap">
    <?php echo esc_html( $datetime ); ?>
</div>

<?php
/**
 * Hook: matina_news_after_topbar_date
 *
 * @since 1.0.0
 */
do_action( 'matina_news_after_topbar_date' );