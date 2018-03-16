<?php

/**
 * @link              http://d3fy.com
 * @package           Cornerstone_Powerpack
 *
 * @wordpress-plugin
 * Plugin Name:       Cornerstone Power Pack
 * Plugin URI:        http://d3fy.com
 * Description:       Cornerstone Elements Power Pack (BETA)
 * Version:           0.1.21
 * Author:            D3FY
 * Author URI:        http://d3fy.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cornerstone-powerpack
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) { die; }

define('D3FY_CSPP_PATH', untrailingslashit(plugin_dir_path(__FILE__)));
define('D3FY_CSPP_URL', untrailingslashit(plugin_dir_url( __FILE__ )));

// Handle plugin updates
require_once D3FY_CSPP_PATH.'/update/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://www.cornerstonepowerpack.com/updates/plugins/cornerstone-powerpack/cornerstone-powerpack.json',
    __FILE__,
    'd3fy-cornerstone-powerpack'
);

// Register custom Cornerstone elements
require_once D3FY_CSPP_PATH.'/includes/class-cornerstone-powerpack-registry.php';
require_once D3FY_CSPP_PATH.'/includes/class-cornerstone-powerpack-elements.php';
require_once D3FY_CSPP_PATH.'/includes/register-elements.php';

// activation actions
function activate_cornerstone_powerpack() {
	require_once D3FY_CSPP_PATH.'/includes/class-cornerstone-powerpack-activator.php';
	Cornerstone_Powerpack_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_cornerstone_powerpack');

// deactivation actions
function deactivate_cornerstone_powerpack() {
	require_once D3FY_CSPP_PATH.'/includes/class-cornerstone-powerpack-deactivator.php';
	Cornerstone_Powerpack_Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_cornerstone_powerpack');

// core plugin class and execution
require D3FY_CSPP_PATH.'/includes/class-cornerstone-powerpack.php';
function run_cornerstone_powerpack() {
	$plugin = new Cornerstone_Powerpack();
	$plugin->run();
}
run_cornerstone_powerpack();
