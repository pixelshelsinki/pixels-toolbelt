<?php
/**
 * Checks that required variables are set in the correct way.
 */

namespace PTB\Helpers\AdminNotices;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Creates the error message for if the project plugin slug is not set.
 *
 * @return void
 */
function project_plugin_slug_not_set() {
  ?>
  <div class="notice notice-error">
    <p><?php _e( 'The Project plugin slug is not set! Please set the slug for this project\'s plugin by adding <code>define(\'PIX_PROJECT_PLUGIN_SLUG\', \'{project_plugin_slug}\');</code> to <code>config/application.php</code>.', 'pixels-toolbelt' ); ?></p>
  </div>
  <?php
}

/**
 * Creates the error message for if the Google API key is not set correctly.
 *
 * @return void
 */
function google_api_key_not_set() {
  ?>
  <div class="notice notice-error">
    <p><?php _e( 'The <code>GOOGLE_API_KEY</code> global variable is not set! Please set the slug for this project\'s plugin in the env file by adding <code>GOOGLE_API_KEY={Google API Key}</code> to the <code>.env</code>. If you do not need a Google API key for this project, set the value of <code>GOOGLE_API_KEY</code> to <code>false</code>', 'pixels-toolbelt' ); ?></p>
  </div>
  <?php
}
