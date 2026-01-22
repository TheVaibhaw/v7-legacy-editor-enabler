<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other currentUser and currentBloguser roles on multisite
 *
 * @link       https://vaibhawkumarparashar.in
 * @since      1.0.0
 *
 * @package    V7_Classic_Editor_Enabler
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

/**
 * Remove all plugin options on uninstall.
 *
 * Only removes options if user chooses to delete the plugin completely.
 * Options are preserved during deactivation for potential reactivation.
 */

// Delete plugin options.
delete_option( 'v7_classic_editor_posts' );
delete_option( 'v7_classic_editor_pages' );
delete_option( 'v7_classic_editor_redirect' );

// For multisite, delete options for each site.
if ( is_multisite() ) {
    $sites = get_sites();
    foreach ( $sites as $site ) {
        switch_to_blog( $site->blog_id );
        delete_option( 'v7_classic_editor_posts' );
        delete_option( 'v7_classic_editor_pages' );
        delete_option( 'v7_classic_editor_redirect' );
        restore_current_blog();
    }
}
