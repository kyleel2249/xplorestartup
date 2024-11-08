<?php function newspaperup_slider_default_section() {
global $post;
$newspaperup_url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-slider-full');
$slider_meta_enable = get_theme_mod('slider_meta_enable','true');
$slider_overlay_enable = get_theme_mod('slider_overlay_enable','true'); ?>
<div class="swiper-slide">
  <div class="bs-slide bs-blog-post three lg back-img bshre" style="background-image: url('<?php echo esc_url($newspaperup_url); ?>');">
    <a class="link-div" href="<?php the_permalink(); ?>"> </a>
    <?php if($slider_meta_enable == true) {  newspaperup_post_categories(); }
    if ($slider_overlay_enable != false){ ?>
    <div class="inner">
      <h4 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <?php if($slider_meta_enable == true) { newspaperup_post_meta(); } ?>
    </div>
    <?php } ?>
  </div> 
</div>
<?php }