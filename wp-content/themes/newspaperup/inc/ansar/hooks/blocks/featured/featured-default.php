<?php if (!function_exists('newspaperup_trending_posts')) :
    /**
     *
     * @since newspaperup
     *
     */
    function newspaperup_trending_posts() {
        $slider_meta_enable = get_theme_mod('slider_meta_enable','true');
        $select_trending_news_category = newspaperup_get_option('select_trending_news_category'); 
        $featured_trending_posts = newspaperup_get_posts( 2, $select_trending_news_category);
        $trending_off = 0;
    ?>
    <div class="col-lg-3 col-md-12">
        <div class="multi-post-widget mb-0 mt-3 mt-lg-0">
            <div class="inner_columns default">
            
                <?php 
                if ($featured_trending_posts->have_posts()) : 
                    while ($featured_trending_posts->have_posts()) : $featured_trending_posts->the_post();

                    global $post;
                    $newspaperup_url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-slider-full');
                    ?>
                <div class="bs-blog-post three bsm back-img bshre trending-post post-1 mb-0" <?php if (!empty($newspaperup_url)): ?>
                        style="background-image: url('<?php echo esc_url($newspaperup_url); ?>');"
                        <?php endif; ?>>
                    <a class="link-div" href="<?php the_permalink(); ?>"> </a>
                    <?php if($slider_meta_enable == true) { ?><?php newspaperup_post_categories(); ?> <?php } ?>
                    <div class="inner">
                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php if($slider_meta_enable == true) { newspaperup_post_meta(); } ?>
                    </div>
                </div>
            <?php endwhile;
                endif;
            wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php
}
endif;
add_action('newspaperup_action_trending_posts', 'newspaperup_trending_posts'); 

if (!function_exists('newspaperup_editor_posts')) :
    /**
     *
     * @since newspaperup
     *
     */
    function newspaperup_editor_posts() {

        $select_editor_news_category = newspaperup_get_option('select_editor_news_category'); 
        $featured_editor_posts = newspaperup_get_posts( 4, $select_editor_news_category); 
        $slider_meta_enable = get_theme_mod('slider_meta_enable','true');
        $editor_off = 0;
        echo '<div class="col-lg-3">';
        if ($featured_editor_posts->have_posts()) :
            while ($featured_editor_posts->have_posts()) : $featured_editor_posts->the_post(); 
            global $post;
            $newspaperup_url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-slider-full');
            ?>
            <!-- small-post -->
            <div class="small-post">
              <!-- // img-small-post -->
              <div class="small-post-content">
                <?php if($slider_meta_enable == true) { ?><?php newspaperup_post_categories(); ?> <?php } ?>
                <!-- small-post-content -->
                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> <!-- // title_small_post -->
                  <div class="bs-blog-meta">
                  <?php if($slider_meta_enable == true) { newspaperup_date_content(); } ?>
                  </div>
              </div> <!-- // small-post-content -->
              <div class="img-small-post back-img hlgr right" <?php if (!empty($newspaperup_url)): ?> style="background-image: url('<?php echo esc_url($newspaperup_url); ?>');"
                <?php endif; ?>>
                <a class="link-div" href="<?php the_permalink(); ?>"> </a>
              </div>
            </div>
            <!-- // small-post -->
        <?php endwhile;
        endif;
        wp_reset_postdata(); 
        echo '</div>';
    }
endif;
add_action('newspaperup_action_editor_posts', 'newspaperup_editor_posts'); 