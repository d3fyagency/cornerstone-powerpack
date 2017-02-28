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
		$this->version = '0.1.4';
		$this->dashboardoptskey = $this->cornerstone_powerpack.'-settings-dashboard';
		
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_elements();
		
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
  	$this->loader->add_action('admin_menu', $plugin_admin, 'admin_menu', 25);
    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
    $this->loader->add_action('admin_init', $plugin_admin, 'register_settings_dashboard');
    $this->loader->add_action('load-dashboard_page_cornerstone_powerpack_video_page_hidden', $plugin_admin, 'video_player');
	}

	// Register all of the hooks related to the public-facing functionality of the plugin.
	private function define_public_hooks() {
		$plugin_public = new Cornerstone_Powerpack_Public( $this->get_cornerstone_powerpack(), $this->get_version());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}
	
	// Register all the cornerstone elements.
	private function define_elements() {
		$elements = Cornerstone_Powerpack_Elements::get_element_keys();
		$options = get_option($this->cornerstone_powerpack.'-settings-dashboard');
	  if (!is_array($options)) $options = array();
    
    // enable new elements by default
    $key_diff = array_diff($elements, array_keys($options));
    if (!empty($key_diff)) {
      $new_elements = array_combine($key_diff, array_fill(0, count($key_diff), 1));
      update_option($this->dashboardoptskey, array_merge($options, $new_elements));
      $test = array_merge($options, $new_elements);
    }
	  
	  // load all activated elements
		foreach ($elements as $element) {
			$element = preg_replace('/[^A-Z0-9_-]/i', '', $element);
			$classpath = D3FY_CSPP_PATH.'/elements/'.$element.'/'.$element.'.php';
			$classname = 'Cornerstone_Powerpack_Element_'.str_replace(' ', '_', ucwords(str_replace('-', ' ', $element)));
			$enabled = (isset($options[$element])) ? (integer) $options[$element] : 0;
			if ($enabled && is_readable($classpath)) {
				require_once($classpath);
				if (class_exists($classname)) {
					$CSElement = new $classname($this->get_cornerstone_powerpack(), $this->get_version());
					$CSElement->load_hooks($this->loader);
				}
			}
		}
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
