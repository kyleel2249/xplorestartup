<?php /**
 // Template Name: Frontpage
 */
get_header(); ?>
<main id="content" class="front-page-class content">
    <!--container-->
    <div class="container">
        <!--row-->
        <div class="row">
            <?php 
                get_template_part('widgets-area/sidebar','frontpageleft');
                get_template_part('widgets-area/sidebar','frontcontent');
                get_template_part('widgets-area/sidebar','frontpageright'); 
            ?>
        </div><!--row-->
    </div><!--container-->
</main>
<?php get_footer(); ?>