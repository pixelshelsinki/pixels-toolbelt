<?php
/**
 * Class for Admin Notices
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Bootstraps various admin messages.
 * Common use case: missing setting.
 */
class Notices {

	/**
	 * Motice classes to be run on admin.
	 *
	 * @var array.
	 */
	const NOTICE_CLASSES = array(
		'GoogleAnalytics',
		'GoogleTagManager',
	);

	/**
	 * Class constructor.
	 */
	public function __construct() {

		// Action for running all Projektipassi notices.
		add_action( 'admin_notices', array( $this, 'check_notices' ) );
	}

	/**
	 * Run Admin notices from child classes.
	 */
	public function check_notices() {
		foreach ( self::NOTICE_CLASSES as $class ) :
			$notice_class = __NAMESPACE__ . '\\Notices\\' . $class;
			\call_user_func( array( $notice_class, 'check_notices' ) );
		endforeach;
	}


} // end Notices
