=== WP Auto Alt Image Tag ===
Contributors: kamerdinc
Tags: image alt, alt tag, auto alt
Donate link: https://www.buymeacoffee.com/merk
Requires at least: 3.1
Tested up to: 5.7.0
Requires PHP: 5.6.3
Stable tag: 1.1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

(PHP Way) This plugin insert to html missing image alt tags/attributes based on each attachment title or filename.

== Description ==
Compatible with the most popular plugins. Please report if you faced any problem with any plugin.
Inserts automatically alt tag/attributes to HTML if alt attributes are empty or somehow missing.
Works only in single page.

<strong>Note: This plugin is written only in PHP. So you can except a better SEO visibility and better crawl statistics.</strong>

<strong>Credits</strong>
-

== Installation ==
Go to `Plugins -> Add New`
Search for `WP Auto Alt Image Tag`
Download and Activate plugin
All done.

<strong>Manual Installation</strong>
Upload the zip file and unzip it in the `/wp-content/plugins/` directory via FTP client, activate the plugin through the `Plugins` menu in WordPress and you are good to go.

== Frequently Asked Questions ==
= Which text use the plugin for filling the missing alt text? =
It uses attachments title or file name.

= Why you created this plugin? =
There are so many plugins done this job but they all using either; manual action way or jQuery way. I needed simple and pure PHP version for better SEO visibility. So i created this.

== Changelog ==
= 1.0.0 =
* Initial release
* Basic functionality
= 1.1.0 =
* Some html extraction methods changed
* Better stability
= 1.1.1 =
* File paths are fixed
* Some admin screen PHP warnings fixed
= 1.1.2 =
* Required files included for "get_plugin_data" function working properly
= 1.1.3 =
* Fix: character encoding UTF-8 correctly

== Upgrade Notice ==
Nothing