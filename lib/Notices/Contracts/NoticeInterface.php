<?php
/**
 * Notice Interface
 *
 * @package Toolbelt
 */

namespace Pixels\Toolbelt\Notices\Contracts;

/**
 * Notice interface
 */
interface NoticeInterface {

	/**
	 * Check if class should print notices.
	 * All notice classes need this for main Notice running instance.
	 */
	public static function check_notices();
}
