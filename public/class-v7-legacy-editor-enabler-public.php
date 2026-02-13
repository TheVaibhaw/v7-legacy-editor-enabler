<?php
/**
 * @package    V7_Legacy_Editor_Enabler
 * @subpackage V7_Legacy_Editor_Enabler/public
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Public-facing functionality of the plugin.
 *
 * @since 1.0.0
 */
class V7_Legacy_Editor_Enabler_Public {

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
	 * Disable the block editor based on settings.
	 *
	 * Priority: per-post override → per-role → per-post-type global.
	 *
	 * @param bool   $use_block_editor Whether to use the block editor.
	 * @param string $post_type        The current post type.
	 * @return bool
	 */
	public function disable_block_editor( $use_block_editor, $post_type ) {
		$v7_post_id = $this->get_current_post_id();
		if ( $v7_post_id ) {
			$preference = get_post_meta( $v7_post_id, '_v7_editor_preference', true );
			if ( 'classic' === $preference ) {
				return false;
			}
			if ( 'block' === $preference ) {
				return true;
			}
		}

		$enabled_roles = get_option( 'v7_legacy_editor_roles', array() );
		if ( ! empty( $enabled_roles ) && is_user_logged_in() ) {
			$v7_current_user = wp_get_current_user();
			foreach ( $v7_current_user->roles as $role ) {
				if ( in_array( $role, $enabled_roles, true ) ) {
					return false;
				}
			}
		}

		$enabled_types = get_option( 'v7_legacy_editor_post_types', array( 'post', 'page' ) );
		if ( in_array( $post_type, $enabled_types, true ) ) {
			return false;
		}

		return $use_block_editor;
	}

	/**
	 * Remove Gutenberg frontend assets for performance.
	 */
	public function remove_gutenberg_assets() {
		$clean_assets = get_option( 'v7_legacy_editor_clean_assets', '0' );

		if ( '1' !== $clean_assets ) {
			return;
		}

		if ( is_admin() ) {
			return;
		}

		$enabled_types = get_option( 'v7_legacy_editor_post_types', array( 'post', 'page' ) );

		if ( is_singular() ) {
			$v7_current_type = get_post_type();
			if ( $v7_current_type && in_array( $v7_current_type, $enabled_types, true ) ) {
				$preference = get_post_meta( get_the_ID(), '_v7_editor_preference', true );
				if ( 'block' === $preference ) {
					return;
				}

				wp_dequeue_style( 'wp-block-library' );
				wp_dequeue_style( 'wp-block-library-theme' );
				wp_dequeue_style( 'global-styles' );
			}
		}
	}

	/**
	 * @return int|false Post ID or false.
	 */
	private function get_current_post_id() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['post'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return absint( $_GET['post'] );
		}

		global $post;
		if ( isset( $post->ID ) ) {
			return $post->ID;
		}

		return false;
	}
}
