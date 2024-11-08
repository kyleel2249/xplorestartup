<?php 
function newspaperup_custom_style()
{

$newspaperup_single_page_sidebar_width = get_theme_mod('newspaperup_single_page_sidebar_width');
$newspaperup_page_sidebar_width = get_theme_mod('newspaperup_page_sidebar_width');
$newspaperup_header_overlay_size = get_theme_mod('newspaperup_header_overlay_size','');
$remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); 

if($remove_header_image_overlay !== false ) { ?>
<style> 
  .bs-headthree.cont .bs-header-main .inner{
    background-color: transparent;
  }
 </style>
<?php } ?>
<style>
@media (min-width: 992px) {
    
    .archive-class .sidebar-right, .archive-class .sidebar-left , .index-class .sidebar-right, .index-class .sidebar-left{
      flex: 100;
      max-width:<?php echo esc_attr(get_theme_mod('newspaperup_archive_page_sidebar_width')); ?>% !important;
    }
    .archive-class .content-right , .index-class .content-right {
      max-width: calc((100% - <?php echo esc_attr(get_theme_mod('newspaperup_archive_page_sidebar_width')); ?>%)) !important;
    }
  }

  .single-class .sidebar-right, .single-class .sidebar-left{
    flex: 100;
    max-width:<?php echo esc_attr(get_theme_mod('newspaperup_single_page_sidebar_width')); ?>% !important;
  }
  .single-class .content-right {
    max-width: calc((100% - <?php echo esc_attr(get_theme_mod('newspaperup_single_page_sidebar_width')); ?>%)) !important;
  }

  .page-class .sidebar-right, .page-class .sidebar-left , .search-class .sidebar-right, .search-class .sidebar-left{
    flex: 100;
    max-width:<?php echo esc_attr(get_theme_mod('newspaperup_page_sidebar_width')); ?>% !important;
  }
  .page-class .content-right , .search-class .content-right {
    max-width: calc((100% - <?php echo esc_attr(get_theme_mod('newspaperup_page_sidebar_width')); ?>%)) !important;
  }
</style>

<?php } add_action('wp_head','newspaperup_custom_style',10,0); 
