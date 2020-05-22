<?php
/**
 * Class for GA / GTM Options Page.
 *
 * @package Sooma.
 */

namespace Pixels\Toolbelt\ACF\OptionsPages;

/**
 * Register options page for setting up Google Analytics.
 *
 * @since 1.0
 */
class GA {

	/**
	 * Class constructor
	 */
	public function __construct() {
		acf_add_options_sub_page(
			array(
				'page_title'  => 'Google Analytics Settings',
				'menu_title'  => 'Analytics',
				'parent_slug' => 'options-general.php',
			)
		);
	}

}
