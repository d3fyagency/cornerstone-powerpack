<?php
/**
 * Shortcode: Team Member
 */

$class = 'csl-teammember ' . $class;
$custom_open_text = ($custom_open_text == '' ? 'View Profile' : $custom_open_text);

$member_content = html_entity_decode( $member_content );
$member_content = str_replace(
  array( '&lsqb;', '&rsqb;' ),
  array( '[', ']' ),
  $member_content
);

$social_networks = array(
  'facebook'  => array(
    'name'    => 'Facebook',
    'icon'    => 'csppicon csppicon-facebook',
  ),
  'twitter'   => array(
    'name'    => 'Twitter',
    'icon'    => 'csppicon csppicon-twitter',
  ),
  'linkedin'  => array(
    'name'    => 'LinkedIn',
    'icon'    => 'csppicon csppicon-linkedin',
  ),
  'gplus'  => array(
    'name'    => 'Google+',
    'icon'    => 'csppicon csppicon-google-plus',
  ),
  'instagram' => array(
    'name'    => 'Instagram',
    'icon'    => 'csppicon csppicon-instagram',
  ),
  'pinterest' => array(
    'name'    => 'Pinterest',
    'icon'    => 'csppicon csppicon-pinterest',
  ),
  'youtube'   => array(
    'name'    => 'YouTube',
    'icon'    => 'csppicon csppicon-youtube-play',
  ),
);

$supported_layouts = array('default', 'details-slideup', 'flip-card', 'no-popup', 'x-theme-style');

if(in_array($layout, $supported_layouts)){
  require_once( realpath(dirname(__FILE__)) . '/layouts/' . $layout . '.php' );
}
