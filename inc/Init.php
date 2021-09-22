<?php

/**
 * @package  SkPlugin
 */

namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Base\Enqueue::class,
            Pages\Admin::class,
        ];
    }


    /**
     * Loop through the classes, initialize them, 
     * and call the register() method if it exists
     * @return
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instatiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }


    /**
     * Initialize the class
     * @param  class $class    class from the services array
     * @return class instance  new instance of the class
     */

    private static function instatiate($class)
    {
        $service = new $class();
        return $service;
    }
}

// class SK
// {
//     public $plugin;

//     function __construct()
//     {
//         $this->plugin = plugin_basename(__FILE__);
//     }

//     function register()
//     {
//         add_action('admin_enqueue_scripts', [$this, 'enqueue']);
//         add_action('admin_menu', [$this, 'add_admin_pages']);
//         add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
//     }

//     public function settings_link($links)
//     {

//         $settings_link = '<a href="admin.php?page=sk_plugin">Settings</a>';
//         array_push($links, $settings_link);

//         return $links;
//     }

//     public function add_admin_pages()
//     {
//         add_menu_page('SK Plugin', 'Sk', 'manage_options', 'sk_plugin', [$this, 'admin_index'], 'dashicons-store', 110);
//     }

//     public function admin_index()
//     {
//         require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//     }

//     function activate()
//     {
//         // Generate CPT
//         // require_once plugin_dir_path(__FILE__) . 'inc/sk-plugin-activate.php';
//         Activate::activate();
//     }

//     function enqueue()
//     {
//         // enqueue all scripts
//         wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
//         wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
//     }
// }

// if (class_exists('SK')) {
//     $sk = new SK();
//     $sk->register();
// }

// // activation
// register_activation_hook(__FILE__, [$sk, 'activate']);

// // deactivation
// // require_once plugin_dir_path(__FILE__) . 'inc/sk-plugin-deactivate.php';
// register_deactivation_hook(__FILE__, ['Deactivate', 'deactivate']);
