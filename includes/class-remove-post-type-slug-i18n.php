<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wordpress.org/
 * @since      1.0.0
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/includes
 * @author     Akshay Shah <akshay.shah5189@gmail.com>
 */
class Remove_Post_Type_Slug_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'remove-post-type-slug',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
