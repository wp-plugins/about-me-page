<?php
/**
 * Plugin Name: About Me Page
 * Plugin URI: http://webcodingplace.com/about-me-page/
 * Description: Create your about me page in seconds, with different themes.
 * Version: 1.0.0
 * Author: Rameez
 * Author URI: http://webcodingplace.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: about-me-page
 */

require_once('plugin.class.php');

if( class_exists('WCP_Options_About_Me')){
	
	$just_initialize = new WCP_Options_About_Me;
}

