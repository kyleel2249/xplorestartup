<?php 
if (!function_exists('newspaperup_main_content')) :
    function newspaperup_main_content()
    { 
        $content_layout = (newspaperup_get_option('newspaperup_archive_page_layout'));
        $blog_post_layout = (get_theme_mod('blog_post_layout','list-layout'));
      

        if($content_layout == "align-content-left") { ?>
            <!-- col-lg-4 -->
                <aside class="col-lg-4 sidebar-left">
                    <?php get_sidebar();?>
                </aside>
            <!-- / col-lg-4 -->
        <?php } elseif($content_layout == "sidebar-both") { ?>
            <!-- col-lg-3 -->
                <aside class="col-lg-3 sidebar-left">
                    <?php get_sidebar(); ?>
                </aside>
            <!-- / col-lg-3 -->
        <?php } ?>
        <div class="<?php
            echo esc_attr(($content_layout == "full-width-content")
                ? 'col-lg-12' :  'col-lg-8 content-right'); ?>"> <?php 
            if($blog_post_layout == 'grid-layout'){
                get_template_part('content','grid');
            } else { get_template_part('content',''); } ?>
        </div>

        <?php if($content_layout == "align-content-right") { ?>
            <!--col-lg-4-->
                <aside class="col-lg-4 sidebar-right">
                    <?php get_sidebar();?>
                </aside>
            <!--/col-lg-4-->
        <?php } elseif($content_layout == "sidebar-both") { ?>
            <!-- col-lg-3 -->
                <aside class="col-lg-3 sidebar-right">
                    <?php get_sidebar();?>
                </aside>
            <!-- / col-lg-3 -->
        <?php } 
    }
endif;
add_action('newspaperup_action_main_content_layouts', 'newspaperup_main_content', 40);

if (!function_exists('newspaperup_single_main_content')) :
    function newspaperup_single_main_content()
    { 
        $single_content_layout = (get_theme_mod('newspaperup_single_page_layout','single-align-content-right'));

        if($single_content_layout == "single-align-content-left") { ?>
            <!-- col-lg-4 -->
                <aside class="col-lg-4 sidebar-left">
                    <?php get_sidebar(); ?>
                </aside>
            <!-- / col-lg-4 -->
        <?php } ?>
        
        <div class="<?php
            echo esc_attr(($single_content_layout == "single-full-width-content") ? 'col-lg-12' : 'col-lg-8 content-right'); ?>"> 
             <?php get_template_part('sections/single','data'); ?>
        </div>

        <?php if($single_content_layout == "single-align-content-right") { ?>
            <!--col-lg-4-->
                <aside class="col-lg-4 sidebar-right">
                    <?php get_sidebar();?>
                </aside>
            <!--/col-lg-4-->
        <?php } 
    }
endif;
add_action('newspaperup_action_single_main_content_layouts', 'newspaperup_single_main_content', 40);