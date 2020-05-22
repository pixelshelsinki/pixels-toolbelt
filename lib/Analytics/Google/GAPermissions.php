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
class GAPermissions implements PermissionInterface {

	/**
	 * GA settings instance.
	 *
	 * @var GASettings
	 */
	public $settings;

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
	public function __construct( $settings ) {
		$this->settings      = $settings; 
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

		if ( $this->settings->is_enabled == true &&
			$this->settings->tracking_id !== ""
		) :
			$enabled = true;
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
