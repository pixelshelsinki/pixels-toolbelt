<?php
/**
 * Analytics Settings Interface.
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics\Contracts;

/**
 * Interface for mapping ACF options to data objects.
 */
interface SettingsInterface {

	public function get_settings_key();

	public function get_settings();

	public function populate_settings();
}
