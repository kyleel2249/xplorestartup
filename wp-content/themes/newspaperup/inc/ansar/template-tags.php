<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Newspaperup
 */

if (!function_exists('newspaperup_get_option')):
    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function newspaperup_get_option($key) {
    
        if (empty($key)) {
            return;
        }
    
        $value = '';
    
        $default       = newspaperup_get_default_theme_options();
        $default_value = null;
    
        if (is_array($default) && isset($default[$key])) {
            $default_value = $default[$key];
        }
    
        if (null !== $default_value) {
            $value = get_theme_mod($key, $default_value);
        } else {
            $value = get_theme_mod($key);
        }
    
        return $value;
    }
endif;

// Generate current post's related all categories Function
if (!function_exists('newspaperup_post_categories')) :
    function newspaperup_post_categories($separator = '&nbsp')
    {
        if ( 'post' === get_post_type() ) {
            $categories = wp_get_post_categories(get_the_ID());
            if(!empty($categories)){
                ?>
                <div class="bs-blog-category one">
                    <?php
                    foreach($categories as $c){
                        $style = '';
                        $cat = get_category( $c );
                        // $color = get_term_meta($cat->term_id, 'category_color', true);
                        $color = get_theme_mod('category_' .absint($cat->term_id). '_color' , '');
                        if($color){
                            $style = "--cat-color:".esc_attr($color);
                        }
                        ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" style="<?php echo esc_attr($style);?>" id="<?php echo 'category_' .absint($cat->term_id). '_color'; ?>" >
                            <?php echo esc_html($cat->cat_name);?>
                        </a>
                    <?php } ?>
                </div>
                <?php
            }
        }
    }
endif;

// Post Read More Function
if (!function_exists('newspaperup_post_read_more')) :
    function newspaperup_post_read_more()
    {
        $newspaperup_readmore_excerpt=get_theme_mod('newspaperup_blog_content','excerpt'); 
        if($newspaperup_readmore_excerpt=="excerpt") { ?>
            <a href="<?php the_permalink();?>" class="more-link">
                <?php echo esc_html('Read More'); ?>
            </a>
        <?php } 
        
    }
endif;

// Widgets Title Function
if (!function_exists('newspaperup_widget_title')) :
    function newspaperup_widget_title($title){
        if ( ! empty( $title ) ) { ?>
			<!-- bs-sec-title -->
			<div class="bs-widget-title one">
				<h4 class="title"><span><i class="fas fa-arrow-right"></i></span><?php echo esc_html($title); ?></h4>
				<div class="border-line"></div>
			</div> 
			<!-- // bs-sec-title -->
			<?php 
        }
    }
endif;

/*Save Date Formate*/
if ( ! function_exists( 'newspaperup_date_content' ) ) :
    function newspaperup_date_content($date_format = 'default-date') { ?>
        <?php if($date_format == 'default-date'){ ?>
            <span class="bs-blog-date">
                <a href="<?php echo esc_url(get_month_link(esc_html(get_post_time('Y')),esc_html(get_post_time('m')))); ?>"><time datetime=""><?php echo get_the_date('M'); ?> <?php echo get_the_date('j,'); ?> <?php echo get_the_date('Y'); ?></time></a>
            </span>
        <?php } else{ ?>
            <span class="bs-blog-date">
                <a href="<?php echo esc_url(get_month_link(esc_html(get_post_time('Y')),esc_html(get_post_time('m')))); ?>"><time datetime=""><?php echo esc_html(get_the_date()); ?></time></a>
            </span>
        <?php } ?>
    <?php }
endif;

/*Save Author Content*/
if ( ! function_exists( 'newspaperup_author_content' ) ) :
    function newspaperup_author_content() { ?>
        <span class="bs-author">
            <a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> 
                <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?><?php the_author(); ?>
            </a>
        </span>
    <?php }
endif;

/*Number Of Comments*/
if ( ! function_exists( 'newspaperup_post_comments' ) ) :
    function newspaperup_post_comments() { ?>
       <span class="comments-link"> 
            <a href="<?php the_permalink(); ?>">
                <?php echo get_comments_number(); ?> <?php esc_html_e( get_comments_number() <= 1 ? __('Comment', 'newspaperup') : __('Comments', 'newspaperup')); ?>
            </a> 
        </span>
    <?php }
endif;

//Previous / next page navigation
if ( ! function_exists( 'newspaperup_post_pagination' ) ) :
    function newspaperup_post_pagination() {
        $grid_layout = get_theme_mod('blog_post_layout','list-layout') == 'grid-layout' ? ' mt-5 mb-4 mb-lg-0' : '';
        $pagingtype = get_theme_mod('newspaperup_post_blog_pagination','number');
        if($pagingtype == 'number') { ?>
            <div class="newspaperup-pagination d-flex-center<?php echo esc_attr($grid_layout)?>">
                <?php newspaperup_target_element('control', 'newspaperup_post_blog_pagination', 'Click To Edit Pagination.');
                    $left = is_rtl() ? 'right': 'left';
                    $right = is_rtl() ? 'left': 'right';
                    the_posts_pagination( array(
                        'prev_text'          => '<i class="fas fa-angle-'.$left.'"></i>',
                        'next_text'          => '<i class="fas fa-angle-'.$right.'"></i>',
                    ) ); 
                ?> 
            </div>
        <?php } elseif($pagingtype == 'next_prev') { ?>
            <div class="newspaperup-pagination navigation d-flex-center<?php echo esc_attr($grid_layout)?>"> 
                <?php newspaperup_target_element('control', 'newspaperup_post_blog_pagination', 'Click To Edit Pagination.'); ?>
                <div class="navigation pagination next-prev">
                    <?php posts_nav_link();?>
                </div>
            </div> 
        <?php }
    }
endif;

/*Save Category fields*/
if(!function_exists('newspaperup_save_category_fields')):
    function newspaperup_save_category_fields($term_id) {
        if ( isset( $_POST['category_color'] ) && ! empty( $_POST['category_color']) ) {
            update_term_meta( $term_id, 'category_color', sanitize_hex_color( $_POST['category_color'] ) );
        }else{
            delete_term_meta( $term_id, 'category_color' );
        }
    }
endif;
add_action( 'created_category', 'newspaperup_save_category_fields' , 10, 3 );
add_action( 'edited_category', 'newspaperup_save_category_fields' , 10, 3 );

/* Retrive current post's related all tags */
if (!function_exists('newspaperup_post_item_tag')) :
    function newspaperup_post_item_tag() { 
        $tag_list = get_the_tag_list();
        $tags = get_the_tags();
        if($tag_list){ ?>
            <span class="newspaperup-tags tag-links">
                <?php foreach ($tags as $tag) {
                    $tag_link = get_tag_link($tag->term_id);
                    echo '#<a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a> ';
                } ?>
           </span>
        <?php }
    }
endif;

/* Retrive current post's related all metas */
if (!function_exists('newspaperup_post_meta')) :

    function newspaperup_post_meta() {
        
        $newspaperup_meta_orders = get_theme_mod(
            'newspaperup_blog_post_meta',
            array(
                'author',
                'date',
            )
        ); ?>
        <div class="bs-blog-meta">
            <?php
            foreach($newspaperup_meta_orders as $key=> $newspaperup_meta_order) {

                if ($newspaperup_meta_order == 'author') {
                    newspaperup_author_content();
                }
        
                if ($newspaperup_meta_order == 'date') {
                    newspaperup_date_content();
                }
    
                if ($newspaperup_meta_order == 'comments') {
                    newspaperup_post_comments();
                }

            }
            newspaperup_edit_link(); ?>
        </div>
        <?php
    }
endif; 

/* Retrieve post's related content like, title, description, categories, meta  */
if (!function_exists('newspaperup_post_title_content')) :
    function newspaperup_post_title_content() {

        echo '<article class="small col">';
            if ((newspaperup_get_option('newspaperup_post_category') == true) && get_theme_mod('blog_post_layout','list-layout') == 'list-layout') {
                newspaperup_post_categories();
            } 
            if (get_theme_mod('blog_post_layout','list-layout') !== 'list-layout') { ?>
                <div class="title-wrap">
                    <h4 class="entry-title title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <div class="btn-wrap">
                        <a href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div> 
            <?php } else { ?>
                <h4 class="entry-title title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4><?php
            }
            $newspaperup_enable_post_meta = newspaperup_get_option('newspaperup_enable_post_meta');
            if ($newspaperup_enable_post_meta == true) {
                newspaperup_post_meta();
            }
            newspaperup_posted_content(); wp_link_pages( ); 
        echo '</article>'; 
    }
endif;


add_action('admin_head', 'newspaperup_custom_width_css');
function newspaperup_custom_width_css() {
  echo '<style>
    .column-remove{display:none;}
  </style>';
}

if (!function_exists('get_archive_title')) :
        
    function get_archive_title($title)
    {
        if (is_category()) {
            $title = single_cat_title('', false);
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
        } elseif (is_author()) {
            $title = get_the_author();
        } elseif (is_year()) {
            $title = get_the_date('Y');
        } elseif (is_month()) {
            $title = get_the_date('F Y');
        } elseif (is_day()) {
            $title = get_the_date('F j, Y');
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        } elseif (is_single()) {
            $title = '';
        } elseif (is_search()) {
            $title = '';
        } else {
            $title = get_the_title();
        }
        
        return $title;
    }

endif;
add_filter('get_the_archive_title', 'get_archive_title');

/* return current archive title markup with breadcrumb */
if (!function_exists('newspaperup_archive_page_title')) :
        
    function newspaperup_archive_page_title($title) {
        echo '<div class="bs-card-box page-entry-title">';
        if (!empty(get_the_archive_title())) {
            echo '<h1 class="entry-title title mb-0">' . get_the_archive_title() . '</h1>';
        }
        do_action('newspaperup_breadcrumb_content');
        echo '</div>';
    }
    
endif;
add_action('newspaperup_action_archive_page_title', 'newspaperup_archive_page_title');

/* Retrieve post content */
if ( ! function_exists( 'newspaperup_posted_content' ) ) :
    function newspaperup_posted_content() {
        $newspaperup_blog_content  = get_theme_mod('newspaperup_blog_content','excerpt');

        if ( 'excerpt' == $newspaperup_blog_content ){
            $newspaperup_excerpt = newspaperup_the_excerpt( absint(20 ) );
            if ( !empty( $newspaperup_excerpt ) ) :                   
                echo wp_kses_post( wpautop( $newspaperup_excerpt ) );
            endif; 
        } else{ 
            the_content( __('Read More','newspaperup') );
        }
    }
endif;

/* Retrieve post excerpt */
if ( ! function_exists( 'newspaperup_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function newspaperup_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( get_the_excerpt($post_obj) ) ) {
            $source_content = get_the_excerpt($post_obj);
        } 
        // Check if non-breaking space exists in the text with variations
        if (preg_match('/\s*(&nbsp;|\xA0)\s*/u', $source_content)) {
            // Remove non-breaking space and its variations from the text
            $source_content = preg_replace('/\s*(&nbsp;|\xA0)\s*/u', ' ', $source_content);
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }
endif;

if ( ! function_exists( 'newspaperup_breadcrumb_trail' ) ) :
    /**
     * Theme default breadcrumb function.
     *
     * @since 1.0.0
     */
    function newspaperup_breadcrumb_trail() {
        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            // load class file
            require_once get_template_directory() . '/inc/ansar/breadcrumb-trail/breadcrumb-trail.php';
        }

        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
    }
    add_action( 'newspaperup_breadcrumb_trail_content', 'newspaperup_breadcrumb_trail' );
endif;


if( ! function_exists( 'newspaperup_breadcrumb' ) ) :
    /**
     *
     * @package newspaperup
     */
    function newspaperup_breadcrumb() {
    if ( is_front_page() || is_home() ) return;
        $breadcrumb_settings = get_theme_mod('breadcrumb_settings','true');
        if($breadcrumb_settings == true) {
            $newspaperup_site_breadcrumb_type = get_theme_mod('newspaperup_site_breadcrumb_type','default'); ?>
            <div class="bs-breadcrumb-section">
                <div class="overlay">
                    <div class="row">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <?php if($newspaperup_site_breadcrumb_type == 'yoast') {
                                    if( function_exists( 'yoast_breadcrumb' ) ) {
                                        yoast_breadcrumb();
                                    }
                                }
                                elseif($newspaperup_site_breadcrumb_type == 'navxt')
                                {
                                    if( function_exists( 'bcn_display' ) ) {
                                        bcn_display();
                                    }
                                }
                                elseif($newspaperup_site_breadcrumb_type == 'rankmath')
                                {
                                    if( function_exists( 'rank_math_the_breadcrumbs' ) ) {
                                        rank_math_the_breadcrumbs();
                                    }
                                }
                                else {
                                    do_action( 'newspaperup_breadcrumb_trail_content' );
                                }
                                ?> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        <?php } 
    }
endif;
add_action( 'newspaperup_breadcrumb_content', 'newspaperup_breadcrumb' );

if( ! function_exists( 'newspaperup_add_menu_description' ) ) :
    function newspaperup_add_menu_description( $item_output, $item, $depth, $args ) {
        if($args->theme_location != 'primary') return $item_output;
        
        if ( !empty( $item->description ) ) {
            $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-link-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
        }
        return $item_output;
    }
    add_filter( 'walker_nav_menu_start_el', 'newspaperup_add_menu_description', 10, 4 );
endif;

function custom_html_heading_block( $block_content, $block ) {
    if ( 'core/heading' === $block['blockName'] ) {
        // Modify the block content
        $block_content = preg_replace(
            '/(<h[1-6][^>]*>)(.*?)(<\/h[1-6]>)/i',
            '$1<span><i class="fas fa-arrow-right"></i></span>$2 $3',
            $block_content
        );
    }
    return $block_content;
}
add_filter( 'render_block', 'custom_html_heading_block', 10, 2 );

function custom_html_search_label( $block_content, $block ) {
    if ( 'core/search' === $block['blockName'] ) {
        // Modify the block content
        $block_content = preg_replace(
            '/(<label[^>]*class="[^"]*wp-block-search__label[^"]*"[^>]*>)(.*?)(<\/label>)/i',
            '$1<span><i class="fas fa-arrow-right"></i></span>$2 $3',
            $block_content
        );
    }
    return $block_content;
}
add_filter( 'render_block', 'custom_html_search_label', 10, 2 );

