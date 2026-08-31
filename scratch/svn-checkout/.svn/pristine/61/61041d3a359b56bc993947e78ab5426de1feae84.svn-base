<?php
/**
 * Uninstall Handler.
 *
 * Fired when the plugin is uninstalled.
 *
 * @package V7_Legacy_Editor_Enabler
 * @since   1.0.0
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete options for single site.
delete_option( 'v7_legacy_editor_posts' );
delete_option( 'v7_legacy_editor_pages' );
delete_option( 'v7_legacy_editor_redirect' );

// Delete options for multisite installations.
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if ( is_multisite() ) {
	$v7_le_sites = get_sites();
	foreach ( $v7_le_sites as $v7_le_site ) {
		switch_to_blog( $v7_le_site->blog_id );
		delete_option( 'v7_legacy_editor_posts' );
		delete_option( 'v7_legacy_editor_pages' );
		delete_option( 'v7_legacy_editor_redirect' );
		restore_current_blog();
	}
}
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
