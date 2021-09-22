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
    public $plugin;

    function __construct()
    {
        $this->plugin = plugin_basename(__FILE__);
    }

    function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
        add_action('admin_menu', [$this, 'add_admin_pages']);
        add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
    }

    public function settings_link($links)
    {

        $settings_link = '<a href="admin.php?page=sk_plugin">Settings</a>';
        array_push($links, $settings_link);

        return $links;
    }

    public function add_admin_pages()
    {
        add_menu_page('SK Plugin', 'Sk', 'manage_options', 'sk_plugin', [$this, 'admin_index'], 'dashicons-store', 110);
    }

    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }

    function activate()
    {
        // Generate CPT
        require_once plugin_dir_path(__FILE__) . 'inc/sk-plugin-activate.php';
        SkPluginActivate::activate();
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
require_once plugin_dir_path(__FILE__) . 'inc/sk-plugin-deactivate.php';
register_deactivation_hook(__FILE__, ['SkPluginDeactivate', 'deactivate']);
