<?php
/**
 * Theme setup.
 *
 * @package LocalEnvTheme
 */

if ( ! function_exists( 'theme_setup' ) ) {
	/**
	 * Register theme supports and menus.
	 */
	function theme_setup() {
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'search-form',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'automatic-feed-links' );
		remove_theme_support( 'core-block-patterns' );

		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'local-env' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Add an original block category.
 *
 * @param array $categories Block categories.
 * @return array
 */
function theme_add_custom_block_categories( $categories ) {
	array_unshift(
		$categories,
		array(
			'slug'  => 'original',
			'title' => __( 'オリジナル', 'local-env' ),
		)
	);

	return $categories;
}
add_filter( 'block_categories_all', 'theme_add_custom_block_categories' );

/**
 * Add profile fields often used in original theme builds.
 *
 * @param array $contactmethods User contact methods.
 * @return array
 */
function theme_add_sns_profile_fields( $contactmethods ) {
	$contactmethods['job_title'] = '肩書き';
	$contactmethods['instagram'] = 'Instagram URL';
	$contactmethods['x'] = 'X URL';
	$contactmethods['line'] = 'LINE URL';
	$contactmethods['tiktok'] = 'TikTok URL';
	$contactmethods['website'] = 'Webサイト URL';

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'theme_add_sns_profile_fields' );
