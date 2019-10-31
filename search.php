<?php
/**
* The template for displaying Search Results pages.
*
* @package Shape
* @since Shape 1.0
*/

get_header();

global $wp_query;
?>

<section class="container">
  <h2><?= count($wp_query->posts) ?> resultaten gevonden voor '<?= $wp_query->query['s'] ?>'</h2>
  <?php  if (count($wp_query->posts) > 0) {
    new Component('grid', array(
      'acf_content' => array('items' => $wp_query->posts),
      'items_per_page' => 9,
      'fixed_item' => $fixed,
      'fixed_item_position' => 8
    ));
  }?>
</section>

<?php get_footer(); ?>
