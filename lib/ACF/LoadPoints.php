<?php
/**
 * Class for ACF Loadpoints.
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\ACF;

/**
 * Add ACF loadpoint for fields declared in Toolbelt
 * Path: pixels-toolbelt/Migrations/fields.
 */
class Loadpoints {

	/**
	 * Path to field migration files.
	 * Relative to mu-plugins folder.
	 *
	 * @var string.
	 */
	const FIELD_MIGRATIONS_PATH = '/pixels-toolbelt/Migrations/Fields';

	/**
	 * Class constructor
	 */
	public function __construct() {
		add_filter( 'acf/settings/load_json', array( $this, 'add_acf_json_load_point' ), 99 );
	}

	/**
	 * Register custom load point for Toolbelt ACF meta
	 *
	 * @param array $paths of json load points.
	 * @return array $paths that were modified.
	 */
	public function add_acf_json_load_point( array $paths ) : array {
		$paths[] = WPMU_PLUGIN_DIR . self::FIELD_MIGRATIONS_PATH;

		return $paths;
	}
}
