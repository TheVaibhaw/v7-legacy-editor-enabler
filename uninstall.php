<?php
/**
 * @package V7_Legacy_Editor_Enabler
 * @since   1.0.0
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'v7_legacy_editor_post_types' );
delete_option( 'v7_legacy_editor_roles' );
delete_option( 'v7_legacy_editor_clean_assets' );
delete_option( 'v7_legacy_editor_redirect' );

delete_option( 'v7_legacy_editor_posts' );
delete_option( 'v7_legacy_editor_pages' );

global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
$wpdb->delete( $wpdb->postmeta, array( 'meta_key' => '_v7_editor_preference' ) );

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if ( is_multisite() ) {
	$v7_le_sites = get_sites();
	foreach ( $v7_le_sites as $v7_le_site ) {
		switch_to_blog( $v7_le_site->blog_id );

		delete_option( 'v7_legacy_editor_post_types' );
		delete_option( 'v7_legacy_editor_roles' );
		delete_option( 'v7_legacy_editor_clean_assets' );
		delete_option( 'v7_legacy_editor_redirect' );

		delete_option( 'v7_legacy_editor_posts' );
		delete_option( 'v7_legacy_editor_pages' );

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		$wpdb->delete( $wpdb->postmeta, array( 'meta_key' => '_v7_editor_preference' ) );

		restore_current_blog();
	}
}
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
