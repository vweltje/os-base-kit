<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Oddessey Solutions
* @subpackage OS Base Theme
* @since OS Base Theme 1.0
*/

get_header();

global $post;

$category = get_post_type();
if (is_page() && $post->post_parent) $category .= ' - ' . get_the_title($post->post_parent);
$banner = get_field('_banner_1');
new Component('banner', array(
  'acf_content' => $banner['banner'],
  'heading_type' => 'h1',
  'category' => ucwords($category)
));
?>

<article class="spacing-bottom">
  <div class="container small">
    <?php
    new Component('tags_list', array('post_id' => $post->ID));

    $content = get_field('content');
    new Component('text_block', array('acf_content' => $content, 'limit' => true));

    $flexible_content = get_field('_flexible_content');
    new Component('flexible_content', array('acf_content' => $flexible_content['flexible_content']));
    ?>
  </div>
</article>

<?php
$is_parrent = get_field('is_parrent');
$children_section = get_field('children_section');
$parent_post_name = $post->post_name;
$args = array(
  'post_type'      => $category,
  'posts_per_page' => -1,
  'post_parent'    => $post->ID,
  'order'          => 'ASC',
  'orderby'        => 'menu_order'
);
$parent = new WP_Query($args);
if (count($parent->posts) && $is_parrent && isset($children_section['title']) && !empty($children_section['title'])) : ?>
<section class="container">
  <h2 class="indent"><?= $children_section['title'] ?></h2>
  <?php new Component('posts_slider', array('acf_content' => $parent->posts)); ?>
</section>
<?php endif; ?>

<?php
$additional_sections = get_field('additional_sections');
if ($additional_sections && in_array('related', $additional_sections)) :
  $related_section = get_field('related_section');
  if (isset($related_section['items'][0]['item']) && $related_section['items'][0]['item']) :
  ?>
  <section class="container">
    <h2 class="indent"><?= $related_section['title'] ?></h2>
    <?php new Component('posts_slider', array('acf_content' => $related_section['items'])); ?>
  </section>
<?php endif;
endif;

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
if (isset($insperation_section['items'][0]['item']) && $insperation_section['items'][0]['item']) : ?>
<section class="container">
  <h2 class="indent"><?= $insperation_section['title'] ?></h2>
  <?php new Component('posts_slider', array('acf_content' => $insperation_section['items'])); ?>
</section>
<?php endif; ?>

<?php get_footer(); ?>
