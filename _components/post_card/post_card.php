<?php /**
* Theme for post_card
*
* @package Component
*/

/**
* List of custom argruments
*
*/
$custom_args = array(
  'href' => '',
  'title' => '',
  'image' => '',
  'caption_content' => '',
  'tags_list' => '',
  'pre_title' => ''
);

/**
* post_card
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('post_card')) {
  function post_card(array $args)
  {
    $href = $args['href'];
    $title = $args['title'];
    $image = $args['image'];
    $caption_content = $args['caption_content'];
    $tags_list = $args['tags_list'];
    $pre_title = $args['pre_title'];
    ob_start(); ?>
    <a class="post-card<?= !empty($args['classes']) ? ' ' . $args['classes'] : '' ?>" href="<?= $href ?>" title="<?= $title ?>">
      <div class="background-image" style="background-image: url('<?= $image['sizes']['600w'] ?>')">
        <?php if(is_array($image) && !empty($image)) : ?>
          <img src="<?= $image['sizes']['600w'] ?>" alt="<?= $image['title'] ?>" title="<?= $image['title'] ?>" />
        <?php endif; ?>
      </div>
      <div class="post-card-caption">
        <?php if (!empty($pre_title)) : ?>
          <small><?= $pre_title ?></small>
        <?php endif; ?>
        <?= $title ?>
        <?php if (!empty($caption_content)) : ?>
          <div class="post-card-caption-content">
            <?= strlen($caption_content) > 146 ? substr(strip_tags($caption_content), 0, 150) . '...' : $caption_content; ?>
            <?php if (!empty($tags_list)) :
              $tags_list['classes'] = 'small'; ?>
              <?php new Component('tags_list', $tags_list) ?>
            <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
    </a>
    <?php return ob_get_clean();
  }
}
