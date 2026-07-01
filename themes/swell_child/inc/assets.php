<?php
/**
 * Theme asset loading for Vite development and production builds.
 *
 * @package LocalEnvTheme
 */

/**
 * Return the local Vite dev server URL.
 *
 * @return string
 */
function theme_vite_server_url() {
	$config_path = get_stylesheet_directory() . '/localhost.json';
	$default_url = 'http://localhost:5173/';

	if ( ! file_exists( $config_path ) ) {
		return $default_url;
	}

	$config = json_decode( (string) file_get_contents( $config_path ), true );

	if ( empty( $config['url'] ) || ! is_string( $config['url'] ) ) {
		return $default_url;
	}

	return trailingslashit( esc_url_raw( $config['url'] ) );
}

/**
 * Return a Vite source asset URL.
 *
 * @param string $path Relative path from the project root.
 * @return string
 */
function theme_vite_asset_url( $path ) {
	return theme_vite_server_url() . ltrim( (string) $path, '/' );
}

/**
 * Determine whether the theme should load source assets from Vite.
 *
 * @return bool
 */
function theme_is_vite_development() {
	return 'local' === wp_get_environment_type() && file_exists( get_stylesheet_directory() . '/localhost.json' );
}

/**
 * Return the current local request base URL when the host is safe for local review.
 *
 * @return string
 */
function theme_local_request_base_url() {
	if ( 'local' !== wp_get_environment_type() || empty( $_SERVER['HTTP_HOST'] ) ) {
		return '';
	}

	$host = sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) );

	if ( ! theme_is_safe_local_host( $host ) ) {
		return '';
	}

	return ( is_ssl() ? 'https://' : 'http://' ) . $host;
}

/**
 * Determine whether a host is safe for local URL rewriting.
 *
 * @param string $host Host with optional port.
 * @return bool
 */
function theme_is_safe_local_host( $host ) {
	return (bool) preg_match(
		'/^(localhost|127\.0\.0\.1|10\.\d{1,3}\.\d{1,3}\.\d{1,3}|172\.(1[6-9]|2\d|3[01])\.\d{1,3}\.\d{1,3}|192\.168\.\d{1,3}\.\d{1,3})(:\d+)?$/',
		$host
	);
}

/**
 * Use the current request host for local WordPress URLs.
 *
 * @param string $url Stored option value.
 * @return string
 */
function theme_filter_local_site_url( $url ) {
	$request_url = theme_local_request_base_url();

	return $request_url ? $request_url : $url;
}
add_filter( 'option_home', 'theme_filter_local_site_url' );
add_filter( 'option_siteurl', 'theme_filter_local_site_url' );

/**
 * Replace a safe local URL origin with the current request origin.
 *
 * @param string $url URL to rewrite.
 * @return string
 */
function theme_replace_local_url_origin( $url ) {
	if ( ! is_string( $url ) || '' === $url ) {
		return $url;
	}

	$request_url = theme_local_request_base_url();

	if ( ! $request_url ) {
		return $url;
	}

	$parts = wp_parse_url( $url );

	if ( empty( $parts['scheme'] ) || empty( $parts['host'] ) ) {
		return $url;
	}

	$host = $parts['host'];

	if ( ! empty( $parts['port'] ) ) {
		$host .= ':' . $parts['port'];
	}

	if ( ! theme_is_safe_local_host( $host ) ) {
		return $url;
	}

	$path     = isset( $parts['path'] ) ? $parts['path'] : '';
	$query    = isset( $parts['query'] ) ? '?' . $parts['query'] : '';
	$fragment = isset( $parts['fragment'] ) ? '#' . $parts['fragment'] : '';

	return $request_url . $path . $query . $fragment;
}

/**
 * Use the current local request host for media URLs as well.
 *
 * @param string $url Attachment URL.
 * @return string
 */
function theme_filter_local_attachment_url( $url ) {
	return theme_replace_local_url_origin( $url );
}
add_filter( 'wp_get_attachment_url', 'theme_filter_local_attachment_url' );

/**
 * Use the current local request host for upload base URLs.
 *
 * @param array $uploads Upload directory data.
 * @return array
 */
function theme_filter_local_upload_dir( $uploads ) {
	if ( ! empty( $uploads['baseurl'] ) ) {
		$uploads['baseurl'] = theme_replace_local_url_origin( $uploads['baseurl'] );
	}

	if ( ! empty( $uploads['url'] ) ) {
		$uploads['url'] = theme_replace_local_url_origin( $uploads['url'] );
	}

	return $uploads;
}
add_filter( 'upload_dir', 'theme_filter_local_upload_dir' );

/**
 * Use the current local request host for theme and loader asset URLs.
 *
 * SWELL generates parent theme CSS/JS from theme directory URLs. When the site
 * is reviewed through a LAN IP, leaving those URLs on localhost makes icon
 * fonts cross-origin and causes missing or garbled icons.
 *
 * @param string $url Asset URL.
 * @return string
 */
function theme_filter_local_asset_url( $url ) {
	return theme_replace_local_url_origin( $url );
}
add_filter( 'theme_file_uri', 'theme_filter_local_asset_url' );
add_filter( 'template_directory_uri', 'theme_filter_local_asset_url' );
add_filter( 'stylesheet_directory_uri', 'theme_filter_local_asset_url' );

/**
 * Use the current request host for enqueued assets except Vite dev assets.
 *
 * @param string $url    Asset URL.
 * @param string $handle Asset handle.
 * @return string
 */
function theme_filter_local_loader_asset_url( $url, $handle ) {
	if ( in_array( $handle, array( 'theme-vite-style', 'theme-vite-main' ), true ) ) {
		return $url;
	}

	return theme_replace_local_url_origin( $url );
}
add_filter( 'style_loader_src', 'theme_filter_local_loader_asset_url', 10, 2 );
add_filter( 'script_loader_src', 'theme_filter_local_loader_asset_url', 10, 2 );

/**
 * Prevent canonical redirects from forcing localhost during LAN review.
 *
 * @param string|false $redirect_url Redirect URL.
 * @return string|false
 */
function theme_disable_local_canonical_redirect( $redirect_url ) {
	return theme_local_request_base_url() ? false : $redirect_url;
}
add_filter( 'redirect_canonical', 'theme_disable_local_canonical_redirect' );

/**
 * Print the Vite client script in local development.
 */
function theme_print_vite_client() {
	if ( ! theme_is_vite_development() ) {
		return;
	}

	printf(
		'<script type="module" src="%s"></script>' . "\n",
		esc_url( theme_vite_asset_url( '@vite/client' ) )
	);
}
add_action( 'wp_head', 'theme_print_vite_client', 1 );

/**
 * Add module type to local Vite scripts and built module scripts.
 *
 * @param string $tag    Script tag.
 * @param string $handle Script handle.
 * @param string $src    Script source URL.
 * @return string
 */
function theme_script_loader_tag( $tag, $handle, $src ) {
	$module_handles = array(
		'theme-vite-main',
		'theme-main',
	);

	if ( in_array( $handle, $module_handles, true ) ) {
		return sprintf(
			'<script type="module" src="%s"></script>' . "\n",
			esc_url( $src )
		);
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'theme_script_loader_tag', 10, 3 );

/**
 * Register third-party assets used by the project.
 */
function theme_register_vendor_assets() {
	wp_register_style(
		'splide',
		'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css',
		array(),
		'4.1.4'
	);
	wp_register_script(
		'splide',
		'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js',
		array(),
		'4.1.4',
		array( 'strategy' => 'defer' )
	);
}
add_action( 'wp_enqueue_scripts', 'theme_register_vendor_assets', 5 );

/**
 * Enqueue project fonts.
 */
function theme_enqueue_fonts() {
	wp_enqueue_style(
		'theme-google-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Noto+Serif+JP:wght@400;500;600;700&family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_fonts', 10 );

/**
 * Enqueue third-party assets used by site scripts.
 */
function theme_enqueue_vendor_assets() {
	wp_enqueue_style( 'splide' );
	wp_enqueue_script( 'splide' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_vendor_assets', 15 );

/**
 * Enqueue one Vite manifest entry.
 *
 * @param array  $manifest Manifest data.
 * @param string $entry    Entry key.
 * @param string $handle   Asset handle.
 */
function theme_enqueue_vite_manifest_entry( $manifest, $entry, $handle ) {
	if ( empty( $manifest[ $entry ] ) || ! is_array( $manifest[ $entry ] ) ) {
		return;
	}

	$item = $manifest[ $entry ];

	if ( ! empty( $item['css'] ) && is_array( $item['css'] ) ) {
		foreach ( $item['css'] as $index => $css_file ) {
			wp_enqueue_style(
				$handle . '-css-' . $index,
				theme_asset_url( $css_file ),
				array(),
				null
			);
		}
	}

	if ( ! empty( $item['file'] ) && preg_match( '/\.css$/', $item['file'] ) ) {
		wp_enqueue_style(
			$handle,
			theme_asset_url( $item['file'] ),
			array(),
			null
		);
		return;
	}

	if ( ! empty( $item['file'] ) ) {
		wp_enqueue_script(
			$handle,
			theme_asset_url( $item['file'] ),
			array(),
			null,
			array( 'in_footer' => true )
		);
	}
}

/**
 * Enqueue theme CSS and JavaScript.
 */
function theme_enqueue_assets() {
	if ( theme_is_vite_development() ) {
		wp_enqueue_style(
			'theme-vite-style',
			theme_vite_asset_url( 'assets/scss/style.scss' ),
			array(),
			null
		);
		wp_enqueue_script(
			'theme-vite-main',
			theme_vite_asset_url( 'assets/js/main.js' ),
			array(),
			null,
			array( 'in_footer' => true )
		);
		return;
	}

	$manifest_path = theme_asset_path( '.vite/manifest.json' );

	if ( ! file_exists( $manifest_path ) ) {
		return;
	}

	$manifest = json_decode( (string) file_get_contents( $manifest_path ), true );

	if ( ! is_array( $manifest ) ) {
		return;
	}

	theme_enqueue_vite_manifest_entry( $manifest, 'assets/scss/style.scss', 'theme-style' );
	theme_enqueue_vite_manifest_entry( $manifest, 'assets/js/main.js', 'theme-main' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets', 20 );

/**
 * Limit CORS to local Vite development only.
 */
function theme_send_local_vite_cors_headers() {
	if ( ! theme_is_vite_development() ) {
		return;
	}

	$vite_url = wp_parse_url( theme_vite_server_url() );

	if ( empty( $vite_url['scheme'] ) || empty( $vite_url['host'] ) ) {
		return;
	}

	$origin = $vite_url['scheme'] . '://' . $vite_url['host'];

	if ( ! empty( $vite_url['port'] ) ) {
		$origin .= ':' . $vite_url['port'];
	}

	header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $origin ) );
}
add_action( 'send_headers', 'theme_send_local_vite_cors_headers' );
