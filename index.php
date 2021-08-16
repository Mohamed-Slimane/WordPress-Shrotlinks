<?php
   /*
   Plugin Name: Dever short link
   Plugin URI: https://en.de-ver.com
   description: Get short link of pages
   Text Domain: deveridlink
   Version: 2.1
   Author: Dever
   Author URI: https://en.de-ver.com
   */

load_plugin_textdomain( 'deveridlink', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

//Admin css
function deveridlink_admin() {
    wp_enqueue_style( 'deveridlink_style_admin',  plugin_dir_url( __FILE__ ) . 'css/admin.css');
}  
add_action( 'admin_enqueue_scripts', 'deveridlink_admin' );

//Pages src
if ( !is_admin() ){
    function add_deveridlink_styles() {
        wp_enqueue_style( 'deveridlink_style',  plugin_dir_url( __FILE__ ) . 'css/style.css');
        wp_enqueue_style( 'sweetalert2',  'https://cdn.jsdelivr.net/npm/sweetalert2@10');
    }
    add_action ( 'wp_enqueue_scripts', 'add_deveridlink_styles' );
}
//.Pages src

require_once plugin_dir_path( __FILE__ ) . '/frameworks/cmb2/functions.php';
require_once plugin_dir_path( __FILE__ ) . '/inc/functions.php';
