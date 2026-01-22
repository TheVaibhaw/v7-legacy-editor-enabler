<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://vaibhawkumarparashar.in
 * @since      1.0.0
 *
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/admin
 */

// Prevent direct file access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/admin
 * @author     Vaibhaw Kumar <imvaibhaw@gmail.com>
 */
class V7_Classic_Editor_Enabler_Admin
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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/v7-classic-editor-enabler-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/v7-classic-editor-enabler-admin.js', array('jquery'), $this->version, false);
    }

    /**
     * Add settings page under Settings menu.
     *
     * @since    1.0.0
     */
    public function add_settings_page()
    {
        add_options_page(
            esc_html__( 'V7 Classic Editor Enabler', 'v7-classic-editor-enabler' ),
            esc_html__( 'V7 Classic Editor', 'v7-classic-editor-enabler' ),
            'manage_options',
            'v7-classic-editor-enabler',
            array( $this, 'display_settings_page' )
        );
    }

    /**
     * Register settings.
     *
     * @since    1.0.0
     */
    public function register_settings()
    {
        // Check for redirect after activation (only on admin_init and for users who can manage options).
        if ( get_option( 'v7_classic_editor_redirect' ) && current_user_can( 'manage_options' ) ) {
            delete_option( 'v7_classic_editor_redirect' );
            wp_safe_redirect( esc_url( admin_url( 'options-general.php?page=v7-classic-editor-enabler' ) ) );
            exit;
        }

        register_setting(
            'v7_classic_editor_options',
            'v7_classic_editor_posts',
            array(
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default'           => '1',
            )
        );

        register_setting(
            'v7_classic_editor_options',
            'v7_classic_editor_pages',
            array(
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default'           => '1',
            )
        );

        add_settings_section(
            'v7_classic_editor_section',
            esc_html__( 'Classic Editor Settings', 'v7-classic-editor-enabler' ),
            array( $this, 'settings_section_callback' ),
            'v7_classic_editor_options'
        );

        add_settings_field(
            'v7_classic_editor_posts',
            esc_html__( 'Enable for Posts', 'v7-classic-editor-enabler' ),
            array( $this, 'posts_checkbox_callback' ),
            'v7_classic_editor_options',
            'v7_classic_editor_section'
        );

        add_settings_field(
            'v7_classic_editor_pages',
            esc_html__( 'Enable for Pages', 'v7-classic-editor-enabler' ),
            array( $this, 'pages_checkbox_callback' ),
            'v7_classic_editor_options',
            'v7_classic_editor_section'
        );
    }

    /**
     * Display the settings page.
     *
     * @since    1.0.0
     */
    public function display_settings_page()
    {
        // Check user capabilities.
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form method="post" action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>">
                <?php
                settings_fields( 'v7_classic_editor_options' );
                do_settings_sections( 'v7_classic_editor_options' );
                submit_button( esc_html__( 'Save Settings', 'v7-classic-editor-enabler' ) );
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Settings section callback.
     *
     * @since    1.0.0
     */
    public function settings_section_callback()
    {
        echo '<p>' . esc_html__( 'Select the post types for which you want to enable the Classic Editor.', 'v7-classic-editor-enabler' ) . '</p>';
    }

    /**
     * Posts checkbox callback.
     *
     * @since    1.0.0
     */
    public function posts_checkbox_callback()
    {
        $value = get_option( 'v7_classic_editor_posts', '1' );
        ?>
        <input type="checkbox" id="v7_classic_editor_posts" name="v7_classic_editor_posts" value="1" <?php checked( '1', $value ); ?> />
        <label for="v7_classic_editor_posts">
            <?php esc_html_e( 'Use Classic Editor for blog posts', 'v7-classic-editor-enabler' ); ?>
        </label>
        <?php
    }

    /**
     * Pages checkbox callback.
     *
     * @since    1.0.0
     */
    public function pages_checkbox_callback()
    {
        $value = get_option( 'v7_classic_editor_pages', '1' );
        ?>
        <input type="checkbox" id="v7_classic_editor_pages" name="v7_classic_editor_pages" value="1" <?php checked( '1', $value ); ?> />
        <label for="v7_classic_editor_pages">
            <?php esc_html_e( 'Use Classic Editor for pages', 'v7-classic-editor-enabler' ); ?>
        </label>
        <?php
    }
}
