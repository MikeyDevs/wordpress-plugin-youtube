<?php
/*
Plugin Name: YouTube Subs
Plugin URI: www.github.com/mikeydevs
Description: Display Youtube sub button and count
Version: 1.0.0
Author: MikeyDevs
Author URI: www.github.com/mikeydevs
*/

//Exit if accessed directly

if(!defined("ABSPATH")) {
    exit;
}

//LOAD SCRIPT FILE
require_once(plugin_dir_path(__FILE__). "./includes/youtubesubs-scripts.php");

//LOAD CLASS FILE
require_once(plugin_dir_path(__FILE__). "./includes/youtubesubs-class.php");

//REGISTER WIDGET
function register_youtubesubs() {
    register_widget("YouTube_Subs_Widget");
}

//HOOK IN FUNCTION
add_action("widgets_init", "register_youtubesubs");