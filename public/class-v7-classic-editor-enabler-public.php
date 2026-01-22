<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://vaibhawkumarparashar.in
 * @since      1.0.0
 *
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/public
 */

// Prevent direct file access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/public
 * @author     Vaibhaw Kumar <imvaibhaw@gmail.com>
 */
class V7_Classic_Editor_Enabler_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in V7_Classic_Editor_Enabler_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The V7_Classic_Editor_Enabler_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/v7-classic-editor-enabler-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in V7_Classic_Editor_Enabler_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The V7_Classic_Editor_Enabler_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/v7-classic-editor-enabler-public.js', array('jquery'), $this->version, false);
    }

    /**
     * Disable block editor for selected post types.
     *
     * @since    1.0.0
     * @param    bool   $use_block_editor  Whether to use the block editor.
     * @param    string $post_type         The post type.
     * @return   bool
     */
    public function disable_block_editor($use_block_editor, $post_type)
    {
        if ($post_type === 'post' && get_option('v7_classic_editor_posts', '1') === '1') {
            return false;
        }
        if ($post_type === 'page' && get_option('v7_classic_editor_pages', '1') === '1') {
            return false;
        }
        return $use_block_editor;
    }
}
