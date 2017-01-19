<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/admin
 */

class Cornerstone_Powerpack_Admin {

	// The ID of this plugin.
	private $cornerstone_powerpack;

	// The version of this plugin.
	private $version;
	
	// The option name and group for dashboard options.
	private $dashboardoptskey;

	// Initialize the class and set its properties.
	public function __construct($cornerstone_powerpack, $version) {
		$this->cornerstone_powerpack = $cornerstone_powerpack;
		$this->version = $version;
		$this->dashboardoptskey = $this->cornerstone_powerpack.'-settings-dashboard';
	}

	// Register the stylesheets for the admin area.
	public function enqueue_styles() {
  	$screen = get_current_screen();
  	if ($screen->id == 'cornerstone_page_cornerstone_powerpack') {
      wp_enqueue_style(
        $this->cornerstone_powerpack, 
        D3FY_CSPP_URL.'/admin/css/cornerstone-powerpack-admin.css', 
        array(), $this->version, 'all'
      );
    }
	}

	// Register the JavaScript for the admin area.
	public function enqueue_scripts() {
  	$screen = get_current_screen();
    if ($screen->id == 'cornerstone_page_cornerstone_powerpack') {
      wp_enqueue_script(
        $this->cornerstone_powerpack, 
        D3FY_CSPP_URL.'/admin/js/cornerstone-powerpack-admin.js', 
        array('jquery'), $this->version, true
      );
    }
	}
	
	// Add admin menu links
	public function admin_menu() {
    
    // Add admin link in main Cornerstone section
    add_submenu_page(
      'cornerstone-home',         // parent slug
      'Cornerstone Power Pack',   // page title
      'Power Pack',               // menu title
      'manage_options',           // capability
      'cornerstone_powerpack',   	// menu slug
      array($this, 'admin_home')  // function
    );
    
    // Add hidden video player admin page
    add_submenu_page(
      null,
      ' Video', 
      'Video', 
      'manage_options', 
      'cornerstone_powerpack_video_page_hidden', 
      array($this, 'no_output')
    );
    
	}
	
	// Output the main admin home screen
	public function admin_home() {
  	add_thickbox();
  	include(D3FY_CSPP_PATH.'/admin/partials/dashboard.php');
	}
	
	// Output the video player iframe screen
	public function video_player() {
  	include(D3FY_CSPP_PATH.'/admin/partials/videoplayer.php');
  	exit;
	}
	
	// Output the video player iframe screen
	public function no_output() {
  	/* print nothing */
	}
	
	// Register dashboard page settings
	public function register_settings_dashboard() {
		register_setting(
			$this->dashboardoptskey, 										// options group
			$this->dashboardoptskey, 										// option name
			array($this, 'sanitize_settings_dashboard')	// options callback
		);
	}
	
	// Sanitize dashboard page settings
	public function sanitize_settings_dashboard($input) {
		if (is_array($input)) {
			$new_input = array();
			$int_fields = Cornerstone_Powerpack_Elements::get_element_keys();
			foreach ($input as $key=>$val) {
				if (in_array($key, $int_fields)) $new_input[$key] = absint($val);
				else $new_input[$key] = $val;
			}
			$input = $new_input;
		}
		return $input;
	}

}