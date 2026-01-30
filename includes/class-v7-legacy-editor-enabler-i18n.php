<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * Note: Since WordPress 4.6, translations for plugins hosted on WordPress.org
 * are loaded automatically. This class is kept for compatibility and future use.
 *
 * @package    V7_Legacy_Editor_Enabler
 * @subpackage V7_Legacy_Editor_Enabler/includes
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * Note: Since WordPress 4.6, translations for plugins hosted on WordPress.org
 * are loaded automatically. This class is kept for compatibility and future use.
 *
 * @since 1.0.0
 */
class V7_Legacy_Editor_Enabler_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * Note: For WordPress.org hosted plugins, translations are automatically
	 * loaded by WordPress. This method is kept for local development and
	 * non-WordPress.org installations.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {
		// WordPress.org automatically loads translations for hosted plugins.
		// This is kept for local development or self-hosted installations.
		// Uncomment the following lines if needed for development:
		/*
		load_plugin_textdomain(
			'v7-legacy-editor-enabler',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
		*/
	}
}
