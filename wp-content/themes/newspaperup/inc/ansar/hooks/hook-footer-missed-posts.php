<?php if (!function_exists('newspaperup_footer_missed_section')) :
/**
 *  Header
 *
 * @since newspaperup
 *
 */
function newspaperup_footer_missed_section() {
$you_missed_enable = newspaperup_get_option('you_missed_enable',);
$you_missed_title = newspaperup_get_option('you_missed_title');

$missed_slider_category = 0;
$missed_number_of_post = 4;
  
  $missed_all_posts_main = newspaperup_get_posts($missed_number_of_post, $missed_slider_category);
 
if($you_missed_enable == true) { ?>
<!--==================== Missed ====================-->
<div class="missed">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="wd-back position-relative">
          <?php newspaperup_widget_title($you_missed_title);?>
          <div class="missedslider d-grid column4">
              <?php 
                if ( $missed_all_posts_main->have_posts() ) :
                while ( $missed_all_posts_main->have_posts() ) : $missed_all_posts_main->the_post(); 
                global $post;
                $url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-featured'); ?>
                  <div class="bs-blog-post three md back-img bshre mb-0" <?php if(has_post_thumbnail()) { ?> style="background-image: url('<?php echo esc_url($url); ?>'); <?php } ?>">
                    <a class="link-div" href="<?php the_permalink(); ?>"></a>
                    <?php newspaperup_post_categories(); ?>
                    <div class="inner">
                      <div class="title-wrap">
                        <h4 class="title bsm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="btn-wrap">
                          <a href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right"></i></a>
                        </div>
                      </div> 
                    </div>
                  </div>
              <?php endwhile; endif; wp_reset_postdata(); ?> 
          </div>        
        </div><!-- end wd-back -->
      </div><!-- end col12 -->
    </div><!-- end row -->
  </div><!-- end container -->
</div> 
<!-- end missed -->
<?php 
} }
endif;
add_action('newspaperup_action_footer_missed_section','newspaperup_footer_missed_section'); ?>