<?php
if (!class_exists('Newspaperup_Latest_Post')) :
    /**
     * Adds Newspaperup_Latest_Post widget.
     */
    class Newspaperup_Latest_Post extends Newspaperup_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('newspaperup-categorised-posts-title','bg_color', 'text_color', 'bor_color', 'newspaperup-posts-number');
            $this->select_fields = array('newspaperup-select-category');

            $widget_ops = array(
                'classname' => 'latstpost-widget hori',
                'description' => __('Displays posts from selected category in single column.', 'newspaperup'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('newspaperup_latest_post', __('AR: Latest News Post', 'newspaperup'), $widget_ops);
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
            $number_of_posts = isset($instance['newspaperup-posts-number']) ? $instance['newspaperup-posts-number'] : '5';
            $loop_off = 0;
            $blog_post_layout = (get_theme_mod('blog_post_layout','list-layout'));
            $layout = esc_attr(get_theme_mod('newspaperup_archive_page_layout','align-content-right')) == 'full-width-content' ? '3': '2';
            // open the widget container
            echo $args['before_widget'];

            ?>

            <!-- bs-posts-sec bs-posts-modul-6 -->
            <div class="latest-post-widget<?php if ( ! empty( $title ) ) { echo ' wd-back'; } ?>">
            <?php newspaperup_widget_title($title); ?>
                <?php
                $all_posts = newspaperup_get_posts( -1 , $category);
                ?>
                <!-- bs-posts-sec-inner -->
                    <?php
                    if($blog_post_layout == 'list-layout'){
                        echo '<div id="list" class="d-grid">';
                        if ($all_posts->have_posts()) :
                            while ($all_posts->have_posts()) : $all_posts->the_post();
                            if($loop_off < $number_of_posts){
                                global $post; 
                                 get_template_part('sections/content','data'); ?>
                                <?php } else {
                                    $visibility = ' hide-content';
                                       get_template_part('sections/content','data', array('visibility' => $visibility) );
                                } $loop_off++; ?>
                        <?php endwhile; ?>
                    <?php endif;
                    echo'</div>';
                    } else {
                    ?><div id="grid" class="d-grid column<?php echo esc_attr($layout)?>"><?php
                        if ($all_posts->have_posts()) :
                            while ($all_posts->have_posts()) : $all_posts->the_post();
                            if($loop_off < $number_of_posts){
                                global $post; 
                                 get_template_part('sections/content','dataGrid'); ?>
                                <?php } else {
                                    $visibility = 'hide-content';
                                       get_template_part('sections/content','dataGrid', array('visibility' => $visibility) );
                                } $loop_off++; ?>
                        <?php endwhile; ?>
                    <?php endif;
                    ?></div><?php
                    }
                wp_reset_postdata(); ?>
                <!-- // bs-posts-sec-inner -->
            </div> <!-- // bs-posts-sec block_6 -->
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

            $categories = newspaperup_get_terms();
            $number_of_posts = isset($instance['newspaperup-posts-number']) ? $instance['newspaperup-posts-number'] : '5';

            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::newspaperup_generate_text_input('newspaperup-categorised-posts-title', 'Title', 'Latest News');

                echo parent::newspaperup_generate_select_options('newspaperup-select-category', __('Select Category', 'newspaperup'), $categories);

                echo parent::newspaperup_generate_text_input('newspaperup-posts-number', __('Number of Post to Show', 'newspaperup'), $number_of_posts);
            }

        }
    }
endif;