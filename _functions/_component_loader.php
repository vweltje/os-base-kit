<?php

/**
* Component loader
*
* This class loads a component into the HTML.
*
* Include this file into yout functions.php
* Use this class in your theme as following: new Component( 'Component_name', $args);
*
* Extrended version:
* $args = array();
* new Component( 'Component_name', $args);
*
* @package Component
* @author Vincent Weltje @ Oddessey Solutions
*/

class Component {

  /**
  * Path to reqiested component
  *
  * @var	string
  */
  private $component_path = '';

  /**
  * Name of the reqiested component
  *
  * @var	string
  */
  private $component_name = '';

  /**
  * __construct
  *
  * Automaticly initilyzed when defining a new component
  *
  * @param    (string)      name of the requested component
  * @param    (array)       all arguments for the component
  * @return   (string)      HTML for requested component
  */
  public function __construct(string $component_name = '', array $args = array()) {
    if (empty($component_name)) {
      trigger_error('Please supply a component name.');
    }
    $this->component_path = $this->get_component_directory_path($component_name);
    if (!file_exists($this->component_path) || !is_dir($this->component_path)) {
      trigger_error("No component found with the name you supplied name: '$component_name'");
    }
    $this->component_name = $component_name;
    if (!class_exists($component_name)) {
      require_once($this->get_component_file_path('php'));
    }
    return new $component_name($args);
  }

  /**
  * Get_component_file_path
  *
  * Helps to get the component file path
  *
  * @param    (string)      The file extension of the file you want to get
  * @return   (string)      Path to specific component file
  */
  private function get_component_file_path() {
    $path = $this->component_path . '/' . $this->component_name . '.php';
    return (file_exists($path) && !is_dir($path)) ? $path : false;
  }

  /**
  * Get_component_directory_path
  *
  * Helps to get the component file path
  *
  * @param    (string)      name of the requested component
  * @return   (string)      Path to specific component file
  */
  private function get_component_directory_path($component_name) {
    return (get_stylesheet_directory() . '/_components');
  }
}
