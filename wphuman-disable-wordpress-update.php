<?php
/**
 * @package wphuman-disable-wordpress-update
 * @version 1.1.0
 */
/**
 * Plugin Name:         WP Human Disable WordPress Update
 * Description:         Disable WordPress Update.  Made by Tang Rufus
 * Author:              Tang Rufus
 * Author URI:          http://wphuman.com
 * Author Twitter:      @tangrufus
 * Author Email:        rufus@wphuman.com
 * Version:             1.1.0
 * License:             GNU General Public License v3.0
 * License URI:         http://www.opensource.org/licenses/gpl-license.php
 * GitHub Plugin URI: 	https://github.com/wp-human/wphuman-disable-wordpress-update
 * GitHub Branch:       master
 *
*/

/** Disable the Update Notice */
add_filter( 'pre_site_transient_update_core',  '__return_null' ); // screening core update
add_filter( 'pre_site_transient_update_plugins',  '__return_null' ); // screening plugin update
add_filter( 'pre_site_transient_update_themes',  '__return_null' ); // screening theme update

remove_action( 'admin_init', '_maybe_update_core'); // forbid wp_version_check();
remove_action( 'admin_init', '_maybe_update_plugins'); // forbid wp_update_plugins();
remove_action( 'admin_init', '_maybe_update_themes'); // forbid wp_update_themes();

wp_clear_scheduled_hook( 'wp_update_themes' );
wp_clear_scheduled_hook( 'wp_update_plugins' );
wp_clear_scheduled_hook( 'wp_version_check' );
