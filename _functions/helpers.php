<?php

function get_base_url($uri = '') {
  return get_site_url() . ($uri[0] === '/' ? $uri : '/' . $uri);
}

function get_asset_url($uri = '') {
  return get_stylesheet_directory_uri() . ($uri[0] === '/' ? $uri : '/' . $uri);
}

function get_url_var($name) {
  $strURL = $_SERVER['REQUEST_URI'];
  $arrVals = explode("/",$strURL);
  $found = 0;
  foreach ($arrVals as $index => $value) {
    if($value == $name) $found = $index;
  }
  $place = $found + 1;
  return $arrVals[$place];
}

function find_in_array_by_key($array, $search) {
  foreach ($array as $key => $value) {
    if ($key === $search) {
      return $value;
    }
    else if (is_array($value)) {
      $result = find_in_array_by_key($value, $search);
      if ($result) {
        return $result;
      }
    }
  }
  return false;
}

//// Nice url
//   Usage
//   niceurl('http://google.com.au/');
///  outputs -> google.com.au
function niceurl($url) {
  $url = str_replace('http://', '', $url);
  $url = str_replace('https://', '', $url);
  $url = str_replace('www.', '', $url);
  $url = rtrim($url, "/");
  return $url;
}

//// Cinvert readable text to input label string
function text_to_label_string($text) {
  $text = strip_tags($text);
  $text = preg_replace('~[^\pL\d]+~u', '-', $text); // replace non letter or digits by -
  $text = preg_replace('~[^-\w]+~', '', $text); // remove unwanted characters
  $text = trim($text, '-');
  $text = preg_replace('~-+~', '-', $text); // remove duplicate -
  return strtolower($text);
}

//// Check if is supper admin
function super_admin() {
  $super_admins = array(
    1,   // Oddessey Solutions
  );
  return in_array(get_current_user_id(), $super_admins);
}

function get_image_from_banner($post_id, $banner_name) {
  $post = get_fields($post_id);
  $banner = find_in_array_by_key($post, $banner_name);
  if (isset($banner['banner'])) {
    $banner = $banner['banner'];
    if (isset($banner['image'])) return $banner['image'];
  } else if (isset($banner['type'])) {
    if (isset($banner['image'])) return $banner['image'];
  }
  return false;
}
