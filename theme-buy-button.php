<?php
/**
 * Plugin Name: Theme Buy Button
 * Plugin URI: http://themebeans.com
 * Description: The easiest way to beautifully display a purchase button set on your WordPress theme demo sites.  
 * Version: 1.0
 * Author: Rich Tabor, ThemeBeans
 * Author URI: http://themebeans.com
 * Text Domain: theme-action-bar
 * License: GPL2
 * Requires at least: 3.5
 * Tested up to: 4.4.1
 *
*/




if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



if ( ! class_exists( 'Theme_Buy_Button' ) ) :



/**
 * Main Theme_Buy_Button Class
 *
 * @package Theme Buy Button
 * @author Richard Tabor (ThemeBeans)
 * @link http://themebeans.com
 */
class Theme_Buy_Button {



	/**
	 * @var Theme_Buy_Button
	 * @since 0.1.0
	 */
	private static $instance;



	/**
	 * Main Theme_Buy_Button Instance
	 *
	 * Ensures only one instance of Theme_Buy_Button is loaded or can be loaded.
	 *
	 * @since  0.1.0
	 * @static
	 * @uses  Theme_Buy_Button::setup_constants() Setup the constants
	 * @uses  Theme_Buy_Button::includes() Include the required files
	 * @uses  Theme_Buy_Button::load_textdomain() Load out text domain
	 * @return  The true Theme_Buy_Button
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Theme_Buy_Button ) ) {
			self::$instance = new Theme_Buy_Button;
			self::$instance->setup_constants();
			self::$instance->includes();
			self::$instance->load_textdomain();
		}
		return self::$instance;
	}



	/**
	 * Throw error on object clone
	 *
	 * Singleton design pattern. Only one object, so no clones for you
	 *
	 * @since  0.1.0
	 * @return  void
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'theme-action-bar' ), '1.0' );
	}



	/**
	 * Setup plugin constants
	 *
	 * @access private
	 * @since 0.1.0
	 * @return void
	 */
	private function setup_constants() {
		// Plugin Version
		if ( ! defined( 'TAB_VERSION' ) )
			define( 'TAB_VERSION', '1.0' );

		// Plugin directory path
		if ( ! defined( 'TAB_PLUGIN_DIR' ) )
			define( 'TAB_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		// Plugin directory URI
		if ( ! defined( 'TAB_PLUGIN_URI' ) )
			define( 'TAB_PLUGIN_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// Plugin Folder URL
		if ( ! defined( 'TAB_PLUGIN_URL' ) ) {
			define( 'TAB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		}
		
		// Plugin root file
		if ( ! defined( 'TAB_PLUGIN_FILE' ) )
			define( 'TAB_PLUGIN_FILE', __FILE__ );
	}



	/**
	 * Include the required files
	 *
	 * @access  private
	 * @since  0.1.0
	 * @return  void
	 */
	private function includes() {
		require_once TAB_PLUGIN_DIR . 'includes/scripts.php';
		require_once TAB_PLUGIN_DIR . 'includes/customizer-functions.php';
	}



	/**
	 * Load the translation files
	 *
	 * @access public
	 * @since 0.1.0
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'theme-action-bar', false, 'theme-action-bar/languages' );
	}

}
endif; // End if class_exists check



/**
 * Returns the main instance of Theme_Buy_Button to prevent the need to use globals.
 * 
 * @return object The one Theme_Buy_Button instance
 */
function Theme_Buy_Button() {
	return Theme_Buy_Button::instance();
}



// Away we go!
Theme_Buy_Button();