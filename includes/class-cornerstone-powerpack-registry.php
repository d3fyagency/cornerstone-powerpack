<?php

/**
 * Cornerstone data registry utility
 *
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/includes
 */

class Cornerstone_Powerpack_Registry {

	protected $data = null;
	
	public function __construct($data=array()) {
		$this->data = (array) $data;
	}
	
	// basic data setter
	public function set($key, $val) {
		$this->data[$key] = $val;
	}
	
	// basic data getter
	public function get($key, $default=null, $format=null) {
		$results = (isset($this->data[$key])) ? $this->data[$key] : $default;
		switch ($format) {
			case 'string': $results = (string) $results; break;
			case 'float': $results = (float) $results; break;
			case 'integer': $results = (integer) $results; break;
			case 'array': $results = (array) $results; break;
			case 'object': $results = (object) $results; break;
		}
		return $results;
	}
	
	// get all data
	public function getData() {
		return $this->data;
	}
}
