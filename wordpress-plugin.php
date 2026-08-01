<?php
/*
Plugin Name:  Klaro UI
Description:  The Klaro consent manager and custom user interface for the California Digital Library.
Plugin URI:   https://github.com/cdlib/klaro-ui
Version:      1.3.0
*/

function add_klaro_ui_stylesheet_and_script() {
    $plugin_path = plugin_dir_path( __FILE__ ) . 'wordpress-plugin.php';

    if ( ! function_exists( 'get_plugin_data' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    $plugin_data = get_plugin_data( $plugin_path );
    $plugin_version = $plugin_data['Version'];

  wp_enqueue_style( 'klaro-ui', plugins_url( 'dist/css/klaro-ui.css', __FILE__ ), array(), $plugin_version );
  wp_enqueue_script( 'klaro-config', plugins_url( 'dist/js/klaro-config.js', __FILE__ ), array(), $plugin_version, true );
}

add_action( 'wp_enqueue_scripts', 'add_klaro_ui_stylesheet_and_script' );
