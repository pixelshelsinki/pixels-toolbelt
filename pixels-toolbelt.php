<?php
/**
 * Plugin Name:     Pixels Toolbelt
 * Description:     A plugin to handle common code for Pixels Helsinki projects.
 * Author:          Pixels Helsinki Oy
 * Author URI:      https://pixels.fi/
 * Text Domain:     pixels-toolbelt
 * Domain Path:     /languages
 * Version:         1.1.0
 *
 * @package         Pixels_Toolbelt
 */

// TODO: Change to fully qualified namespace.
namespace PTB;

use \Pixels\Toolbelt\ACF\Loadpoints;
use \Pixels\Toolbelt\ACF\OptionsPages;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Composer autoload.
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Init class based components.
 * TODO: move the whole bootstrap to class based.
 */
$loadpoints    = new Loadpoints();
$options_pages = new OptionsPages();

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
