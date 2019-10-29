<?php
/**
* The template for displaying the header
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage Oddessey Solutions
* @since 1.0
* @version 1.0
*/
?>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');?> RSS" href="<?php bloginfo('url'); ?>/feed/latest">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="apple-touch-icon" sizes="180x180" href="<?=get_asset_url('/images/favicon/apple-touch-icon.png') ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=get_asset_url('/images/favicon/favicon-32x32.png') ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=get_asset_url('/images/favicon/favicon-16x16.png') ?>">
	<link rel="manifest" href="<?=get_asset_url('/images/favicon/site.webmanifest') ?>">
	<link rel="mask-icon" href="<?=get_asset_url('/images/favicon/safari-pinned-tab.svg') ?>" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<?php
	Component::create_assets();
	wp_head();
	?>
</head>

<body <?php body_class()?>>
	<?php
	get_template_part('inc-edit');
	new Component('simple_header', array());
	?>
	<main>
