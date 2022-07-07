<?php
/*
   Plugin Name: Custom plugin
   Plugin URI: https://makitweb.com
   description: A simple custom plugin
   Version: 1.0.0
   Author: Cristian Moyano
   Author URI: https://makitweb.com/about
*/

// WP TABLE
// Needed to use native WP tables
if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
 }

require_once( 'classes/class.custom-plugin.php' );


register_activation_hook( __FILE__, 'CustomPlugin::create_plugin_table' );

// Add menu
add_action("admin_menu", "CustomPlugin::add_menu");


// ADD CSS
add_action( 'admin_enqueue_scripts', 'CustomPlugin::add_stylesheet_to_admin' );
