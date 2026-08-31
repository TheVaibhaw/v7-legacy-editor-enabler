# V7 Legacy Editor Enabler

[![WordPress Plugin Version](https://img.shields.io/badge/version-1.0.0-blue.svg)](https://github.com/TheVaibhaw/v7-legacy-editor-enabler)
[![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-GPL--2.0--or--later-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

**A lightweight, secure WordPress plugin that provides granular control to disable Gutenberg and enable the Legacy (TinyMCE) Editor per post type with automatic settings redirect.**

## 🎯 Description

The V7 Legacy Editor Enabler plugin provides fine-grained control over the WordPress editor experience. Since WordPress 5.0, Gutenberg (Block Editor) became the default editor, but many users prefer the familiar legacy TinyMCE editor interface. This plugin allows you to disable Gutenberg and enable the Legacy Editor selectively for different post types.

## 🌟 Why Choose V7 Legacy Editor Enabler?

**V7 Legacy Editor Enabler** gives you **granular control**:

✅ **Per-Post-Type Control** - Choose Legacy Editor for Posts only, or Pages only, or both  
✅ **Automatic Configuration** - Auto-redirect to settings page after activation  
✅ **Hybrid Workflows** - Perfect for mixed content creation workflows  
✅ **Security First** - Built with WordPress security best practices  
✅ **Zero Dependencies** - Lightweight and fast, no external libraries  
✅ **GDPR Compliant** - No data collection, no tracking, 100% private  

## 🚀 Key Features

* **Selective Enablement**: Choose which post types use Legacy Editor (Posts, Pages, or both)
* **Automatic Redirect**: Redirects to settings page immediately after activation for easy configuration
* **User-Friendly Settings**: Simple checkbox interface under Settings menu
* **Post-Type Specific**: Control editor per post type independently
* **Professional Code**: Built with WordPress best practices and security standards
* **Lightweight**: Minimal impact on site performance
* **Multisite Compatible**: Fully supports WordPress Multisite installations
* **Translation Ready**: Fully internationalized and ready for translations

## 💡 Perfect For

👨‍💼 **Content Creators**: Use Legacy Editor for blog posts while keeping Gutenberg for landing pages  
👨‍💻 **Developers**: Clients who prefer Legacy Editor but want modern page building tools  
🔄 **Hybrid Workflows**: Mix Legacy and Gutenberg editors based on content type  
⚡ **Performance**: Minimal overhead with clean, efficient code  

## 📥 Installation

### Automatic Installation (Recommended)

1. Log in to your WordPress admin dashboard
2. Navigate to **Plugins > Add New**
3. Search for "V7 Legacy Editor Enabler"
4. Click **Install Now**
5. The plugin will automatically redirect you to the settings page for configuration

### Manual Installation

1. Download the plugin ZIP file
2. Log in to your WordPress admin dashboard
3. Navigate to **Plugins > Add New > Upload Plugin**
4. Click **Choose File** and select the downloaded ZIP file
5. Click **Install Now**
6. Activate the plugin - you'll be redirected to settings automatically

### FTP Installation

1. Download and unzip the plugin files
2. Upload the `v7-legacy-editor-enabler` folder to `/wp-content/plugins/` directory
3. Activate the plugin through the **Plugins** menu in WordPress
4. You'll be automatically redirected to the settings page

## ⚙️ Usage

### Initial Setup

1. **Activate Plugin**: After activation, you're automatically taken to settings
2. **Configure Settings**: Check the boxes for post types where you want Legacy Editor
3. **Save Changes**: Click "Save Settings" to apply your preferences

### Settings Configuration

Navigate to **Settings > V7 Legacy Editor** to access:

- **Enable for Posts**: Check to use Legacy Editor for blog posts
- **Enable for Pages**: Check to use Legacy Editor for static pages

### Default Behavior

- Both checkboxes are selected by default
- Legacy Editor is enabled for both Posts and Pages out of the box
- Uncheck boxes to allow Gutenberg for specific post types

## 🔒 Privacy & GDPR Compliance

V7 Legacy Editor Enabler is **fully GDPR compliant**:

* ✅ **No Data Collection**: This plugin does not collect, store, or transmit any personal data
* ✅ **No Cookies**: No cookies are set by this plugin
* ✅ **No External Services**: No external API calls or third-party services
* ✅ **No Tracking**: No analytics or user tracking of any kind
* ✅ **Local Storage Only**: All settings are stored locally in your WordPress database

## ❓ Frequently Asked Questions

### How do I access the settings?

After activation, you're automatically redirected to settings. You can also find it under **Settings > V7 Legacy Editor** in your admin menu.

### Can I use both editors on the same site?

Yes! Enable Legacy Editor for posts but keep Gutenberg for pages, or any combination that suits your workflow.

### Does this affect existing content?

No, existing posts and pages remain unchanged. The setting only affects the editor used for new content creation and editing.

### What if I want to switch back?

Simply uncheck the appropriate boxes in settings and save. Gutenberg will be restored for those post types.

### Can I use this with page builders?

Yes, this works with any page builder. The Legacy Editor setting only affects the default WordPress editor.

### Does this work with custom post types?

Currently, the plugin supports Posts and Pages. Support for custom post types may be added in future versions.

## 📋 Requirements

- **WordPress**: 5.0 or higher
- **PHP**: 7.4 or higher
- **MySQL**: 5.0 or higher (WordPress requirement)

## 📝 Changelog

### 1.0.0 - 2026-01-30

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

## 🤝 Support

For support, bug reports, or feature requests:

- **Author**: Vaibhaw Kumar
- **Email**: imvaibhaw@gmail.com
- **Website**: [vaibhawkumarparashar.in](https://vaibhawkumarparashar.in)
- **GitHub**: [github.com/TheVaibhaw/v7-legacy-editor-enabler](https://github.com/TheVaibhaw/v7-legacy-editor-enabler)

## 📜 License

This plugin is licensed under the **GPL-2.0-or-later**.

```
V7 Legacy Editor Enabler
Copyright (C) 2026, Vaibhaw Kumar

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
```

## 👏 Credits

- **Developer**: Vaibhaw Kumar
- **Testing**: WordPress 6.9
- **Security Review**: Built with WordPress security best practices
- **Code Standards**: Follows WordPress Coding Standards (WPCS)

## 🌐 Contributing

Contributions are welcome! Please feel free to submit a Pull Request on [GitHub](https://github.com/TheVaibhaw/v7-legacy-editor-enabler).

---

**Thank you for using V7 Legacy Editor Enabler!** ⭐

If you find this plugin helpful, please consider leaving a review on WordPress.org.
