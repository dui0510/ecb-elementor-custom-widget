<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://miguel.me/
 * @since      1.0.0
 *
 * @package    Ecb_Elementor_Custom_Widget
 * @subpackage Ecb_Elementor_Custom_Widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ecb_Elementor_Custom_Widget
 * @subpackage Ecb_Elementor_Custom_Widget/includes
 * @author     Miguel Joshua Dayao <migueldayaowork@gmail.com>
 */
class Ecb_Elementor_Custom_Widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ecb-elementor-custom-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
