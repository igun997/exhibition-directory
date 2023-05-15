<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/igun997
 * @since             1.0.0
 * @package           Ciptadusa_Directory
 *
 * @wordpress-plugin
 * Plugin Name:       Directory Listing by Cipta Dua Saudara
 * Plugin URI:        https://www.ciptadusa.com
 * Description:       Exhibition Directory Listing
 * Version:           1.7.0
 * Author:            Indra Gunanda
 * Author URI:        https://github.com/igun997
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ciptadusa-directory
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CIPTADUSA_DIRECTORY_VERSION', '1.7.0' );

/**
 * Define plugin for WordPress version
 */

define( 'CIPTADUSA_DIRECTORY_WP_VERSION', '6.1.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ciptadusa-directory-activator.php
 */
function activate_ciptadusa_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ciptadusa-directory-activator.php';
	Ciptadusa_Directory_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ciptadusa-directory-deactivator.php
 */
function deactivate_ciptadusa_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ciptadusa-directory-deactivator.php';
	Ciptadusa_Directory_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ciptadusa_directory' );
register_deactivation_hook( __FILE__, 'deactivate_ciptadusa_directory' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ciptadusa-directory.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ciptadusa_directory() {

	$plugin = new Ciptadusa_Directory();
	$plugin->run();

}

run_ciptadusa_directory();
