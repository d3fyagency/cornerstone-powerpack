<?php

/**
 * Cornerstone Element manager class
 *
 * @package    Cornerstone_Powerpack
 * @subpackage Cornerstone_Powerpack/includes
 */

class Cornerstone_Powerpack_Elements {
  
  protected static $elements = array();
  protected static $instance = null;
  
  // private singleton constructor (use getInstance method instead)
	private function __construct() {
        self::$elements = array();
	}
	
	// get static instance of class object
	public static function &getInstance() {
		if (!(self::$instance instanceof self)) self::$instance = new self();
		return self::$instance;
	}
	
	// register element
	public function register($key, $name, $desc='', $opts=array()) {
        self:$elements[$key] = array(
            'name'  => $name,
            'desc'  => $desc,
            'opts'  => $opts,
        );
	}
	
	// Set element option
	public function set_option($element_key, $opt_key, $opt_val) {
  	if (isset($this->elements[$element_key])) {
    	$this->elements[$element_key]['opts'][$opt_key] = $opt_val;
    	return true;
    } else return false;
	}
	
	// Get list of all available elements.
	public static function get_elements() {
  	$self = self::getInstance();
  	return ($self::$elements);
	}
	
	// Get list of all available element keys.
	public static function get_element_keys() {
  	$elements = self::get_elements();
		return array_keys($elements);
	}
	
	// Get element options object by element key.
	public static function get_element_opts($key) {
  	$self = self::getInstance();
  	if (isset($self->elements[$key])) {
    	$optdata = $self->elements[$key]['opts'];
    } else $optdata = array();
    return new Cornerstone_Powerpack_Registry($optdata);
	}

}
