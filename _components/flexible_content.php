<?php
/**
* Flexible_content
*/

class Flexible_content {

  /**
  * List of flexible components
  *
  * @var	array
  */
  private $flex_components = array(
    'accordion',
  );

  public function __construct(array $args) {
    $sections = $args;
    foreach ($sections as $section) {
      $component_name = strtolower($section['acf_fc_layout']);
      if (in_array($component_name, $flex_components)) {
        new Component(ucfirst($component_name), $section);
      } else {
        echo "Component does not exist";
      }
    }
  }
}
