<?php
/**
* The template for displaying Search Results pages.
*
* @package Shape
* @since Shape 1.0
*/

function get_fixed_grid_item() {
  ob_start(); ?>
  <div class="post-card fixed-grid-item hidden">
    <div>
      <div class="flex flex-column">
        <h3>Niet gevonden waar u naar op zoek was?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ero labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        <?php new Component('button', array(
          'acf_content' => array(
            'link' => array(
              'url' => get_the_permalink(31),
              'title' => 'Neem contact op',
              'target' => '_self'
            ),
            'text' => 'Neem contact op'
          )
        )); ?>
      </div>
    </div>
  </div>
  <?php return ob_get_clean();
}

get_header();

global $wp_query;
?>

<section class="container">
  <h2 class="indent"><?= count($wp_query->posts) ?> resultaten gevonden voor '<?= $wp_query->query['s'] ?>'</h2>
  <?php  if (count($wp_query->posts) > 0) {
    $fixed = get_fixed_grid_item();
    new Component('grid', array(
      'acf_content' => array('items' => $wp_query->posts),
      'items_per_page' => 9,
      'fixed_item' => $fixed,
      'fixed_item_position' => 8
    ));
  }?>
</section>

<?php
new Component('usps_banner');

$banner = get_field('_banner_2', 8);
new Component('banner', array('acf_content' => $banner['banner']));
?>

<?php get_footer(); ?>
