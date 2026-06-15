<?php
/**
 * Theme bootstrap.
 *
 * @package LocalEnvTheme
 */

$theme_includes = array(
	'inc/helpers.php',
	'inc/setup.php',
	'inc/assets.php',
	'inc/post-types.php',
);

foreach ( $theme_includes as $theme_include ) {
	require_once get_template_directory() . '/' . $theme_include;
}
