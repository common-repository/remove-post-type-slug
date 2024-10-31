<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wordpress.org/
 * @since      1.0.0
 *
 * @package    Remove_Post_Type_Slug
 * @subpackage Remove_Post_Type_Slug/admin/partials
 */


$listing_data 	= Remove_Post_Type_Slug_Admin::rempostslug_get_list_of_posts();
$selected_data 	= (array) Remove_Post_Type_Slug_Admin::rempostslug_save_list_of_posts();

echo '<div class="postbox-header">
		<h2 class="hndle ui-sortable-handle">
			<span>' . __('Basic settings', 'remove-post-type-slug') . '</span>
		</h2>
	</div>
	<div class="inside">
		<div class="main">
			<form method = "post">
				<table class="form-table cptui-table">
					<tbody>
						<tr valign="top">
							<th scope="row">
								<label for="description">
									' . __( 'List of post types', 'remove-post-type-slug' ) . '
								</label>
							</th>
						 <td>';
						foreach ( $listing_data as $key => $value ) {
							$checked = '';
							if( ! empty( $selected_data )
								&& count( $selected_data ) > 0
								&& in_array( $value, $selected_data) 
							){
								$checked = "checked";
							}
							echo '<input
									type="checkbox"
									name="remve_slug_selected_post_type[]"
									'. $checked .'
									value =" ' . $key . ' "
								/>'.$value.'<br />';
						}
				echo 	'</td>
						</tr>
						<tr>
							<th>
								<input type="submit" class="button-primary" name="remove_post_submit" value="' . __( 'Save Changes', 'remove-post-type-slug' ) . '">
								' . wp_nonce_field('remove_post_slug_nonce', 'remove_post_slug_nonce') . '
							</th>
							<td></td>
						</tr>
						<tr>
							<td colspan="2">' . __('You can make the donation if you like the plugin click the <a href ="https://paypal.me/imobsphere?locale.x=en_GB" target="_blank">donation</a>.', 'remove-post-type-slug') . '</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>';

?>
