<?php /**
* Theme for banner
*
* @package Component
*/

/**
* List of custom argruments
*
*/
$custom_args = array(
  'heading_type' => '',
  'additional_html' => '',
  'category' => ''
);

/**
* banner
*
* Gets HTML for this specific component
*
* @param    (array)       All arguments for the component
* @return   (string)      HTML of this compnent
*/
if (!function_exists('banner')) {
  function banner(array $args)
  {
    ob_start();
    if (empty($args['acf_content'])) return;
    $banner = $args['acf_content'];
    $heading_type = isset($args['heading_type']) && !empty($args['heading_type']) ? $args['heading_type'] : 'h2';
    $additional_html = isset($args['additional_html']) && !empty($args['additional_html']) ? $args['additional_html'] : '';
    if (!$banner['custom'] && !empty($banner['repeatable_banner'])) {
      $banner = get_field('_banner', $banner['repeatable_banner']->ID);
      $banner = $banner['banner'];
    }
    $buttons = $banner['buttons'];
    ?>
    <section class="container">
      <div class="banner flex <?= $banner['type'] ?> <?= !empty($args['classes']) ? $args['classes'] : ''  ?> <?= $banner['type'] === 'indent' ? 'container smaller' : '' ?>">
        <div class="banner-background">
          <div class="background-image" style="background-image: url('<?= $banner['image']['sizes']['1200w'] ?>')"></div>
        </div>
        <div class="container smaller">
          <div class="banner-content">
            <?php if (isset($args['category']) && !empty($args['category'])) : ?>
              <span class="banner-category"><?= $args['category'] ?></span>
            <?php endif;?>
            <<?= $heading_type ?> class="<?= $banner['text_size'] ?>"><?= $banner['title'] ?></<?= $heading_type ?>>
            <div class="banner-text <?= $banner['text_size'] ?>">
              <?= $banner['content'] ?>
            </div>
            <?= $additional_html ?>
            <?php if ($buttons) : ?>
              <div class="banner-buttons flex flex-row">
                <?php foreach ($buttons as $button) {
                  new Component('button', array('acf_content' => $button['button']));
                } ?>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </section>
    <?php return ob_get_clean();
  }
}
