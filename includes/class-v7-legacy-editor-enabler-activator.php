<?php
/**
 * @package    V7_Legacy_Editor_Enabler
 * @subpackage V7_Legacy_Editor_Enabler/includes
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fired during plugin activation and deactivation.
 *
 * @since 1.0.0
 */
class V7_Legacy_Editor_Enabler_Activator {

	public static function activate() {
		self::maybe_migrate_options();

		if ( false === get_option( 'v7_legacy_editor_post_types' ) ) {
			add_option( 'v7_legacy_editor_post_types', array( 'post', 'page' ) );
		}

		if ( false === get_option( 'v7_legacy_editor_roles' ) ) {
			add_option( 'v7_legacy_editor_roles', array() );
		}

		if ( false === get_option( 'v7_legacy_editor_clean_assets' ) ) {
			add_option( 'v7_legacy_editor_clean_assets', '0' );
		}

		add_option( 'v7_legacy_editor_redirect', '1' );
	}

	private static function maybe_migrate_options() {
		$old_posts = get_option( 'v7_legacy_editor_posts' );
		$old_pages = get_option( 'v7_legacy_editor_pages' );

		if ( false !== $old_posts && false === get_option( 'v7_legacy_editor_post_types' ) ) {
			$post_types = array();

			if ( '1' === $old_posts ) {
				$post_types[] = 'post';
			}
			if ( '1' === $old_pages ) {
				$post_types[] = 'page';
			}

			add_option( 'v7_legacy_editor_post_types', $post_types );

			delete_option( 'v7_legacy_editor_posts' );
			delete_option( 'v7_legacy_editor_pages' );
		}
	}

	public static function deactivate() {
	}
}
