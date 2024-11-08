<?php
if (!function_exists('newspaperup_banner_advertisement')):
    /**
     *
     * @since newspaperup 1.0.0
     *
     */
    function newspaperup_banner_advertisement()
    {

        if (('' != newspaperup_get_option('banner_ad_image')) ) {

            $newspaperup_banner_advertisement = newspaperup_get_option('banner_ad_image');
            $newspaperup_banner_advertisement = absint($newspaperup_banner_advertisement);
            $newspaperup_banner_advertisement = wp_get_attachment_image($newspaperup_banner_advertisement, 'full');
            $banner_ad_url = newspaperup_get_option('banner_ad_url');
            $banner_open_on_new_tab = newspaperup_get_option('banner_open_on_new_tab');
            $banner_open_on_new_tab = ('' != $banner_open_on_new_tab) ? '_blank' : '';
            ?>
            <div class="advertising-banner"> 
                <a class="pull-right img-fluid" href="<?php echo esc_url($banner_ad_url); ?>" target="<?php echo esc_attr($banner_open_on_new_tab); ?>">
                    <?php echo $newspaperup_banner_advertisement; ?>
                </a>  
            </div>
            <?php
        }
    }
endif;

add_action('newspaperup_action_banner_advertisement', 'newspaperup_banner_advertisement', 10);