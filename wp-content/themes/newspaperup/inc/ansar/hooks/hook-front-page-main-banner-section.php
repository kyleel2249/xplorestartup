<?php
if (!function_exists('newspaperup_front_page_banner_section')) :
  /**
   *
   * @since newspaperup
   *
   */
  function newspaperup_front_page_banner_section() {
    if (is_front_page() || is_home()) {
              
      get_template_part('inc/ansar/hooks/blocks/featured/featured','default');
      do_action('newspaperup_action_trending_posts');
      get_template_part('inc/ansar/hooks/blocks/block','banner-list');
      do_action('newspaperup_action_editor_posts');

    }
  }
endif;
add_action('newspaperup_action_front_page_main_section_1', 'newspaperup_front_page_banner_section', 40); 