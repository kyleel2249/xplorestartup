<?php
/**
 * Enqueue and register scripts and styles.
 */
class Newspaperup_Enqueue_Scripts {

	/**
	 * Check if debug is on
	 *
	 * @var boolean
	 */
	private $is_debug;

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		add_action('wp_enqueue_scripts',  array( $this, 'newspaperup_scripts_n_styles',) );

		add_action('admin_enqueue_scripts',  array( $this, 'newspaperup_admin_scripts',) );

		add_action('wp_footer', array( $this, 'newspaperup_custom_js',) );

		add_action('wp_print_footer_scripts',  array( $this, 'newspaperup_skip_link_focus_fix',) );
		
		add_action('customize_controls_print_footer_scripts',  array( $this, 'newspaperup_customizer_scripts',) );
	}

	

	/**
	 * Enqueue styles and scripts.
	 *
	 * @since 1.0.0
	 */

	public function newspaperup_scripts_n_styles() {

		wp_enqueue_style('all-css',get_template_directory_uri().'/css/all.css');
	
		wp_enqueue_style('dark', get_template_directory_uri() . '/css/colors/dark.css');
	
		wp_enqueue_style('core', get_template_directory_uri() . '/css/core.css');
		
		wp_style_add_data('core', 'rtl', 'replace' );
		
		wp_enqueue_style('newspaperup-style', get_stylesheet_uri() );
		
		wp_style_add_data('newspaperup-style', 'rtl', 'replace' );
		
		wp_enqueue_style('wp-core', get_template_directory_uri() . '/css/wp-core.css');
		
		wp_enqueue_style('default', get_template_directory_uri() . '/css/colors/default.css');
	
		wp_enqueue_style('swiper-bundle-css', get_template_directory_uri() . '/css/swiper-bundle.css');
		
		wp_enqueue_style('menu-core-css', get_template_directory_uri() . '/css/sm-core-css.css');
		
		wp_enqueue_style('smartmenus',get_template_directory_uri().'/css/sm-clean.css');	 
	
		/* Js script */
	
		wp_enqueue_script('newspaperup-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'));
	
		wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/js/swiper-bundle.js', array('jquery'));
	
		wp_enqueue_script('sticky-js', get_template_directory_uri() . '/js/hc-sticky.js' , array('jquery'));
	
		wp_enqueue_script('sticky-header-js', get_template_directory_uri() . '/js/jquery.sticky.js' , array('jquery'));
	
		wp_enqueue_script('smartmenus-js', get_template_directory_uri() . '/js/jquery.smartmenus.js');
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	
		wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.min.js', array('jquery'));
	}
	
	public function newspaperup_admin_scripts() {
	
		wp_enqueue_script( 'media-upload' );
	
		wp_enqueue_media();
	
		wp_enqueue_style('newspaperup-admin-style', get_template_directory_uri() . '/css/admin-style.css' );

		wp_enqueue_script('newspaperup-admin-script', get_template_directory_uri() . '/inc/ansar/customizer-admin/js/admin-script.js', array( 'jquery' ), '', true );
		
		wp_localize_script('newspaperup-admin-script', 'newspaperup_ajax_object',
			array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
		);
		
		wp_enqueue_style('newspaperup-admin-style-css', get_template_directory_uri() . '/css/customizer-controls.css');
	}
	
	//Custom Color
	public function newspaperup_custom_js() {
	
		wp_enqueue_script('newspaperup_custom-js', get_template_directory_uri() . '/js/custom.js' , array('jquery'));	
		
		wp_enqueue_script('newspaperup-dark', get_template_directory_uri() . '/js/dark.js' , array('jquery'));
	
		theme_options_color();
	
		theme_options_dark_color();
	}

	/**
	 * Fix skip link focus in IE11.
	 *
	 * This does not enqueue the script because it is tiny and because it is only for IE11,
	 * thus it does not warrant having an entire dedicated blocking script being loaded.
	 *
	 * @link https://git.io/vWdr2
	 */
	public function newspaperup_skip_link_focus_fix() {
		// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
		?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
		<?php
	}

	public function newspaperup_customizer_scripts() {
		wp_enqueue_style( 'newspaperup-customizer-styles', get_template_directory_uri() . '/css/customizer-controls.css' );
		wp_enqueue_style('newspaperup-custom-controls-css', get_template_directory_uri() . '/inc/ansar/customize/css/customizer.css');
	}
}
