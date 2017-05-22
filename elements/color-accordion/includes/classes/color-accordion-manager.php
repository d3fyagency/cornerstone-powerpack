<?php

if ( !class_exists('CSColorAccordionManager')):

class CSColorAccordionManager {
	
	private $elementCounter = 0;
	private $elementParams = array();
	private $elementItemCounter = 0;
	static private $instance = null;
	
	// private constructor - use getInstance instead
	private function __construct() {}
	
	// get static instance of class
	public static function &getInstance() {
		if ( !( self::$instance instanceof self ) ) self::$instance = new self();
		return self::$instance;
	}
	
	// get the current (latest) element count without incrementing
	public function getCurrentElementCount() {
		return $this->elementCounter;
	}
	
	// increment and get element count
	public function getNewElementCount() {
		$this->elementCounter++;
		return $this->elementCounter;
	}
	
	// increment and get element item count
	public function getNewElementItemCount() {
		$this->elementItemCounter++;
		return $this->elementItemCounter;
	}
	
	// set global parameter for element
	public function setElementParam( $key, $value, $elementID=null ) {
  	if ( $elementID === null ) $elementID = $this->getCurrentElementCount();
  	if ( !isset( $this->elementParams[$elementID] ) ) $this->elementParams[$elementID] = array();
  	$this->elementParams[$elementID][$key] = $value;
	}
	
	// get global element parameter
	public function getElementParam( $key, $default='', $elementID=null ) {
  	if ( $elementID === null ) $elementID = $this->getCurrentElementCount();
  	if ( isset( $this->elementParams[$elementID] ) && isset( $this->elementParams[$elementID][$key] ) ){
      return $this->elementParams[$elementID][$key];
  	} else return $default;
	}
		
}

endif;