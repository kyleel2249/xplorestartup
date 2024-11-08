<?php
if (!function_exists('newspaperup_side_menu_section')) :
/**
 *  Header
 *
 * @since newspaperup
 *
 */
function newspaperup_side_menu_section() { ?>
  <aside class="bs-offcanvas end" bs-data-targeted="true">
    <div class="bs-offcanvas-close">
      <a href="#" class="bs-offcanvas-btn-close" bs-data-removable="true">
        <span></span>
        <span></span>
      </a>
    </div>
    <div class="bs-offcanvas-inner">
      <?php if( is_active_sidebar('menu-sidebar-content')){
        get_template_part('widgets-area/sidebar','menu');
      } else { 
        $title = esc_html( 'Header Toggle Sidebar', 'newspaperup' );?>
      <div class="bs-card-box empty-sidebar">
      <?php newspaperup_widget_title($title); ?>
        <p class='empty-sidebar-widget-text'>
          <?php echo esc_html( 'This is an example widget to show how the Header Toggle Sidebar looks by default. You can add custom widgets from the', 'newspaperup' ); ?>
          <a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>' title='<?php esc_attr_e('widgets','newspaperup'); ?>'>
            <?php echo esc_html( 'widgets', 'newspaperup' ); ?>
          </a>
          <?php echo esc_html( 'in the admin.', 'newspaperup' ); ?>
        </p>
      </div>
      <?php } ?>
    </div>
  </aside>
  <?php 
}
endif;
add_action('newspaperup_action_side_menu_section', 'newspaperup_side_menu_section', 5);