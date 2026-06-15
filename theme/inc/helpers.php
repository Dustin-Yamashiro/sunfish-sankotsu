<?php
/**
 * Shared theme helpers.
 *
 * @package LocalEnvTheme
 */

if ( ! function_exists( 'theme_asset_url' ) ) {
	/**
	 * Return a URL inside the built theme/assets directory.
	 *
	 * @param string $path Relative path inside theme/assets.
	 * @return string
	 */
	function theme_asset_url( $path = '' ) {
		$path = ltrim( (string) $path, '/' );

		return trailingslashit( get_template_directory_uri() . '/assets' ) . $path;
	}
}

if ( ! function_exists( 'theme_asset_path' ) ) {
	/**
	 * Return a filesystem path inside the built theme/assets directory.
	 *
	 * @param string $path Relative path inside theme/assets.
	 * @return string
	 */
	function theme_asset_path( $path = '' ) {
		$path = ltrim( (string) $path, '/' );

		return trailingslashit( get_template_directory() . '/assets' ) . $path;
	}
}

if ( ! function_exists( 'theme_image_url' ) ) {
	/**
	 * Return an image URL.
	 *
	 * During local Vite development the source image is served from assets/images.
	 * In production jpg/jpeg/png paths are rewritten to the generated WebP file.
	 *
	 * @param string $path Relative path inside assets/images.
	 * @return string
	 */
	function theme_image_url( $path ) {
		$path = ltrim( (string) $path, '/' );

		if ( function_exists( 'theme_is_vite_development' ) && theme_is_vite_development() ) {
			return theme_vite_asset_url( 'assets/images/' . $path );
		}

		$built_path = preg_replace( '/\.(jpe?g|png)$/i', '.webp', $path );

		return theme_asset_url( 'images/' . $built_path );
	}
}
