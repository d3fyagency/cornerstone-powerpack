<?php

if ( !class_exists('CSDiagonalSepManager')):

class CSDiagonalSepManager {
	
	private $elementCount = 0;
	private $elementParams = array();
	private $css = array();
	static private $instance = null;
	
	// private constructor - use getInstance instead
	private function __construct() {}
	
	// get static instance of class
	public static function &getInstance() {
		if ( !( self::$instance instanceof self ) ) self::$instance = new self();
		return self::$instance;
	}
	
	// get the current (latest) slider count without incrementing
	public function getCurrentElementCount() {
		return $this->elementCount;
	}
	
	// increment and get slider count
	public function getNewElementCount() {
		$this->elementCount++;
		return $this->elementCount;
	}
	
	// set global parameter for slider
	public function setElementParam( $key, $value, $sliderID=null ) {
  	if ( $sliderID === null ) $sliderID = $this->getCurrentElementCount();
  	if ( !isset( $this->elementParams[$sliderID] ) ) $this->elementParams[$sliderID] = array();
  	$this->elementParams[$sliderID][$key] = $value;
	}
	
	// get global slider parameter
	public function getElementParam( $key, $default='', $sliderID=null ) {
  	if ( $sliderID === null ) $sliderID = $this->getCurrentElementCount();
  	if ( isset( $this->elementParams[$sliderID] ) && isset( $this->elementParams[$sliderID][$key] ) ){
      return $this->elementParams[$sliderID][$key];
  	} else return $default;
	}
	
	// add CSS rule to slider
	public function addCSSRule( $selector, $styles, $mediaquery=null, $sliderID=null ) {
		if ( $sliderID === null ) $sliderID = $this->getCurrentElementCount();
		$selector = trim( $selector );
		$styles = trim( trim( $styles ), ';' );
		$key = $selector.' @ '.$mediaquery;
		if ( !isset( $this->css[$sliderID] ) ) $this->css[$sliderID] = array();
		if ( !isset( $this->css[$sliderID][$key] ) ) $this->css[$sliderID][$key] = array(
			'mediaquery'	=> $mediaquery,
			'selector'		=> $selector,
			'styles'			=> array(),
		);
		$this->css[$sliderID][$key]['styles'][] = $styles;
	}
	
	// get slider CSS rules for output
	public function getElementCSS( $prefix='', $sliderID=null ) {
		if ( $sliderID === null ) $sliderID = $this->getCurrentElementCount();
		$output = array();
		if ( isset( $this->css[$sliderID] ) ) {
			foreach ( $this->css[$sliderID] as $key=>$styledata) {
				$css = trim( $prefix . ' ' . $styledata['selector'] ) . ' { ' . implode( '; ', $styledata['styles'] ) . '; }';
				if ( $styledata['mediaquery'] ) $css = '@media (' . $styledata['mediaquery'] . ') { ' . $css . ' }';
				$output[] = $css;
			}
		}
		return ( $output ) ? implode( "\n", $output ) : '';
	}
	
}

endif;