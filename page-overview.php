<?php
/*
Template Name: Overview page
*/

get_header();

$banner = get_field('_banner_1');
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'heading_type' => 'h1',
)); ?>

<section class="container spacing-bottom">
<?php
  $grid = get_field('_grid');
  new Component('grid', array(
    'acf_content' => $grid['grid'],
    'title' => get_field('grid_section_title')
  )); ?>
</section>

<?php $add_optional_banner = get_field('add_optional_banner');
if ($add_optional_banner) {
  $banner_optional = get_field('banner_optional');
  new Component('banner', array(
    'acf_content' => $banner_optional['_optional_banner_banner'],
  ));
}

$text_section = get_field('_text_section');
new Component('text_section', array('acf_content' => $text_section['text_section']));

new Component('usps_banner');

$banner = get_field('_banner_2');
new Component('banner', array(
  'acf_content' => $banner['banner'],
));

get_footer();
?>
