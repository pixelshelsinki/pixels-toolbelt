<?php
/**
 * Class for outputting Google Analytics code.
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics;

use \Pixels\Toolbelt\Analytics\Google\GAPermissions;

/**
 * --> Output Google Analytics js.
 * --> Output Google Analytics property id. 
 */
class GoogleAnalytics {

	/**
	 * Permissions instance.
	 *
	 * @var PermissionsInterface
	 */
	protected $permissions;

	/**
	 * Class constructor
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'maybe_add_google_analytics' ) );
		
	}

	public function maybe_add_google_analytics() {
		$this->permissions = new GAPermissions();

		if( $this->permissions->has_permission() ) :
			var_dump( 'yes' );
		else:
			var_dump( 'no' );
		endif;
	}
}
