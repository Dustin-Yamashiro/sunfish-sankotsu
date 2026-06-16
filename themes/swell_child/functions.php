<?php
/**
 * SWELL child theme bootstrap.
 *
 * @package SunfishSankotsu
 */

$theme_includes = array(
	'inc/helpers.php',
	'inc/setup.php',
	'inc/assets.php',
	'inc/post-types.php',
);

foreach ( $theme_includes as $theme_include ) {
	require_once get_stylesheet_directory() . '/' . $theme_include;
}
