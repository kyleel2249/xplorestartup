<?php if(isset($args['visibility'])){ $visibility = $args['visibility']; }else{ $visibility = ''; }
    $newspaperup_archive_page_layout = esc_attr(newspaperup_get_option('newspaperup_archive_page_layout',)); 
    global $post; ?>

    <div id="post-<?php the_ID(); ?>" <?php if($newspaperup_archive_page_layout == "grid-fullwidth") { echo post_class('c '.$visibility); } else { echo post_class(' '.$visibility); } ?>>
        <!-- bs-posts-sec bs-posts-modul-6 -->
        <div class="bs-blog-post grid-card"> 
            <?php 
                $url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-medium');
                newspaperup_post_image_display_type($post); 
                newspaperup_post_title_content(); 
            ?>
        </div>
    </div>
    <?php 