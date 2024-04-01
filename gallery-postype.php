 
<?php
/*
*Plugin Name: Gallery Post type  
*Description: Adds a custom post type for displaying gallery posts elementor.
*Version: 1.0
*Author: Yisus_Dev
 * Author URI: https://enlaweb.co/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: Gallery Post type  
*/



if (!defined('ABSPATH')) {
  exit;
}

if (!defined('GPT_PLUGIN_URL')) {
  define('GPT_PLUGIN_URL', plugin_dir_url(__FILE__));
}

if (!defined('GPT_NS')) {
  define('GPT_NS', 'Gallery_Post_type');
}

// Include settings 
include 'includes/wp_settings_posttype.php';

// Include enqueue scripts functions
include 'includes/wp_enqueue_scripts.php';

// Include shortcode functions
include 'includes/wp_shortcode.php';
