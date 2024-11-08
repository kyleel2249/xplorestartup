<?php 
$enable_category = newspaperup_get_option('newspaperup_enable_single_related_category');
$enable_date = newspaperup_get_option('newspaperup_enable_single_related_date');
$enable_admin = newspaperup_get_option('newspaperup_enable_single_related_admin');
$related_post_title = get_theme_mod('newspaperup_related_post_title', esc_html__('Related Posts','newspaperup'))
?>
<!--Start bs-realated-slider -->
<div class="bs-related-post-info bs-card-box">
 <?php newspaperup_widget_title($related_post_title);?>
    <!-- // bs-sec-title -->
    <div class="d-grid column3">
        <?php global $post;
            $categories = get_the_category($post->ID);
            $number_of_related_posts = 3;
            if ($categories) {
                $cat_ids = array();
                foreach ($categories as $category) $cat_ids[] = $category->term_id;
                $args = array(
                    'category__in' => $cat_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => $number_of_related_posts, // Number of related posts to display.
                    'ignore_sticky_posts' => 1
                );
                $related_posts = new wp_query($args);
                while ($related_posts->have_posts()) {
                    $related_posts->the_post();
                    global $post;
                    $url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-featured'); ?>
                    <div class="bs-blog-post three md back-img bshre mb-lg-0" <?php if(has_post_thumbnail()) { ?> style="background-image: url('<?php echo esc_url($url); ?>');" <?php } ?>>
                        <a class="link-div" href="<?php the_permalink(); ?>"></a>
                        <?php if($enable_category == true) { newspaperup_post_categories(); } ?>
                        <div class="inner">
                            <h4 class="title md"> 
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4> 
                            <div class="bs-blog-meta">
                            <?php if($enable_admin == true){ 
                                    newspaperup_author_content(); 
                                } if($enable_date == true) {
                                    newspaperup_date_content(); 
                                } ?>
                            </div>
                        </div>
                    </div> 
                <?php }
            }
            wp_reset_postdata(); ?>
    </div>
</div>
<!--End bs-realated-slider -->