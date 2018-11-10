<?php

//ADD SCRIPTS

function yts_add_scripts() {

    //Attach CSS
    wp_enqueue_style("yts-main-style", plugins_url().'./youtubesubs/css/style.css');

    //Attach JavaScript
    wp_enqueue_script("yts-main-script", plugins_url().'./youtubesubs/js/main.js');

    //Add Google Script
    wp_register_script("google", "https://apis.google.com/js/platform.js");
    wp_enqueue_script("google");
}

//FUNCTION TO ADD THE HOOK ABOVE FOR JS FILE
add_action("wp_enqueue_scripts", "yts_add_scripts");