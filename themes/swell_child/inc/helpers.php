<?php
/**
 * Shared theme helpers.
 *
 * @package LocalEnvTheme
 */

if ( ! function_exists( 'theme_asset_url' ) ) {
	/**
	 * Return a URL inside the built child theme assets directory.
	 *
	 * @param string $path Relative path inside the built assets directory.
	 * @return string
	 */
	function theme_asset_url( $path = '' ) {
		$path = ltrim( (string) $path, '/' );

		return trailingslashit( get_stylesheet_directory_uri() . '/assets' ) . $path;
	}
}

if ( ! function_exists( 'theme_asset_path' ) ) {
	/**
	 * Return a filesystem path inside the built child theme assets directory.
	 *
	 * @param string $path Relative path inside the built assets directory.
	 * @return string
	 */
	function theme_asset_path( $path = '' ) {
		$path = ltrim( (string) $path, '/' );

		return trailingslashit( get_stylesheet_directory() . '/assets' ) . $path;
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

if ( ! function_exists( 'theme_should_show_footer_contact' ) ) {
	/**
	 * Whether the shared footer contact section should be displayed.
	 *
	 * Pages can opt out with a custom field named `hide_footer_contact`
	 * set to `1`, `true`, or `yes`. The contact page is hidden by default.
	 *
	 * @return bool
	 */
	function theme_should_show_footer_contact() {
		$should_show = ! is_page( 'contact' );

		if ( is_singular() ) {
			$hide_footer_contact = get_post_meta( get_queried_object_id(), 'hide_footer_contact', true );

			if ( in_array( strtolower( (string) $hide_footer_contact ), array( '1', 'true', 'yes' ), true ) ) {
				$should_show = false;
			}
		}

		return (bool) apply_filters( 'theme_should_show_footer_contact', $should_show );
	}
}

if ( ! function_exists( 'theme_should_show_floating_contact' ) ) {
	/**
	 * Whether the bottom floating contact menu should be displayed.
	 *
	 * Contact/legal pages are hidden by default. Posts and post archive screens
	 * show the menu so article readers can reach consultation CTAs.
	 *
	 * @return bool
	 */
	function theme_should_show_floating_contact() {
		$excluded_page_slugs = array( 'contact', 'terms', 'privacy-policy' );
		$should_show         = is_front_page()
			|| ( is_page() && ! is_page( $excluded_page_slugs ) )
			|| is_home()
			|| is_category()
			|| is_tag()
			|| is_date()
			|| is_author()
			|| is_singular( 'post' );

		if ( is_singular() ) {
			$hide_floating_contact = get_post_meta( get_queried_object_id(), 'hide_floating_contact', true );

			if ( in_array( strtolower( (string) $hide_floating_contact ), array( '1', 'true', 'yes' ), true ) ) {
				$should_show = false;
			}
		}

		return (bool) apply_filters( 'theme_should_show_floating_contact', $should_show );
	}
}

if ( ! function_exists( 'theme_uses_swell_content_shell' ) ) {
	/**
	 * Whether the current request should keep SWELL's standard content wrapper.
	 *
	 * Custom-designed pages use the child theme's `#primary.my-setting` wrapper.
	 * Posts, archives, search, and 404 screens rely on SWELL templates and need
	 * `#content.l-content.l-container` plus sidebar/breadcrumb handling.
	 *
	 * @return bool
	 */
	function theme_uses_swell_content_shell() {
		$uses_swell_shell = ! is_front_page() && ! is_page();

		return (bool) apply_filters( 'theme_uses_swell_content_shell', $uses_swell_shell );
	}
}

if ( ! function_exists( 'theme_output_swell_breadcrumb' ) ) {
	/**
	 * Output SWELL's breadcrumb at the configured position.
	 *
	 * @param string $position Breadcrumb position. Accepts `top` or `bottom`.
	 * @return void
	 */
	function theme_output_swell_breadcrumb( $position ) {
		if ( ! class_exists( 'SWELL_Theme' ) || SWELL_Theme::is_top() ) {
			return;
		}

		$swell_setting          = SWELL_Theme::get_setting();
		$is_top_breadcrumb_pos = ! empty( $swell_setting['pos_breadcrumb'] ) && 'top' === $swell_setting['pos_breadcrumb'];

		if ( 'top' === $position && ! $is_top_breadcrumb_pos ) {
			return;
		}

		if ( 'bottom' === $position && $is_top_breadcrumb_pos ) {
			return;
		}

		SWELL_Theme::get_parts( 'parts/breadcrumb' );
	}
}
