<?php
/**
 * Class for GA Settings
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics\Google\Settings;

use \Pixels\Toolbelt\Analytics\Google\Settings\AbstractTrackingSettings;

/**
 * Data class for mapping ACF options to class.
 */
class GASettings extends AbstractTrackingSettings {

	/**
	 * Options key to use for data mapping.
	 */
	const SETTINGS_KEY = 'ptb_google_analytics';
}
