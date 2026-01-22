<?php
/**
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/includes
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class V7_Classic_Editor_Enabler {

    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        if ( defined( 'V7_CLASSIC_EDITOR_ENABLER_VERSION' ) ) {
            $this->version = V7_CLASSIC_EDITOR_ENABLER_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'v7-classic-editor-enabler';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-v7-classic-editor-enabler-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-v7-classic-editor-enabler-i18n.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-v7-classic-editor-enabler-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-v7-classic-editor-enabler-public.php';

        $this->loader = new V7_Classic_Editor_Enabler_Loader();
    }

    private function set_locale() {
        $plugin_i18n = new V7_Classic_Editor_Enabler_i18n();
        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
    }

    private function define_admin_hooks() {
        $plugin_admin = new V7_Classic_Editor_Enabler_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_settings_page' );
        $this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
    }

    private function define_public_hooks() {
        $plugin_public = new V7_Classic_Editor_Enabler_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_filter( 'use_block_editor_for_post_type', $plugin_public, 'disable_block_editor', 10, 2 );
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }
}
