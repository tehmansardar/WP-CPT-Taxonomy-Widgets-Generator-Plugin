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

if (!defined('ABSPATH')) {
    die;
}

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human');

if (!function_exists('add_action')) {
    echo 'Hey, you can\t access this file, you silly human';
    exit;
}
