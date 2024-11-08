<?php
/**
 * Theme functions and definitions.
 * 
 * Main Newspaperup class.
 *
 */
final class Newspaperup {

	public $options;

	public $fonts;

	public $icons;

	public $customizer;

	public $admin;

	private static $instance;

	public $version = '0.2';

	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Newspaperup ) ) {
			self::$instance = new Newspaperup();
			self::$instance->constants();
			self::$instance->includes();
		}
		return self::$instance;
	}

	/**
	 * Setup constants.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	private function constants() {
		// Theme version.
		$newspaperup_theme = wp_get_theme();
		if ( ! defined( 'NEWSPAPERUP_THEME_DIR' ) ) {
			define( 'NEWSPAPERUP_THEME_DIR', get_template_directory() . '/' );
		}
		if ( ! defined( 'NEWSPAPERUP_THEME_URI' ) ) {
			define( 'NEWSPAPERUP_THEME_URI', get_template_directory_uri() . '/' );
		}
		if ( ! defined( 'NEWSPAPERUP_THEME_VERSION' ) ) {
			define( 'NEWSPAPERUP_THEME_VERSION', $newspaperup_theme->get( 'Version' ) );
		} 
		if ( ! defined( 'NEWSPAPERUP_THEME_NAME' ) ) {
			define( 'NEWSPAPERUP_THEME_NAME'   , $newspaperup_theme->get( 'Name' ) );
		} 
	}
	/**
	 * Include files.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function includes() {
	
		$newspaperup_theme_path = NEWSPAPERUP_THEME_DIR . '/inc/ansar/';
	
		require( $newspaperup_theme_path . '/custom-navwalker-class.php' );
		require( $newspaperup_theme_path . '/default_menu_walker.php' );
		require( $newspaperup_theme_path . '/font/font.php');
		require( $newspaperup_theme_path . '/template-tags.php');
		require( $newspaperup_theme_path . '/template-functions.php');
		require( $newspaperup_theme_path . '/widgets/widgets-common-functions.php');
		require( $newspaperup_theme_path . '/custom-control/custom-control.php');
		require( $newspaperup_theme_path . '/custom-control/font/font-control.php');
		require_once NEWSPAPERUP_THEME_DIR . '/inc/ansar/customizer-admin/admin-plugin-install.php';
		require_once( trailingslashit( NEWSPAPERUP_THEME_DIR ) . 'inc/ansar/customize-pro/class-customize.php' );
	
		/*-----------------------------------------------------------------------------------*/
		/*	Enqueue scripts and styles.
		/*-----------------------------------------------------------------------------------*/

		require( $newspaperup_theme_path .'/core/class-newspaperup-enqueue.php');

		new Newspaperup_Enqueue_Scripts();

		/* ----------------------------------------------------------------------------------- */
		/* Customizer Layout*/
		/* ----------------------------------------------------------------------------------- */

		require( $newspaperup_theme_path . '/custom-control/customize_layout.php');

		/* ----------------------------------------------------------------------------------- */
		/* Customizer */
		/* ----------------------------------------------------------------------------------- */

		require( $newspaperup_theme_path . '/customize/customizer.php');

		/* ----------------------------------------------------------------------------------- */
		/* Load customize control classes */
		/* ----------------------------------------------------------------------------------- */

		require( $newspaperup_theme_path . '/customize/customize-control-class.php');
	
		/* ----------------------------------------------------------------------------------- */
		/* Widget initialize */
		/* ----------------------------------------------------------------------------------- */
	
		require( $newspaperup_theme_path  . '/widgets/widgets-init.php');
	
		/* ----------------------------------------------------------------------------------- */
		/* Hook Initialize */
		/* ----------------------------------------------------------------------------------- */
	
		require( $newspaperup_theme_path  . '/hooks/hooks-init.php');
	
		/* ----------------------------------------------------------------------------------- */
		/* custom-color file */
		/* ----------------------------------------------------------------------------------- */

		require( NEWSPAPERUP_THEME_DIR . '/css/colors/theme-options-color.php');
	
		/* ----------------------------------------------------------------------------------- */
		/* custom-dark-color file */
		/* ----------------------------------------------------------------------------------- */

		require( NEWSPAPERUP_THEME_DIR . '/css/colors/theme-options-dark-color.php');

		/* ----------------------------------------------------------------------------------- */
		/* Load theme setup class */
		/* ----------------------------------------------------------------------------------- */

		require_once NEWSPAPERUP_THEME_DIR . '/inc/ansar/core/class-newspaperup-theme-setup.php';
	}
}

function newspaperup() {
	return Newspaperup::instance();
}

newspaperup();