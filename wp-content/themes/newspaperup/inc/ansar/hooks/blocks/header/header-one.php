<?php 
function newspaperup_header_default_section() {
  do_action('newspaperup_action_header_image_section'); 
  $remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); 
  $header_center = get_theme_mod('header_text_center',false);
  ?>
<!--header-->
<header class="bs-default">
  <div class="clearfix"></div>
  <div class="bs-head-detail d-none d-lg-flex">
    <?php do_action('newspaperup_action_header_section'); ?>
  </div>
   <!-- Main Menu Area-->
   <div class="bs-header-main">
      <div class="inner<?php if($remove_header_image_overlay == true) { echo ' overlay'; }  if(empty($banner_ad_image)){ echo ' responsive'; } ?>">
        <div class="container">
          <div class="row align-center">
            <div class="col-md-<?php echo esc_attr($header_center == false ? '4' : '12 text-center')?>">
              <?php do_action('newspaperup_action_header_logo_section'); ?>
            </div>
            <div class="col-md-<?php echo esc_attr($header_center == false ? '8' : '12 center')?>">
              <!-- advertisement Area-->
                <?php do_action('newspaperup_action_banner_advertisement'); ?>
              <!-- advertisement--> 
            </div>
          </div>
        </div><!-- /container-->
      </div><!-- /inner-->
    </div>
  <!-- /Main Menu Area-->
  <?php do_action('newspaperup_action_header_menu_cont_section'); ?>
</header>
<?php }