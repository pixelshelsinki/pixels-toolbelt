<?php
/**
 * Modifications for WordPress.
 */

namespace PTB\Modifications\WordPress;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add SVG to allow mimetypes.
 *
 * @param  array $mimes  Allowed mimetypes.
 * @return array         Newly allowed mimetypes.
 */
function allow_svg_upload( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', __NAMESPACE__ . '\\allow_svg_upload' );

function disable_not_applicable_site_health_checks( $tests ) {
	if ( ! empty( AUTOMATIC_UPDATER_DISABLED ) ) {
		unset( $tests['async']['background_updates'] );
	}

	return $tests;
}
add_filter( 'site_status_tests', __NAMESPACE__ . '\\disable_not_applicable_site_health_checks' );
