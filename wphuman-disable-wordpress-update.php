<?php

/**
 * Plugin Name:         WP Human Disable WordPress Update
 * Description:         Disable core WordPress & WPMUDEV update notice.  Made by Tang Rufus from WP Human
 * Author:              Tang Rufus @ WP Human
 * Author URI:          http://wphuman.com
 * Author Twitter:      @tangrufus, @wphuman
 * Author Email:        rufus@wphuman.com
 * Version:             1.2.0
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: 	https://github.com/wphuman/wphuman-disable-wordpress-update
 * GitHub Branch:       master
 *
 */

/** Disable the core update notice */
add_filter( 'pre_site_transient_update_core',  '__return_null' ); // screening core update
add_filter( 'pre_site_transient_update_plugins',  '__return_null' ); // screening plugin update
add_filter( 'pre_site_transient_update_themes',  '__return_null' ); // screening theme update

remove_action( 'admin_init', '_maybe_update_core'); // forbid wp_version_check();
remove_action( 'admin_init', '_maybe_update_plugins'); // forbid wp_update_plugins();
remove_action( 'admin_init', '_maybe_update_themes'); // forbid wp_update_themes();

wp_clear_scheduled_hook( 'wp_update_themes' );
wp_clear_scheduled_hook( 'wp_update_plugins' );
wp_clear_scheduled_hook( 'wp_version_check' );

/** Disable WPMUDEV update notice */
remove_action( 'admin_notices', 'wdp_un_check', 5 );
remove_action( 'network_admin_notices', 'wdp_un_check', 5 );
