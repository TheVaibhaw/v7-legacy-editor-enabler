<?php
/**
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/includes
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class V7_Classic_Editor_Enabler_Activator {

    public static function activate() {
        add_option( 'v7_classic_editor_posts', '1' );
        add_option( 'v7_classic_editor_pages', '1' );
        add_option( 'v7_classic_editor_redirect', '1' );
    }

    public static function deactivate() {
        // Options are preserved for reactivation
    }
}
