<?php

/**
* Theme for single accordion
*
* @package Component
*/

/**
* List of custom argruments
*
* @var	array
*/
$custom_args = array(
  'show_item' => 1
);

/**
* accordion
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('accordion')) {
  function accordion(array $args) {
    if (($accordion = $args['acf_content']) && is_array($accordion)) {
      if ($accordion['accordion']) $accordion = $accordion['accordion'];
      ob_start(); ?>
      <div <?= $args['id'] ?> class="accordion wrap <?= $args['classes'] ?>">
        <?php $i = 1;
        foreach ($accordion as $item) :
          $aditional_show_item = (((isset($args['show_item']) && is_numeric($args['show_item'])) && $i === intval($args['show_item'])) ? 'visible-first-load' : '');
          ?>
          <div class="accordion-item <?= $aditional_show_item ?>">
            <p class="wrap accordion-item-head">
              <?= $item['title'] ?>
              <?php include('plus-icon.svg') ?>
            </p>
            <div class="wrap accordion-item-content">
              <?= $item['content'] ?>
            </div>
          </div>
          <?php $i++;
        endforeach; ?>
      </div>
      <?php
    }
    return ob_get_clean();
  }
}
