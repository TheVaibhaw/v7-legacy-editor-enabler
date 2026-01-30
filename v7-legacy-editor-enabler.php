<?php
/**
 * Plugin Name:       V7 Legacy Editor Enabler
 * Plugin URI:        https://github.com/thevaibhaw/v7-legacy-editor-enabler
 * Description:       A lightweight plugin to disable Gutenberg block editor and enable the legacy TinyMCE editor for Posts and Pages with granular control.
 * Version:           1.0.0
 * Author:            Vaibhaw Kumar
 * Author URI:        https://vaibhawkumarparashar.in
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       v7-legacy-editor-enabler
 * Domain Path:       /languages
 * Requires at least: 5.0
 * Tested up to:      6.9
 * Requires PHP:      7.4
 *
 * @package V7_Legacy_Editor_Enabler
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'V7_LEGACY_EDITOR_ENABLER_VERSION', '1.0.0' );

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
/**
 * Activate the plugin.
 *
 * @since 1.0.0
 */
function activate_v7_legacy_editor_enabler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-v7-legacy-editor-enabler-activator.php';
	V7_Legacy_Editor_Enabler_Activator::activate();
}

/**
 * Deactivate the plugin.
 *
 * @since 1.0.0
 */
function deactivate_v7_legacy_editor_enabler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-v7-legacy-editor-enabler-activator.php';
	V7_Legacy_Editor_Enabler_Activator::deactivate();
}
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound

register_activation_hook( __FILE__, 'activate_v7_legacy_editor_enabler' );
register_deactivation_hook( __FILE__, 'deactivate_v7_legacy_editor_enabler' );

require plugin_dir_path( __FILE__ ) . 'includes/class-v7-legacy-editor-enabler.php';

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
/**
 * Begin execution of the plugin.
 *
 * @since 1.0.0
 */
function run_v7_legacy_editor_enabler() {
	$plugin = new V7_Legacy_Editor_Enabler();
	$plugin->run();
}
run_v7_legacy_editor_enabler();
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound
