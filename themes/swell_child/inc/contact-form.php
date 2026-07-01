<?php
/**
 * Contact Form 7 integration.
 *
 * @package SunfishSankotsu
 */

/**
 * Prevent Contact Form 7 from wrapping field rows in extra p/br tags.
 *
 * @return bool
 */
function theme_cf7_disable_autop() {
	return false;
}
add_filter( 'wpcf7_autop_or_not', 'theme_cf7_disable_autop' );

/**
 * Keep the contact completion page out of search results.
 *
 * @param array $robots Robots directives.
 * @return array
 */
function theme_noindex_contact_thanks_page( $robots ) {
	if ( is_page( 'thanks' ) ) {
		$robots['noindex'] = true;
		$robots['follow']  = true;
	}

	return $robots;
}
add_filter( 'wp_robots', 'theme_noindex_contact_thanks_page' );
