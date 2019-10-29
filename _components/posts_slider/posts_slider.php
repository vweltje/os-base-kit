<?php /**
* Theme for posts_slider
*
* @package Component
*/

/**
* List of custom argruments
*
*/
$custom_args = array();

/**
* posts_slider
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('posts_slider')) {
  function posts_slider(array $args) {
    $posts = $args['acf_content'];
    $additional_class = '';
    if (empty($posts)) return;
    if (count($posts) < 4) $additional_class = 'fixed-' . count($posts);
    else $additional_class = 'owl-carousel';
    ob_start(); ?>
    <div class="posts-slider-wrap">
      <div class="posts-slider <?= $additional_class ?>">
        <?php foreach ($posts as $post) :
          $post = json_decode(json_encode($post), true);
          if (isset($post['item']) && $post['item']) $post = $post['item'];
          elseif (!$post || isset($post['item']) && !$post['item']) return;
          $content = get_field('content', $post['ID']);
          $parent_uri = '';
          if ($post['post_parent']) {
            $parent = get_post($post['post_parent']);
            $parent_uri = $parent->post_name . '/';
          }
          new Component('post_card', array(
            'href' => get_base_url($parent_uri . $post['post_name']),
            'title' => get_the_title($post['ID']),
            'image' => get_image_from_banner($post['ID'], '_banner_1'),
            'caption_content' => strlen($content) > 146 ? substr(strip_tags($content), 0, 150) . '...' : $content,
            'tags_list' => array('post_id' => $post['ID'], 'limit' => 2)
          ));
        endforeach; ?>
      </div>
      <?php if (count($posts) > 3) : ?>
        <div class="owl-previous"></div>
        <div class="owl-next"></div>
      <?php endif; ?>
    </div>

    <?php return ob_get_clean();
  }
}
