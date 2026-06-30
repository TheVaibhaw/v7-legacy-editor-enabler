<?php
/**
 * @package    V7_Legacy_Editor_Enabler
 * @subpackage V7_Legacy_Editor_Enabler/public
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class V7_Legacy_Editor_Enabler_Public {

    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    public function disable_block_editor( $use_block_editor, $post_type ) {
        $option_name = 'v7_legacy_editor_' . $post_type;

        if ( '1' === get_option( $option_name, '1' ) ) {
            return false;
        }
        return $use_block_editor;
    }
}
