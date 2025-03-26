<?php
/*
Plugin Name:  Klaro UI
Description:  The Klaro consent manager and custom UI for the California Digital Library.
Plugin URI:   https://github.com/cdlib/klaro-ui
Version:      1.2.0
*/

function add_klaro_ui_stylesheet_and_script() {
  $plugin_url = plugin_dir_url( __FILE__ );

  wp_enqueue_style( 'klaro-ui', $plugin_url . 'dist/css/klaro-ui.css' );
  wp_enqueue_script( 'klaro-config', $plugin_url . 'dist/js/klaro-config.js' );
}

add_action( 'wp_enqueue_scripts', 'add_klaro_ui_stylesheet_and_script' );
