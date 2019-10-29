<?php /**
* Theme for button
*
* @package Component
*/

/**
* List of custom argruments
*
*/
$custom_args = array();

/**
* button
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('button')) {
  function button(array $args)
  {
    $button = $args['acf_content'];
    $classes = !empty($args['classes']) ? ' ' . $args['classes'] : '';
    ob_start(); ?>
    <a class="button<?= $classes ?>" href="<?= $button['link']['url'] ?>" title="<?= $button['link']['title'] ?>" target="<?= $button['link']['target'] ?>">
      <?php if (isset($button['icon']) && is_array($button['icon'])) : ?>
        <div class="button-icon">
          <img src="<?= $button['icon']['sizes']['400w'] ?>" alt="<?= $button['icon']['alt'] ?>" title="<?= $button['icon']['title'] ?>"/>
        </div>
      <?php endif ?>
      <?= $button['text'] ?>
    </a>
    <?php return ob_get_clean();
  }
}
