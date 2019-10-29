<?php
/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// ENQUEUE

add_action('wp_enqueue_scripts', 'flex_non_cached_stylesheet');
function flex_non_cached_stylesheet() {
  $vars = array('templateUrl' => get_stylesheet_directory_uri());
  $path_flex_css = get_stylesheet_directory() . '/os-base-theme.min.css';
  $path_flex_js = get_stylesheet_directory() . '/js/os-base-theme.min.js';
  $path_css = get_stylesheet_directory() . '/style.css';
  $path_js = get_stylesheet_directory() . '/js/main.min.js';
  if (file_exists($path_flex_css)) wp_enqueue_style('os-base-theme-css', get_asset_url('os-base-theme.min.css'), array(), filemtime($path_flex_css));
  if (file_exists($path_css)) wp_enqueue_style('style-main', get_asset_url('/style.css'), array(), filemtime($path_css));
  wp_enqueue_script('jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js');
  if (file_exists($path_js)) wp_enqueue_script('mainjs', get_asset_url('js/main.min.js'), array(), filemtime($path_js), true);
  if (file_exists($path_flex_js)) wp_enqueue_script('os-base-theme-js', get_asset_url('js/os-base-theme.min.js'), null, filemtime($path_flex_js), true);
  wp_localize_script('mainjs', 'wpGlobal', $vars);
  wp_localize_script('os-base-theme-js', 'wpGlobal', $vars);
}
