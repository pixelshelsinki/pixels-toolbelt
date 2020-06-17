<?php
/**
 * Analytics Permission Interface.
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics\Contracts;

/**
 * Define is analytics permission is given.
 */
interface PermissionInterface {

	public function has_permission() : bool;
}
