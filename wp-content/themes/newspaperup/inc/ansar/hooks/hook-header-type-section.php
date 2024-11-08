<?php if (!function_exists('newspaperup_header_type_section')) :
    /**
     *  Header
     *
     * @since newspaperup
     *
     */
    function newspaperup_header_type_section(){

        newspaperup_header_default_section();
    }
endif;
add_action('newspaperup_action_header_type_section', 'newspaperup_header_type_section', 6);