=== V7 Legacy Editor Enabler ===
Contributors: thevaibhaw
Donate link: https://vaibhawkumar.in/
Tags: legacy-editor, gutenberg, block-editor, editor, wysiwyg
Requires at least: 5.0
Tested up to: 6.9
Stable tag: 2.0.0
Requires PHP: 7.4
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The ultimate editor experience manager â€” granular control to disable Gutenberg per post type, user role, or individual post, with a premium settings dashboard.

== Description ==

The V7 Legacy Editor Enabler plugin provides fine-grained control over the WordPress editor experience. Since WordPress 5.0, Gutenberg (Block Editor) became the default editor, but many users prefer the familiar legacy TinyMCE editor interface. This plugin allows you to disable Gutenberg and enable the Legacy Editor selectively with multiple layers of control.

= Why Choose V7 Legacy Editor Enabler? =

V7 Legacy Editor Enabler gives you **granular control**:
* Choose Legacy Editor for any post type â€” Posts, Pages, and Custom Post Types
* Per-user-role control â€” Different editors for Authors vs Administrators
* Per-post override â€” Switch editors on individual posts
* Gutenberg frontend asset cleaner for better performance
* Editor usage statistics dashboard
* Premium, modern settings UI with iOS-style toggle switches
* Automatic redirect to settings page after activation for instant configuration
* Clean, professional code built with WordPress security standards
* Zero external dependencies â€” Lightweight and fast

= Perfect For =

* **Content Creators**: Use Legacy Editor for blog posts while keeping Gutenberg for landing pages
* **Developers**: Clients who prefer Legacy Editor but want modern page building tools
* **Hybrid Workflows**: Mix Legacy and Gutenberg editors based on content type, user role, or individual post
* **Performance**: Minimal overhead with clean, efficient code. Remove unused Gutenberg CSS from frontend

= Key Features =

* **Custom Post Type Support**: Dynamically detects all registered post types with granular toggles
* **Role-Based Control**: Force Legacy Editor for specific user roles (e.g., Authors, Contributors)
* **Per-Post Override**: Meta box on each post to choose Legacy or Block editor individually
* **Gutenberg Asset Cleaner**: Remove wp-block-library CSS/JS from frontend for Legacy posts (speed boost)
* **Usage Statistics**: See how many posts use Legacy vs Block editor at a glance
* **Premium Dashboard**: Modern card-based UI with iOS toggle switches, animated stats, and toast notifications
* **Automatic Redirect**: Redirects to settings page immediately after activation for easy configuration
* **Professional Code**: Built with WordPress best practices and security standards
* **Lightweight**: Minimal impact on site performance

= How It Works =

* **Post Types**: Enable/disable Legacy Editor for any registered post type
* **User Roles**: Force Legacy Editor for specific roles regardless of post type settings
* **Per-Post**: Override any global setting on an individual post basis
* **Priority Chain**: Per-post override â†’ Role control â†’ Post type setting
* **Performance**: Optionally clean Gutenberg CSS/JS from frontend

= Privacy & GDPR Compliance =

V7 Legacy Editor Enabler is fully GDPR compliant:
* **No Data Collection**: This plugin does not collect, store, or transmit any personal data
* **No Cookies**: No cookies are set by this plugin
* **No External Services**: No external API calls or third-party services
* **No Tracking**: No analytics or user tracking of any kind
* **Local Storage Only**: All settings are stored locally in your WordPress database

== Installation ==

= Automatic Installation (Recommended) =

1. Log in to your WordPress admin dashboard
2. Navigate to **Plugins > Add New**
3. Search for "V7 Legacy Editor Enabler"
4. Click **Install Now**
5. The plugin will automatically redirect you to the settings page for configuration

= Manual Installation =

1. Download the plugin ZIP file
2. Log in to your WordPress admin dashboard
3. Navigate to **Plugins > Add New > Upload Plugin**
4. Click **Choose File** and select the downloaded ZIP file
5. Click **Install Now**
6. Activate the plugin - you'll be redirected to settings automatically

= FTP Installation =

1. Download and unzip the plugin files
2. Upload the `v7-legacy-editor-enabler` folder to `/wp-content/plugins/` directory
3. Activate the plugin through the **Plugins** menu in WordPress
4. You'll be automatically redirected to the settings page

== Frequently Asked Questions ==

= How do I access the settings? =

After activation, you're automatically redirected to settings. You can also find it under **Settings > V7 Legacy Editor** in your admin menu.

= Can I use both editors on the same site? =

Yes! Enable Legacy Editor for posts but keep Gutenberg for pages, or any combination that suits your workflow. You can even set different editors per individual post.

= Can different users use different editors? =

Yes! With the Role-Based Control feature, you can force Legacy Editor for Authors while Administrators keep using Gutenberg.

= Can I override the editor on a specific post? =

Yes! Each post has an "Editor Preference" meta box in the sidebar where you can choose "Always Legacy", "Always Block", or "Use Global Setting".

= Does this affect existing content? =

No, existing posts and pages remain unchanged. The setting only affects the editor used for new content creation and editing.

= What is the Gutenberg Asset Cleaner? =

It removes the Gutenberg block CSS/JS files from your frontend pages for post types using the Legacy Editor. This improves page load speed since those assets are unnecessary.

= What if I want to switch back? =

Simply uncheck the appropriate toggles in settings and save. Gutenberg will be restored for those post types.

= Can I use this with page builders? =

Yes, this works with any page builder. The Legacy Editor setting only affects the default WordPress editor.

= Does this work with custom post types? =

Yes! Since v2.0.0, the plugin automatically detects all registered post types (including WooCommerce Products, Portfolio, etc.) and lets you toggle each one.

== Screenshots ==

1. Premium Settings Dashboard - Modern card-based UI with iOS-style toggle switches
2. Post Type Control - Toggle Legacy Editor for any registered post type
3. Role-Based Control - Set editors per user role
4. Performance Settings - Gutenberg asset cleaner toggle
5. Usage Statistics - Visual stats of editor usage across content
6. Per-Post Editor Preference - Meta box for individual post overrides

== Changelog ==

= 2.0.0 - 2026-02-13 =
* **Major Update â€” Editor Experience Manager**
* NEW: Dynamic Custom Post Type support - all registered post types detected automatically
* NEW: Per-User Role Control - force Legacy Editor for specific roles
* NEW: Per-Post Editor Switcher - override global settings on individual posts
* NEW: Gutenberg Frontend Asset Cleaner - remove unused CSS/JS for performance
* NEW: Editor Usage Statistics dashboard with animated counters
* NEW: Premium modern settings UI with iOS-style toggle switches
* NEW: Card-based layout with gradient header and micro-animations
* NEW: Toast notification on settings save
* IMPROVED: 3-tier priority chain (per-post â†’ role â†’ post type)
* IMPROVED: Admin CSS/JS only loads on plugin settings page
* IMPROVED: v1.x to v2.x settings migration on activation
* IMPROVED: Comprehensive uninstall cleanup including post meta

= 1.0.0 - 2026-01-30 =
* **Initial Release**
* Selective Legacy Editor enablement for Posts and Pages
* Automatic redirect to settings page after activation
* Per-post-type granular control
* Professional OOP code structure with security best practices
* Full WordPress coding standards compliance (WPCS)
* Internationalization (i18n) ready with translation support
* Multisite compatible
* Proper uninstall cleanup
* GDPR compliant - no data collection
* Tested with WordPress 6.9 and PHP 7.4+

== Upgrade Notice ==

= 2.0.0 =
Major update with 6 new features: Custom Post Type support, Role-Based Control, Per-Post Switcher, Gutenberg Asset Cleaner, Usage Statistics, and a Premium Modern UI. Your v1.x settings are automatically migrated.

= 1.0.0 =
Initial release - no upgrade needed.

== Additional Info ==

= Requirements =

* WordPress 5.0 or higher
* PHP 7.4 or higher

= Support =

For support, bug reports, or feature requests:

* **Author:** Vaibhaw Kumar
* **Email:** imvaibhaw@gmail.com
* **Website:** [vaibhawkumar.in](https://vaibhawkumar.in)

= Contributing =

Contributions are welcome! Please feel free to submit a Pull Request on [GitHub](https://github.com/TheVaibhaw/v7-legacy-editor-enabler).
