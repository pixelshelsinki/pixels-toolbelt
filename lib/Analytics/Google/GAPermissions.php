<?php
/**
 * Class for checking GA permissions
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics\Google;

// Contracts.
use \Pixels\Toolbelt\Analytics\Contracts\PermissionInterface;

/**
 * Ensures we're within our rights to add GA.
 */
class GAPermissions {

	/**
	 * Is enabled in settings.
	 *
	 * @var bool.
	 */
	public $is_enabled;

	/**
	 * Is production env.
	 *
	 * @var bool.
	 */
	public $is_production;

	/**
	 * Tracking ID from settings.
	 *
	 * @var string.
	 */
	public $tracking_id;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->is_enabled    = $this->check_settings();
		$this->is_production = $this->check_environment();
	}

	/**
	 * Check if is settings are ok & not disabled.
	 *
	 * @return bool $enabled status.
	 */
	public function check_settings() : bool {
		$enabled = false;

		$settings = \get_field( 'ptb_google_analytics', 'option' );

		if( $settings ):

			if ( array_key_exists( 'disabled', $settings ) && $settings['disabled'] !=true ) :
				if ( array_key_exists( 'tracking_id', $settings ) && $settings['tracking_id'] !== "" ) :
					$this->tracking_id = $settings['tracking_id'];
					$enabled = true;
				endif;
			endif;
		endif;

		return $enabled;
	}

	/**
	 * Check if is production & user is not admin.
	 *
	 * @return bool $enabled status.
	 */
	public function check_environment() : bool {
		$enabled = false;

		if ( ( ! defined('WP_ENV') || \WP_ENV === 'production') && !current_user_can('manage_options') ) :
			$enabled = true;
		endif;

		return $enabled;
	}	

	/**
	 * Check if we can use analytics.
	 * --> Must be production.
	 * --> Must be enabled.
	 * --> Must have settings.
	 */
	public function has_permission() : bool {
		$has_permission = false;

		if( $this->is_enabled &&
			$this->is_production
		) :
			$has_permission = true;
		endif;

		return $has_permission;
	}
}
