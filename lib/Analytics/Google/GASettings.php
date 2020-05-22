<?php
/**
 * Class for GA Settings
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics\Google;

/**
 * Data class for mapping ACF options to class.
 */
class GASettings {

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
	public $tracking_id = "";

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->get_settings();
	}

	/**
	 * Populate props from settings.
	 */
	public function get_settings() {
		$settings = \get_field( 'ptb_google_analytics', 'option' );

		if( $settings ):

			if ( array_key_exists( 'disabled', $settings ) ) :
				$this->is_enabled = ! $settings['disabled'];
			endif;

			if ( array_key_exists( 'tracking_id', $settings ) ) :
				$this->tracking_id = $settings['tracking_id'];
			endif;
				
		endif;
	}	
}
