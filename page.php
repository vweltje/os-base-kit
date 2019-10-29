<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Oddessey Solutions
* @subpackage OS Base Theme
* @since OS Base Theme 1.0
*/

get_header();

global $post;

if (in_array($post->post_type, array('machines', 'verpakkingen', 'occasions'))) {
  require_once('page-detail.php');
} else {
  require_once('page-default.php');
}
