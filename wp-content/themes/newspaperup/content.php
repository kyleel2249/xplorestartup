<?php
/**
 * The template for displaying the content.
 * @package Newspaperup
 */
?>

<div id="list" <?php post_class('align_cls d-grid'); ?>>
    <?php while(have_posts()){ the_post();
        get_template_part('sections/content','data'); 
    }
    newspaperup_post_pagination(); ?>
</div>
<?php