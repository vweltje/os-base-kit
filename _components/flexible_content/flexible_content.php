<?php /**
* Theme for flexible_content
*
* @package Component
*/

/**
* List of custom argruments
*
*/
$custom_args = array();

/**
* flexible_content
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('flexible_content')) {
  function flexible_content(array $args)
  {
    ob_start();
    if (empty($args['acf_content'])) return;
    $sections = $args['acf_content'];
    foreach ($sections as $section) {

      switch ($section['acf_fc_layout']) {
        case 'accordion':
        new Component('accordion', array('acf_content' => $section));
        break;
        case 'text_block':
        new Component('text_block', array('acf_content' => $section['text']));
        break;
        case 'image_block':
        new Component('image_block', array('acf_content' => $section));
        break;
        case 'inline_images':
        ?><section><?php
        new Component('inline_images', array('acf_content' => $section));
        ?></section><?php
        break;
        default:
        echo("Component does not exist");
        break;
      }
    }

    return ob_get_clean();
  }
}
