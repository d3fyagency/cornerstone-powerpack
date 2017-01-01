<?php

if ( !class_exists('CSResponsiveSliderManager')):

class CSResponsiveSliderManager {
	
	private $sliderCounter = 0;
	private $sliderParams = array();
	private $sliderItemCounter = 0;
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
	public function getCurrentSliderCount() {
		return $this->sliderCounter;
	}
	
	// increment and get slider count
	public function getNewSliderCount() {
		$this->sliderCounter++;
		return $this->sliderCounter;
	}
	
	// increment and get slider item count
	public function getNewSliderItemCount() {
		$this->sliderItemCounter++;
		return $this->sliderItemCounter;
	}
	
	// set global parameter for slider
	public function setSliderParam( $key, $value, $sliderID=null ) {
  	if ( $sliderID === null ) $sliderID = $this->getCurrentSliderCount();
  	if ( !isset( $this->sliderParams[$sliderID] ) ) $this->sliderParams[$sliderID] = array();
  	$this->sliderParams[$sliderID][$key] = $value;
	}
	
	// get global slider parameter
	public function getSliderParam( $key, $default='', $sliderID=null ) {
  	if ( $sliderID === null ) $sliderID = $this->getCurrentSliderCount();
  	if ( isset( $this->sliderParams[$sliderID] ) && isset( $this->sliderParams[$sliderID][$key] ) ){
      return $this->sliderParams[$sliderID][$key];
  	} else return $default;
	}
	
	// add CSS rule to slider
	public function addCSSRule( $selector, $styles, $mediaquery=null, $sliderID=null ) {
		if ( $sliderID === null ) $sliderID = $this->getCurrentSliderCount();
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
	public function getSliderCSS( $prefix='', $sliderID=null ) {
		if ( $sliderID === null ) $sliderID = $this->getCurrentSliderCount();
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