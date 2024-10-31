<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wordpress.org/
 * @since      1.0.0
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/includes
 * @author     Akshay Shah <akshay.shah5189@gmail.com>
 */
class Remove_Post_Type_Slug_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$remove_post_selected = array();
		update_option( 'remove_custom_post_type_slug',  $remove_post_selected, true);
	}

}
