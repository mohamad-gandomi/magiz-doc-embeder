<?php

/*
 * Plugin Name:       Magiz Document Embeder
 * Plugin URI:        https://magiztech.com/plugins/magiz-doc-embeder/
 * Description:       Effortlessly enhance your WordPress content by embedding interactive PPTX presentations and PDF documents using simple shortcodes
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mohamad Gandomi
 * Author URI:        https://magiztech.com/mohamad-gandomi
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       magiz-doc-embeder
 * Domain Path:       /languages
 */

// Security check to prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define constants for file paths
define('MAGIZ_DOC_EMBEDER_DIR', plugin_dir_path(__FILE__));
define('MAGIZ_DOC_EMBEDER_URI', plugin_dir_url(__FILE__));

// Localization
function magiz_dash_post_load_textdomain() {
    load_plugin_textdomain('magiz-doc-embeder', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'magiz_dash_post_load_textdomain');

// Include public files
//require_once(MAGIZ_DASH_POST_DIR . 'public/magiz_public_enqueues.php');

// Include admin files

