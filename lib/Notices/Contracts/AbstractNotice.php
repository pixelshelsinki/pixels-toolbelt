<?php
/**
 * Class for Abstract Notice
 * All notices should inherit this class.
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Notices\Contracts;

use \Pixels\Toolbelt\Notices\Contracts\NoticeInterface;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Abstract Notice class
 * Offers implementation for showing notices
 */
abstract class AbstractNotice implements NoticeInterface {

	/**
	 * Throw admin error.
	 *
	 * @param string $msg to be shown.
	 */
	protected static function print( $msg ) {
		ob_start() ?>

		<div class="notice notice-error">
			<p><?php echo esc_html( $msg ); ?></p>
		</div>

		<?php
		echo wp_kses(
			ob_get_clean(),
			array(
				'div' => array( 'class' => array() ),
				'p'   => array(),
			)
		);
	}

	/**
	 * Method for checking notices.
	 * Must be implemented by child classes.
	 */
	abstract static function check_notices();
}
