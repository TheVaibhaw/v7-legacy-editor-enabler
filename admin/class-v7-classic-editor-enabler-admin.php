<?php
/**
 * @package    V7_Classic_Editor_Enabler
 * @subpackage V7_Classic_Editor_Enabler/admin
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class V7_Classic_Editor_Enabler_Admin {

    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/v7-classic-editor-enabler-admin.css', array(), $this->version, 'all' );
    }

    public function enqueue_scripts() {
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/v7-classic-editor-enabler-admin.js', array( 'jquery' ), $this->version, false );
    }

    public function add_settings_page() {
        add_options_page(
            esc_html__( 'V7 Classic Editor Enabler', 'v7-classic-editor-enabler' ),
            esc_html__( 'V7 Classic Editor', 'v7-classic-editor-enabler' ),
            'manage_options',
            'v7-classic-editor-enabler',
            array( $this, 'display_settings_page' )
        );
    }

    public function register_settings() {
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

    public function display_settings_page() {
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

    public function settings_section_callback() {
        echo '<p>' . esc_html__( 'Select the post types for which you want to enable the Classic Editor.', 'v7-classic-editor-enabler' ) . '</p>';
    }

    public function posts_checkbox_callback() {
        $value = get_option( 'v7_classic_editor_posts', '1' );
        ?>
        <input type="checkbox" id="v7_classic_editor_posts" name="v7_classic_editor_posts" value="1" <?php checked( '1', $value ); ?> />
        <label for="v7_classic_editor_posts">
            <?php esc_html_e( 'Use Classic Editor for blog posts', 'v7-classic-editor-enabler' ); ?>
        </label>
        <?php
    }

    public function pages_checkbox_callback() {
        $value = get_option( 'v7_classic_editor_pages', '1' );
        ?>
        <input type="checkbox" id="v7_classic_editor_pages" name="v7_classic_editor_pages" value="1" <?php checked( '1', $value ); ?> />
        <label for="v7_classic_editor_pages">
            <?php esc_html_e( 'Use Classic Editor for pages', 'v7-classic-editor-enabler' ); ?>
        </label>
        <?php
    }
}
