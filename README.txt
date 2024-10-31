=== Plugin Name ===
Contributors: akshayshah5189
Donate link: https://paypal.me/imobsphere?locale.x=en_GB
Tags: custom post type slug, remove custom post type slug, slug, post type, clean url
Requires at least: 3.0.1
Tested up to: 6.2.2
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin will help you to remove the default custom slug of post type from the url which is common requirement for all the SEO lovers.

With less technical knowledge you can have this feature into the place.

== Description ==

This plugin will give you the advantage of having the clean seo url. You can remove custom post type  slug and have the seo friend url by click couple of clicks.

This plugin can remove the custom custom post type  slug as well by going into the plugin settings.

You can do this by doing the admin login and check admin menu > Remove custom post type  Slug Settings

Once you click on it you will be able to see all existing the custom post type  slug you just need to selected it and save the settings.

For the developer i have given the filter as well with the use of that filter you can directly add the slug in the array which will remove the slug.

Filter name is remove_custom_post_type_slug.
add_filter( 'remove_custom_post_type_slug',function ( $slug_list ){
	return $slug_list
} );

In the above array you need to make sure that you pass the slug name as it is.

It is working with the below functions you just need to make sure that you have used the one of the below function to have the post link.

post_type_link
get_the_permalink
the_permalink

This plugin is compatible with custom post type ui as well.

Apart of this you can create the ticket for your query or reach me out for quick question on akshay.shah5189@gmail.com

If you're looking for remove the taxonomy slug. I do have another plugin that you can refere here : https://wordpress.org/plugins/remove-taxonomy-slug/

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `remove-post-type-slug.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates


== Screenshots ==

1. Admin side setting screenshot.

== Changelog ==

= 1.0.1 =
* Check with latest wordpress version. 
= 1.0 =
* A change since the previous version.
* Another change.
