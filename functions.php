<?php
/**
 * OS Base Kit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Oddessey Solutions
 * @since 1.0.0
 */
/**
 * OS Base Kit only works in WordPress 5.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.2', '<' ) ) {
	trigger_error('OS Base Kit only works in WordPress 5.2 or later. Please upgrade worpress shortly.');
}

session_start();

require_once('_functions/_component_loader.php');
require_once('_functions/helpers.php');
require_once('_functions/default.php');
require_once('_functions/admin.php');
require_once('_functions/enqueue.php');
require_once('_functions/images.php');
require_once('_functions/acf.php');
require_once('_functions/yoast.php');
require_once('_functions/cpt.php');
