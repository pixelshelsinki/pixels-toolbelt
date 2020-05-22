<?php
/**
 * Class for outputting Google Analytics code.
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics;

use \Pixels\Toolbelt\Analytics\Google\Permissions;
use \Pixels\Toolbelt\Analytics\Google\Settings\GTMSettings;

/**
 * --> Output Google Tag Manager scripts.
 */
class GoogleTagManager {

	/**
	 * Settings instance.
	 *
	 * @var GASettings
	 */
	protected $settings;

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

		add_action( 'init', array( $this, 'maybe_add_google_tag_manager' ) );
		
	}

	/**
	 * Ensure we are within our rights to use Analytics.
	 */
	public function maybe_add_google_tag_manager() {
		$this->settings    = new GTMSettings();
		$this->permissions = new Permissions( $this->settings );

		if( $this->permissions->has_permission() ) :
			add_action( 'wp_head', array( $this, 'add_gtm_head' ), 99 );
			add_action( 'wp_body_open', array( $this, 'add_gtm_body' ) );
		endif;
	}

	/**
	 * Add GA <head> portion
	 */
	public function add_gtm_head() {
		?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo $this->settings->tracking_id ?>');</script>
		<!-- End Google Tag Manager -->		 
		<?php
	}

	/**
	 * Add GA <body> open portion
	 */
	public function add_gtm_body() {
		?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $this->settings->tracking_id ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?php
	}
}
