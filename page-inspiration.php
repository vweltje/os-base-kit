<?php
/*
Template Name: Inspiration page
*/

function get_fixed_grid_item($fixed_item) {
  ob_start(); ?>
  <div class="post-card fixed-grid-item hidden">
    <div>
      <div class="banner flex">
        <div class="banner-background">
          <div class="background-image" style="background-image: url('<?= $fixed_item['image']['sizes']['1800w'] ?>')"></div>
        </div>
        <div class="container smaller">
          <div class="banner-content">
            <h2><?= $fixed_item['title'] ?></h2>
            <div class="banner-text">
              <?= $fixed_item['content'] ?>
            </div>
            <?php if ($fixed_item['button']) : ?>
              <div class="banner-buttons flex flex-row">
                <?php new Component('button', array('acf_content' => $fixed_item['button'])); ?>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php return ob_get_clean();
}

function get_newsletter_form() {
  ob_start(); ?>
  <div>
    <?php new Component('mailchimp_form') ?>
  </div>
  <?php return ob_get_clean();
}

get_header();

$banner = get_field('_banner_1');
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'heading_type' => 'h1',
)); ?>

<section class="container">
  <?php $grid = get_field('_grid');
  $fixed = get_fixed_grid_item(get_field('fixed_grid_item'));
  new Component('grid', array(
    'acf_content' => $grid['grid'],
    'fixed_item' => $fixed,
    'title' => get_field('grid_section_title')
  )); ?>
</section>

<?php $add_optional_banner = get_field('add_optional_banner');
if ($add_optional_banner) {
  $banner_optional = get_field('banner_optional');
  new Component('banner', array(
    'acf_content' => $banner_optional['_optional_banner_banner'],
    'classes' => 'inspiration-custom-banner',
    'additional_html' => get_newsletter_form()
  ));
}

new Component('usps_banner');

$banner = get_field('_banner_2');
new Component('banner', array(
  'acf_content' => $banner['banner'],
));

get_footer();
?>
