<?php
/**
 * Class for Google Analytics settings notices
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Notices;

// Notices.
use \Pixels\Toolbelt\Notices\Contracts\AbstractNotice;

// Services.
use \Pixels\Toolbelt\Analytics\Google\GASettings;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * GA notices class
 * Adds admin notices for missing settings.
 */
class GoogleAnalytics extends AbstractNotice {

	/**
	 * Run Admin notices from child classes.
	 */
	public static function check_notices() {
		$options_set = self::check_options();

		if ( ! $options_set ) :
			self::print( __( 'Google Analytics options not set. See Settings -> Analytics.', 'pixels-toolbelt' ) );
		endif;
	}

	/**
	 * Check that Accredible options are set.
	 *
	 * @return bool $options_set true/false;
	 */
	public static function check_options() {
		$settings = new GASettings();

		$options_set = !
			$settings->is_enabled || 
			($settings->is_enabled === true && $settings->tracking_id !== '');

		return $options_set;
	}

}
