<?php
/**
 * Class for (ACF) options pages.
 *
 * @package Toolbelt..
 */

namespace Pixels\Toolbelt\ACF;

/**
 * Instantiates individual options pages
 */
class OptionsPages {

	/**
	 * Options page.
	 *
	 * @var Class
	 */
	private $ga;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Load ACF options pages.
		add_filter( 'acf/init', array( $this, 'load_acf_options_pages' ) );
	}

	/**
	 * Load individual options pages
	 *
	 * @since 1.0
	 */
	public function load_acf_options_pages() {

		// Load options pages.
		$this->ga = new OptionsPages\GA();
	}

}
