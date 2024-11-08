<?php
if (!class_exists('Newspaperup_Posts_List')) :
    /**
     * Adds Newspaperup_Posts_List widget.
     */
    class Newspaperup_Posts_List extends Newspaperup_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newspaperup-categorised-posts-title','newspaperup-posts-number');
            $this->select_fields = array('newspaperup-select-category');
            $this->checkboxes = array('newspaperup-count-per-row');

            $widget_ops = array(
                'classname' => 'small-post-list-widget',
                'description' => __('Displays posts from selected category in a list.', 'newspaperup'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('newspaperup_posts_list', __('AR: Posts List', 'newspaperup'), $widget_ops);
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
            $title = apply_filters('widget_title', $instance['newspaperup-categorised-posts-title'], $instance, $this->id_base);
            $category = isset($instance['newspaperup-select-category']) ? $instance['newspaperup-select-category'] : '0';
            $number_of_posts = isset($instance['newspaperup-posts-number']) ? $instance['newspaperup-posts-number'] : 4;
            $per_row = isset($instance['newspaperup-count-per-row']) ? $instance['newspaperup-count-per-row'] : '1';

            // open the widget container
            echo $args['before_widget'];
            ?>
            <div class="small-post-list-widget">
                <?php newspaperup_widget_title($title); ?>
                <div class="small-post-list-inner d-grid column<?php echo esc_attr($per_row);?>"> 
                
                <?php $all_posts = newspaperup_get_posts($number_of_posts, $category);
                    $count = 1;
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                        global $post;
                        $url = newspaperup_get_freatured_image_url($post->ID, 'thumbnail'); ?>
                            <!-- small-list-post -->
                            <div class="small-post mb-0">
                                <?php if($url) { ?>   
                                <div class="img-small-post back-img hlgr" style="background-image: url('<?php echo esc_url($url); ?>');">
                                <a href="<?php the_permalink(); ?>" class="link-div"></a>
                                </div><?php } ?>
                                <!-- // img-small-post -->
                                <div class="small-post-content">
                                <?php newspaperup_post_categories(); ?>
                                <!-- small-post-content -->
                                <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <!-- // title_small_post -->
                                <div class="bs-blog-meta">
                                    <span class="bs-blog-date"><?php echo get_the_date( 'M j , Y' ); ?></span>
                                </div>
                                </div>
                            <!-- // small-post-content -->
                            </div>
                            <?php
                            $count++;
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>                            
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
            $options = array(
                'true' => __('Yes', 'newspaperup'),
                'false' => __('No', 'newspaperup')

            );

            $newspaperup_count_per_row_option = array(
                '1'    => __('1 Post','newspaperup'),
                '2'    => __('2 Posts','newspaperup'),
            );
            $number_of_posts = isset($instance['newspaperup-posts-number']) ? $instance['newspaperup-posts-number'] : 4;

            $categories = newspaperup_get_terms();

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                
                echo parent::newspaperup_generate_text_input('newspaperup-categorised-posts-title', __('Title', 'newspaperup'), __('Posts List', 'newspaperup'));

                echo parent::newspaperup_generate_select_options('newspaperup-select-category', __('Select category', 'newspaperup'), $categories);

                echo parent::newspaperup_generate_text_input('newspaperup-posts-number', __('Number of Posts to Show', 'newspaperup'), $number_of_posts);
                
                echo parent::newspaperup_generate_checkbox_options('newspaperup-count-per-row', __('Post Count Per Row', 'newspaperup'), $newspaperup_count_per_row_option, $note ='', $default="1");

            }
        }
    }
endif;