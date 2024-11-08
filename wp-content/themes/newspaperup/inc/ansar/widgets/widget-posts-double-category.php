<?php
if (!class_exists('Newspaperup_Dbl_Col_Cat_Posts')) :
    /**
     * Adds Newspaperup_Dbl_Col_Cat_Posts widget.
     */
    class Newspaperup_Dbl_Col_Cat_Posts extends Newspaperup_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newspaperup-categorised-posts-title-1', 'newspaperup-categorised-posts-title-2', 'newspaperup-posts-number-1', 'newspaperup-posts-number-2');
            $this->select_fields = array('newspaperup-select-category-1', 'newspaperup-select-category-2', 'newspaperup-select-layout-1', 'newspaperup-select-layout-2');

            $widget_ops = array(
                'classname' => 'Newspaperup_Dbl_Col_Cat_Posts',
                'description' => __('Displays posts from 2 selected categories in double column.', 'newspaperup'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('Newspaperup_Dbl_Col_Cat_Posts', __('AR: Double Categories Posts', 'newspaperup'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {

            $instance = parent::newspaperup_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */

            $title_1 = apply_filters('widget_title', $instance['newspaperup-categorised-posts-title-1'], $instance, $this->id_base);
            $title_2 = apply_filters('widget_title', $instance['newspaperup-categorised-posts-title-2'], $instance, $this->id_base);
            $category_1 = isset($instance['newspaperup-select-category-1']) ? $instance['newspaperup-select-category-1'] : '0';
            $category_2 = isset($instance['newspaperup-select-category-2']) ? $instance['newspaperup-select-category-2'] : '0';
            $layout_1 = isset($instance['newspaperup-select-layout-1']) ? $instance['newspaperup-select-layout-1'] : 'full-plus-list';
            $layout_2 = isset($instance['newspaperup-select-layout-2']) ? $instance['newspaperup-select-layout-2'] : 'list';

            $number_of_posts_1 =  4;
            $number_of_posts_2 =  4;
            // open the widget container
            echo $args['before_widget'];
            ?>
            <div class="double-category-posts d-grid column2">
                <div class="colinn <?php echo esc_attr($layout_1); ?>">
                    <?php newspaperup_widget_title($title_1);
                    $all_posts = newspaperup_get_posts($number_of_posts_1, $category_1);
                    $count_1 = 1;

                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            if ($count_1 == 1) {
                                $thumbnail_size = 'newspaperup-medium';
                            } else {
                                $thumbnail_size = 'thumbnail';
                            }
                            global $post;
                            $url = newspaperup_get_freatured_image_url($post->ID, $thumbnail_size);

                            if ($url == '') {
                                $img_class = 'no-image';
                            }
                            global $post; ?>
                            
                            <div class="small-post clearfix bs-post-<?php echo esc_attr($count_1); ?>">
                                <!-- small_post --> 
                                <div class="img-small-post back-img hlgr" style="background-image: url('<?php echo esc_url($url); ?>');">
                                    <a href="<?php the_permalink();?>" class="link-div"></a>
                                </div>
                                <!-- // img-small-post -->
                                <div class="small-post-content">
                                    <?php newspaperup_post_categories(); ?>
                                    <!-- small-post-content -->
                                    <h5 class="title<?php echo ($count_1 == 1) ? ' lg' : '' ;?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <?php if($count_1 == 1) {
                                        newspaperup_post_meta();
                                        newspaperup_posted_content(); wp_link_pages(); 
                                        $newspaperup_readmore_excerpt=get_theme_mod('newspaperup_blog_content','excerpt');
                                        $read_more_title = get_theme_mod('newspaperup_post_read_more_title','Read More'); 
                                        $post_btn_disable = get_theme_mod('newspaperup_post_read_more_disable',true);
                                        if (  ($newspaperup_readmore_excerpt=="excerpt") && ($post_btn_disable == true) ){?>
                                        <p><a href="<?php the_permalink();?>" class="btn btn-one more-link" data-text="<?php echo esc_html($read_more_title); ?>"><?php echo esc_html($read_more_title); ?></a></p>
                                    <?php } } else { ?>
                                    <div class="bs-blog-meta">
                                        <?php newspaperup_date_content(); ?>
                                    </div>
                                    <?php } ?>
                                    <!-- // title_small_post -->
                                </div>
                                <!-- // small-post-content -->
                            </div>
                            <!-- // small_post -->
                            <?php
                            $count_1++;
                        endwhile; ?>
                    <?php endif;
                wp_reset_postdata(); ?>
                </div>

                <div class="colinn <?php echo esc_attr($layout_2); ?>">
                    <?php newspaperup_widget_title($title_2);
                    $all_posts = newspaperup_get_posts($number_of_posts_2, $category_2);
                        $count_2 = 1;
                        if ($all_posts->have_posts()) :
                            while ($all_posts->have_posts()) : $all_posts->the_post();
                                if ($count_2 == 1) {
                                    $thumbnail_size = 'newspaperup-medium';
                                } else {
                                    $thumbnail_size = 'thumbnail';
                                }

                                global $post;
                                $url = newspaperup_get_freatured_image_url($post->ID, $thumbnail_size);

                                if ($url == '') {
                                    $img_class = 'no-image';
                                }

                                global $post;?>

                                <div class="small-post clearfix bs-post-<?php echo esc_attr($count_2); ?>">
                                    <!-- small_post --> 
                                    <div class="img-small-post back-img hlgr" style="background-image: url('<?php echo esc_url($url); ?>');">
                                        <a href="<?php the_permalink();?>" class="link-div"></a>
                                    </div>
                                    <!-- // img-small-post -->
                                    <div class="small-post-content">
                                        <?php newspaperup_post_categories(); ?>
                                        <!-- small-post-content -->
                                        <h5 class="title<?php echo ($count_2 == 1) ? ' lg' : '' ;?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <?php if($count_2 == 1) { ?>
                                        <?php newspaperup_post_meta(); ?>
                                        <!-- // title_small_post -->
                                        <?php newspaperup_posted_content(); wp_link_pages( ); 
                                            $newspaperup_readmore_excerpt=get_theme_mod('newspaperup_blog_content','excerpt');
                                            $read_more_title = get_theme_mod('newspaperup_post_read_more_title','Read More');  
                                            $post_btn_disable = get_theme_mod('newspaperup_post_read_more_disable',true);
                                            if (  ($newspaperup_readmore_excerpt=="excerpt") && ($post_btn_disable == true) ) { ?>
                                            <p><a href="<?php the_permalink();?>" class="btn btn-one more-link" data-text="<?php echo esc_html($read_more_title); ?>"><?php echo esc_html($read_more_title); ?></a></p>
                                        <?php } } else { ?>
                                        <div class="bs-blog-meta">
                                            <?php newspaperup_date_content(); ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!-- // small-post-content -->                                         
                                </div> <!-- // small_post -->                                   
                                <?php $count_2++;
                            endwhile;
                        endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <?php
            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;

            //print_pre($terms);

            $categories = newspaperup_get_terms();

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newspaperup_generate_text_input('newspaperup-categorised-posts-title-1', __('Title 1', 'newspaperup'), 'Double Categories Posts 1');
                echo parent::newspaperup_generate_select_options('newspaperup-select-category-1', __('Select category 1', 'newspaperup'), $categories);

                echo parent::newspaperup_generate_text_input('newspaperup-categorised-posts-title-2', __('Title 2', 'newspaperup'), 'Double Categories Posts 2');
                echo parent::newspaperup_generate_select_options('newspaperup-select-category-2', __('Select category 2', 'newspaperup'), $categories);

            }

            //print_pre($terms);


        }

    }
endif;