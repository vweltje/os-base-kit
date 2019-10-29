<?php /**
* Theme for grid
*
* @package Component
*/

/**
* List of custom argruments
*
*/
$custom_args = array(
  'fixed_item' => '',
  'fixed_item_position' => 4,
  'items_per_page' => 6,
  'title' => '',
);

/**
* grid
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('grid')) {
  function grid(array $args) {
    $items = $args['acf_content']['items'];
    ob_start(); ?>
      <?php if (!empty($args['title'])) : ?>
        <h2 class="indent"><?= $args['title'] ?></h2>
      <?php endif; ?>
      <div class="grid" data-items-per-page="<?= $args['items_per_page'] ?>" data-current-page="1">
        <?php
        foreach ($items as $num => $_item) :
          if (!empty($args['fixed_item']) && $num === $args['fixed_item_position']) {
            echo $args['fixed_item'];
          }
          $item = is_array($_item) && isset($_item['item']) ? $_item['item'] : $_item;
          $image = get_image_from_banner($item->ID, '_banner_1');
          if (!$image || empty($image)) $image = get_image_from_banner($item->ID, 'banner');
          if (!$image) $image = get_field('thumbnail', $item->ID);
          $content = get_field('content', $item->ID);
          $href = get_base_url($item->post_name);
          if ($item->post_parent) {
            $parent = get_post($item->post_parent);
            $href = get_base_url($parent->post_name . '/' . $item->post_name);
          }
          if ($item->post_type === 'post') $href = get_permalink($item->ID);
          new Component('post_card', array(
            'href' => $href,
            'pre_title' => ($item->post_type === 'post' ? get_the_date('d F Y', $item->ID) : ''),
            'title' => get_the_title($item->ID),
            'image' => $image,
            'caption_content' => strlen($content) > 146 ? substr(strip_tags($content), 0, 150) . '...' : $content,
            'tags_list' => array('post_id' => $item->ID, 'limit' => 2),
            'classes' => 'hidden'
          ));
          ?>
        <?php
      endforeach;
        if (!empty($args['fixed_item']) && count($items) < 5) $args['fixed_item'];
        ?>
      </div>
      <?php if (count($items) > $args['items_per_page']) : ?>
        <div class="container small grid-increase-limit flex flex-row">
          <span>Toon meer</span>
        </div>
      <?php else : ?>
      <div class="spacing-bottom"></div>
      <?php endif; ?>
    <?php return ob_get_clean();
  }
}
