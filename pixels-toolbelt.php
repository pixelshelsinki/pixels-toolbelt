<?php
/**
 * Plugin Name:     Pixels Toolbelt
 * Description:     A plugin to handle common code for Pixels Helsinki projects.
 * Author:          Pixels Helsinki Oy
 * Author URI:      https://pixels.fi/
 * Text Domain:     pixels-toolbelt
 * Domain Path:     /languages
 * Version:         1.0.1
 *
 * @package         Pixels_Toolbelt
 */

namespace PTB;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The list of files to include.
 * @var array
 */
$ptb_includes = [
	'helpers/admin-notices.php',
	'modifications/acf.php',
	'modifications/seo-framework.php',
	'modifications/wordpress.php',
	'modifications/yoast.php',
];

foreach ( $ptb_includes as $ptb_file ) {
	if ( ! $ptb_filepath = plugin_dir_path(__FILE__) . $ptb_file ) {
		/* Translators: %s is the name of the file that cannot be located */
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'pixels-toolbelt' ), $ptb_file ), E_USER_ERROR );
	}
	require_once $ptb_filepath;
}
unset( $ptb_file, $ptb_filepath );
