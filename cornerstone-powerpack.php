<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://d3fy.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       Cornerstone Power Pack
 * Plugin URI:        http://d3fy.com
 * Description:       Cornerstone Elements Power Pack
 * Version:           1.0.0
 * Author:            D3FY
 * Author URI:        http://d3fy.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cornerstone-powerpack
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cornerstone-powerpack-activator.php
 */
function activate_cornerstone_powerpack() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cornerstone-powerpack-activator.php';
	Plugin_Name_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cornerstone-powerpack-deactivator.php
 */
function deactivate_cornerstone_powerpack() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cornerstone-powerpack-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cornerstone_powerpack' );
register_deactivation_hook( __FILE__, 'deactivate_cornerstone_powerpack' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cornerstone-powerpack.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cornerstone_powerpack() {

	$plugin = new Plugin_Name();
	$plugin->run();

}
run_cornerstone_powerpack();
