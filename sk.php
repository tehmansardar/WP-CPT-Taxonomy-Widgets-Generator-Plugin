<?php

/**
 * @package SkPlugin  
 */

/* 
Plugin Name: SK
Description: Dynamic CPT, Widgets, Taxonomies, Widgets
License: GPLv2 or later
Text Domain: Sk-Plugin
*/

// ways of restricting


defined('ABSPATH') or die('Hey, you can\t access this file, you silly human');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
