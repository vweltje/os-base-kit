<?php
/*
Template Name: Home page
*/

get_header();

function get_aditional_banner_html() {
  ob_start(); ?>
  <a class="banner-help-button" href="<?= get_page_link(get_page_by_path('contact')) ?>">
    <?= get_field('banner_searchbar_text') ?>
    <svg xmlns="http://www.w3.org/2000/svg" width="27.414" height="27.414">
      <g transform="translate(-2 -2)" fill="none" stroke="#e6b52e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <path d="M4 4l24 24" stroke-dasharray="33.94 33.94" stroke-dashoffset="-22.8"/>
        <circle cx="10" cy="10" r="10" transform="translate(3 3)"/>
      </g>
    </svg>
  </a>
  <?php return ob_get_clean();
}

$banner = get_field('_banner_1');
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'classes' => 'home-header',
  'heading_type' => 'h1',
  'additional_html' => get_aditional_banner_html()
));

new Component('usps_banner');
?>

<section class="container home-inline-text-section spacing-bottom">
  <?php $inline_text = get_field('inline_text'); ?>
  <div class="container smaller">
    <h3><?= $inline_text['title'] ?></h3>
    <?= $inline_text['content'] ?>
    <div class="inline-text-section-decoration"></div>
  </div>
</section>

<?php
$text_section= get_field('_text_section');
new Component('text_section', array('acf_content' => $text_section['text_section']));
?>

<section class="container">
  <?php $product_groups = get_field('product_group_section'); ?>
  <div class="home-product-groups flex flex-row">
    <?php foreach ($product_groups as $product_group) : ?>
      <div class="product-group flex flex-column">
        <img src="<?= $product_group['icon']['sizes']['400w'] ?>" alt="<?= $product_group['icon']['filename'] ?>" title="<?= $product_group['icon']['title'] ?>" />
        <h3><?= $product_group['title'] ?></h3>
        <p><?= $product_group['description'] ?></p>
        <?php new Component('button', array('acf_content' => $product_group['button'])); ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php
$inline_video = get_field('_inline_video');
new Component('inline_video', array(
  'acf_content' => $inline_video['inline_video'],
  'classes' => 'spacing-top spacing-bottom'
));

$banner = get_field('_banner_2');
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'classes' => 'home-banner'
));

get_footer();
?>
