<?php
/*
Template Name: Contact page
*/

function get_section_content($section) {
  ob_start(); ?>
  <?= $section['text'] ?>
  <?php new Component('button', array('acf_content' => $section['button'], 'classes' => 'smaller')); ?>
  <?php return ob_get_clean();
}

function get_section_media($section) {
  ob_start(); ?>
  <div class="image-grid image-grid-type-1">
    <?= $section['maps_embed_code'] ?>
  </div>
  <?php return ob_get_clean();
}

get_header();

$banner = get_field('_banner');
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'heading_type' => 'h1',
));

$section = get_field('section');
new Component('text_section', array(
  'custom_content' => get_section_content($section),
  'custom_media' => get_section_media($section),
  'content_alignment' => 'media_text',
  'classes' => 'spacing-bottom spacing-top'
));

new Component('usps_banner');

$form_section = get_field('form_section'); ?>
<section class="container">
  <div class="container smaller">
    <?= $form_section ?>
  </div>
</section>

<?php get_footer(); ?>
