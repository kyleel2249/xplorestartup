
<?php if(isset($args['visibility'])){ $visibility = $args['visibility']; }else{ $visibility = ''; } 
  
global $post; 
$post_id = get_the_ID();
$post_image_type = 'list-blog';
$url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-medium');
$post_blog_class = !empty($url) ? 'bs-blog-post ' : 'bs-blog-post no-img '; ?>

<div id="post-<?php the_ID(); ?>" <?php echo post_class($post_blog_class .$post_image_type .$visibility); ?>>
    <?php   
        newspaperup_post_image_display_type($post); 
        newspaperup_post_title_content(); 
    ?>
</div>
<?php