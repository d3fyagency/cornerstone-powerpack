<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/includes
 */

class Cornerstone_Powerpack_i18n {

	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'cornerstone-powerpack',
			false,
			dirname(dirname(plugin_basename(__FILE__))).'/languages/'
		);
	}

}
