<?php
/**
 * Modifications for the SEO Framework plugin.
 */

namespace PTB\Modifications\SEOFramework;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Moves the SEO Framework SEO box to the end of the edit post page.
 *
 * @return string The metabox priority.
 */
function move_post_metabox_to_end() {
	return 'low';
}
add_filter( 'the_seo_framework_metabox_priority', __NAMESPACE__ . '\\move_post_metabox_to_end' );
