<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/includes
 * @author     Vaibhaw Kumar <imvaibhaw@gmail.com>
 */

// Prevent direct file access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class V7_Classic_Editor_Enabler_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        // Set default options
        add_option('v7_classic_editor_posts', '1');
        add_option('v7_classic_editor_pages', '1');

        // Set flag for redirect after activation
        add_option('v7_classic_editor_redirect', '1');
    }

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        // Clean up options if needed, but keep them for reactivation
    }
}
