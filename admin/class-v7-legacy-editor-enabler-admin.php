<?php
/**
 * @package    V7_Legacy_Editor_Enabler
 * @subpackage V7_Legacy_Editor_Enabler/admin
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin-specific functionality of the plugin.
 *
 * @since 1.0.0
 */
class V7_Legacy_Editor_Enabler_Admin {

	/**
	 * @var string
	 */
	private $plugin_name;

	/**
	 * @var string
	 */
	private $version;

	/**
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * @param string $hook The current admin page hook.
	 */
	public function enqueue_styles( $hook ) {
		if ( 'settings_page_v7-legacy-editor-enabler' !== $hook ) {
			return;
		}
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/v7-legacy-editor-enabler-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * @param string $hook The current admin page hook.
	 */
	public function enqueue_scripts( $hook ) {
		if ( 'settings_page_v7-legacy-editor-enabler' !== $hook ) {
			return;
		}
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/v7-legacy-editor-enabler-admin.js', array( 'jquery' ), $this->version, true );
	}

	public function add_settings_page() {
		add_options_page(
			esc_html__( 'V7 Legacy Editor Enabler', 'v7-legacy-editor-enabler' ),
			esc_html__( 'V7 Legacy Editor', 'v7-legacy-editor-enabler' ),
			'manage_options',
			'v7-legacy-editor-enabler',
			array( $this, 'display_settings_page' )
		);
	}

	public function register_settings() {
		if ( get_option( 'v7_legacy_editor_redirect' ) && current_user_can( 'manage_options' ) ) {
			delete_option( 'v7_legacy_editor_redirect' );
			wp_safe_redirect( esc_url( admin_url( 'options-general.php?page=v7-legacy-editor-enabler' ) ) );
			exit;
		}

		register_setting(
			'v7_legacy_editor_options',
			'v7_legacy_editor_post_types',
			array(
				'type'              => 'array',
				'sanitize_callback' => array( $this, 'sanitize_post_types' ),
				'default'           => array( 'post', 'page' ),
			)
		);

		register_setting(
			'v7_legacy_editor_options',
			'v7_legacy_editor_roles',
			array(
				'type'              => 'array',
				'sanitize_callback' => array( $this, 'sanitize_roles' ),
				'default'           => array(),
			)
		);

		register_setting(
			'v7_legacy_editor_options',
			'v7_legacy_editor_clean_assets',
			array(
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '0',
			)
		);
	}

	/**
	 * @param  mixed $input Raw input.
	 * @return array Sanitized array of post type slugs.
	 */
	public function sanitize_post_types( $input ) {
		if ( ! is_array( $input ) ) {
			return array();
		}
		return array_map( 'sanitize_key', $input );
	}

	/**
	 * @param  mixed $input Raw input.
	 * @return array Sanitized array of role slugs.
	 */
	public function sanitize_roles( $input ) {
		if ( ! is_array( $input ) ) {
			return array();
		}
		return array_map( 'sanitize_key', $input );
	}

	/**
	 * @return array Array of post type objects.
	 */
	private function get_eligible_post_types() {
		$post_types = get_post_types(
			array(
				'show_ui' => true,
			),
			'objects'
		);

		unset( $post_types['attachment'] );

		return $post_types;
	}

	/**
	 * @return array Statistics array with counts.
	 */
	private function get_editor_stats() {
		$enabled_types = get_option( 'v7_legacy_editor_post_types', array( 'post', 'page' ) );
		$all_types     = array_keys( $this->get_eligible_post_types() );

		$legacy_count = 0;
		$block_count  = 0;

		foreach ( $all_types as $type ) {
			$count_obj = wp_count_posts( $type );
			$total     = isset( $count_obj->publish ) ? (int) $count_obj->publish : 0;
			$total    += isset( $count_obj->draft ) ? (int) $count_obj->draft : 0;
			$total    += isset( $count_obj->pending ) ? (int) $count_obj->pending : 0;
			$total    += isset( $count_obj->private ) ? (int) $count_obj->private : 0;

			if ( in_array( $type, $enabled_types, true ) ) {
				$legacy_count += $total;
			} else {
				$block_count += $total;
			}
		}

		$v7_override_query = new WP_Query(
			array(
				'post_type'      => $all_types,
				'meta_key'       => '_v7_editor_preference',
				'meta_value'     => 'block',
				'posts_per_page' => -1,
				'fields'         => 'ids',
				'no_found_rows'  => true,
			)
		);
		$block_overrides = $v7_override_query->post_count;

		$v7_classic_query = new WP_Query(
			array(
				'post_type'      => $all_types,
				'meta_key'       => '_v7_editor_preference',
				'meta_value'     => 'classic',
				'posts_per_page' => -1,
				'fields'         => 'ids',
				'no_found_rows'  => true,
			)
		);
		$classic_overrides = $v7_classic_query->post_count;

		return array(
			'legacy_count' => $legacy_count,
			'block_count'  => $block_count,
			'total'        => $legacy_count + $block_count,
			'overrides'    => $block_overrides + $classic_overrides,
		);
	}

	public function display_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$enabled_types = get_option( 'v7_legacy_editor_post_types', array( 'post', 'page' ) );
		$enabled_roles = get_option( 'v7_legacy_editor_roles', array() );
		$clean_assets  = get_option( 'v7_legacy_editor_clean_assets', '0' );
		$post_types    = $this->get_eligible_post_types();
		$all_roles     = wp_roles()->roles;
		$stats         = $this->get_editor_stats();
		?>
		<div class="v7-settings-wrap">

			<div class="v7-toast"><?php esc_html_e( '✓ Settings saved successfully!', 'v7-legacy-editor-enabler' ); ?></div>

			<div class="v7-header">
				<div class="v7-header-content">
					<div>
						<h1><?php esc_html_e( 'V7 Legacy Editor Enabler', 'v7-legacy-editor-enabler' ); ?></h1>
						<p><?php esc_html_e( 'Granular control over your WordPress editing experience.', 'v7-legacy-editor-enabler' ); ?></p>
					</div>
					<span class="v7-version-badge">v<?php echo esc_html( $this->version ); ?></span>
				</div>
			</div>

			<form method="post" action="<?php echo esc_url( admin_url( 'options.php' ) ); ?>">
				<?php settings_fields( 'v7_legacy_editor_options' ); ?>

				<div class="v7-card">
					<div class="v7-card-header">
						<div class="v7-card-icon purple">
							<span class="dashicons dashicons-edit-large"></span>
						</div>
						<div>
							<h2 class="v7-card-title"><?php esc_html_e( 'Post Type Control', 'v7-legacy-editor-enabler' ); ?></h2>
							<p class="v7-card-subtitle"><?php esc_html_e( 'Choose which post types use the Legacy Editor', 'v7-legacy-editor-enabler' ); ?></p>
						</div>
					</div>
					<?php foreach ( $post_types as $slug => $type_obj ) : ?>
						<div class="v7-toggle-row">
							<div class="v7-toggle-info">
								<span class="v7-toggle-label"><?php echo esc_html( $type_obj->labels->name ); ?></span>
								<span class="v7-toggle-desc"><?php echo esc_html( $type_obj->labels->singular_name ); ?> — <?php echo esc_html( $slug ); ?></span>
							</div>
							<label class="v7-switch">
								<input type="checkbox" name="v7_legacy_editor_post_types[]" value="<?php echo esc_attr( $slug ); ?>" <?php checked( in_array( $slug, $enabled_types, true ) ); ?> />
								<span class="v7-switch-slider"></span>
							</label>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="v7-card">
					<div class="v7-card-header">
						<div class="v7-card-icon teal">
							<span class="dashicons dashicons-groups"></span>
						</div>
						<div>
							<h2 class="v7-card-title"><?php esc_html_e( 'Role-Based Control', 'v7-legacy-editor-enabler' ); ?></h2>
							<p class="v7-card-subtitle"><?php esc_html_e( 'Force Legacy Editor for specific user roles (overrides post type settings)', 'v7-legacy-editor-enabler' ); ?></p>
						</div>
					</div>
					<?php foreach ( $all_roles as $role_slug => $role_info ) : ?>
						<div class="v7-toggle-row">
							<div class="v7-toggle-info">
								<span class="v7-toggle-label"><?php echo esc_html( translate_user_role( $role_info['name'] ) ); ?></span>
								<span class="v7-toggle-desc"><?php echo esc_html( $role_slug ); ?></span>
							</div>
							<label class="v7-switch">
								<input type="checkbox" name="v7_legacy_editor_roles[]" value="<?php echo esc_attr( $role_slug ); ?>" <?php checked( in_array( $role_slug, $enabled_roles, true ) ); ?> />
								<span class="v7-switch-slider"></span>
							</label>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="v7-card">
					<div class="v7-card-header">
						<div class="v7-card-icon green">
							<span class="dashicons dashicons-performance"></span>
						</div>
						<div>
							<h2 class="v7-card-title"><?php esc_html_e( 'Performance', 'v7-legacy-editor-enabler' ); ?></h2>
							<p class="v7-card-subtitle"><?php esc_html_e( 'Optimize your site speed by removing unused Gutenberg assets', 'v7-legacy-editor-enabler' ); ?></p>
						</div>
					</div>
					<div class="v7-toggle-row">
						<div class="v7-toggle-info">
							<span class="v7-toggle-label"><?php esc_html_e( 'Remove Gutenberg Frontend CSS/JS', 'v7-legacy-editor-enabler' ); ?></span>
							<span class="v7-toggle-desc"><?php esc_html_e( 'Removes wp-block-library styles from the frontend for Legacy Editor post types', 'v7-legacy-editor-enabler' ); ?></span>
						</div>
						<label class="v7-switch">
							<input type="checkbox" name="v7_legacy_editor_clean_assets" value="1" <?php checked( '1', $clean_assets ); ?> />
							<span class="v7-switch-slider"></span>
						</label>
					</div>
				</div>

				<div class="v7-save-area">
					<?php submit_button( esc_html__( 'Save Settings', 'v7-legacy-editor-enabler' ), 'v7-save-btn', 'submit', false ); ?>
				</div>
			</form>

			<div class="v7-card">
				<div class="v7-card-header">
					<div class="v7-card-icon blue">
						<span class="dashicons dashicons-chart-bar"></span>
					</div>
					<div>
						<h2 class="v7-card-title"><?php esc_html_e( 'Editor Usage Statistics', 'v7-legacy-editor-enabler' ); ?></h2>
						<p class="v7-card-subtitle"><?php esc_html_e( 'Overview of editor usage across your content', 'v7-legacy-editor-enabler' ); ?></p>
					</div>
				</div>
				<div class="v7-stats-grid">
					<div class="v7-stat-item">
						<div class="v7-stat-number" data-count="<?php echo esc_attr( $stats['legacy_count'] ); ?>">0</div>
						<div class="v7-stat-label"><?php esc_html_e( 'Legacy Editor', 'v7-legacy-editor-enabler' ); ?></div>
					</div>
					<div class="v7-stat-item">
						<div class="v7-stat-number teal" data-count="<?php echo esc_attr( $stats['block_count'] ); ?>">0</div>
						<div class="v7-stat-label"><?php esc_html_e( 'Block Editor', 'v7-legacy-editor-enabler' ); ?></div>
					</div>
					<div class="v7-stat-item">
						<div class="v7-stat-number green" data-count="<?php echo esc_attr( $stats['total'] ); ?>">0</div>
						<div class="v7-stat-label"><?php esc_html_e( 'Total Content', 'v7-legacy-editor-enabler' ); ?></div>
					</div>
					<div class="v7-stat-item">
						<div class="v7-stat-number" data-count="<?php echo esc_attr( $stats['overrides'] ); ?>">0</div>
						<div class="v7-stat-label"><?php esc_html_e( 'Per-Post Overrides', 'v7-legacy-editor-enabler' ); ?></div>
					</div>
				</div>
			</div>

			<div class="v7-footer">
				<?php
				printf(
					/* translators: %s: Author website link */
					esc_html__( 'Made with ♥ by %s', 'v7-legacy-editor-enabler' ),
					'<a href="https://vaibhawkumarparashar.in" target="_blank" rel="noopener noreferrer">Vaibhaw Kumar</a>'
				);
				?>
			</div>
		</div>
		<?php
	}

	public function add_editor_meta_box() {
		$enabled_types = get_option( 'v7_legacy_editor_post_types', array( 'post', 'page' ) );

		foreach ( $enabled_types as $post_type ) {
			add_meta_box(
				'v7_editor_preference',
				esc_html__( 'Editor Preference', 'v7-legacy-editor-enabler' ),
				array( $this, 'render_editor_meta_box' ),
				$post_type,
				'side',
				'high'
			);
		}
	}

	/**
	 * @param WP_Post $post The current post object.
	 */
	public function render_editor_meta_box( $post ) {
		$preference = get_post_meta( $post->ID, '_v7_editor_preference', true );

		if ( empty( $preference ) ) {
			$preference = 'default';
		}

		wp_nonce_field( 'v7_editor_preference_nonce', 'v7_editor_preference_nonce_field' );
		?>
		<div class="v7-metabox-wrap">
			<label>
				<input type="radio" name="v7_editor_preference" value="default" <?php checked( 'default', $preference ); ?> />
				<?php esc_html_e( 'Use Global Setting', 'v7-legacy-editor-enabler' ); ?>
			</label>
			<label>
				<input type="radio" name="v7_editor_preference" value="classic" <?php checked( 'classic', $preference ); ?> />
				<?php esc_html_e( 'Always Legacy Editor', 'v7-legacy-editor-enabler' ); ?>
			</label>
			<label>
				<input type="radio" name="v7_editor_preference" value="block" <?php checked( 'block', $preference ); ?> />
				<?php esc_html_e( 'Always Block Editor', 'v7-legacy-editor-enabler' ); ?>
			</label>
		</div>
		<?php
	}

	/**
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save_editor_meta_box( $post_id ) {
		if ( ! isset( $_POST['v7_editor_preference_nonce_field'] ) ||
			! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['v7_editor_preference_nonce_field'] ) ), 'v7_editor_preference_nonce' ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['v7_editor_preference'] ) ) {
			$preference = sanitize_text_field( wp_unslash( $_POST['v7_editor_preference'] ) );

			if ( 'default' === $preference ) {
				delete_post_meta( $post_id, '_v7_editor_preference' );
			} else {
				update_post_meta( $post_id, '_v7_editor_preference', $preference );
			}
		}
	}

	/**
	 * @param array $links Existing plugin action links.
	 * @return array Modified plugin action links.
	 */
	public function add_plugin_action_links( $links ) {
		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'options-general.php?page=v7-legacy-editor-enabler' ) ),
			esc_html__( 'Settings', 'v7-legacy-editor-enabler' )
		);
		array_unshift( $links, $settings_link );
		return $links;
	}
}
