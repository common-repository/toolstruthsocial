<?php
/*
Plugin Name: ToolsTruthSocial
Description: Tools and feeds for Truth Social new social media platform and Twitter.
Version: 1.6
Author: Bill Minozzi
Author URI: http://billminozzi.com
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// Make sure the file is not directly accessible.
if (!defined('ABSPATH')) {
    die('We\'re sorry, but you can not directly access this file.');
}
$toolstruthsocialL_plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$toolstruthsocialL_plugin_version = $toolstruthsocialL_plugin_data['Version'];
define('TOOLSTRUTHSOCIALVERSION', $toolstruthsocialL_plugin_version);
define('TOOLSTRUTHSOCIALPATH', plugin_dir_path(__file__));
define('TOOLSTRUTHSOCIALURL', plugin_dir_url(__file__));
$toolstruthsocialLserver = sanitize_text_field($_SERVER['SERVER_NAME']);
define('TOOLSTRUTHSOCIALIMAGES', plugin_dir_url(__file__) . 'images');
define('TOOLSTRUTHSOCIALHOMEURL', admin_url());
$toolstruthsocialL_current_url = esc_url($_SERVER['REQUEST_URI']);
$toolstruthsocialL_version = trim(sanitize_text_field(get_site_option('toolstruthsocialL_version', '')));
function TOOLSTRUTHSOCIAL_plugin_settings_link($links)
{
    $settings_link = '<a href="options-general.php?page=tools-truth-social">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
$TOOLSTRUTHSOCIAL_plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$TOOLSTRUTHSOCIAL_plugin", 'TOOLSTRUTHSOCIAL_plugin_settings_link');
require_once(TOOLSTRUTHSOCIALPATH . "settings/load-plugin.php");
require_once(TOOLSTRUTHSOCIALPATH . "settings/options/plugin_options_tabbed.php");
require_once(ABSPATH . 'wp-includes/pluggable.php');
require_once TOOLSTRUTHSOCIALPATH . "vendor/autoload.php";
// require_once(TOOLSTRUTHSOCIALPATH . "functions/functions.php");
// sub menu... add_action( 'admin_menu', 'TOOLSTRUTHSOCIAL_add_menu_items' );
//register_activation_hook( __FILE__, 'TOOLSTRUTHSOCIAL_plugin_was_activated');
//register_deactivation_hook(__FILE__, 'TOOLSTRUTHSOCIAL_my_deactivation');
add_action('wp_enqueue_scripts', 'truthsocial_enqueue_scripts');
function truthsocial_enqueue_scripts()
{
    wp_enqueue_script('truthsocial-frontend-twitter', TOOLSTRUTHSOCIALURL . 'js/truthsocial-frontend-twitter.js', array('jquery'), true, false);
}
/*** Shortcode For twitter tweet ***/
add_shortcode("TSTWITTER", "truthsocial_twitter_shortcode");
function truthsocial_twitter_shortcode()
{
    $TwitterUserName = trim(sanitize_text_field(get_site_option('TwitterUserName', 'stopbadbots')));
    $TwitterHeight = trim(sanitize_text_field(get_site_option('TwitterHeight', '')));
    $TwitterWidth = trim(sanitize_text_field(get_site_option('TwitterWidth', '')));
    $TwitterLanguage = trim(sanitize_text_field(get_site_option('TwitterLanguage', '')));
    $TwitterTheme = trim(sanitize_text_field(get_site_option('TwitterTheme', 'light')));
    require_once(TOOLSTRUTHSOCIALPATH . "functions/load-tweets.php");
   // wp_enqueue_style('front-end-css', TOOLSTRUTHSOCIALURL . 'css/front-end-css.css');
    ob_start();
    if (empty($TwitterUserName)) {
        // ????????????????????
        $TwitterUserName = "stopbadbots";
    }
    if (empty($TwitterHeight)) {
        $TwitterHeight = '600';
    }
    if (empty($TwitterWidth)) {
        $TwitterWidth = '450';
    }
    if (empty($TwitterTheme)) {
        $TwitterTheme = 'Light';
    }
    $TwitterHeight = trim($TwitterHeight) . 'px';
    $TwitterWidth = trim($TwitterWidth) . 'px';
?>
<div style="display:block;width:100%;float:left;overflow:hidden;">
    <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/<?php echo esc_attr($TwitterUserName); ?>"
        min-width="<?php echo esc_attr($TwitterWidth); ?>" height="<?php echo esc_attr($TwitterHeight); ?>"
        data-theme="<?php echo esc_attr($TwitterTheme); ?>" data-lang="<?php echo esc_attr($TwitterLanguage); ?>"
        data-cards="hidden"></a>
</div> <?php
            return ob_get_clean();
        }

        // 08 2023
 require_once ABSPATH . 'wp-includes/pluggable.php';
// check 4 errors...

if(is_admin() and current_user_can("manage_options")){
    if (!class_exists('Bill_Class_Diagnose') and !function_exists('bill_my_custom_hooking_function')) {
		function bill_my_custom_hooking_function() {
            $plugin_slug = "truthsocial"; // Replace with your actual text domain
            $plugin_text_domain = "truthsocial"; // Replace with your actual text domain
                $notification_url = "https://wpmemory.com/fix-low-memory-limit/";
			$notification_url2 =
				"https://wptoolsplugin.com/site-language-error-can-crash-your-site/";
            require_once(TOOLSTRUTHSOCIALPATH . "includes/checkup/bill_class_diagnose.php");
            }
		add_action('init', 'bill_my_custom_hooking_function');
    }
}

if (! class_exists('bill_catch_errors') and !function_exists('bill_my_custom_hooking_function2')) {
    function bill_my_custom_hooking_function2() {
        require_once(TOOLSTRUTHSOCIALPATH . "includes/checkup/class_bill_catch_errors.php");   
    }
    add_action('init', 'bill_my_custom_hooking_function2');
 }

  // run the ajax...
if (!function_exists('bill_get_js_errors')) {
    function bill_get_js_errors()
        {
            if (isset($_REQUEST)) {
                if (!isset($_REQUEST['bill_js_error_catched']))
                    die("empty error");
                if (!wp_verify_nonce($_POST['_wpnonce'], 'jquery-bill')) {
                    status_header(406, 'Invalid nonce');
                    die();
                }
                $bill_js_error_catched = sanitize_text_field($_REQUEST['bill_js_error_catched']);
                $bill_js_error_catched = trim($bill_js_error_catched);
                if (!empty($bill_js_error_catched)) {
                    $txt = 'Javascript ' . $bill_js_error_catched;
                    error_log($txt);
                    // send email
                    // bill_php_error($txt);
                    //set_transient( 'sbb_javascript_error', '1', (3600*24) );
                    //add_option( 'sbb_javascript_error', time() );
                    die('OK!!!');
                }
            }
            die('NOT OK!');
        }
}
