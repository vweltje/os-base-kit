<?php
/**
* The template for displaying search results pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package WordPress
* @subpackage Oddessey Solutions
* @since 1.0.0
*/
get_header();

global $wp_query;
?>

<?php if ( have_posts() ) :
  // Start the Loop.
  while ( have_posts() ) :
    the_post();
    /*
    * Include the Post-Format-specific template for the content.
    * If you want to override this in a child theme, then include a file
    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    */

    // End the loop.
  endwhile;
else :

endif; ?>
<?php get_footer(); ?>
