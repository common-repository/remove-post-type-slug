<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://wordpress.org/
 * @since      1.0.0
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/includes
 * @author     Akshay Shah <akshay.shah5189@gmail.com>
 */
class Remove_Post_Type_Slug_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option('remove_custom_post_type_slug');
	}

}
