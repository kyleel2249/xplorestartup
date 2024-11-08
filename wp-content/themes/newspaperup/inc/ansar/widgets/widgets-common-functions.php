<?php
if (!function_exists('newspaperup_get_terms')):
function newspaperup_get_terms( $category_id = 0, $taxonomy='category', $default='' ){
    $taxonomy = !empty($taxonomy) ? $taxonomy : 'category';

    if ( $category_id > 0 ) {
            $term = get_term_by('id', absint($category_id), $taxonomy );
            if($term)
                return esc_html($term->name);


    } else {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => true,
        ));


        if (isset($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                if( $default != 'first' ){
                    $array['0'] = __('Select Category', 'newspaperup');
                }
                $array[$term->term_id] = esc_html($term->name);
            }

            return $array;
        }   
    }
}
endif;


if (!function_exists('newspaperup_get_column')):
function newspaperup_get_column( $default='' ){


  // Declare an array 
$arr = array( "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "12" => "12");  
  
// Loop through the array elements 
foreach ($arr as $element) { 
    echo "$element";
}

return $arr;
     
}
endif;

/**
 * Returns all categories.
 *
 * @since newspaperup 1.0.0
 */
if (!function_exists('newspaperup_get_terms_link')):
function newspaperup_get_terms_link( $category_id = 0 ){

    if (absint($category_id) > 0) {
        return get_term_link(absint($category_id), 'category');
    } else {
        return get_post_type_archive_link('post');
    }
}
endif;

/**
 * Returns word count of the sentences.
 *
 * @since newspaperup 1.0.0
 */
if (!function_exists('newspaperup_get_excerpt')):
    function newspaperup_get_excerpt($length = 25, $newspaperup_content = null, $post_id = 1) {
        $widget_excerpt   = newspaperup_get_option('global_widget_excerpt_setting');
        if($widget_excerpt == 'default-excerpt'){
            return the_excerpt();
        }

        $length          = absint($length);
        $source_content  = preg_replace('`\[[^\]]*\]`', '', $newspaperup_content);
        $trimmed_content = wp_trim_words($source_content, $length, '...');
        return $trimmed_content;
    }
endif;

/**
 * Returns no image url.
 *
 * @since newspaperup 1.0.0
 */
if(!function_exists('newspaperup_no_image_url')):
    function newspaperup_no_image_url(){
        $url = get_template_directory_uri().'/assets/images/no-image.png';
        return $url;
    }

endif;





/**
 * Outputs the tab posts
 *
 * @since 1.0.0
 *
 * @param array $args  Post Arguments.
 */
if (!function_exists('newspaperup_render_posts')):
  function newspaperup_render_posts( $type, $show_excerpt, $excerpt_length, $number_of_posts, $category = '0' ){

    $args = array();
   
    switch ($type) {
        
        case 'recent':
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => absint($number_of_posts),
                'orderby' => 'date',
                'ignore_sticky_posts' => true
            );
            break;

        case 'popular':
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => absint($number_of_posts),
                'ignore_sticky_posts' => true
            );
            $category = isset($category) ? $category : '0';
            if (absint($category) > 0) {
                $args['cat'] = absint($category);
            }
            break;

        case 'categorised':
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => absint($number_of_posts),
                'ignore_sticky_posts' => true
            );
            $category = isset($category) ? $category : '0';
            if (absint($category) > 0) {
                $args['cat'] = absint($category);
            }
            break;


        default:
            break;
    }

    if( !empty($args) && is_array($args) ){
        $all_posts = new WP_Query($args);
        if($all_posts->have_posts()):
            while($all_posts->have_posts()): $all_posts->the_post();  ?>
                <div class="small-post clearfix">
                    <?php if(has_post_thumbnail()){
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                        $url = $thumb['0'];
                        $col_class = 'col-sm-8';
                    }else {
                        $url = ''.get_template_directory_uri() . '/images/image.jpg'.'';
                        $col_class = 'col-sm-12';
                    }
                    global $post; ?>
                        <div class="img-small-post back-img hlgr" style="background-image: url('<?php echo $url; ?>');">
                          <a href="<?php echo get_permalink(); ?>" class="link-div"></a>
                        </div>
                        <div class="small-post-content">
							<?php newspaperup_post_categories(); ?>
							<!-- small-post-content -->
							<h5 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
							<!-- // title_small_post -->
							<div class="bs-blog-meta">
								<?php newspaperup_date_content(); ?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;wp_reset_postdata();
        endif;
    }
}
endif;