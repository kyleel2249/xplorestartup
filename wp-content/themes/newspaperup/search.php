<?php
/**
 * The template for displaying search results pages.
 *
 * @package Newspaperup
 */
get_header();
$blog_post_layout = (get_theme_mod('blog_post_layout','list-layout')); ?>
<!--==================== main content section ====================-->
<main id="content" class="search-class content">
    <!--container-->
    <div class="container">
        <!--row-->
        <div class="row">
            <!--==================== breadcrumb section ====================-->
            <?php do_action('newspaperup_action_archive_page_title'); ?>
            <div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?>">
                <h2>
                    <?php /* translators: %s: search term */
                    printf( esc_html__( 'Search Results for: %s','newspaperup'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
                </h2>
                <?php if ( have_posts() ) { /* Start the Loop */
                    if($blog_post_layout == 'grid-layout'){
                        get_template_part('content','grid');
                    } else { get_template_part('content',''); }
                } else { ?>
                    <h2><?php esc_html_e( "Nothing Found", 'newspaperup' ); ?></h2>
                    <div class="">
                        <p>
                            <?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'newspaperup' ); ?>
                        </p>
                        <?php get_search_form(); ?>
                    </div><!-- .blog_con_mn -->
                <?php } ?>
            </div>
            <aside class="col-lg-4 sidebar-right">
                <?php get_sidebar();?>
            </aside>
        </div><!--/row-->
    </div><!--/container-->
</main>
<?php
get_footer();