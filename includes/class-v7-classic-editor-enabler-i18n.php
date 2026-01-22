<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://vaibhawkumarparashar.in
 * @since      1.0.0
 *
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/includes
 */

// Prevent direct file access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/includes
 * @author     Vaibhaw Kumar <imvaibhaw@gmail.com>
 */
class V7_Classic_Editor_Enabler_i18n
{


    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'v7-classic-editor-enabler',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
