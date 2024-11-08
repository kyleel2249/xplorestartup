<?php
/**
 * Header ads area
 *
 * @package Matina News
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! is_active_sidebar( 'ads-sidebar' ) ) {
    return;
}
?>

<div id="header-ads" class="mt-header-ads-area">
    <?php dynamic_sidebar( 'ads-sidebar' ); ?>
</div><!-- .mt-header-ads-area -->