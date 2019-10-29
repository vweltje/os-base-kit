<?php
get_header();

global $post;

$banner = get_field('_banner_1');
$banner['banner']['content'] = '<p>'.strtoupper(get_the_date()).'</p>';
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'heading_type' => 'h1',
  'category' => 'Nieuws'
));
?>

<article>
  <div class="container small">
    <?php
    $content = get_field('content');
    new Component('text_block', array('acf_content' => $content, 'limit' => false));

    $flexible_content = get_field('_flexible_content');
    new Component('flexible_content', array('acf_content' => $flexible_content['flexible_content']));
    ?>
  </div>
</article>

<?php
$additional_sections = get_field('additional_sections');
if ($additional_sections && in_array('related', $additional_sections)) {
  $related_section = get_field('related_section');
}

if ($additional_sections && in_array('text_section', $additional_sections)) {
  $text_section = get_field('_text_section');
  new Component('text_section', array('acf_content' => $text_section['text_section']));
}

new Component('usps_banner');

$banner = get_field('_banner_2');
new Component('banner', array(
  'acf_content' => $banner['banner'],
));

$insperation_section = get_field('insperation_section');
if (isset($insperation_section['items']['item']) && $insperation_section['items']['item']) : ?>
  <section class="container">
    <h2><?= $insperation_section['title'] ?></h2>
    <?php new Component('posts_slider', array('acf_content' => $insperation_section['items'])); ?>
  </section>
<?php endif; ?>

<?php get_footer(); ?>
