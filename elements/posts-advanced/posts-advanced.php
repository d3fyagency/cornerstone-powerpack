<?php

/**
 * Manage and load the responsive slider element
 *
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/elements/responsive-slider
 */

if (!class_exists('Cornerstone_Powerpack_Element_Posts_Advanced')):

class Cornerstone_Powerpack_Element_Posts_Advanced {

	// The ID of this plugin.
	private $cornerstone_powerpack;

	// The version of this plugin.
	private $version;
	
	// The sub-path to this element
	private $path;

	// Initialize the class and set its properties.
	public function __construct($cornerstone_powerpack, $version) {
		$this->cornerstone_powerpack = $cornerstone_powerpack;
		$this->version = $version;
		$this->version = time();
		$subpath = '/elements/posts-advanced';
		$this->path = D3FY_CSPP_PATH.$subpath;
		$this->url = D3FY_CSPP_URL.$subpath;
	}
	
	// Load all actions and filters for element.
	public function load_hooks(&$loader) {
		$loader->add_action('cornerstone_register_elements', $this, 'register_elements', 100);
		$loader->add_action('wp_enqueue_scripts', $this, 'enqueue_styles');
		$loader->add_action('wp_enqueue_scripts', $this, 'enqueue_scripts');
		$loader->add_filter('cornerstone_icon_map', $this, 'icon_map');
	}
	
	// Register the element.
	public function register_elements() {
		cornerstone_remove_element( 'cspp-posts-advanced' );
		cornerstone_register_element(
			'CS_Posts_Advanced', 
			'cspp-posts-advanced',
			$this->path.'/includes/cspp-posts-advanced'
		);
	}
	
	// Register the element icon(s)
	public function icon_map($icon_map) {
		$icon_map['cs-imageslider'] = $this->path.'/assets/svg/icons.svg';
		return $icon_map;
	}

	// Register the element stylesheets.
	public function enqueue_styles() {
    wp_enqueue_style(
      $this->cornerstone_powerpack.'-posts-advanced', 
      $this->url.'/assets/styles/cspp-posts-advanced.css', 
      array(), $this->version, 'all'
    );
	}

	// Register the element JavaScript.
	public function enqueue_scripts() {
    wp_enqueue_script(
      $this->cornerstone_powerpack.'-posts-advanced', 
      $this->url.'/assets/scripts/cspp-posts-advanced-min.js', 
      array('jquery'), $this->version, true
    );
	}

}

endif;