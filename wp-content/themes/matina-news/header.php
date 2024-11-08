<?php
/**
 * The header for Matina News theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Matina News
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php
	/**
	 * Hook: matina_news_before_body
	 *
	 * @since 1.0.0
	 */
	do_action( 'matina_news_before_body' );
?>
<body <?php body_class(); ?> <?php matina_news_schema_markup( 'html' ); ?>>
<?php
	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 *
	 * @since 1.0.0
	 */
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		/**
		 * Hook: wp_body_open
		 *
		 * @since 1.0.3
		 */
		do_action( 'wp_body_open' );
	}

	/**
	 * Hook: matina_news_before_page
	 *
	 * @hooked - matina_news_preloader - 10
	 *
	 * @since 1.0.0
	 */
	do_action( 'matina_news_before_page' );
?>
<div id="page" class="site">
	
	<?php
		/**
		 * Hook: matina_news_before_header
		 *
		 * @hooked - matina_news_skip_content - 10
		 *
		 * @since 1.0.0
		 */
		do_action( 'matina_news_before_header' );

		/**
		 * Hook: matina_news_header_section
		 *
		 * @hooked - matina_news_top_header - 10
		 * @hooked - matina_news_main_header - 20
		 *
		 * @since 1.0.0
		 */
		do_action( 'matina_news_header_section' );

		/**
		 * Hook: matina_news_before_content
		 *
		 * @hooked - matina_news_page_header - 10
		 *
		 * @since 1.0.0
		 */
		do_action( 'matina_news_before_content' );
	?>

	<div id="content" class="site-content">

		<?php
			/**
			 * Hook: matina_news_before_content_container
			 *
			 * @since 1.0.0
			 */
			do_action( 'matina_news_before_content_container' );
		?>

		<div class="mt-container">
