<?php
/**
 * Modifications for the Yoast plugin.
 */

namespace PTB\Modifications\Yoast;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Moves the Yoast SEO box to the end of the edit post page.
 *
 * @return string The metabox priority.
 */
function move_post_metabox_to_end() {
 	return 'low';
}
add_filter( 'wpseo_metabox_prio', __NAMESPACE__ . '\\move_post_metabox_to_end' );
