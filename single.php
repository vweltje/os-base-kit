<?php
get_header();

global $post;
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
