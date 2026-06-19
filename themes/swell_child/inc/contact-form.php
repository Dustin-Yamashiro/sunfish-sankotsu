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
