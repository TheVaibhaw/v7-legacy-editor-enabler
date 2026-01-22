<?php
/**
 * Plugin Name:       V7 Classic Editor Enabler
 * Description:       A plugin to disable Gutenberg block editor and enable Classic Editor for Posts and Pages based on settings.
 * Version:           1.0.0
 * Author:            Vaibhaw Kumar
 * Author URI:        https://vaibhawkumarparashar.in
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       v7-classic-editor-enabler
 * Domain Path:       /languages
 * Requires at least: 5.0
 * Requires PHP:      7.4
 *
 * @package V7_Classic_Editor_Enabler
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'V7_CLASSIC_EDITOR_ENABLER_VERSION', '1.0.0' );

function activate_v7_classic_editor_enabler() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-v7-classic-editor-enabler-activator.php';
    V7_Classic_Editor_Enabler_Activator::activate();
}

function deactivate_v7_classic_editor_enabler() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-v7-classic-editor-enabler-activator.php';
    V7_Classic_Editor_Enabler_Activator::deactivate();
}

register_activation_hook( __FILE__, 'activate_v7_classic_editor_enabler' );
register_deactivation_hook( __FILE__, 'deactivate_v7_classic_editor_enabler' );

require plugin_dir_path( __FILE__ ) . 'includes/class-v7-classic-editor-enabler.php';

function run_v7_classic_editor_enabler() {
    $plugin = new V7_Classic_Editor_Enabler();
    $plugin->run();
}
run_v7_classic_editor_enabler();
