<?php

/**
* Component loader
*
* This class loads a component into the HTML, if required it adds in the styling and required scripts to get the component working proporley.
*
* Include this file into yout functions.php
* Use this class in your theme as following: new component( 'component_name', array( 'acf_content' => array() ));
*
* Extrended version:
* $args = array();
* new component( 'Component_name', $args);
*
* @package Component
* @author Vincent Weltje @ Oddessey Solutions
*/

class Component {

  /**
  * Name of the reqiested component
  *
  * @var	string
  */
  protected $cp_name = '';

  /**
  * __construct
  *
  * Automaticly initilyzed when defining a new component
  *
  * @param    (string)      name of the requested component
  * @param    (array)       all arguments for the component
  * @return   (string)      HTML for requested component
  */
  public function __construct(string $cp_name = '', array $args = array()) {
    if (empty($cp_name)) {
      trigger_error('Please supply a component name.');
    }
    $this->cp_path = $this->get_cp_dir_path($cp_name);
    if (!file_exists($this->cp_path) || !is_dir($this->cp_path)) {
      trigger_error("No component found with the name you supplied name: '$cp_name'");
    }
    $this->cp_name = $cp_name;
    if (!class_exists($cp_name)) {
      require_once($this->get_cp_file_path('php'));
    }
    return new $cp_name($args);
  }

  /**
  * Get_cp_file_path
  *
  * Helps to get the component file path
  *
  * @param    (string)      The file extension of the file you want to get
  * @return   (string)      Path to specific component file
  */
  private function get_cp_file_path() {
    $path = $this->cp_path . '/' . $this->cp_name . '.php';
    return (file_exists($path) && !is_dir($path)) ? $path : false;
  }

  /**
  * Get_cp_dir_path
  *
  * Helps to get the component file path
  *
  * @param    (string)      name of the requested component
  * @return   (string)      Path to specific component file
  */
  private static function get_cp_dir_path($cp_name) {
    return (get_stylesheet_directory() . '/_components/' . $cp_name);
  }
}
