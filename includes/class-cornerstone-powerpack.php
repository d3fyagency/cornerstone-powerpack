<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/includes
 */

class Cornerstone_Powerpack {

	// The loader that's responsible for maintaining and registering all hooks that power the plugin.
	protected $loader;

	// The unique identifier of this plugin.
	protected $cornerstone_powerpack;

	// The current version of the plugin.
	protected $version;

	// Define the core functionality of the plugin.
	public function __construct() {
		
		$this->cornerstone_powerpack = 'cornerstone-powerpack';
		$this->version = '1.0.0';
		
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		
	}

	// Load the required dependencies for this plugin.
	private function load_dependencies() {

		// The class responsible for orchestrating the actions and filters of the core plugin.
		require_once plugin_dir_path(dirname(__FILE__)).'includes/class-cornerstone-powerpack-loader.php';

		// The class responsible for defining internationalization functionality of the plugin.
		require_once plugin_dir_path(dirname(__FILE__)).'includes/class-cornerstone-powerpack-i18n.php';

		// The class responsible for defining all actions that occur in the admin area.
		require_once plugin_dir_path(dirname(__FILE__)).'admin/class-cornerstone-powerpack-admin.php';

		// The class responsible for defining all actions that occur in the public-facing side of the site.
		require_once plugin_dir_path(dirname(__FILE__)).'public/class-cornerstone-powerpack-public.php';

		$this->loader = new Cornerstone_Powerpack_Loader();

	}

	// Define the locale for this plugin for internationalization.
	private function set_locale() {
		$plugin_i18n = new Cornerstone_Powerpack_i18n();
		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	// Register all of the hooks related to the admin area functionality of the plugin.
	private function define_admin_hooks() {
		$plugin_admin = new Cornerstone_Powerpack_Admin($this->get_cornerstone_powerpack(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	}

	// Register all of the hooks related to the public-facing functionality of the plugin.
	private function define_public_hooks() {
		$plugin_public = new Cornerstone_Powerpack_Public( $this->get_cornerstone_powerpack(), $this->get_version());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	// Run the loader to execute all of the hooks with WordPress.
	public function run() {
		$this->loader->run();
	}

	// The name of the plugin used to uniquely identify it within the context of WordPress and to define internationalization functionality.
	public function get_cornerstone_powerpack() {
		return $this->cornerstone_powerpack;
	}

	// The reference to the class that orchestrates the hooks with the plugin.
	public function get_loader() {
		return $this->loader;
	}

	// Retrieve the version number of the plugin.
	public function get_version() {
		return $this->version;
	}

}
