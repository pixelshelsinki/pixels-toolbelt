<?php
/**
 * Class for AbstractGoogleSettings
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics\Google\Settings;

use \Pixels\Toolbelt\Analytics\Contracts\SettingsInterface;

/**
 * Data class for mapping ACF options to class.
 */
abstract class AbstractTrackingSettings implements SettingsInterface {

	const SETTINGS_KEY = '';

	/**
	 * Is enabled in settings.
	 *
	 * @var bool.
	 */
	public $is_enabled = false;

	/**
	 * Tracking ID from settings.
	 *
	 * @var string.
	 */
	public $tracking_id = '';

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->populate_settings();
	}

	/**
	 * Get meta key for options.
	 *
	 * @return string.
	 */
	public function get_settings_key() {
		return static::SETTINGS_KEY;
	}

	/**
	 * Get settings from ACF options page.
	 *
	 * @return array $settings to use.
	 */
	public function get_settings() {
		$settings = \get_field( $this->get_settings_key(), 'option' );

		return $settings;
	}

	/**
	 * Populate props from settings.
	 */
	public function populate_settings() {
		$settings = $this->get_settings();

		if ( $settings ) :
			if ( array_key_exists( 'disabled', $settings ) ) :
				$this->is_enabled = ! $settings['disabled'];
			endif;

			if ( array_key_exists( 'tracking_id', $settings ) ) :
				$this->tracking_id = $settings['tracking_id'];
			endif;
		endif;
	}
}
