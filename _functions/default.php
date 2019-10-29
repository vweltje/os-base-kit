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

/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug($post_link, $post) {
  $cpt_slugs = array('machines', 'verpakkingen', 'occasions');
  if (in_array($post->post_type, $cpt_slugs) && $post->post_status === 'publish') {
    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
  }
  return $post_link;
}
add_filter('post_type_link', 'gp_remove_cpt_slug', 10, 2);

/**
 * Have WordPress match postname to any of our public post types (post, page, race).
 * All of our public post types can have /post-name/ as the slug, so they need to be unique across all posts.
 * By default, WordPress only accounts for posts and pages where the slug is /post-name/.
 *
 * @param $query The current query.
 */
function gp_add_cpt_post_names_to_main_query($query) {
  $cpt_slugs = array('machines', 'verpakkingen', 'occasions');
  if (!$query->is_main_query()) return;
  if (isset($query->query['pagename']) && $query->query['pagename'] === 'admin') return;
  if (isset($query->query['pagename']) && strpos($query->query['pagename'], 'nieuws') !== false) return;
  if (!isset($query->query['attachment'])) {
  	if (!isset($query->query['page']) || count($query->query) !== 2) return;
  	if (isset($query->query['name']) && empty($query->query['name'])) return;
    if (isset($query->query['pagename']) && empty($query->query['pagename'])) return;
	}
	$query->set('post_type', array_merge(array('post', 'page'), $cpt_slugs));
}
add_action('pre_get_posts', 'gp_add_cpt_post_names_to_main_query');

// Change dashboard Posts to Nieuws
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = 'Nieuws';
    $labels->singular_name = 'Nieuws';
    $labels->add_new = 'Add Nieuws';
    $labels->add_new_item = 'Add Nieuws';
    $labels->edit_item = 'Edit Nieuws';
    $labels->new_item = 'Nieuws';
    $labels->view_item = 'View Nieuws';
    $labels->search_items = 'Search Nieuws';
    $labels->not_found = 'No Nieuws found';
    $labels->not_found_in_trash = 'No Nieuws found in Trash';
    $labels->all_items = 'All Nieuws';
    $labels->menu_name = 'Nieuws';
    $labels->name_admin_bar = 'Nieuws';
    $get_post_type->menu_icon = 'dashicons-megaphone';
}
add_action( 'init', 'cp_change_post_object' );

function myprefix_search_posts_per_page($query) {
  if ($query->is_search) {
    $query->set('posts_per_page', '-1');
  }
  return $query;
}
add_filter('pre_get_posts','myprefix_search_posts_per_page');

?>
