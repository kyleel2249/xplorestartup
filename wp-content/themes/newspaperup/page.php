<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Newspaperup
 */
get_header(); ?>
<!--==================== main content section ====================-->
<main id="content" class="page-class content">
	<!--container-->
		<div class="container">
			<?php do_action('newspaperup_action_archive_page_title'); ?>
			<!--row-->
			<div class="row">
					<?php get_template_part('sections/page','data'); ?>
				</div>
			<!--/row-->
		</div>
	<!--/container-->
</main>
<?php
get_footer();