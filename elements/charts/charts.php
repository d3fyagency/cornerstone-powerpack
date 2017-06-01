<?php

/**
 * Manage and load the responsive slider element
 *
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/elements/responsive-slider
 */

if (!class_exists('Cornerstone_Powerpack_Element_Charts')):

class Cornerstone_Powerpack_Element_Charts {

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
		$subpath = '/elements/charts';
		$this->path = D3FY_CSPP_PATH.$subpath;
		$this->url = D3FY_CSPP_URL.$subpath;
	}
	
	// Load all actions and filters for element.
	public function load_hooks(&$loader) {
		$loader->add_action('cornerstone_register_elements', $this, 'register_elements', 100);
		$loader->add_action('wp_enqueue_styles', $this, 'enqueue_styles');
		$loader->add_action('wp_enqueue_scripts', $this, 'enqueue_scripts');
		$loader->add_filter('cornerstone_icon_map', $this, 'icon_map');
	}
	
	// Register the element.
	public function register_elements() {
		cornerstone_remove_element('cs-charts');
		cornerstone_remove_element('cs-charts-item');
		cornerstone_register_element(
			'CS_Charts', 
			'cs-charts',
			$this->path.'/includes/cs-charts'
		);
		cornerstone_register_element(
			'CS_Charts_Item', 
			'cs-charts-item',
			$this->path.'/includes/cs-charts-item'
		);
	}
	
	// Register the element icon(s)
	public function icon_map($icon_map) {
		$icon_map['cs-imageslider'] = $this->path.'/assets/svg/icons.svg';
		return $icon_map;
	}

	// Register the element stylesheets.
	public function enqueue_styles() {
		// wp_enqueue_style(
		// 'cspp-icons', 
		// D3FY_CSPP_URL.'/lib/csppicons/style.css', 
		// array(), $this->version, 'all'
		// );
	}

	// Register the element JavaScript.
	public function enqueue_scripts() {
		wp_enqueue_script(
			$this->cornerstone_powerpack.'-charts',
			$this->url.'/assets/scripts/d3.v4.min.js',
			array(),
			$this->version,
			false
		);
	}
}

endif;