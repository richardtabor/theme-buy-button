<?php
/**
 * Scripts
 *
 * @package     Theme Buy Button
 * @subpackage  Includes
 */



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



/**
 * Register Styles & Scripts
 *
 * Checks the styles option and hooks the required filter.
 *
 * @since 1.0
 * @return void
 */
function theme_action_bar_styles_and_scripts() {

	global $wp_version, $post;

	$js_dir  = TAB_PLUGIN_URL . 'js/';
	$css_dir = TAB_PLUGIN_URL . 'css/';

	// Use minified libraries if SCRIPT_DEBUG is turned off.
	// I don't have a min file just yet so the statement does not do much yet. 
	$suffix  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '';

	// Add the main stylesheet.
	wp_enqueue_style( 'theme-buy-button-style', $css_dir . 'theme-buy-button' . $suffix . '.css' );

	// Load the custom plugin javascript functions.
	wp_enqueue_script( 'theme-buy-button-scripts', $js_dir . 'theme-buy-button' . $suffix . '.js', '', '', true );

}
add_action( 'wp_enqueue_scripts', 'theme_action_bar_styles_and_scripts' );





/**
 * Register Styles & Scripts
 *
 * Checks the styles option and hooks the required filter.
 *
 * @since 1.0
 * @return void
 */
function theme_action_bar_optimizely() {

	?>
	<script src="//cdn.optimizely.com/js/621334087.js"></script>
	<?php

}
add_action( 'wp_head', 'theme_action_bar_optimizely' );






