<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/
 * @since      1.0.0
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/admin
 * @author     Akshay Shah <akshay.shah5189@gmail.com>
 */
class Remove_Post_Type_Slug_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_init', array ( $this, 'rempostslug_save_settings') );

	}

	/**
	 * Register the page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_register_custom_menu_page(){

		add_menu_page(
			'Remove Post Type Slug',
			'Remove Post Type Settings',
			'manage_options',
			'remove-post-type-slug',
			array( $this, 'rempostslug_admin_menu_template' ),
			'dashicons-tickets',
			6
		);

	}

	/**
	 * Menu page template function
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_admin_menu_template(){

		require_once plugin_dir_path( dirname(__FILE__)) . 'admin/partials/remove-post-type-slug-admin-display.php';
	}

	/**
	 * Get list of all the post type for the selection
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_get_list_of_posts(){
		$list_of_post_type = array();
		$list_of_post_type = get_post_types();
		return $list_of_post_type;
	}

	/**
	 * Get the listed of save data of removed post type
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_save_list_of_posts(){
		$saved_data = array();
		if (! empty( get_option( 'remove_custom_post_type_slug', false ) ) )  {
			$saved_data = get_option( 'remove_custom_post_type_slug', false );
		}

		return $saved_data;

	}

	/**
	 * Save the settings of post
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_save_settings(){

		if(
			!empty( (array) $_REQUEST )
			&& array_key_exists( 'remove_post_submit', $_REQUEST )
			&& $_REQUEST['remove_post_submit'] != ''
			&& 'Save Changes' === $_REQUEST['remove_post_submit']
		){
			if (
					! empty ( $_REQUEST['remove_post_slug_nonce'] )
					|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['remove_post_slug_nonce'], 'name_of_my_action' ) ) )
				) {
					add_action( 'admin_notices', array( $this, 'rempostslug_general_admin_notice' ) );

			}

			if(
				array_key_exists( 'remve_slug_selected_post_type', $_REQUEST)
				&& ! empty( (array) $_REQUEST['remve_slug_selected_post_type'] )
				&& isset( $_REQUEST['remve_slug_selected_post_type'] )
			){

				$remove_post_selected = array_map( 'sanitize_text_field', wp_unslash( (array) $_REQUEST['remve_slug_selected_post_type'] ) );

				$remove_post_selected = apply_filters(
					'remove_taxonmy_slug_filter',
					$remove_post_selected
				);
				update_option(
					'remove_custom_post_type_slug',
					$remove_post_selected,
					true
				);

				add_action( 'admin_notices', array( $this, 'rempostslug_general_admin_success' ) );
			}else{
				add_action('admin_notices', array($this, 'rempostslug_save_admin_notice'));

			}
		}
	}

	/**
	 * Admin notice function for nonce
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_general_admin_notice(){
		global $pagenow;
		if ( $pagenow == 'options-general.php') {
			echo '<div class="notice notice-warning is-dismissible">
					<p>' . __("Nonce are not working", "remove-post-type-slug") . '</p>
				</div>';
		}

	}

	/**
	 * Admnin notice for the success
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_general_admin_success(){
		global $pagenow;

		if ( 'admin.php' === $pagenow ) {
			echo '<div class="notice notice-warning is-dismissible">
					<p>' . __("Save settings successfully", "remove-post-type-slug") . '</p>
				</div>';
		}

	}

	/**
	 * Admin notice function for selection value
	 *
	 * @since    1.0.0
	 */
	public function rempostslug_save_admin_notice(){
		global $pagenow;
		if ($pagenow == 'options-general.php') {
			echo '<div class="notice notice-warning is-dismissible">
					<p>' . __("Select at least one option", "remove-taxonmy-slug") . '</p>
				</div>';
		}

	}

}
