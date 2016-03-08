<?php
/**
 * Template Functions
 *
 * @package     Theme Buy Button
 * @subpackage  Functions/Includes
 */



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



/**
 * Returns the path to the ekb templates directory
 */
function theme_action_bar_output() {
	if ( get_theme_mod( 'tbb_button_url' ) ) {

		if( !$_SERVER['HTTP_REFERER'] == esc_url( the_permalink() ) ) :

			echo '<aside id="theme-buy-button--wrapper">';
				echo '<a id="theme-buy-button" class="theme-buy-button" target="_blank" href="'.esc_url( get_theme_mod( 'tbb_button_url' ) ).'">'.esc_html( get_theme_mod( 'tbb_button_text' ) ).'';

				if ( get_theme_mod( 'tbb_button_price' ) ) {
					echo '<span class="theme-buy-button--price"><abbr title="United States Dollars">$</abbr>'.esc_html( get_theme_mod( 'tbb_button_price' ) ).'</span>';
				};

				echo '</a>';
			echo '</aside>';

		endif; 
	}
}

add_action( 'wp_footer', 'theme_action_bar_output', 100 );



/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function theme_action_bar_customize_register( $wp_customize ) {


	/**
	 * Top-Level Customizer sections and panels.
	 */
	
	$wp_customize->add_section( 'theme_action_bar_options', array(
		'title' 				=> esc_html__( 'Buy Button', 'theme-action-bar' ),
		'description' 			=> esc_html__( 'Add your purchase link and button text', 'theme-action-bar' ),
		'priority' 			    => 120, //Near the very end of the Customizer.
	) );

	$wp_customize->add_setting( 'tbb_button_text', array(
		'default'           	=> 'Buy this theme',
		'sanitize_callback' 	=> 'esc_html',
	) );

	$wp_customize->add_control( 'tbb_button_text', array(
		'type' 				    => 'text',
		'label'       			=> esc_html__( 'Button', 'theme-action-bar' ),
		'description' 			=> esc_html__( '', 'theme-action-bar' ),
		'section' 			    => 'theme_action_bar_options',
	) );

	$wp_customize->add_setting( 'tbb_button_url', array(
		'default'           	=> 'http://',
		'sanitize_callback' 	=> 'esc_url_raw',
	) );

	$wp_customize->add_control( 'tbb_button_url', array(
		'type' 				    => 'url',
		'label'       			=> esc_html__( 'Theme Purchase Link', 'theme-action-bar' ),
		'description' 			=> esc_html__( '', 'theme-action-bar' ),
		'section' 			    => 'theme_action_bar_options',
	) );

	$wp_customize->add_setting( 'tbb_button_price', array(
		'default'           	=> '',
		'sanitize_callback' 	=> 'esc_html',
	) );

	$wp_customize->add_control( 'tbb_button_price', array(
		'type' 				    => 'text',
		'label'       			=> esc_html__( 'Theme Price', 'theme-action-bar' ),
		'description' 			=> esc_html__( '', 'theme-action-bar' ),
		'section' 			    => 'theme_action_bar_options',
	) );
}

add_action( 'customize_register', 'theme_action_bar_customize_register', 11 );