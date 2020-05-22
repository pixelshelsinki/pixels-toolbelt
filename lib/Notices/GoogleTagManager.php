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
use \Pixels\Toolbelt\Analytics\Google\Settings\GTMSettings;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * GTM notices class
 * Adds admin notices for missing settings.
 */
class GoogleTagManager extends AbstractNotice {

	/**
	 * Run Admin notices from child classes.
	 */
	public static function check_notices() {
		$options_set = self::check_options();

		if ( ! $options_set ) :
			self::print( __( 'Google Tag Manager is enabled, but tracking ID is not set. See Settings -> Analytics.', 'pixels-toolbelt' ) );
		endif;
	}

	/**
	 * Check that Accredible options are set.
	 *
	 * @return bool $options_set true/false;
	 */
	public static function check_options() {
		$settings = new GTMSettings();

		$options_set = !
			$settings->is_enabled || 
			($settings->is_enabled === true && $settings->tracking_id !== '');

		return $options_set;
	}

}
