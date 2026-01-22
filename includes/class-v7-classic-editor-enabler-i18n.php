<?php
/**
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/includes
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class V7_Classic_Editor_Enabler_i18n {

    public function load_plugin_textdomain() {
        load_plugin_textdomain(
            'v7-classic-editor-enabler',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );
    }
}
