<?php
/**
 * Modifications for the ACF plugin.
 */

namespace PixelsToolbelt\Modifications\ACF;
use PixelsToolbelt\Helpers\AdminNotices;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Hides the ACF admin menu on any environment other than development.
 *
 * @param  boolean $show Whether or not to show the admin menu.
 * @return boolean       Whether or not to show the admin menu.
 */
function hide_admin_menu_on_production( $show ) {
	if ( WP_ENV !== 'development' ) {
		$show = false;
	}

	return $show;
}
add_filter('acf/settings/show_admin', 'hide_admin_menu_on_production');

/**
 * Exposes a Google API key to ACF so that the Google Maps field works in the
 * admin interface.
 *
 * @return void
 */
function add_google_api_key_for_acf() {
	if ( defined( 'GOOGLE_API_KEY' ) ) {
		acf_update_setting( 'google_api_key', GOOGLE_API_KEY );
	} else {
		add_action( 'admin_notices', 'AdminNotices\\google_api_key_not_set' );
	}
}
add_action( 'acf/init', 'add_google_api_key_for_acf' );

/**
 * Set the location where ACF saves JSON files.
 *
 * This requires the `PIX_PROJECT_PLUGIN_SLUG` to be set in `config/application.php`.
 *
 * @param  string $path Existing path to the json save point.
 * @return string       New path to json save point.
 */
function acf_json_save_point( $path ) {
	if ( defined( 'PIX_PROJECT_PLUGIN_SLUG' ) ) {
    	$new_path = plugin_dir_path( dirname( dirname(__FILE__) ) ) . 'acf-json';
    	$new_path = str_replace( 'pixels-toolbelt', PIX_PROJECT_PLUGIN_SLUG, $new_path );

    	$path = $new_path;
 	} else {
		add_action( 'admin_notices', 'AdminNotices\\project_plugin_slug_not_set' );
	}

 	return $path;
}
add_filter( 'acf/settings/save_json', __NAMESPACE__ . '\\acf_json_save_point' );

/**
 * Adds a load point for JSON files.
 *
 * This requires the `PIX_PROJECT_PLUGIN_SLUG` to be set in `config/application.php`.
 *
 * @param  array $paths  Array of current paths to load points.
 * @return array         Modified array of paths to load points.
 */
function acf_json_load_point( $paths ) {
    if ( defined( 'PIX_PROJECT_PLUGIN_SLUG' ) ) {
		$new_path = plugin_dir_path( dirname( dirname( __FILE__) ) ) . 'acf-json';
		$new_path = str_replace( 'pixels-toolbelt', PIX_PROJECT_PLUGIN_SLUG, $new_path );

		$paths[] = $new_path;
    } else {
		add_action( 'admin_notices', 'AdminNotices\\project_plugin_slug_not_set' );
	}

    return $paths;
}
add_filter( 'acf/settings/load_json', __NAMESPACE__ . '\\acf_json_load_point' );

/**
 * Sets the default language for ACF settings from Polylang.
 *
 * @param  string $language Existing default language.
 * @return string           Default language according to Polylang.
 */
function acf_settings_default_language( $language ) {
	if ( function_exists( 'pll_default_language') ) {
		$language = pll_default_language();
	}

	return $language;
}
add_filter( 'acf/settings/default_language', __NAMESPACE__ . '\\acf_settings_default_language' );

/**
 * Sets the current language for ACF settings from Polylang.
 *
 * @param  string $language Existing current language.
 * @return string           Current language according to Polylang.
 */
function acf_settings_current_language( $language ) {
	if ( function_exists( 'pll_current_language') ) {
		$language = pll_current_language();
	}

	return $language;
}
add_filter( 'acf/settings/current_language', __NAMESPACE__ . '\\acf_settings_current_language' );
