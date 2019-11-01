<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Oddessey Solutions
* @since 1.0.0
*/
get_header();
?>

<article>
  <div class="container small">
    <?php
    $flexible_content = get_field('_flexible_content');
    new Component('flexible_content', array('acf_content' => $flexible_content['flexible_content']));
    ?>
  </div>
</article>

<?php get_footer(); ?>
