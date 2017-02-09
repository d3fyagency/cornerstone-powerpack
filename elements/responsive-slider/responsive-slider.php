<?php

/**
 * Manage and load the responsive slider element
 *
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/elements/responsive-slider
 */

class Cornerstone_Powerpack_Element_Responsive_Slider {

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
		$subpath = '/elements/responsive-slider';
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
		require_once($this->path.'/includes/classes/cs-responsiveslider-manager.php');
		cornerstone_remove_element( 'cs-responsive-slider' );
		cornerstone_remove_element( 'cs-responsive-slider-item' );
		cornerstone_register_element(
			'CS_Responsive_Slider', 
			'cs-responsive-slider',
			$this->path.'/includes/cs-responsive-slider'
		);
		cornerstone_register_element(
			'CS_Responsive_Slider_Item',
			'cs-responsive-slider-item',
			$this->path.'/includes/cs-responsive-slider-item'
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
      $this->cornerstone_powerpack.'-responsive-slider', 
      $this->url.'/assets/styles/cs-responsiveslider.css', 
      array(), $this->version, 'all'
    );
	}

	// Register the element JavaScript.
	public function enqueue_scripts() {
    wp_enqueue_script(
      $this->cornerstone_powerpack.'-responsive-slider', 
      $this->url.'/assets/scripts/cs-responsiveslider-min.js', 
      array('jquery'), $this->version, true
    );
	}
	
	

}