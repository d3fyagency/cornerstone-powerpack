<?php

/**
 * @link              http://d3fy.com
 * @since             1.0.0
 * @package           Cornerstone_Powerpack
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
if (!defined('WPINC')) { die; }

// activation actions
function activate_cornerstone_powerpack() {
	require_once plugin_dir_path(__FILE__).'includes/class-cornerstone-powerpack-activator.php';
	Cornerstone_Powerpack_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_cornerstone_powerpack');

// deactivation actions
function deactivate_cornerstone_powerpack() {
	require_once plugin_dir_path(__FILE__).'includes/class-cornerstone-powerpack-deactivator.php';
	Cornerstone_Powerpack_Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_cornerstone_powerpack');

// core plugin class and execution
require plugin_dir_path(__FILE__).'includes/class-cornerstone-powerpack.php';
function run_cornerstone_powerpack() {
	$plugin = new Cornerstone_Powerpack();
	$plugin->run();
}
run_cornerstone_powerpack();