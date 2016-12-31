<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/admin
 */

class Cornerstone_Powerpack_Admin {

	// The ID of this plugin.
	private $cornerstone_powerpack;

	// The version of this plugin.
	private $version;

	// Initialize the class and set its properties.
	public function __construct($cornerstone_powerpack, $version) {
		$this->cornerstone_powerpack = $cornerstone_powerpack;
		$this->version = $version;
	}

	// Register the stylesheets for the admin area.
	public function enqueue_styles() {
    wp_enqueue_style(
      $this->cornerstone_powerpack, 
      plugin_dir_url(__FILE__).'css/cornerstone-powerpack-admin.css', 
      array(), $this->version, 'all'
    );
	}

	// Register the JavaScript for the admin area.
	public function enqueue_scripts() {
    wp_enqueue_script(
      $this->cornerstone_powerpack, 
      plugin_dir_url(__FILE__).'js/cornerstone-powerpack-admin.js', 
      array('jquery'), $this->version, false
    );
	}

}
