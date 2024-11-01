<?php
/**
 * Plugin Name: WP Auto Alt Image Tag
 * Description: Plugin for auto adding alt text for every images in article, if alt text is empty
 * Author:      Kamer DINC
 * Version:     1.1.3
 * Author URI:  http://github.com/merkdev
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-auto-alt-image-tag
 * Domain Path: /languages
 */

defined('ABSPATH') or die('No script kiddies please!');
define('WPAAIT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WPAAIT_PLUGIN_URL', plugin_dir_url(__FILE__));
define('WPAAIT_SLUG', 'wp-auto-alt-image-tag');

if(!function_exists('get_plugin_data')) {
	require_once(ABSPATH.'wp-admin/includes/plugin.php');
}
$plugin_data = get_plugin_data(WPAAIT_PLUGIN_DIR.'wp-auto-alt-image-tag.php');
define('WPAAIT_VERSION', $plugin_data['Version']);

add_action('plugins_loaded', 'load_textdomain_wpaait');
function load_textdomain_wpaait() {
	load_plugin_textdomain(WPAAIT_SLUG, FALSE, basename(dirname(__FILE__)).'/languages/');
}

add_filter('the_content', 'WPAAIT_detectImagesandAddAltText');
	function WPAAIT_detectImagesandAddAltText($content) {
		global $post;

		if(!is_admin()) {
			$dom = new DOMDocument('1.0', 'UTF-8');
			@$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
			$xpath = new DOMXPath($dom);
			foreach($xpath->query('//img') as $img_node) {
				if($img_node->getAttribute('alt') == '' || !$img_node->getAttribute('alt')) {
					$img_url  = $img_node->getAttribute('src');
					$img_class = $img_url  = $img_node->getAttribute('class');
					preg_match('#wp-image-(\d+)#smi', $img_class, $attachment_id);
					$attachment_id = $attachment_id[1];
					$attachment    = get_post($attachment_id);
					$alt_text      = $attachment->post_title;
					$img_node->setAttribute('alt', $alt_text);
				}
			}

			$content = $dom->saveHtml();
		}

		return $content;
	}

?>