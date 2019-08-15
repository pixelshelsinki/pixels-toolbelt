<?php
/**
 * Plugin Name:     Pixels Toolbelt
 * Description:     A plugin to handle common code for Pixels Helsinki projects.
 * Author:          Pixels Helsinki Oy
 * Author URI:      https://pixels.fi/
 * Text Domain:     pixels-toolbelt
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Pixels_Toolbelt
 */

namespace PixelsToolbelt;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// TEMP: global vars to check for (set in config/application)
// - Google API Key
// - project slug
// - plugin slug
// - theme slug

/**
 * The list of files to include.
 * @var array
 */
$includes = [
	'helpers/admin-notices.php',
	'modifications/acf.php',
	'modifications/seo-framework.php',
	'modifications/wordpress.php',
	'modifications/wordpress.php',
];

foreach ( $includes as $file ) {
	if ( ! $filepath = plugin_dir_path(__FILE__) . $file ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'pixels-toolbelt' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );
