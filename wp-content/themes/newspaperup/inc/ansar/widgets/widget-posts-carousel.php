<?php
if (!class_exists('Newspaperup_Posts_Carousel')) :
    /**
     * Adds Newspaperup_Posts_Carousel widget.
     */
    class Newspaperup_Posts_Carousel extends Newspaperup_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 0.1
         */
        function __construct()
        {
            $this->text_fields = array('newspaperup-posts-slider-title');
            $this->select_fields = array('newspaperup-select-category');

            $widget_ops = array(
                'classname' => 'bs-slider-widget',
                'description' => __('Displays posts carousel from selected category.', 'newspaperup'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('newspaperup_posts_carousel', __('AR: Posts Carousel', 'newspaperup'), $widget_ops);
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

            $title = apply_filters('widget_title', $instance['newspaperup-posts-slider-title'], $instance, $this->id_base);
            $category = isset($instance['newspaperup-select-category']) ? $instance['newspaperup-select-category'] : '0';

            // open the widget container
            echo  '<!-- Start Post Carousel Widget -->' .$args['before_widget'];
            ?> 
            <div class="bs-slider-widget wd-back">
            <?php newspaperup_widget_title($title);
                    $all_posts = newspaperup_get_posts(5 , $category);
                    ?>
                    <!-- bs-posts-sec-inner -->
                    <div class="bs-posts-sec-inner">
                        <!-- featured_cat_slider -->
                        <div class="featured_cat_slider bs swiper-container">
                            <div class="swiper-wrapper ">
                                <?php
                                if ($all_posts->have_posts()) :
                                while ($all_posts->have_posts()) : $all_posts->the_post();
                                    global $post;
                                    $url = newspaperup_get_freatured_image_url($post->ID, 'newspaperup-medium'); ?>
                                    <!-- item -->
                                    <div class="swiper-slide">
                                        <!-- blog card-->
                                        <div class="bs-blog-post bshre">
                                            <div class="bs-blog-thumb lg back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
                                                <a href="<?php the_permalink(); ?>" class="link-div"></a>
                                                <?php newspaperup_post_categories(); ?>
                                            </div> 
                                            <article class="small">
                                                <div class="title-wrap">
                                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="btn-wrap">
                                                        <a href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <?php newspaperup_post_meta(); ?>
                                            </article>
                                        </div>
                                        <!-- blog -->
                                    </div>
                                    <!-- // item -->
                                <?php
                                endwhile;
                                endif;
                                wp_reset_postdata(); ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div> <!-- // featured_cat_slider -->
                    </div> <!-- // bs-posts-sec-inner -->
            </div>

            <?php
            //print_pre($all_posts);

            // close the widget container
            echo $args['after_widget']. '<!-- End Post Carousel Widget -->';
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

            $categories = newspaperup_get_terms();
            
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry

                echo parent::newspaperup_generate_text_input('newspaperup-posts-slider-title', __('Title', 'newspaperup'), 'Posts Carousel');

                echo parent::newspaperup_generate_select_options('newspaperup-select-category', __('Select category', 'newspaperup'), $categories);

            }
        }
    }
endif;