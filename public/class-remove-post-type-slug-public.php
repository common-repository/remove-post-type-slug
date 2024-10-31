<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wordpress.org/
 * @since      1.0.0
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/public
 * @author     Akshay Shah <akshay.shah5189@gmail.com>
 */
class Remove_Post_Type_Slug_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'pre_get_posts', array( $this, 'rempostslug_parse_request'),1,1 );
		add_filter( 'post_type_link', array( $this, 'rempostslug_fun'), 10, 3 );
		add_filter( 'get_the_permalink', array( $this, 'rempostslug_fun'), 10, 3 );
		add_filter( 'the_permalink', array( $this, 'rempostslug_fun'), 10, 3 );

	}


	/**
	 * Remove slug from the permalinks
	 *
	 * @param [string] $post_link the link which is provided by the WordPress.
	 * @param [object] $post this will be the object of post.
	 * @param [string] $leavename this will be the leave name which we are not using at this moment.
	 * @return void return the link in the string
	 * @since    1.0.0
	 */
	public function rempostslug_fun( $post_link, $post, $leavename ) {

	$post_type_list = get_option( 'remove_custom_post_type_slug', true);
	$post_type_list = apply_filters( 'remove_custom_post_type_slug_filter', $post_type_list);
		foreach ( $post_type_list as $key => $value ) {
			//exclude post type change.
			if ( $value != $post->post_type ) {
				return $post_link;
			}

			$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

		}
		return $post_link;
	}

	/**
	 * Remove slug from pre get post
	 *
	 * @param [array] $query query which is default provided by WordPress.
	 * @return void
	 * @since    1.0.0
	 */
	public function rempostslug_parse_request( $query ) {

		$post_type_list = get_option( 'remove_custom_post_type_slug', true);
		$post_type_list = apply_filters( 'remove_custom_post_type_slug_filter', $post_type_list);


		if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
			return;
		}

		if ( ! empty( $query->query['name'] ) ) {
			$query->set( 'post_type', $post_type_list ); // add post slug here
		}
	}

}
