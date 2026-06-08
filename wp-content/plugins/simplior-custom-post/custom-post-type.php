<?php
/*
* Plugin Name: Custom Post Type
* Plugin URI:  https://simplior.com
* Description: WP custom type for Testimonial, Case Study and  Portfolio
* Version: 1.0.0
* Author:  Team Simplior
* Author URI: https://simplior.com
*/

function simplior_plugin_init() {
    
    require plugin_dir_path( __FILE__ ) . 'inc/class-wp-post-type.php';
    require plugin_dir_path( __FILE__ ) . 'recaptcha-v2.php';
    $Class_WP_API = new Class_WP_Post_Type();

}
add_action( 'plugins_loaded', 'simplior_plugin_init' );