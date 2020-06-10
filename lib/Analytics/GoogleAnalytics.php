<?php
/**
 * Class for outputting Google Analytics code.
 *
 * @package Toolbelt.
 */

namespace Pixels\Toolbelt\Analytics;

use \Pixels\Toolbelt\Analytics\Google\Permissions;
use \Pixels\Toolbelt\Analytics\Google\Settings\GASettings;

/**
 * --> Output Google Analytics js.
 * --> Output Google Analytics property id.
 */
class GoogleAnalytics {

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
		add_action( 'init', array( $this, 'maybe_add_google_analytics' ) );
	}

	/**
	 * Ensure we are within our rights to use Analytics.
	 */
	public function maybe_add_google_analytics() {
		$this->settings    = new GASettings();
		$this->permissions = new Permissions( $this->settings );

		if ( $this->permissions->has_permission() ) :
			add_action( 'wp_head', array( $this, 'add_ga_script' ) );
		endif;
	}

	/**
	 * Add GA tracking code & JS library to DOM.
	 */
	public function add_ga_script() {
		?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $this->settings->tracking_id; ?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?php echo $this->settings->tracking_id; ?>');
		</script>


		<script src="https://www.google-analytics.com/analytics.js" async defer></script>
		<?php
	}
}
