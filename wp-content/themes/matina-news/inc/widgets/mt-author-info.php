<?php
/**
 * Widget for display author info.
 *
 * @package Matina News
 */

class Matina_News_Author_Info extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname'                     => 'matina-news-widget matina_news_author_info',
            'description'                   => __( 'Display author info.', 'matina-news' ),
            'customize_selective_refresh'   => true,
        );
        parent::__construct( 'matina_news_author_info', __( 'MT: Author Info', 'matina-news' ), $widget_ops );

        add_action( 'admin_enqueue_scripts', array( $this, 'mt_admin_widget_scripts' ) );
    }

    /**
     * function to enqueue required scripts and styles
     */
    public function mt_admin_widget_scripts() {
        global $matina_news_theme_version;
        wp_enqueue_style( 'matina-news-widget-style', get_template_directory_uri() . '/inc/widgets/assets/css/mt-admin-widget.css', '', esc_attr( $matina_news_theme_version ), 'all' );

        wp_enqueue_script( 'matina-news-widget-script', get_template_directory_uri() . '/inc/widgets/assets/js/mt-admin-widget.js', array( 'jquery' ), esc_attr( $matina_news_theme_version ), true );

    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

         $fields = array(
            'title' => array(
                'matina_news_widgets_name'               => 'title',
                'matina_news_widgets_title'              => __( 'Widget Title', 'matina-news' ),
                'matina_news_widgets_default'            => __( 'About Me', 'matina-news' ),
                'matina_news_widgets_field_type'         => 'title',
                'matina_news_widget_field_placeholder'   => __( 'Widget Title', 'matina-news' )
            ),

            'widget_cover_image' => array(
                'matina_news_widgets_name'               => 'widget_cover_image',
                'matina_news_widgets_title'              => __( 'Cover Image', 'matina-news' ),
                'matina_news_widgets_default'            => '',
                'matina_news_widgets_field_type'         => 'upload',
            ),

            'author_profile_image' => array(
                'matina_news_widgets_name'               => 'author_profile_image',
                'matina_news_widgets_title'              => __( 'Profile Image', 'matina-news' ),
                'matina_news_widgets_default'            => '',
                'matina_news_widgets_field_type'         => 'upload',
            ),

            'author_name' => array(
                'matina_news_widgets_name'               => 'author_name',
                'matina_news_widgets_title'              => __( 'Author Name', 'matina-news' ),
                'matina_news_widgets_field_type'         => 'title',
            ),

            'author_designation' => array(
                'matina_news_widgets_name'               => 'author_designation',
                'matina_news_widgets_title'              => __( 'Author Designation', 'matina-news' ),
                'matina_news_widgets_field_type'         => 'text',
            ),

            'author_bio_info' => array(
                'matina_news_widgets_name'               => 'author_bio_info',
                'matina_news_widgets_title'              => __( 'Author Biographical Info', 'matina-news' ),
                'matina_news_widgets_field_type'         => 'textarea',
            ),

            'author_social_icons' => array(
                'matina_news_widgets_name'               => 'author_social_icons',
                'matina_news_widgets_title'              => sprintf( wp_kses_post( 'Checked to enable social icons managed from %1$s.', 'matina-news' ), '<a href="'. esc_url( admin_url( 'customize.php' ).'?autofocus[section]=matina_news_section_social_icons' ) .'" target="_blank">customizer</a>' ),
                'matina_news_widgets_field_type'         => 'checkbox',
            ),
        );

        return $fields;

    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        
        if ( empty( $instance ) ) {
            return;
        }

        $widget_title           = empty( $instance['title'] ) ? '' : $instance['title'];
        $cover_image            = empty( $instance['widget_cover_image'] ) ? null : $instance['widget_cover_image'];
        $profile_image          = empty( $instance['author_profile_image'] ) ? null : $instance['author_profile_image'];
        $author_name            = empty( $instance['author_name'] ) ? '' : $instance['author_name'];
        $author_designation     = empty( $instance['author_designation'] ) ? '' : $instance['author_designation'];
        $author_bio_info        = empty( $instance['author_bio_info'] ) ? '' : $instance['author_bio_info'];
        $author_social_icons    = empty( $instance['author_social_icons'] ) ? '' : $instance['author_social_icons'];


        if ( is_numeric( $cover_image ) ) {
            $cover_image = wp_get_attachment_image_src( $cover_image, 'large' );
            $cover_image = $cover_image[0];
        }

        if ( is_numeric( $profile_image ) ) {
            $profile_image = wp_get_attachment_image_src( $profile_image, 'thumbnail' );
            $profile_image = $profile_image[0];
        }

        $widget_class = 'mt-aside author-info-wrapper mt-clearfix';

        echo $before_widget;
    ?>
        <div class="<?php echo esc_attr( $widget_class ); ?>">
            <?php
                if ( ! empty( $widget_title ) ) {
                    echo $before_title . esc_html( $widget_title ) . $after_title;
                }
            ?>
            <div class="author-main-content-wrapper">
                <?php if ( ! empty( $cover_image ) ) { ?>
                    <figure class="author-cover-image" style="background-image:url( <?php echo esc_url( $cover_image ); ?> )"></figure>
                <?php } ?>
                <?php if ( ! empty( $profile_image ) ) { ?>
                    <figure class="author-profile-image" style="background-image:url( <?php echo esc_url( $profile_image ); ?> )"></figure>
                <?php } ?>
                <div class="author-content-wrap">
                    <h3 class="author-title"><?php echo esc_html( $author_name ); ?></h3>
                    <span class="author-designation"><?php echo esc_html( $author_designation ); ?></span>
                    <div class="author-bio-info"><?php echo wp_kses_post( $author_bio_info ); ?></div>
                    <?php
                        if ( !empty( $author_social_icons ) && '1' == $author_social_icons ) {
                            matina_news_social_icons();
                        }
                    ?>
                </div><!-- .author-content-wrap -->
            </div><!-- .author-main-content-wrapper -->
        </div><!-- .mt-aside author-info-wrapper -->
    <?php
    
        echo $after_widget;

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    matina_news_widgets_updated_field_value()      defined in mt-widgets-helper.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$matina_news_widgets_name] = matina_news_widgets_updated_field_value( $widget_field, $new_instance[$matina_news_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    matina_news_widgets_show_widget_field()        defined in mt-widgets-helper.php
     */
    public function form( $instance ) {

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );

            if ( empty( $instance ) && isset( $matina_news_widgets_default ) ) {
                $matina_news_widgets_field_value = $matina_news_widgets_default;
            } elseif ( empty( $instance ) ) {
                $matina_news_widgets_field_value = '';
            } else {
                $matina_news_widgets_field_value = $instance[$matina_news_widgets_name];
            }
            matina_news_widgets_show_widget_field( $this, $widget_field, $matina_news_widgets_field_value );
        }
    }

}