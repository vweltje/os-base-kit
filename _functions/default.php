<?php
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////Default Functions

/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// Title Tag Support
function theme_slug_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

///////////////////////////////////////////////////////
// No pingbacks for security
// http://blog.sucuri.net/2014/03/more-than-162000-wordpress-sites-used-for-distributed-denial-of-service-attack.html
add_filter( 'xmlrpc_methods', function( $methods ) {
  unset( $methods['pingback.ping'] );
  return $methods;
} );

///////////////////////////////////////////////////////
// Add an excerpt box for pages
if ( function_exists('add_post_type_support') ){
  add_action('init', 'add_page_excerpts');
  function add_page_excerpts(){
    add_post_type_support( 'page', 'excerpt' );
  }
}

function wpse_editor_styles() {
  // Use our existing main stylesheet for TinyMCE too.
  add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'wpse_editor_styles' );

?>
