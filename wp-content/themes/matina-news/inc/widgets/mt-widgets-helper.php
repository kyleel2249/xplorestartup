<?php
/**
 * Define custom fields for widgets
 * 
 * @package Matina News
 */


if ( ! function_exists( 'matina_news_widgets_show_widget_field' ) ) :

    /**
     * function to display the widget fields
     *
     * @since 1.0.0
     */
    function matina_news_widgets_show_widget_field( $instance = '', $widget_field = '', $matina_news_widget_field_value = '' ) {

        extract( $widget_field );
        $matina_news_widget_field_wrapper        = isset( $matina_news_widget_field_wrapper ) ? $matina_news_widget_field_wrapper : '';
        $matina_news_widget_field_relation = isset( $matina_news_widget_field_relation ) ? $matina_news_widget_field_relation : array();
        $matina_news_widget_relation_json  = wp_json_encode( $matina_news_widget_field_relation );
        $matina_news_widget_relation_class = ( $matina_news_widget_field_relation ) ? 'matina_news_widget_field_relation' : '';
        $matina_news_widget_field_placeholder    = isset( $matina_news_widget_field_placeholder ) ? $matina_news_widget_field_placeholder : '';

        switch ( $matina_news_widgets_field_type ) {

            /**
             * Widget title field
             *
             * @since 1.0.0
             */
            case 'title' :
            ?>
                <p class="mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                    <label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label>
                    <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ); ?>" type="text" placeholder="<?php echo esc_html( $matina_news_widget_field_placeholder ); ?>" value="<?php echo esc_html( $matina_news_widget_field_value ); ?>" />

                    <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                       <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                    <?php } ?>
                </p>
            <?php
                break;

            /**
             * Widget text field
             *
             * @since 
             */
            case 'text' :
            ?>
                <p class="mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                    <label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label>
                    <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ); ?>" type="text" placeholder="<?php echo esc_html( $matina_news_widget_field_placeholder ); ?>" value="<?php echo esc_html( $matina_news_widget_field_value ); ?>" />

                    <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                       <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                    <?php } ?>
                </p>
            <?php
                break;

            /**
             * Widget textarea field
             */
            case 'textarea' :
            ?>
                <p class="mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                    <label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label>

                    <textarea class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ); ?>"><?php echo wp_kses_post( $matina_news_widget_field_value ); ?></textarea>
                    <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                       <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                    <?php } ?>
                </p>
            <?php
                break;

            /**
             * Widget number field
             *
             * @since 1.0.0
             */
            case 'number' :
            ?>
                <p class="mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                    <label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label>
                    <input name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ); ?>" type="number" step="1" min="-1" id="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>" value="<?php echo intval( $matina_news_widget_field_value ); ?>" class="small-text" />

                    <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                       <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                    <?php } ?>
                </p>
            <?php
                break;

            /**
             * Widget check box field
             *
             * @since 1.0.0
             */
            case 'checkbox' :
            ?>
                <p class="mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                    <input id="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ); ?>" type="checkbox" value="1" class="widefat <?php echo esc_attr( $matina_news_widget_relation_class ); ?>" data-relations="<?php echo esc_attr( $matina_news_widget_relation_json ) ?>" <?php checked( '1', $matina_news_widget_field_value ); ?>/>
                    <label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo wp_kses_post( $matina_news_widgets_title ); ?></label>

                    <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                       <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                    <?php } ?>
                </p>
            <?php
                break;

            /**
             * Widget select field
             *
             * @since 1.0.0
             */
            case 'select' :
            ?>
                <p class="mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                    <label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label>
                    <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                       <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                    <?php } ?>
                    <select name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>" class="widefat <?php echo esc_attr( $matina_news_widget_relation_class ); ?>" data-relations="<?php echo esc_attr( $matina_news_widget_relation_json ) ?>">
                        <?php foreach ( $matina_news_widgets_field_options as $select_option_name => $select_option_title ) { ?>
                            <option value="<?php echo esc_attr( $select_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $select_option_name ) ); ?>" <?php selected( $select_option_name, $matina_news_widget_field_value ); ?>><?php echo esc_html( $select_option_title ); ?></option>
                        <?php } ?>
                    </select>
                </p>
            <?php 
                break;

            /**
             * widget field category dropdown
             *
             * @since 1.0.0
             */
            case 'category_dropdown' :
                $select_field = 'name="'. esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ) .'" id="'. esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ) .'" class="widefat"';
            ?>
                    <p class="post-cat mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                        <label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label>
                        <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                           <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                        <?php }

                            $dropdown_args = wp_parse_args( array(
                                'taxonomy'          => 'category',
                                'show_option_none'  => __( '- - Select Category - -', 'matina-news' ),
                                'selected'          => esc_attr( $matina_news_widget_field_value ),
                                'show_option_all'   => '',
                                'orderby'           => 'id',
                                'order'             => 'ASC',
                                'show_count'        => 1,
                                'hide_empty'        => 1,
                                'child_of'          => 0,
                                'exclude'           => '',
                                'hierarchical'      => 1,
                                'depth'             => 0,
                                'tab_index'         => 0,
                                'hide_if_empty'     => false,
                                'option_none_value' => 0,
                                'value_field'       => 'slug',
                            ) );

                            $dropdown_args['echo'] = false;

                            $dropdown = wp_dropdown_categories( $dropdown_args );
                            $dropdown = str_replace( '<select', '<select ' . $select_field, $dropdown );
                            echo $dropdown;
                        ?>
                    </p>
            <?php
                break;

            /**
             * Widget multi_term_list field
             */
            case 'multi_term_list':
            ?>
                <div class="mt-widget-field-wrapper <?php echo esc_attr( $matina_news_widget_field_wrapper ); ?>">
                <label class="multicheckbox-label"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label>
                <ul class="mt-multiple-checkbox">

            <?php
                /**
                 * see more here https://developer.wordpress.org/reference/functions/get_terms/
                 *
                 * @since 1.0.0
                 */
                if ( taxonomy_exists( $matina_news_widgets_taxonomy_type ) ) {
                    $args = array(
                        'taxonomy'      => $matina_news_widgets_taxonomy_type,
                        'hide_empty'    => false,
                        'number'        => 999,
                    );

                    $all_terms = get_terms( $args );
                    if ( $all_terms ) {

                        foreach ( $all_terms as $single_term ) {
                            $term_slug = $single_term->slug;
                            $term_name = $single_term->name;
                            $term_count = $single_term->count;
            ?>
                            <li>
                                <input id="<?php echo esc_attr( $instance->get_field_id( $term_slug ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ).'[]' ); ?>" type="checkbox" value="<?php echo esc_attr( $term_slug ); ?>" <?php checked( in_array( $term_slug, (array )$matina_news_widget_field_value ) ); ?>/>
                                <label for="<?php echo esc_attr( $instance->get_field_id( $term_slug ) ); ?>"><?php echo esc_html( $term_name ). ' ('. absint( $term_count ) .')'; ?></label>
                            </li>
            <?php
                        }
                    } else {
                        echo '<span>'. esc_html__( 'No terms found in this taxonomy', 'matina-news' ) .'</span>';
                    }
                } else {
                    echo '<span>'. esc_html__( 'Selected taxonomy doesn\'t exist', 'matina-news' ) .'</span>';
                }
            ?>
                </ul>
                <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                   <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                <?php }
                echo '</div>';
                    break;

            /**
             * Widget selector field
             *
             * @since 1.0.0
             */
            case 'selector':
                if ( empty( $matina_news_widget_field_value ) ) {
                    $matina_news_widget_field_value = $matina_news_widgets_default;
                }
            ?>
                <p><span class="field-label"><label class="field-title"><?php echo esc_html( $matina_news_widgets_title ); ?></label></span></p>
            <?php            
                echo '<div class="selector-labels">';
                foreach ( $matina_news_widgets_field_options as $key => $value ) {
                    $img_path = $value['img_path'];
                    $class = ( $matina_news_widget_field_value == $key ) ? 'selector-selected': '';
                    echo '<label class="'. esc_attr( $class ) .'" data-val="'. esc_attr( $key ) .'">';
                    echo '<img src="'. esc_url( $value['img_path'] ) .'" title="'. esc_attr( $value['label'] ) .'" alt="'. esc_attr( $value['label'] ) .'"/>';
                    echo '</label>';
                }
                echo '</div>';
                echo '<input data-default="'. esc_attr( $matina_news_widget_field_value ) .'" type="hidden" value="'. esc_attr( $matina_news_widget_field_value ) .'" name="'. esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ) .'"/>';
                break;

            /**
             * Widget upload field
             */
            case 'upload':
                $image = $image_class = "";
                if ( $matina_news_widget_field_value ) { 
                    $image          = '<img src="'.esc_url( $matina_news_widget_field_value ).'" style="max-width:100%;"/>';
                    $image_class    = ' hidden';
                }
            ?>
                <div class="attachment-media-view">

                    <p>
                        <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>"><?php echo esc_html( $matina_news_widgets_title ); ?>:</label></span>
                    </p>
                    
                    <div class="placeholder<?php echo esc_attr( $image_class ); ?>">
                        <?php esc_html_e( 'No image selected', 'matina-news' ); ?>
                    </div>
                    <div class="thumbnail thumbnail-image">
                        <?php echo $image; ?>
                    </div>

                    <div class="actions mt-clearfix">
                        <button type="button" class="button mt-delete-button align-left"><?php esc_html_e( 'Remove', 'matina-news' ); ?></button>
                        <button type="button" class="button mt-upload-button alignright"><?php esc_html_e( 'Select Image', 'matina-news' ); ?></button>
                        
                        <input name="<?php echo esc_attr( $instance->get_field_name( $matina_news_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $matina_news_widgets_name ) ); ?>" class="upload-id" type="hidden" value="<?php echo esc_url( $matina_news_widget_field_value ); ?>"/>
                    </div>

                    <?php if ( isset( $matina_news_widgets_description ) ) { ?>
                       <span class="field-description"><em><?php echo wp_kses_post( $matina_news_widgets_description ); ?></em></span>
                    <?php } ?>

                </div>
            <?php
                break;
        }

    }

endif;

if ( ! function_exists( 'matina_news_widgets_updated_field_value' ) ) :

    /**
     * function to manage the sanitize widget filed value
     *
     * @since 1.0.0 
     *
     */
    function matina_news_widgets_updated_field_value( $widget_field, $new_field_value ) {

        extract( $widget_field );

        if ( $matina_news_widgets_field_type == 'number') {
            return absint( $new_field_value );
        } elseif ( $matina_news_widgets_field_type == 'textarea' || $matina_news_widgets_field_type == 'title' ) {
            return wp_kses_post( $new_field_value );
        } elseif ( $matina_news_widgets_field_type == 'url' ) {
            return esc_url_raw( $new_field_value );
        } elseif ( $matina_news_widgets_field_type == 'multicheckboxes' ) {
            $multicheck_list = array();
            if ( is_array( $new_field_value ) ) {
                foreach ( $new_field_value as $key => $value ) {
                    $multicheck_list[esc_attr( $key )] = esc_attr( $value );
                }
            }
            return $multicheck_list;
        } elseif ( $matina_news_widgets_field_type == 'multi_term_list' ) {
            $multi_term_list = array();
            if ( is_array( $new_field_value ) ) {
                foreach ( $new_field_value as $key => $value ) {
                    $multi_term_list[] = esc_attr( $value );
                }
            }
            return $multi_term_list;
        } else {
            return sanitize_text_field( $new_field_value );
        }
    }

endif;


if ( ! function_exists( 'matina_news_latest_posts_type_field_options' ) ) :

    /**
     * function to return filed options of latest type of posts.
     *
     * @since 1.0.0
     */
    function matina_news_latest_posts_type_field_options() {
        $field_options = apply_filters( 'matina_news_latest_posts_type_field_options', array(
                'latest'        => __( 'Latest Posts', 'matina-news' ),
                'random'        => __( 'Random Posts', 'matina-news' ),
                'category'      => __( 'Single Category', 'matina-news' ),
                'categories'    => __( 'Multiple Categories', 'matina-news' ),
                'popular'       => __( 'Popular Posts', 'matina-news' ),
            )
        );

        return $field_options;
    }

endif;

if ( ! function_exists( 'matina_news_random_posts_range_field_options' ) ) :

    /**
     * function to return filed options of random posts range.
     *
     * @since 1.0.0
     */
    function matina_news_random_posts_range_field_options() {
        $field_options = apply_filters( 'matina_news_random_posts_range_field_options', array(
                'daily'     => __( 'Last 24 hours', 'matina-news' ),
                'weekly'    => __( 'Last 7 days', 'matina-news' ),
                'monthly'   => __( 'Last 30 days', 'matina-news' ),
                'yearly'    => __( 'Last 365 days', 'matina-news' ),
                'all'       => __( 'All time', 'matina-news' ),
            )
        );

        return $field_options;
    }

endif;

if ( ! function_exists( 'matina_news_popular_posts_sort_field_options' ) ) :

    /**
     * function to return filed options of popular posts sort.
     *
     * @since 1.0.0
     */
    function matina_news_popular_posts_sort_field_options() {
        $field_options = apply_filters( 'matina_news_popular_posts_sort_field_options', array(
                'views'     => __( 'Total Views', 'matina-news' ),
                'comment'   => __( 'Comments', 'matina-news' )
            )
        );

        return $field_options;
    }

endif;
