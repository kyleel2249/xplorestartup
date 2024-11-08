<?php
  $newspaperup_slider_category = newspaperup_get_option('select_slider_news_category');
  $newspaperup_number_of_post = 5;
  $newspaperup_all_posts_main = newspaperup_get_posts($newspaperup_number_of_post, $newspaperup_slider_category);
   ?>
  <!--row-->
  <div class="col-lg-6">
    <div class="mb-0">
      <div class="homemain bs swiper-container">
        <div class="swiper-wrapper">
          <?php
          if ($newspaperup_all_posts_main->have_posts()) :
            while ($newspaperup_all_posts_main->have_posts()) : $newspaperup_all_posts_main->the_post(); 
              newspaperup_slider_default_section();   
            endwhile;
          endif;
          wp_reset_postdata(); ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- <div class="swiper-pagination"></div> -->
      </div>
      <!--/swipper-->
    </div>
  </div>
  <!--/col-12-->