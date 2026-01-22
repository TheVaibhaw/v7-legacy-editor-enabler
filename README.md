# V7 Classic Editor Enabler

**Contributors:** Vaibhaw Kumar  
**Tags:** classic-editor, gutenberg, block-editor, editor, wysiwyg  
**Requires at least:** 4.9  
**Tested up to:** 6.4  
**Stable tag:** 1.0.0  
**License:** GPL v3 or later 
**License URI:** https://www.gnu.org/licenses/gpl-3.0.html

A professional WordPress plugin that disables the Gutenberg block editor and enables the Classic Editor for Posts and Pages with granular control.

# Description

The V7 Classic Editor Enabler plugin provides fine-grained control over the WordPress editor experience. Since WordPress 5.0, Gutenberg (Block Editor) became the default editor, but many users prefer the familiar Classic Editor interface. This plugin allows you to disable Gutenberg and enable the Classic Editor selectively for different post types.

# Key Features

- **Selective Enablement**: Choose which post types use Classic Editor (Posts, Pages, or both)
- **Automatic Redirect**: Redirects to settings page immediately after activation for easy configuration
- **User-Friendly Settings**: Simple checkbox interface under Settings menu
- **Post-Type Specific**: Control editor per post type independently
- **Professional Code**: Built with WordPress best practices and security standards
- **Lightweight**: Minimal impact on site performance

# How It Works

- **Posts**: Enable/disable Classic Editor for blog posts
- **Pages**: Enable/disable Classic Editor for static pages
- **Flexible Control**: Mix and match - use Classic for posts but Gutenberg for pages, or vice versa

# Installation

# Automatic Installation (Recommended)

1. Log in to your WordPress admin dashboard
2. Navigate to **Plugins > Add New**
3. Search for "V7 Classic Editor Enabler"
4. Click **Install Now**
5. The plugin will automatically redirect you to the settings page for configuration

# Manual Installation

1. Download the plugin ZIP file from the [WordPress Plugin Directory](https://github.com/thevaibhaw/v7-classic-editor-enabler/archive/refs/heads/main.zip)
2. Log in to your WordPress admin dashboard
3. Navigate to **Plugins > Add New > Upload Plugin**
4. Click **Choose File** and select the downloaded ZIP file
5. Click **Install Now**
6. Activate the plugin - you'll be redirected to settings automatically

# FTP Installation

1. Download and unzip the plugin files
2. Upload the `v7-classic-editor-enabler` folder to `/wp-content/plugins/` directory
3. Activate the plugin through the **Plugins** menu in WordPress
4. You'll be automatically redirected to the settings page

# Usage

# Initial Setup

1. **Activate Plugin**: After activation, you're automatically taken to settings
2. **Configure Settings**: Check the boxes for post types where you want Classic Editor
3. **Save Changes**: Click "Save Changes" to apply your preferences

# Settings Configuration

Navigate to **Settings > V7 Classic Editor** to access:

- **Enable for Posts**: Check to use Classic Editor for blog posts
- **Enable for Pages**: Check to use Classic Editor for static pages

# Default Behavior

- Both checkboxes are selected by default
- Classic Editor is enabled for both Posts and Pages out of the box
- Uncheck boxes to allow Gutenberg for specific post types

# Editor Experience

- **Classic Editor Enabled**: Familiar WYSIWYG editor with toolbar
- **Classic Editor Disabled**: Modern Gutenberg block editor interface
- **Per-Post Type Control**: Different editor for posts vs pages

# Frequently Asked Questions

# How do I access the settings?

After activation, you're automatically redirected to settings. You can also find it under **Settings > V7 Classic Editor** in your admin menu.

# Can I use both editors on the same site?

Yes! Enable Classic Editor for posts but keep Gutenberg for pages, or any combination that suits your workflow.

# Does this affect existing content?

No, existing posts and pages remain unchanged. The setting only affects the editor used for new content creation and editing.

# What if I want to switch back?

Simply uncheck the appropriate boxes in settings and save. Gutenberg will be restored for those post types.

# Is the Classic Editor still supported?

Yes, WordPress maintains the Classic Editor plugin. This plugin provides additional control over when it's used.

# Can I use this with page builders?

Yes, this works with any page builder. The Classic Editor setting only affects the default WordPress editor.

# Does this work with custom post types?

Yes, you can extend the plugin to support custom post types by modifying the code or using additional filters.

1. **Settings Page** - Easy checkbox interface for configuring editor preferences
2. **Classic Editor Interface** - Familiar editing experience when enabled
3. **Admin Menu** - Settings accessible under Settings menu

# Changelog

## 1.0.0

- Initial release
- Selective Classic Editor enablement for Posts and Pages
- Automatic redirect to settings on activation
- Professional code structure with security best practices

# Upgrade Notice

## 1.0.0

Initial release - no upgrade needed.

# Requirements

- WordPress 4.9 or higher
- PHP 5.6 or higher
- MySQL 5.0 or higher

# Support

For support, bug reports, or feature requests:

- **Author:** Vaibhaw Kumar
- **Email:** imvaibhaw@gmail.com
- **Website:** https://vaibhawkumarparashar.in

## License

This plugin is licensed under the GPL v3 or later.

```
V7 Classic Editor Enabler
Copyright (C) 2025, Vaibhaw Kumar

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
```

# Credits

- **Developer:** Vaibhaw Kumar
- **Testing:** WordPress 6.4
- **Security Review:** Built with WordPress security best practices

Thank you for using V7 Classic Editor Enabler!
