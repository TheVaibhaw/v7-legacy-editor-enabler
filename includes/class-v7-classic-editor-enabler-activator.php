<?php
/**
 * Fired during plugin activation.
 *
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/includes
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since 1.0.0
 */
class V7_Classic_Editor_Enabler_Activator {

	/**
	 * Activate the plugin.
	 *
	 * Set default options on activation. If options already exist (from previous install),
	 * they are preserved to maintain user settings.
	 *
	 * @since 1.0.0
	 */
	public static function activate() {
		if ( false === get_option( 'v7_classic_editor_posts' ) ) {
			add_option( 'v7_classic_editor_posts', '1' );
		}
		if ( false === get_option( 'v7_classic_editor_pages' ) ) {
			add_option( 'v7_classic_editor_pages', '1' );
		}
		add_option( 'v7_classic_editor_redirect', '1' );
	}

	/**
	 * Deactivate the plugin.
	 *
	 * Options are preserved for reactivation to maintain user settings.
	 *
	 * @since 1.0.0
	 */
	public static function deactivate() {
	}
}
