<?php

if ( !class_exists('CSGoogleMapStyledManager')):

class CSGoogleMapStyledManager {
	
	private $elementCount = 0;
	private $elementParams = array();
	private $elementItemCounter = 0;
	private $items = array();
	private $css = array();
	private $googleapikey = null;
	private $scriptsloaded = false;
	private $scriptData = array();
	static private $instance = null;
	
	// save script data globally
	public function addScriptData($data, $elementID=null) {
		if ( $elementID === null ) $elementID = $this->getCurrentElementCount();
		$this->scriptData[$elementID] = $data;
	}
	
	// get global script data
	public function getScriptData() {
		return $this->scriptData;
	}
	
	// private constructor - use getInstance instead
	private function __construct() {}
	
	// get static instance of class
	public static function &getInstance() {
		if ( !( self::$instance instanceof self ) ) self::$instance = new self();
		return self::$instance;
	}
	
	// get the current (latest) element count without incrementing
	public function getCurrentElementCount() {
		return $this->elementCount;
	}
	
	// increment and get element count
	public function getNewElementCount() {
		$this->elementCount++;
		return $this->elementCount;
	}
	
	// increment and get element item count
	public function getNewElementItemCount() {
		$this->elementItemCounter++;
		return $this->elementItemCounter;
	}
	
	// set the Google Maps API key
	public function setGAPIKey($key) {
		$this->googleapikey = $key;
	}

	// get the Google Maps API key
	public function getGAPIKey() {
		return $this->googleapikey;
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
	
	// set global parameter for element
	public function addElementItem( $item, $itemID, $elementID=null ) {
  	if ( $elementID === null ) $elementID = $this->getCurrentElementCount();
  	if ( !isset( $this->items[$elementID] ) ) $this->items[$elementID] = array();
  	$this->items[$elementID][$itemID] = $item;
	}
	
	// get global element parameter
	public function getElementItems( $elementID=null ) {
  	if ( $elementID === null ) $elementID = $this->getCurrentElementCount();
  	return ( isset( $this->items[$elementID] ) ) ? $this->items[$elementID] : array();
	}
	
	// add CSS rule to element
	public function addCSSRule( $selector, $styles, $mediaquery=null, $elementID=null ) {
		if ( $elementID === null ) $elementID = $this->getCurrentElementCount();
		$selector = trim( $selector );
		$styles = trim( trim( $styles ), ';' );
		$key = $selector.' @ '.$mediaquery;
		if ( !isset( $this->css[$elementID] ) ) $this->css[$elementID] = array();
		if ( !isset( $this->css[$elementID][$key] ) ) $this->css[$elementID][$key] = array(
			'mediaquery'	=> $mediaquery,
			'selector'		=> $selector,
			'styles'			=> array(),
		);
		$this->css[$elementID][$key]['styles'][] = $styles;
	}
	
	// get element CSS rules for output
	public function getElementCSS( $prefix='', $elementID=null ) {
		if ( $elementID === null ) $elementID = $this->getCurrentElementCount();
		$output = array();
		if ( isset( $this->css[$elementID] ) ) {
			foreach ( $this->css[$elementID] as $key=>$styledata) {
				$css = trim( $prefix . ' ' . $styledata['selector'] ) . ' { ' . implode( '; ', $styledata['styles'] ) . '; }';
				if ( $styledata['mediaquery'] ) $css = '@media (' . $styledata['mediaquery'] . ') { ' . $css . ' }';
				$output[] = $css;
			}
		}
		return ( $output ) ? implode( "\n", $output ) : '';
	}
	
}

endif;