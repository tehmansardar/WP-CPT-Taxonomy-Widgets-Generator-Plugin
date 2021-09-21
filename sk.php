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

class SK
{

    function __construct()
    {
        add_action('init', [$this, 'custom_post_type']);
    }

    function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    function activate()
    {
        // Generate CPT
        $this->custom_post_type();
        // Flush rewrtie rules
        flush_rewrite_rules();
    }

    function deactivate()
    {
        // Flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall()
    {
        // delete CPT
        // delete all the plugin data from DB
    }

    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    function enqueue()
    {
        // enqueue all scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }
}

if (class_exists('SK')) {
    $sk = new SK();
    $sk->register();
}

// activation
register_activation_hook(__FILE__, [$sk, 'activate']);

// deactivation
register_deactivation_hook(__FILE__, [$sk, 'deactivate']);
