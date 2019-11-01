<?php
/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// ENQUEUE

function flex_non_cached_stylesheet() {
  $path_css = get_stylesheet_directory() . '/style.css';
  $path_js = get_stylesheet_directory() . '/js/main.js';

  if (file_exists($path_css)) {
    wp_enqueue_style('style-main', get_asset_url('/style.css'), array(), filemtime($path_css));
  }
  if (file_exists($path_js)) {
    wp_enqueue_script('main-js', get_asset_url('/js/main.js'), array(), filemtime($path_js), true);
  }
}
add_action('wp_enqueue_scripts', 'flex_non_cached_stylesheet');
